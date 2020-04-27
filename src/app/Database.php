<?php

namespace MyTodo\Database;

class Database {
    private $user;
    private $host;
    private $pass;
    private $db;
    protected $connection;

    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "db_todos";
    }

    public function connect()
    {
        $connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        return $connection;
    }
}