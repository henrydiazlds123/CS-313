<?php
include('./config.ini');

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

//Getting Transaction Type
function transType()
{
    $transType = getRows("SELECT * FROM Type");
    foreach ($transType as $type) {
        echo'<option value="'.$type['type_ID'].'">'.$type['type_name'].'</option>';
    }
}

//Drop-down list
function searchBook()
{
    if (isset($_POST['searchBook'])) {
        $selected = $_POST['searchBook'];
        //Getting specific Book
        $getrows = getRows("SELECT * FROM Scriptures WHERE book = '$selected'");
        foreach ($getrows as $scripture) {
            echo "<b>".$scripture['book']." ".$scripture['chapter'].":".$scripture['verse']."</b> - \"".$scripture['content']."\"<br><br>";
        }
    }
}
