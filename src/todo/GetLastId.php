<?php

use MyTodo\Todo\LastId;

$lastId = new LastId();
echo json_encode($lastId->fetchLastId());