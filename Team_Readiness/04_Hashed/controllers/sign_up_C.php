<?php
include '../includes/functions.php';
include '../includes/password.php';
include '../models/sign_up_M.php';

$userNameIsUnique  = true;
$passwordIsValid   = true;
$userIsEmpty       = false;
$passwordIsEmpty   = false;
$password2IsEmpty  = false;
$passwordIsComplex = true;
$pw_pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{6,}$/';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username  = cleanData($_POST['_username']);
    $password  = cleanData($_POST['_password']);
    $password2 = cleanData($_POST['_password2']);

    /** Check whether the user has filled in the wisher's name in the text field "user" */
    if (empty($username)) {
        $userIsEmpty = true;
    }

    /** Create database connection */
    $userID = get_userID_by_name($username);
    if ($userID) {
        $userNameIsUnique = false;
    }

     /** Check whether a password was entered and confirmed correctly */
    if (empty($password)) {
        $passwordIsEmpty = true;
    }
    if (!preg_match($pw_pattern, $password)) {
        $passwordIsComplex  = false;
    }

    if (empty($password2)) {
        $password2IsEmpty = true;
    }
    if ($password != $password2) {
        $passwordIsValid = false;
    }

    if (!$userIsEmpty && $userNameIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid && $passwordIsComplex) {
        $mypassword = password_hash($password, PASSWORD_DEFAULT);
        add_New_User($username, $mypassword);
        //session_set_cookie_params(0);
        session_start();
        $_SESSION['user'] = $username;
        $_SESSION['lastActivity'] = time();
        header('Location: ../views/sign_in_V.php');
        exit;
    } else {
        include '../views/sign_up_V.php';
    }
} else {
    include '../views/sign_up_V.php';
}
