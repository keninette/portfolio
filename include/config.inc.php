<?php
    function getDbInfo($ps_info){
    // contains database informations
    /*$host = 'mysql51-36.pro';
    $dbName = 'blteamsql3';
    $user = 'blteamsql3';
    $pwd = 'RzqV4ypK8';*/
    
    switch ($ps_info){
        case 'host':
            //$sInfo = 'localhost';
            $sInfo = 'mysql51-36.pro';
            break;
        case 'dbName':
            //$sInfo = 'portfolio';
            $sInfo = 'blteamsql3';
            break;
        case 'user':
            //$sInfo = 'root';
            $sInfo = 'blteamsql3';
            break;
        case 'pwd':
            //$sInfo = '';
            $sInfo = 'RzqV4ypK8';
            break;
    }    
    
    return($sInfo);
    /*$host = 'localhost';
    $dbName = 'portfolio';
    $user = 'root';
    $pwd = '';
    return($$ps_info);*/
    // contains ftp informations  
    }
    
    
