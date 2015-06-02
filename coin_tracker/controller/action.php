<?php
include '../model/general.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trans_ID = $_POST['_trans_ID'];
    $action = $_POST['action'];
    $page = $_POST['_page'];

    if ($action == "Delete") {
        deletetrans($trans_ID);
        header('Location:../view/'.$page);
    }
}
