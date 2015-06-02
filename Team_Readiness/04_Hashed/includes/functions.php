<?php
include '../models/config.ini';

function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

function getRows($query)
{
    global $db;

    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();

        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
function getRow($query)
{
    global $db;

    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        $psw = $result->password;
        $statement->closeCursor();

        return $psw;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
