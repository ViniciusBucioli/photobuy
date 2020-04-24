<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class PontoModel {
        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }

        private $matriculaFuncionario;
        public function setMatriculaFuncionario($matriculaFuncionario) { $this->matriculaFuncionario = $matriculaFuncionario; }
        public function getMatriculaFuncionario() { return $this->matriculaFuncionario; }

        private $entrada;
        public function setEntrada($entrada) { $this->entrada = $entrada; }
        public function getEntrada() { return $this->entrada; }

        private $saida;
        public function setSaida($saida) { $this->saida = $saida; }
        public function getSaida() { return $this->saida; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Ponto (matricula, entrada, saida) VALUES (?, ?, ?);')){
                $query->bind_param("sss", $this->matricula, $this->entrada, $this->saida);
                $runQuery = $query->execute();
                if($runQuery)
                return true;
            else
                return false;
            }    
        }

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Ponto SET matricula = ?, entrada = ?, saida = ?, WHERE id = ?')){
                $query->bind_param('ssss', $this->ponto, $this->matricula, $this->entrada, $this->id);
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
                if($query = $this->conn->prepare('DELETE FROM Ponto WHERE id = ?')){
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
            
            if($query = $this->conn->prepare('SELECT * FROM Ponto WHERE ID_Ponto like ?')) {
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
            
            if($query = $this->conn->prepare('SELECT * FROM Ponto WHERE matricula_funcionario like ?')) {
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