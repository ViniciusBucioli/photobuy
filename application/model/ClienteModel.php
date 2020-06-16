<?php
    require '../../utils/db.php';
    require '../../utils/global_functions.php';
    
    class ClienteModel {

        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }

        private $nome;
        public function setNome($nome) { $this->nome = $nome; }
        public function getNome() { return $this->nome; }

        private $email;
        public function setEmail($email) { $this->email = $email; }
        public function getEmail() { return $this->email; }

        private $tel;
        public function setTel($telefone) { $this->tel = $telefone; }
        public function getTel() { return $this->tel; }

        private $endereco;
        public function setEndereco($endereco) { $this->endereco = $endereco; }
        public function getEndereco() {return $this->endereco; }

        private $pass;
        public function setPass($pass) { $this->pass = $pass; }
        public function getPass() { return $this->pass; }

        public $error;

        private $json;
        public function getResultJSON() {
            return $this->json;
        }
        public function getErrorJSON() {
            return json_encode(
                array(
                    "error" => array($error),
                    array(
                        "nome" => $this->nome,
                        "email" => $this->email,
                        "tel" => $this->tel,
                        "endereco" => $this->endereco,
                        "pass" => $this->pass
                        ))
                    );
        }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        //testado e confirmado
        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Cliente (nome, email, tel, endereco, pass) VALUES (?, ?, ?, ?, ?);')){
            $query->bind_param("sssss", $this->nome, $this->email, $this->tel, $this->endereco, $this->pass);
            $runQuery = $query->execute();
            $this->conn->close();
            return $runQuery; //bool
        }else {
            $error = $this->conn->errno . ' ' . $this->conn->error;
            return $error;
            }
        }

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Cliente SET nome = ?, email = ?, tel = ?, endereco = ?, pass = ? WHERE id = ?')){
                $query->bind_param('sssssd', $this->nome, $this->email, $this->tel, $this->endereco, $this->pass, $this->id);
                $result = $query->execute();
                $this->conn->close();
                return $result;
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                echo $error;
                return false;
            }
        }

        public function delete($id) {
        
            if($query = $this->conn->prepare('DELETE FROM Cliente WHERE id = ?')){
                $query->bind_param('s', $id);
                $result = $query->execute();
                if($result)
                    return true;
                else
                    return false;
                $this->conn->close();
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }

        }

        //testado e confirmado
        public function searchBycpf($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Cliente WHERE cpf like ?')) {
                $query->bind_param("s", $word);
                $query->execute();

                $result = $query->get_result();
                //echo $result;
                if ($result->num_rows > 0) {
                    $rows = [];
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    return json_encode(utf8size($rows));
                } else {
                    return "";
                }
                $this->conn->close();
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }
        }

        //testado e confirmado
        public function searchByName($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Cliente WHERE nome like ?')) {
                $query->bind_param("s", $word);
                $query->execute();

                $result = $query->get_result();
                if ($result->num_rows > 0) {
                    $rows = [];
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    $this->json = json_encode(utf8size($rows));
                    return true;
                } else {
                    return false;
                }
                $this->conn->close();
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }
        }
    }
