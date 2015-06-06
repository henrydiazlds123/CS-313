<?php
include '../includes/config.ini';

function updateTransaction($ID, $amount, $note, $_date, $catID)
{
    echo $amount;
    echo $note;
    echo $_date;
    global $db;
    $query = "UPDATE Transactions SET trans_amount='$amount', trans_date='$_date',trans_note='$note', cat_ID=$catID WHERE trans_ID=$ID";
    try {
        $statement = $db->prepare($query);
        $statement->execute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY);
        if ($statement->execute()) {
            echo "Successfully updated Profile";
        } else {
            print_r($statement->errorInfo()); // if any error is there it will be posted
        }
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function addNewCategory($newCat, $type)
{
    global $db;
    $query = 'INSERT INTO Category
                    (cat_name, type_ID) 
              VALUES(:cat_name, :type_ID)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cat_name', $newCat);
        $statement->bindValue(':type_ID', $type);
        $statement->execute();
        $lastTopicID = $db->lastInsertId();
        return $lastTopicID;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function addNewTransaction($fecha, $type, $catID, $amount, $note, $hoy, $page)
{
    global $db;
    $query= 'INSERT INTO Transactions
                (trans_date, type_ID, cat_ID, trans_amount, trans_note, trans_record)
            VALUES (:trans_date, :type_ID, :cat_ID, :trans_amount, :trans_note, :trans_record)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':trans_date', $fecha);
        $statement->bindValue(':type_ID', $type);
        $statement->bindValue(':cat_ID', $catID);
        $statement->bindValue(':trans_amount', $amount);
        $statement->bindValue(':trans_note', $note);
        $statement->bindValue(':trans_record', $hoy);
        $statement->execute();
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
        header('Location:../view/'.$page);
}
// $fecha = '10/10/2010';
// $type = '2';
// $catID = '4';
// $amount = '-200';
// $note = 'hola';
// //$hoy = "10/10/10";//date("Y-m-d H:i:s");
// addNewTransaction($fecha, $type, $catID, $amount, $note);
