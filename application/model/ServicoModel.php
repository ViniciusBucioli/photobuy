<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class ServicoModel {
        
        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }

        private $nome;
        public function setNome($nome) { $this->nome = $nome; }
        public function getNome() { return $this->nome; }

        private $categoria;
        public function setCategoria($categoria) { $this->categoria = $categoria; }
        public function getCategoria() { return $this->categoria; }

        private $preco;
        public function setPreco($preco) { $this->preco = $preco; }
        public function getPreco() { return $this->preco; }

        private $descricao;
        public function setDescricao($descricao) { $this->descricao = $descricao; }
        public function getDescricao() { return $this->descricao; }

        private $oferecidopor;
        public function setOferecidopor($oferecidopor) { $this->oferecidopor = $oferecidopor; }
        public function getOferecidopor() { return $this->oferecidopor; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        public static function cadastrar($novoServico) {
            if($query = $this->conn->prepare('INSERT INTO Servico (oferecido_por, categoria, preco, descricao,nome) VALUES (?, ?, ?, ?,?);')){
                $query->bind_param("sssss", $this->novoServico, $this->novoServico, $this->novoServico, $this->novoServico, $this->novoServico);
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

        public function searchByID($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Servico WHERE id_servico like ?')) {
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
        
        public function searchByNome($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Servico WHERE nome_servico like ?')) {
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

        public function searchByCategoria($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Servico WHERE categoria_servico like ?')) {
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

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Servico SET oferecido_por = ?, categoria = ?, preco = ?, descricao = ?, nome = ? WHERE id = ?')){
                $query->bind_param('ssssss', $this->oferecido_por, $this->categoria, $this->preco, $this->descricao, $this->nome, $this->id);
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
        
            if($query = $this->conn->prepare('DELETE FROM Servico WHERE id = ?')){
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

    }
?>