<?php 
    
    // checking $_GET['nav']
    if (isset($_GET['nav']) && $_GET['nav'] != "") {
            $ls_nav = (string) $_GET['nav'];
    } else {
            $ls_nav = "home";
    }

    // navigation
    $lb_fileFound = searchDirectory($ls_nav,'./view','.inc.php');
    if ($lb_fileFound) {
        include('view/' .$ls_nav .'.inc.php');
    } else {
        include('view/home.inc.php');
    }
    
			