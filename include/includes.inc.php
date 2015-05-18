<?php
// include css
     // checking $_GET['nav']
    if (isset($_GET['nav']) && $_GET['nav'] != "") {
            $ls_nav = (string) $_GET['nav'];
    } else {
            $ls_nav = "home";
    }
    
    // common includes
    include('include/includesJs.inc.php');
    include('include/config.inc.php');
    include('include/globals.inc.php');
    include('include/tools.inc.php');
    
    $theme = isset($_REQUEST['theme']) ? $_REQUEST['theme'] : THEME_DARK;
    
    // css includes
    $lb_fileFound = searchDirectory($ls_nav,'./css/'.$theme.'/','.css');
    ?>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $theme.'/' ?>index.css" />
    <?php
    if ($lb_fileFound !== null) {
        ?>
        <link rel="stylesheet" type="text/css" href="css/<?php echo $theme.'/'.$ls_nav ?>.css" />
        <?php
    }    
        
    // special includes
    switch($ls_nav){
        case 'projects':
            include('model/connectdb.php');
            include('model/q_projects.php');
            break;
    }

