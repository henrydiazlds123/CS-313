<?php
/**
 * @author Henry Diaz, henrydiazlds123@hotmail.com
 */
include('./config.ini');


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

//Getting all books
function listCollection()
{
    $listCollection = getRows("SELECT * FROM Scriptures");
    foreach ($listCollection as $scripture) {
        echo "<b>".$scripture['book']." ".$scripture['chapter'].":".$scripture['verse']."</b> - \"".$scripture['content']."\"<br><br>";
    }
}
//Getting all books


function listCollection2()
{
    global $db;

    $listCollection = getRows("SELECT id, book, chapter, verse, content FROM Scriptures");
    foreach ($listCollection as $sc) {
        echo "<tr>".
             "<td><b>".$sc['book']." ".$sc['chapter'].":".$sc['verse']."</b></td>".
             "<td>".$sc['content']."</td>";
        
        $myTopics = listTopics($sc['id']);
        echo "<td><ul>";
        foreach ($myTopics as $topics)
        {
            echo "<li>".$topics['topics_name']."</li>";
        }
        echo "</ul></td>";
    }
}
function listTopics($scripture_ID)
{
    global $db;
    $myTopics = $db->prepare("SELECT topics_name FROM Topics
                          INNER JOIN Link ON Link.topics_ID = Topics.topics_ID
                          WHERE Link.scriptures_ID = :scripture_ID  ORDER BY topics_name ASC");
    $myTopics->bindParam(':scripture_ID', $scripture_ID);
    $myTopics->execute();
    return $myTopics;
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

//Getting unique books
function uniqueTopics()
{
    $uniqueTopics = getRows("SELECT DISTINCT topics_name FROM Topics ORDER BY topics_name ASC");
    foreach ($uniqueTopics as $myTopic) {
        echo'<option value="'.$myTopic['topics_name'].'">'.$myTopic['topics_name'].'</option>';
    }
}
//Drop-down menu
function searchBooksByTopic()
{
    if (isset($_POST['searchBook'])) {
        $selected = $_POST['searchBook'];
        //Getting specific Book
        //$getrows = getRows("SELECT * FROM Scriptures WHERE book = '$selected'");
        $getrows = getRows("SELECT `Scriptures`.`book`,`Scriptures`.`chapter`,`Scriptures`.`verse`,`Scriptures`.`content`,`Topics`.`topics_name`,`Link`.`topics_ID`,`Topics`.`topics_ID`,`Link`.`scriptures_ID`,`Scriptures`.`id` FROM Scriptures
LEFT JOIN `cs313`.`Link` ON `Scriptures`.`id` = `Link`.`scriptures_ID` 
LEFT JOIN `cs313`.`Topics` ON `Link`.`topics_ID` = `Topics`.`topics_ID`
WHERE `Topics`.`topics_name` = '$selected'");
        echo "<h4>$selected</h4>";
        echo "<blockquote>";
        foreach ($getrows as $scripture) {
            echo "<b>".$scripture['book']." ".$scripture['chapter'].":".$scripture['verse']."</b> - \"".$scripture['content']."\"<br><br>";
        }
        echo "</blockquote>";
    }
}
