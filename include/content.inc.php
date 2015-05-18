<?php 

    // navigation
    $lb_fileFound = searchDirectory('c_'.$nav,'./controller/','.php');
    if ($lb_fileFound) {
        include('controller/' .'c_'.$nav .'.php');
    } else {
        include('controller/c_home.php');
    }
    
			