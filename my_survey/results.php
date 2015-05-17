<?php
//Start the session
session_start();
include "functions.php";
include "header.html";

$pollA = "pollA.txt";
$pollB = "pollB.txt";
$pollC = "pollC.txt";
$pollD = "pollD.txt";

printPoll($pollA, '0');
printPoll($pollB, '1');
printPoll($pollC, '2');
printPoll($pollD, '3');
echo"<div class='col-md-6'>
            <div class='box but'>";
if (!isset($_SESSION["Last_Activity"])) {
            echo "<a href='javascript:history.back()' class='btn btn-default btn-lg btn-block'>Go Back</a>
            </div></div>";
};
include "footer.html";
