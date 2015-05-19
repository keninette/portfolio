<div class="normalText">
    <h3><?php echo $selectedTheme['title'] ?></h3>
    <p><?php echo $selectedTheme['content'] ?></p>
    <?php 
        $docsTable = explode('¤', $selectedTheme['docs']);
        if (count($docsTable) > 0)
        {
            ?>
            <h4>Documents liés :</h4>
            <ul>
            <?php
            foreach ($docsTable as $one_doc)
            {
                $doc = explode('$', $one_doc);
                ?>
                <a href="../docs/watch/<?php echo $doc[0] ?>">
                    <li><?php echo $doc[1] ?></li>
                </a>
                <?php
            }
            ?>
            </ul>
            <?php 
        }
    ?>
</div>