<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Edit extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function Edit() {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $sql = "UPDATE todo SET edit = 1 WHERE id = " .$id;
            $result = mysqli_query($this->connection_string, $sql);
        }  
    }
}