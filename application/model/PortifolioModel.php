<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class PortifolioModel {
        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }

        private $arquivo;
        public function setArquivo($arquivo) { $this->arquivo = $arquivo; }
        public function getArquivo() { return $this->arquivo; }

        private $nome;
        public function setNome($nome) { $this->nome = $nome; }
        public function getNome() { return $this->nome; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Portifolio (arquivo, nome) VALUES (?, ?);')){
                $query->bind_param("ss", $this->arquivo, $this->nome);
                $runQuery = $query->execute();
                if($runQuery)
                    return true;
                else
                    return false;
                }
                else {
                    $error = $this->conn->errno . ' ' . $this->conn->error;
                    return $error;
                }
            }
        
            public function atualizar() {
                if($query = $this->conn->prepare('UPDATE Portifolio SET arquivo = ?, nome = ? WHERE id = ?')){
                    $query->bind_param('sss', $this->arquivo, $this->nome, $this->id);
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
    
            //
            public function delete($id) {
            
                if($query = $this->conn->prepare('DELETE FROM Portifolio WHERE id = ?')){
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
            
            public function searchByID($word) {
                $word = '%'.$word.'%';
                
                if($query = $this->conn->prepare('SELECT * FROM Portifolio WHERE id_portifolio like ?')) {
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
            
            public function searchByName($word) {
                $word = '%'.$word.'%';
                
                if($query = $this->conn->prepare('SELECT * FROM Portifolio WHERE nome_portifolio like ?')) {
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
?>