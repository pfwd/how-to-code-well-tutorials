<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(
    DB_HOST,
    DB_NAME,
    DB_USERNAME,
    DB_PASSWORD
);
$record = [
    'first_name' => 'Web',
    'last_name' => 'Test',
    'description' => 'This is a test',
    'age' => 22,
];

$newRecord = insertRecord($db, $record);
var_dump($newRecord);
