<?php
    require '../../utils/db.php';
    require '../../utils/global_functions.php';

    class ProdutoModel {
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

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }


        //está funcionando
        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Produto (nome, categoria, preco, descricao) VALUES (?, ?, ?, ?);')){
                $query->bind_param('ssss', $this->nome, $this->categoria, $this->preco, $this->descricao);
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
        
        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Produto SET nome = ?, categoria = ?, preco = ?, descricao = ? WHERE id = ?')){
                $query->bind_param('sssss', $this->nome, $this->categoria, $this->preco, $this->descricao, $this->id);
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
        
            if($query = $this->conn->prepare('DELETE FROM Produto WHERE id = ?')){
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
        
        public function searchByNome($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Produto WHERE nome like ?')) {
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
        public function searchByCategory($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Produto WHERE categoria like ?')) {
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
