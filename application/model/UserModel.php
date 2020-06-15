
<?php
    require '../../utils/db.php';
    require '../../utils/global_functions.php';

    class UserModel {

        private $id;
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->$id; }

        private $user_type;
        public function setUserType($user_type) { $this->user_type = $user_type; }
        public function getUserType() { return $this->$user_type; }

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

        public function loginClient() {
            
            if($query = $this->conn->prepare('SELECT id FROM Cliente WHERE email = ? and pass = ?')) {
                $query->bind_param("ss", $this->email, $this->pass);
                $query->execute();
                $result = $query->get_result();
                // $this->conn->close();
                if($result->num_rows > 0){
                    $rows = $result->fetch_assoc();
                    return $rows['id'];
                }
                return 0;
            } else {
                $error = $this->conn->errno . ' ' . $this->conn->error;
                echo $error;
                return 0;
            }
        }
        
        public function loginWorker() {
            
            if($query = $this->conn->prepare('SELECT id FROM Funcionario WHERE email = ? and senha = ?')) {
                $query->bind_param("ss", $this->email, $this->pass);
                $query->execute();
                $result = $query->get_result();
                $this->conn->close();
                if($result->num_rows > 0){
                    $rows = $result->fetch_assoc();
                    return $rows['id'];
                }
                return 0;
            } else {
                # $error = $this->conn->errno . ' ' . $this->conn->error;
                # echo $error;
                return 0;
            }
        }

        public function login() {
            
            $client_login = $this->loginClient();

            if ($client_login > 0) {
                session_start();
                
                $_session['id'] = $client_login;
                return array("valid" => true, "path" => '/cliente');
            } 
            
            $worker_login = $this->loginWorker();
            if($worker_login > 0){
                session_start();
                
                $_session['id'] = $worker_login;
                return array("valid" => true, "path" => '/gerente');
            }
            else {
                if (isset($_session['id']))
                    unset($_session['id']);
                return array("valid" => false, "path" => '/login');
            }

            return array("valid" => false);
        }
    }
?>
