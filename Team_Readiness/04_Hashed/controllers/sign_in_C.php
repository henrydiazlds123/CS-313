<?php
include '../models/sign_in_M.php';

session_start();

$logonSuccess = false;
$_SESSION['AUTH'] = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username  = cleanData($_POST['_username']);
    $password  = cleanData($_POST['_password']);
    
    /** Create database connection */
    $logSuccess = verify_User_Credentials($username, $password);
    if ($logSuccess) {
        $logonSuccess = true;
        $_SESSION['AUTH'] = true;
    }

    if ($logonSuccess) {
        $_SESSION['user'] = $username;
        header('Location: ../views/homepage.php');
        exit;
    } else {
        include '../views/sign_in_V.php';
    }
} else {
    include '../views/sign_in_V.php';
}
