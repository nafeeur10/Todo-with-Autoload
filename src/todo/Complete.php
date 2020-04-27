<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Complete extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function getCompleteList() {
        $sql = "SELECT * FROM todo WHERE todo_status = 1";
        $result = mysqli_query($this->connect(), $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}