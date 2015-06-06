<?php
include '../includes/config.ini';
function deleteTrans($ID)
{
    global $db;

    $query = ("DELETE FROM Transactions
             WHERE trans_ID = $ID");
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        echo '<script>alert("Transcaction:'.$ID.' deleted sucessful");</script>';
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function showTable($query, $page)
{
    $result = getRows($query);
    //return $result;
    $html = '<table class="table table-condensed table-hover">'.
            '<tr id="transactions-head" class="info">'.
            '<th>ID</th><th>Type</th><th>Category</th><th>Amount</th><th>Date</th><th>Comments</th><th colspan="2">Action</th>'.
            '</tr>'.
            '<tbody id="transactions-table">';
    foreach ($result as $key) {
        $html .= '<tr>'.
                    '<td>'.$key[trans_ID].'</td>'.
                    '<td>'.$key[type].'</td>'.
                    '<td>'.$key[category].'</td>'.
                    '<td>'.$key[amount].'</td>'.
                    '<td>'.$key[date].'</td>'.
                    '<td>'.$key[note].'</td>'.
                    '<td>'.
                        '<form name="editTrans" action="../view/update.php" method="POST">'.
                            '<input type="hidden" name="_page" value="'.$page.'"/>'.
                            '<input type="hidden" name="_trans_ID" value="'.$key[trans_ID].'"/>'.
                            '<input type="submit" name="action" value="Edit"/>'.
                        '</form>'.
                    '</td>'.
                    '<td>'.
                        '<form name="deleteTrans" action="../controller/action.php" method="POST">'.
                            '<input type="hidden" name="_page" value="'.$page.'"/>'.
                            '<input type="hidden" name="_trans_ID" value="'.$key[trans_ID].'"/>'.
                            '<input type="submit" name="action" value="Delete"/>'.
                        '</form>'.
                    '</td>'.
                 '</tr>';
    }
    $html .= '</tbody>'.
             '</table>';

    return $html;
}

function dropDownList($query, $selected)
{
    $result = getRows($query);
    $html = '';
    $html .= '<label for="howheard">Category</label>'.
            '<select  name="_category" class="form-control" onChange="ShowHideOther(this.value);">'.
            '<option value="">select</option>';

    foreach ($result as $key) {
        $html .= '<option value="'.$key[cat_ID].';"';
        if ($selected == $key[cat_name]) {
            $html .= 'selected';
        }
        $html .= '>'.$key[cat_name].'</option>';
    }
    $html .= '<option value="Other">Other</option>'.
            '</select>'.
            '<br>'.
            '<span id="spnOthers" style="display:none;"><label for="new_category">New Category</label><input type="text" class="form-control" name="_newCat" id="other_howheard" placeholder="please, new a category"></span>';

    return $html;
}

function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

function getRows($query)
{
    global $db;

    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();

        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

//Generates all menus according to the size of screen
function menuList($active, $type, $style)
{
    $menu = array('Home' => 'index',
                  'Expense' => 'expense',
                  'Income' => 'income',
                  'Report' => 'report', );

    $html = '<ul';
    $html .= ' class="'.$type.'" style="'.$style.'">';
    foreach ($menu as $key => $value) {
        $html .= '<li';
        if ($key == $active) {
            $html .= ' class="selected"';
        }
        $html .= '><a href="'.$value.'.php?type_name='.$key.'"';
        $html .= '>'.$key.'</a></li>';
    }

    return $html.'</ul>';
}

function writeHTML($b, $d, $f, $g)
{
    $a =    '<aside class="left col">'.
            '<header class="header row">Navigation</header>'.
            '<nav class="body row scroll-y">';
    $c =    '</nav>'.
            '<footer class="footer row">&copy; 2015 - CoinTracker</footer>'.
            '</aside>'.
            '<main class="right col">'.
            '<header class="header row">'.
            '<span>CoinTracker</span>'.
            '</header>'.
            '<nav class="rmm graphite" data-menu-style="" style="padding: 1.2em; max-width: 561.75px;">'.
            '<div class="toggled-menu">'.
            '<div class="rmm-toggled" style="display: block;">'.
            '<div class="rmm-toggled-controls">'.
            '<div class="rmm-toggled-title" onclick="closeMenu()">CoinTracker</div>'.
            '<div id="rmm-button" class="rmm-button" onclick="showMenu()"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>'.
            '</div>'.
            '</div>'.
            '<div id="toggle-menu" class="hidden">';
    $e =    '</div>'.
            '</div>'.
            '<div class="top-menu" style="padding: 1.2 em; max-width: 561.75px;">';

    $h = $a.$b.$c.$d.$e.$f.$g;
    echo $h;
}

function mainPage()
{
    $b = menuList('Home', 'listview');
    $d = menuList('Home', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Home', 'rmm-main-list');
    $g = '</div>'.
            '</nav>'.
            '<section class="body row scroll-y">'.
                '<div class="welcome">'.
                '<h1>WELCOME TO COIN TRACKER</h1>'.
                '<img class="coin" src="../img/coin.png" alt="coin rotate">'.
                '</div>'.
                '<p>With this app you are able to track your monthly income and expenses.  Coin Tracker allows you to store these items on your phone for easy access and without the hassle of paper.<br/>  We hope this app enables your to have a better experience with budgeting your finances.</p>'.
            '</section>'.
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';

    //write to page
    writeHTML($b, $d, $f, $g);
}

function myIncome()
{
    //setup the income page html
    $b = menuList('Income', 'listview');
    $d = menuList('Income', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Income', 'rmm-main-list');
    $g = '</div></nav>'.
            '<section class="body row scroll-y">'.
            '<h1 class="income">Income</h1>'.
            '<h2>Transaction Keeper DataBase</h2>'.
            '<div class="well">'.
            '<form action="../controller/insert.php" id="transactions-form" role="form" method="POST">'.
            '<div class="form-group">'.
            '<br>';
    $g .=  dropDownList("SELECT C.cat_name, C.cat_ID  FROM Category AS C where C.type_ID = '1'");
    $g .=   '<br>'.
            '<label for="amount">Amount</label>'.
            '<input type="text" class="form-control" name="_amount" placeholder="$" required>'.
            '<br>'.
            '<label for="trans_date">Date</label>'.
            '<input type="date" class="form-control" name="_trans_date" required>'.
            '<br>'.
            '<label for="note">Comments</label>'.
            '<input type="text" class="form-control" name="_note" placeholder="comments">'.
            '</div>'.
            '<input type="button" class="btn btn-warning" name="_discard" value="Discard">'.
            '<input type="submit" class="btn btn-success" name="_save" value="Save">'.
            '<input type="hidden" name="_page" value="income.php"/>'.
            '<input type="hidden" class="btn btn-primary" name="_type" value="1">'.
            '</form>'.
            '</div>'.
            '<div class="table-responsive">';
    $g .= showTable("SELECT t1.trans_ID, t1.type_ID, t1.cat_ID, t1.trans_date AS date, t1.trans_amount AS amount, t1.trans_note AS note, t2.type_name AS type, t3.cat_name AS category
                    FROM Transactions AS t1 INNER JOIN Type AS t2 INNER JOIN Category AS t3
                    ON t1.type_ID = t2.type_ID AND t1.cat_ID = t3.cat_ID AND t1.type_ID = '1'", "income.php");
    $g .=   '</div>'.
            '</section>'.
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    //write to page
    writeHTML($b, $d, $f, $g);
}
function myExpenses()
{
    //setup the income page html
    $b = menuList('Expense', 'listview');
    $d = menuList('Expense', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Expense', 'rmm-main-list');
    $g = '</div></nav>'.
            '<section class="body row scroll-y">'.
            '<h1 class="expense">Expenses</h1>'.
            '<h2>Transaction Keeper DataBase</h2>'.
            '<div class="well">'.
            '<form action="../controller/insert.php" id="transactions-form" role="form" method="POST">'.
            '<div class="form-group">'.
            '<br>';
    $g .=  dropDownList("SELECT C.cat_name, C.cat_ID  FROM Category AS C where C.type_ID = '2'");
    $g .=   '<br>'.
            '<label for="amount">Amount</label>'.
            '<input type="text" class="form-control" name="_amount" placeholder="$" required>'.
            '<br>'.
            '<label for="trans_date">Date</label>'.
            '<input type="date" class="form-control" name="_trans_date" required>'.
            '<br>'.
            '<label for="note">Comments</label>'.
            '<input type="text" class="form-control" name="_note" placeholder="comments">'.
            '</div>'.
            '<input type="button" class="btn btn-warning" name="_discard" value="Discard">'.
            '<input type="submit" class="btn btn-success" name="_save" value="Save">'.
            '<input type="hidden" name="_page" value="expense.php"/>'.
            '<input type="hidden" class="btn btn-primary" name="_type" value="2">'.
            '</form>'.
            '</div>'.
            '<div class="table-responsive">';
    $g .= showTable("SELECT t1.trans_ID, t1.type_ID, t1.cat_ID, t1.trans_date AS date, t1.trans_amount AS amount, t1.trans_note AS note, t2.type_name AS type, t3.cat_name AS category
                    FROM Transactions AS t1 INNER JOIN Type AS t2 INNER JOIN Category AS t3
                    ON t1.type_ID = t2.type_ID AND t1.cat_ID = t3.cat_ID AND t1.type_ID = '2'", "expense.php");
    $g .=   '</div>'.
            '</section>'.
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    //write to page
    writeHTML($b, $d, $f, $g);
}

function myReport()
{
    $b = menuList('Report', 'listview');
    $d = menuList('Report', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Report', 'rmm-main-list');
    $g = '</div></nav>'.
        '<section class="body row scroll-y">'.
        '<h1>Report</h1>'.
        '<h2>Transaction Keeper DataBase</h2>'.
        '<form id="transactions-form" role="form"></form>'.
        '<div class="table-responsive">';
    $g .= showTable("SELECT t1.trans_ID, t1.type_ID, t1.cat_ID, t1.trans_date AS date, t1.trans_amount AS amount, t1.trans_note AS note, t2.type_name AS type, t3.cat_name AS category
                       FROM Transactions AS t1 INNER JOIN Type AS t2 INNER JOIN Category AS t3
                       ON t1.type_ID = t2.type_ID AND t1.cat_ID = t3.cat_ID", "report.php");
    $g .= '</div>'.
        '</section>'.
        '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    //write results to page
    writeHTML($b, $d, $f, $g);
}
function myUpdate()
{

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
            '<br>'.
            '<label for="category">Category</label>'.
            '<input type="text" class="form-control" name="_category" value="'.$c_n.'" placeholder="category">'.
            '<br>'.
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
            '</form>'.
            '</section>' .
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    
    //write to page
    writeHTML($b, $d, $f, $g);
}
