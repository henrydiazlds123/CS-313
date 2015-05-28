<?php
include('./config.ini');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book      = cleanData($_POST['_book']);
    $chapter   = cleanData($_POST['_chapter']);
    $verse     = cleanData($_POST['_verse']);
    $content   = cleanData($_POST['_content']);
    $topics_ID = $_POST['_topics'];
    $newTopic  = cleanData($_POST['_newTopic']);

    $lastID = addScripture("$book", "$chapter", "$verse", "$content");
    //echo $lastID;
    
    if (!empty($newTopic)) {
        $newTopicID = addNewTopic($newTopic);
        array_push($topics_ID, "$newTopicID");
        //print_r($topics_ID);
    }


    //print_r($topics_ID);

    for ($i=0; $i<sizeof($topics_ID); $i++) {
        addToLink($lastID, $topics_ID[$i]);
    }
    header('Location: ../view/viewAll.php');
    //include('../view/viewAll.php');
}


//Adding to link table
function addToLink($lastID, $topics_ID)
{
    global $db;
    $query = 'INSERT INTO Link
                    (scriptures_ID, topics_ID) 
              VALUES(:scripture_ID, :topics_ID)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':scripture_ID', $lastID);
        $statement->bindValue(':topics_ID', $topics_ID);
        $statement->execute();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }

}


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

//Getting the Topics and creating check boxes.
function getTopics()
{
    $getTopics = getRows("SELECT * FROM Topics ORDER BY topics_name");
    foreach ($getTopics as $topic) {
        echo"<div class='checkbox'>
                    <label><input type='checkbox' name='_topics[]' value='".$topic[topics_ID]."'>".$topic[topics_name]."</label>
                </div>";
    }
}

function addNewTopic($newTopic)
{
    global $db;
    $query = 'INSERT INTO Topics
                    (topics_name) 
              VALUES(:topic_name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':topic_name', $newTopic);
        $statement->execute();
        $lastTopicID = $db->lastInsertId();
        return $lastTopicID;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}


function addScripture($book, $chapter, $verse, $content)
{
    global $db;
    $query = 'INSERT INTO Scriptures
                    (book, chapter, verse, content) 
              VALUES(:book, :chapter, :verse, :content)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':book', $book);
        $statement->bindValue(':chapter', $chapter);
        $statement->bindValue(':verse', $verse);
        $statement->bindValue(':content', $content);
        $statement->execute();
        $lastID = $db->lastInsertId();
        //print $db->lastInsertId();
        //print($lastID);
        return $lastID;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
