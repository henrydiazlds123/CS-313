<?php
include '../includes/config.ini';
$amount='1000';
$date='2001-04-05';
$note='nada funciona';
$newCat = '';
$catID='4';
//$type;
$ID ='19';
$_date = date('Y-m-d', strtotime($date));
updateTransaction($ID, $amount, $note, $_date, $catID);
function updateTransaction($ID, $amount, $note, $_date, $catID)
{
    echo $amount;
    echo $note;
    echo $_date;
    global $db;
    $query = "UPDATE Transactions SET trans_amount=$amount, trans_note='$note', trans_date='$_date', cat_ID=$catID WHERE trans_ID=$ID";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        if ($statement->execute()) {
            echo "Successfully updated Profile";
        } else {
            print_r($statement->errorInfo()); // if any error is there it will be posted
        }
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
