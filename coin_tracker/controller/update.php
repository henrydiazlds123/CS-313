<?php
include '../model/general.php';
include './functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = cleanData($_POST['_amount']);
    $_date  = $_POST['_trans_date'];
    $note   = cleanData($_POST['_note']);
    $newCat = cleanData($_POST['_newCat']);
    $catID  = $_POST['_category'];
    $type   = $_POST['_type_ID'];
    $ID     = $_POST['_trans_ID'];
}


if (!empty($newCat)) {
    $lasCatID = addNewCategory($newCat, $type);
    $catID = $lastCatID;
}
if ($type == '2') {
    $amount = $amount *-1;
}


updateTransaction($ID, $amount, $note, $_date, $catID);
header('Location:../view/report.php');
