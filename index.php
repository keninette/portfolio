<?php include('view/v_header.php'); ?>
<div id="container">    
    <div id="leftDiv" class="hideDarkTheme">
        <div id="pic"><div id="picImg"></div></div>
    </div>
    <div id="rightDiv">
    <?php
        $nav = isset($_REQUEST['nav']) ? (string) $_REQUEST['nav'] : 'home';
        include('include/title.inc.php');
    ?>
        
        <div id="content">
            <?php include('include/content.inc.php'); ?>
        </div>
    </div>
</div>    
<?php include('view/v_footer.php');