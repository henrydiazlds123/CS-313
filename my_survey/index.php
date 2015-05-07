<?php
// Start the session
session_start();
include "functions.php";
//Check if session exits
if (isset($_SESSION["Last_Activity"])) {
    header("Location: results.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $age = $_POST['_age'];
        $status = $_POST['_status'];
        $race = $_POST['_race'];
        $season = $_POST['_season'];

        add_poll("pollA.txt", $age);
        add_poll("pollB.txt", $status);
        add_poll("pollC.txt", $race);
        add_poll("pollD.txt", $season);

        //Set session variable
        $_SESSION["Last_Activity"] = time();

        header("Location: results.php");
    } else {
        header("Location: form.php");
        exit;
    
    }
}
    if (isset($_SESSION['Last_Activity']) && (time() - $_SESSION['Last_Activity'] > 1800)) {
        // last request was more than 30 minutes ago
        session_unset(); // unset $_SESSION variable for the run-time 
        session_destroy(); // destroy session data in storage
    }
