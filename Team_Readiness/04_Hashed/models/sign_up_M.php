<?php
include '../includes/config.ini';

function get_userID_by_name($username)
{
    $userID = getRows("SELECT user_ID FROM Users WHERE username = '$username'");
    if (sizeof($userID) > 0) {
        return $userID[0];
    } else {
        return null;
    }
}
function add_New_User($username, $password)
{
    global $db;
    $query = 'INSERT INTO Users
                    (username, password) 
              VALUES(:username, :password)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }

}
