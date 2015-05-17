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
//Getting all books
function listCollection()
{
    $listCollection = getRows("SELECT * FROM Scriptures");
    foreach ($listCollection as $scripture) {
        echo "<b>".$scripture['book']." ".$scripture['chapter'].":".$scripture['verse']."</b> - \"".$scripture['content']."\"<br><br>";
    }
}

//Getting unique books
function uniqueBooks()
{
    $uniqueBooks = getRows("SELECT DISTINCT book FROM Scriptures ORDER BY book ASC");
    foreach ($uniqueBooks as $myBook) {
        echo'<option value="'.$myBook['book'].'">'.$myBook['book'].'</option>';
    }
}
//Drop-down menu
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
