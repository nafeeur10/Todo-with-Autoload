<?php

use MyTodo\Todo\Complete;

$complete = new Complete();
echo json_encode($complete->getCompleteList());