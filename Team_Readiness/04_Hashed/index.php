<?php
session_set_cookie_params(0);
session_start();

if (($_SESSION['lastActivity'] + 30) < time()) {
    // timeout, destroy the session.
    session_destroy();
    unset($_SESSION);
} else {
    $_SESSION['lastActivity'] = time();
}

header('Location:./controllers/sign_in_C.php');
