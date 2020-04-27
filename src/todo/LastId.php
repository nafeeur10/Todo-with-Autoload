<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class LastId extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function fetchLastId() {
        $sql = "SELECT id FROM todo ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($this->connection_string, $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}