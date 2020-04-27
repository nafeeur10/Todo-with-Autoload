<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Clear extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function clear() {
        $sql = "DELETE FROM todo WHERE todo_status = 1";
        $result = mysqli_query($this->connect(), $sql);
        if($result) {
            echo "Delete Successfull";
        }
        else {
            echo "May be some problme in your query!";
        }
    }
}