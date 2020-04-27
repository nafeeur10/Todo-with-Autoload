<?php
    class DataBase {
        
        private $user ;
        private $host;
        private $pass ;
        private $db;

        public function __construct()
        {
            $this->user = "root";
            $this->host = "localhost";
            $this->pass = "";
            $this->db = "db_todos";
        }

        public function connect()
        {
            $link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            return $link;
        }
    }
?>

