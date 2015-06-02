<?php
include '../model/general.php';
include './functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = cleanData($_POST['_amount']);
    $date   = cleanData($_POST['_trans_date']);
    $note   = cleanData($_POST['_note']);
    $newCat = cleanData($_POST['_newCat']);
    $type   = $_POST['_type']; //1-income or 2-expense
    $catID  = $_POST['_category'];
    $hoy    = date("Y-m-d H:i:s");
    $page   = $_POST['_page'];

    if (!empty($newCat)) {
        $lasCatID = addNewCategory($newCat, $type);
        $catID = $lastCatID;
    }
    if ($type == '2') {
        $amount = $amount *-1;
    }

    addNewTransaction($date, $type, $catID, $amount, $note, $hoy, $page);

}
