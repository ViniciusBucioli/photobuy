<?php
    require '../../utils/db.php';
    require '../../utils/global_functions.php';

    class LoginModel {

        private $email;
        public function setEmail($email) { $this->email = $email; }
        public function getEmail() { return $this->email; }

        private $pass;
        public function setPass($pass) { $this->pass = $pass; }
        public function getPass() { return $this->pass; }

        private $conn;

        function __construct(){
            $db = new db();
            $this->conn = $db->connection;
        }
        
        public function login() {
            
            
            if($query = $this->conn->prepare('SELECT * FROM Funcionario WHERE email = ? and senha = ?')) {
                $query->bind_param("ss", $this->email, $this->pass);
                $query->execute();

                $result = $query->get_result();

                if ($result->num_rows > 0) {
                    session_start();
                    $_session['email'] = $this->email;
                    $_SESSION['pass'] = $this->pass;
                    $row = [];
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    if ($rows[0]["cargo"] == 'gerente'){
                        return array("valid" => true, "path" => '/gerente');
                    } else {
                        return array("valid" => true, "path" => '/funcionario');
                    }
                } else {
                    if (isset($_session['email']))
                        unset($_session['email']);
                    if (isset($_SESSION['pass']))
                        unset($_SESSION['pass']);
                    return array("valid" => false, "path" => '/login');
                }
                $this->conn->close();
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                return $error;
            }
        }
    }
?>
