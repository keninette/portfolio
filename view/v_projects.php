<?php
    if ($theme === THEME_DARK) { ?></div></div></div><?php }
?>
<div id="projects">
    <?php
    foreach($projects as $oneProject) {
        ?>
        <div class="oneProject" onclick="getProjectInfos(this)" meta="<?php echo $oneProject['idProject'] ?>">
            <?php 
                echo $oneProject['name'];
                if (strlen($oneProject['name']) <= MAX_LENGTH_PROJECT_NAME) { ?><br /><?php }
            ?>
            <img src="<?php echo PATH_IMG_PROJECTS.$oneProject['imgUrl'] ?>" 
                 alt="<?php echo $oneProject['name'] ?>" 
                 class="<?php if (strlen($oneProject['name']) <= MAX_LENGTH_PROJECT_NAME) { ?>marginTop5<?php } ?>"/><br />
        </div>
        <?php
    }
    ?>
</div>
<div id="projectsOver" class="normalText"></div>