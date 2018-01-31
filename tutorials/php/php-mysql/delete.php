<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(
    DB_HOST,
    DB_NAME,
    DB_USERNAME,
    DB_PASSWORD
);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(empty($id)){
    die('ID is invalid');
}

deleteRecord($db, $id);

header("Location: /select.php");
die;