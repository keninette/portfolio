<?php
if ($theme == THEME_DARK) 
{
    if ($nav !== 'home') { include('view/v_backButton.php'); }
    switch($nav)
    {
        case 'cv':
        ?>
            <div id="banner"><span class="averageTitle" >Mon parcours professionnel</span></div>
        <?php
            break;
        
        case 'me':
        ?>
            <div id="banner"><span class="averageTitle">Mon parcours</span></div>
        <?php
            break;
        
        default:
        case 'projects':
        ?>
            <div id="banner"><span class="averageTitle">Mes projets</span></div>
        <?php
            break;
        
        default:
        ?>
            <div id="banner"><span class="averageTitle" >Delphine Gauthier</span><span class="bigTitle">Développeuse</span></div>
        <?php
            break;
        
    }
    
} 
else
{
?>
    <a href="index.php"><div id="banner"><span class="averageTitle" >Delphine Gauthier</span><span class="bigTitle">Développeuse</span></div></a>
<?php
}
