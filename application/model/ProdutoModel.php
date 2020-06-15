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

        private $imgPath;
        public function setImg($imgPath) { $this->imgPath = $imgPath; }
        public function getImg() { return $this->imgPath; }

        private $json;
        public function getResultJSON() {
            return json_encode(array(
                "nome" => $this->nome,
                "categoria" => $this->categoria,
                "preco" => $this->preco,
                "descricao" => $this->descricao,
                "imgPath" => $this->imgPath

           ));
        }
        public function getErrorJSON() {
            return json_encode(
                array(
                    "this" => array($this->nome, $this->categoria, $this->preco, $this->descricao, $this->imgPath),
                    $this->json
                )
            );
        }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }


        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Produto (nome, categoria, preco, descricao, imgPath) VALUES (?, ?, ?, ?, ?);')){
                $query->bind_param('sssss', $this->nome, $this->categoria, $this->preco, $this->descricao, $this->imgPath);
                $result = $query->execute();
                $this->conn->close();
                return $result;
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                $this->json = json_encode(array("message" => "Não foi possível cria o produto.", "error" => $error));
            }
        }
        
        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Produto SET nome = ?, categoria = ?, preco = ?, descricao = ?, imgPath = ? WHERE id = ?')){
                $query->bind_param('ssssss', $this->nome, $this->categoria, $this->preco, $this->descricao, $this->imgPath, $this->id);
                $result = $query->execute();
                $this->conn->close();
                return false;
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }
        }

        //
        public function delete($id) {
        
            if($query = $this->conn->prepare('DELETE FROM Produto WHERE id = ?')){
                $query->bind_param('d', $id);
                $result = $query->execute();
                $this->conn->close();
                return $result;
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }

        }

        public function getById($id) {
            if($query = $this->conn->prepare('SELECT * FROM Produto WHERE id = ?')) {
                $query->bind_param("d", $id);
                $query->execute();

                $result = $query->get_result();
                $this->conn->close();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $this->set($row);
                    return true;
                } else {
                    return false;
                }
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                echo $error;
            }
        }

        private function set($row) {
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->categoria = $row['categoria'];
            $this->preco = $row['preco'];
            $this->descricao = $row['descricao'];
            $this->imgPath = $row['imgPath'];
        }

        public function getNextId() {
            $query = $this->conn->prepare('SELECT MAX(id) as result FROM Produto');
            $query->execute();
            $result = $query->get_result();
            return $result->fetch_assoc()['result'] + 1;
        }
        
        public function searchByNome($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Produto WHERE nome like ?')) {
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
