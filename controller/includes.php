<?php
// include css
     // checking $_GET['nav']
    if (isset($_GET['nav']) && $_GET['nav'] != "") {
            $ls_nav = (string) $_GET['nav'];
    } else {
            $ls_nav = "home";
    }
    
    // css includes
    include('controller/tools.php');
    $lb_fileFound = searchDirectory($ls_nav,'./view/css/','.css');
    if ($lb_fileFound !== null) {
        echo('<link rel="stylesheet" type="text/css" href="view/css/' .$ls_nav. '.css" />'); 
    }    
    
    // common includes
    include('controller/includesJs.php');
    include('controller/config.php');
    
    
    // special includes
    switch($ls_nav){
        case 'projects':
            include('model/connectdb.php');
            include('model/q_projects.php');
            include('controller/f_projects.php');
            break;
    }

