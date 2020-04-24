<?php
    require '../utils/db.php';
    require '../../utils/global_functions.php';

    class FuncionarioModel {
        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }
        
        private $cpf;
        public function setCpf($cpf) { $this->cpf = $cpf; }
        public function getCpf() { return $this->cpf; }

        private $nome;
        public function setNome($nome) { $this->nome = $nome; }
        public function getNome() { return $this->nome; }

        private $cargo;
        public function setCargo($cargo) { $this->cargo = $cargo; }
        public function getCargo() { return $this->cargo; }

        private$hora;
        public function setHoraTrabalho($hora) { $this->hora = $hora; }
        public function getHoraTrabalho() { return $this->hora; }

        private$salario;
        public function setSalario($salario) { $this->salario = $salario; }
        public function getSalario() { return $this->salario; }

        private$telefone;
        public function setTelefone($telefone) { $this->telefone = $telefone; }
        public function getTelefone() { return $this->telefone; }

        private$endereco;
        public function setEndereco($endereco) { $this->endereco = $endereco; }
        public function getEndereco() { return $this->endereco; }

        private $meta;
        public function setMeta($meta) { $this->meta = $meta; }
        public function getMeta() { return $this->meta; }

        private $comissao;
        public function setComissao($comissao) { $this->comissao = $comissao; }
        public function getComissao() { return $this->comissao; }

        private $vendas;
        public function setVendas($vendas) { $this->vendas = $vendas; }
        public function getVendas() { return $this->vendas; }
        
        private $conn;
        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }

        public function cadastrar() {
            if($query = $this->conn->prepare('INSERT INTO Funcionario (cpf, nome, cargo, hora, salario, telefone, endereco, meta, comissao, vendas) VALUES VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);')){
                $query->bind_param("ssssssssss", $this->cpf, $this->nome, $this->cargo, $this->hora, $this->salario, $this->telefone, $this->endereco, $this->meta, $this->comissao, $this->vendas);
                $runQuery = $query->execute();
            }
            

            if($runQuery)
                return true;
            else
                return false;
        }

        public function atualizar() {
            if($query = $this->conn->prepare('UPDATE Funcionario SET cpf = ?, nome = ?, cargo = ?, hora = ?, salario = ?, telefone = ?, endereco = ?, meta = ?, comissao = ?, vendas = ? WHERE id = ?')){
                $query->bind_param('sssssssssss', $this->cpf, $this->nome, $this->cargo, $this->hora, $this->salario, $this->telefone, $this->endereco, $this->meta, $this->comissao, $this->vendas, $this->id);
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
        
            if($query = $this->conn->prepare('DELETE FROM Funcionario WHERE id = ?')){
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

        public function searchByCPF($word) {
            $word = '%'.$word.'%';
            
            if($query = $this->conn->prepare('SELECT * FROM Funcionario WHERE cpf like ?')) {
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
            
            if($query = $this->conn->prepare('SELECT * FROM Funcionario WHERE nome like ?')) {
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
