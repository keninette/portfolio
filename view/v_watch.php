<div class="normalText">
    <ul>
<?php
    foreach ($themes as $one_theme)
    {
        ?>
        <li>
            <a href="index.php?nav=watch&action=viewSingle&id=<?php echo $one_theme['id']?>">
               <?php echo $one_theme['title'] ?>
            </a>
        </li>
        <?php
    }
?>
    </ul>
</div>