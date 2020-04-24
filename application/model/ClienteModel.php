<?php
    require '../../utils/db.php';
    require '../../utils/global_functions.php';
    
    class ClienteModel {
        
        private $cpf;
        public function setCpf($cpf) { $this->cpf = $cpf; }
        public function getCpf() { return $this->cpf; }

        private $nome;
        public function setNome($nome) { $this->nome = $nome; }
        public function getNome() { return $this->nome; }

        private $email;
        public function setEmail($email) { $this->email = $email; }
        public function getEmail() { return $this->email; }

        private $telefone;
        public function setTelefone($telefone) { $this->telefone = $telefone; }
        public function getTelefone() { return $this->telefone; }

        private $endereco;
        public function setEndereco($endereco) { $this->endereco = $endereco; }
        public function getEndereco() {return $this->endereco; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        //testado e confirmado
        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Cliente (cpf, nome, email, telefone, endereco) VALUES (?, ?, ?, ?, ?);')){
            $query->bind_param("sssss",$this->cpf, $this->nome, $this->email, $this->telefone, $this->endereco);
            $runQuery = $query->execute();
            if($runQuery)
                return true;
            else
                return false;
            $this->conn->close();
        }else {
            $error = $this->conn->errno . ' ' . $this->conn->error;
            return $error;
            }
        }

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Cliente SET CPF = ?, nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?')){
                $query->bind_param('ssssss', $this->CPF, $this->nome, $this->email, $this->telefone, $this->endereco, $this->id);
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
        public function searchByCPF($word) {
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
    }
