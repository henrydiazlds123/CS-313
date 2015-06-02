<?php
include '../model/general.php';

include '../includes/header.html';

    $b = menuList('Home', 'listview');
    $d = menuList('Home', 'rmm-toggled', 'z-index:1000');
    $f = menuList('Home', 'rmm-main-list');
    $g = '</div>' .
            '</nav>' .
            // '<section class="body row scroll-y">' .
            //     '<div class="welcome">' .
            //         '<h1>WELCOME TO COIN TRACKER</h1>' .
            //         '<img class="coin" src="./img/coin.png" alt="coin rotate">' .
            //     '</div>' .
            //     '<p>With this app you are able to track your monthly income and expenses.  Coin Tracker allows you to store these items on your phone for easy access and without the hassle of paper.<br/>  We hope this app enables your to have a better experience with budgeting your finances.</p>' .
            // '</section>' .
            '<footer class="footer row">BYU-Idaho   *   Web Engineering II   *   CS 313   *   Spring 2015</footer></main>';
    
    //write to page
    writeHTML($b, $d, $f, $g);

include '../includes/footer.html';
