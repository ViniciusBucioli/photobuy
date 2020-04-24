<?php

class db {
    //Database credentials
    private $host="localhost";
    private $user="root";
    private $password="";
    private $db="kovacs_producoes";

    //Connection attemp
    public $connection;

    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
        //Connection check
        if ($this->connection->connect_error) {
            die("ERROR: Could not connect. " . $this->connection->connect_error);
        }
    }
}

?>