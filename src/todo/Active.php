<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Active extends Database {

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
            $status = $_POST['todo_status'];
            $sql = "UPDATE todo SET todo_status = true  WHERE id =  '$id' ";
            $result = mysqli_query($this->connect(), $sql);
            if($result) {
                echo "Update Successfull";
            }
            else {
                echo "May be some problme in your query!";
            }
        }
       
    }
}