<?php
function connect($dbHost, $dbName, $dbUsername, $dbPassword){
    $db = new mysqli(
        $dbHost,
        $dbUsername,
        $dbPassword,
        $dbName
    );
    if($db->connect_error){
        die("Cannot connect to database: \n"
            . $db->connect_error . "\n"
            . $db->connect_errno
        );
    }
    return $db;
}

/**
 * Fetch all records
 * @param mysqli $db
 * @return array
 */
function fetchAll(mysqli $db){
    $data = [];

    $sql = 'SELECT * FROM `person`';

    $results = $db->query($sql);

    if($results->num_rows > 0){
        while($row = $results->fetch_object()){
            $data[] = $row;
        }
    }

    return $data;
}

/**
 * Insert a record into the database
 * @param mysqli $db
 * @param array $record
 * @throws Exception
 * @return array
 */
function  insertRecord(mysqli $db, array $record){
    $sql = "INSERT INTO `person` ";
    $sql.= "(`first_name`, `last_name`, `description`, `age`)";
    $sql.= "VALUES ";
    $sql.= "(";
    $sql.= "'".$record['first_name']."', ";
    $sql.= "'".$record['last_name']."', ";
    $sql.= "'".$record['description']."', ";
    $sql.= "'".$record['age']."' ";
    $sql.=");";

    $result = $db->query($sql);
    if(!$result){
        throw new Exception('Cannot insert record');
    }
    $record['id'] = $db->insert_id;
    return $record;
}

/**
 * Delete record
 * @param mysqli $db
 * @param $id
 * @throws Exception
 */
function deleteRecord(mysqli $db, $id){
    $sql = "DELETE FROM `person` WHERE id = '".$id."'";
    $result = $db->query($sql);
    if(!$result){
        throw new Exception('Cannot delete record');
    }
}