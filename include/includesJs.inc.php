<?php
    // function to includeJs according to page being viewed
    function includesJs(){       
        // checking $_GET['nav']
        if (isset($_GET['nav'])) {
                $ls_nav = (string) $_GET['nav'];
                $ls_nav = htmlspecialchars($ls_nav);
        } else {
                $ls_nav = "home";
        }
        
        // including .js according to page being viewed
        $lb_fileFound = searchDirectory($ls_nav, "./script",".js");
        if ($lb_fileFound){
            echo("<script type=\"text/javascript\" src=\"script/" .$ls_nav .".js\"></script>");
        }
          
        // including .js for all pages
		echo("<script type=\"text/javascript\" src=\"script/jquery.js\"></script>");
		echo("<script type=\"text/javascript\" src=\"script/onload.js\"></script>");
    }
