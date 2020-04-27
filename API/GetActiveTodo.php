<?php

use MyTodo\Todo\ActiveTodo;

$activeTodos = new ActiveTodo();
echo json_encode($activeTodos->getActiveList());