<?php

namespace MyTodo\Todo;

use MyTodo\Database\Database;

class Todo extends Database {

    public function __construct()
    {
        parent::__construct();
        $connection = $this->connect();
        if(!isset($connection)) {
            die("Oh Sorry! Please check your Database Connection!");
        }
    }

    public function insert() 
    {

        if(isset($_POST['todo_title']))
        {
            $todoTitle = $_POST['todo_title'];
            $todoRealID = $_POST['real_id'];
            $sql = "INSERT into todo (todo_title, todo_status, real_id) VALUES ('$todoTitle', false , '$todoRealID')";
            mysqli_query($this->connect(), $sql);
        }
        else
        {
            echo "Insertion Failed";
        }
    }

    public function fetchTodo() 
    {
        $sql = "SELECT * FROM todo ";
        $result = mysqli_query($this->connect(), $sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function delete() 
    {
        if(isset($_POST['id'])) 
        {
            $id = $_POST['id'];
            $sql = "DELETE FROM todo WHERE id=".$id;
            $result = mysqli_query($this->connect(), $sql);
        }
    }
}