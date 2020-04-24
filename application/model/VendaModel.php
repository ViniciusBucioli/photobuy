<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class VendaModel {

        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }
        
        private $data;
        public function setData($data) { $this->data = $data; }
        public function getData() { return $this->data; }

        private $preco;
        public function setPreco($preco) { $this->preco = $preco; }
        public function getPreco() { return $this->preco; }

        private $desconto;
        public function setDesconto($desconto) { $this->desconto = $desconto; }
        public function getDesconto() { return $this->desconto; }

        private $precoTotal;
        public function setPrecoTotal($precoTotal) { $this->precoTotal = $precoTotal; }
        public function getPrecoTotal() { return $this->precoTotal; }

        private $idProduto;
        public function setIdProduto($idProduto) { $this->idProduto = $idProduto; }
        public function getIdProduto() { return $this->idProduto; }

        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        public static function cadastrar($novoVenda) {
            if($query = $this->conn->prepare('INSERT INTO Venda (id_produto, vendido_por, data, preco, desconto, preco_total) VALUES (?, ?, ?, ?, ?, ?);')){
                $query->bind_param("ssssss", $this->id_produto, $this->vendido_por, $this->data, $this->preco, $this->preco, $this->desconto, $this->preco_total);
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
            if($query = $this->conn->prepare('UPDATE Venda SET id_produto = ?, vendido_por = ?, data = ?, preco = ?, desconto = ?, preco_total = ?  WHERE id = ?')){
                $query->bind_param('ssssss', $this->id_produto, $this->vendido_por, $this->data, $this->preco, $this->desconto, $this->preco_total, $this->id);
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
        
            if($query = $this->conn->prepare('DELETE FROM Venda WHERE id = ?')){
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
            
            if($query = $this->conn->prepare('SELECT * FROM Venda WHERE nome like ?')) {
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
            

/*TODO - Venda_Produto
$query = $link->prepare('INSERT INTO Venda_Produto (id_produto, id_venda, desconto_venda_produto, preco_venda_produto) VALUES (?, ?, ?, ?);');
*/

            

/* TOD - List
selectAll();
selectByIdProduto($idProduto);
selectByData($data);
*/
?>