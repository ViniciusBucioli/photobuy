<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class EstoqueModel {
        private $qtd_movimento_estoque;
        public function setMovimentoEstoque($qtd_movimento_estoque) { $this->qtd_movimento_estoque = $qtd_movimento_estoque; }
        public function getMovimentoEstoque() { return $this->qtd_movimento_estoque; }

        private $quantidade;
        public function setQuantidade($quantidade) { $this->quantidade = $quantidade; }
        public function getQuantidade() { return $this->quantidade; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }
        

        // testar
        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Estoque (qtd, quantidade) VALUES (?, ?);')){
                $query->bind_param("ss", $this->qtd, $this->quantidade);
                $runQuery = $query->execute();
                
            if($runQuery)
                return true;
            else
                return false;   
            }else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }
        }

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Estoque SET qtd = ?, quantidade = ? WHERE id = ?')){
                $query->bind_param('sss', $this->qtd, $this->quantidade, $this->id);
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
        
            if($query = $this->conn->prepare('DELETE FROM Estoque WHERE id = ?')){
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

        public function searchByName($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Estoque WHERE nome like ?')) {
                $query->bind_param("s", $word);
                $query->execute();

                $result = $query->get_result();
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