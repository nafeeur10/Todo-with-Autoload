<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Update extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function Update() {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $sql = "UPDATE todo SET todo_title = '$title', edit = 0  WHERE id =  '$id' ";
            $result = mysqli_query($this->connection_string, $sql);
            if($result) {
                echo "Update Successfull";
            }
            else {
                echo "May be some problme in your query!";
            }
        }
       
    }
}