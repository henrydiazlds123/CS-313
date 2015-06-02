<?php
include '../includes/config.ini';
include '../includes/functions.php';
include '../includes/password.php';

function verify_User_Credentials($username, $password)
{
    $hash = getRow("SELECT password FROM Users WHERE username = '$username'");
    if (password_verify($password, $hash)) {
        //return 1;
        return 1;
    } else {
        return null;
    }

}
