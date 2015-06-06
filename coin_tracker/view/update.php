<?php
include'../model/general.php';
$ID = $_POST['_trans_ID'];

$result = getRows("SELECT trans_ID, Transactions.type_ID, trans_date, Transactions.cat_ID, cat_name, trans_amount, trans_note FROM Transactions 
                  LEFT JOIN Category ON `Transactions`.`cat_ID` = `Category`.`cat_ID` 
                  WHERE trans_ID = '$ID'");

foreach ($result as $key) {
    $t_p = $key['type_ID'];
    $t_i = $key['trans_ID'];
    $t_d = $key['trans_date'];
    $c_n = $key['cat_name'];
    $c_i = $key['cat_ID'];
    $t_a = abs($key['trans_amount']);
    $t_n = $key['trans_note'];
}



include '../includes/header.html';
    $b = menuList('Home', 'listview');
    $d = menuList('Home', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Home', 'rmm-main-list');
    $g = '</div>' .
            '</nav>' .
            '<section class="body row scroll-y">' ;

            //     '<div class="welcome">' .
            //         '<h1>WELCOME TO COIN TRACKER</h1>' .
            //         '<img class="coin" src="./img/coin.png" alt="coin rotate">' .
            //     '</div>' .
            //     '<p>With this app you are able to track your monthly income and expenses.  Coin Tracker allows you to store these items on your phone for easy access and without the hassle of paper.<br/>  We hope this app enables your to have a better experience with budgeting your finances.</p>' .
     $g .=       '<h2>Update Data</h2>'.
            '<form action="../controller/update.php" id="transactions-form" role="form" method="POST">'.
            '<div class="form-group">'.
            '<br>';
    $g .=  dropDownList("SELECT C.cat_name, C.cat_ID  FROM Category AS C WHERE C.type_ID = '$t_p'", $c_n);
            // '<label for="category">Category</label>'.
            // '<input type="text" class="form-control" name="_category" value="'.$c_n.'" placeholder="category">'.
    $g .=        '<br>'.
            '<label for="amount">Amount</label>'.
            '<input type="text" class="form-control" name="_amount" placeholder="$" value="'.$t_a.'" required>'.
            '<br>'.
            '<label for="trans_date">Date</label>'.
            '<input type="date" class="form-control" name="_trans_date" value="'.$t_d.'"required>'.
            '<br>'.
            '<label for="note">Comments</label>'.
            '<input type="text" class="form-control" name="_note" value="'.$t_n.'" placeholder="comments">'.
            '</div>'.
            '<br>'.
            '<input type="button" class="btn btn-warning" name="_discard" value="Discard">'.
            '<input type="submit" class="btn btn-success" name="_save" value="Save">'.
            '<input type="hidden" class="btn btn-primary" name="_trans_ID" value="'.$t_i.'">'.
            '<input type="hidden" class="btn btn-primary" name="_type_ID" value="'.$t_p.'">'.
            '</form>'.
            '</section>' .
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    
    //write to page
    writeHTML($b, $d, $f, $g);
include '../includes/footer.html';
