<?php

use MyTodo\Todo\Todo;

$getTodos = new Todo();

$method = $_SERVER['REQUEST_METHOD'];
    
if($method === 'POST') {
    if(isset($_POST['id']))
    {
        $getTodos->delete();
    }
    else 
    {
        $getTodos->insert();
    }
}
else if($method === 'GET') {
    echo json_encode($getTodos->fetchTodo());
}