<?php
    include('../model/connectdb.php');
    include('../include/config.inc.php');
    include('../include/globals.inc.php');
    include('../include/tools.inc.php');
    
	// -------------------- projects.php --------------------
    
	// get a project's full information and displays it in html code
    if (isset($_GET['todo']) && $_GET['todo'] == 'getProjectInfo'){
        $ln_idProject = (isset($_GET['id'])) ? (int) htmlspecialchars($_GET['id']) : 0;
        
        if ($ln_idProject != 0){
            include('../model/q_projects.php');
            $lta_infos = getProjectFullInfo($ln_idProject);
            if (count($lta_infos) != 0){
                    echo('<div id="presentation" meta =" ' .$ln_idProject .'">');
                    echo('<div id="closeImg" onclick="hideProjectInfos();"></div>');
                    echo('<div id="img"><img id="imgProjet" src="'.PATH_IMG_PROJECTS .$lta_infos['imgUrl'] .'" alt="' .utf8_decode($lta_infos['name']) .'" /></div>');
                    //echo('<div id="img"><img id="imgEpingle "src="images/epingle.png" alt="epingle"><img id="imgProjet" src="'.PATH_IMG_PROJECTS .$lta_infos['imgUrl'] .'" alt="' .utf8_decode($lta_infos['name']) .'" /></div>');
                    echo('<div id="description">');
                        echo('<p id="name"><h2>' .utf8_decode($lta_infos['name']) .'</h2>      <span onclick="hideProjectInfos()">(Cacher)</a></p>');
                        echo('<p>' .$lta_infos['description'] .'<br />Technologies utilisées : ' .$lta_infos['techs'] .'</p></div>');
 
                        if (strlen($lta_infos['docs']) > 0)
                        {
                            $docs = explode('¤', $lta_infos['docs']);
                            echo('<div id="docs"><img src="" alt="Documents liés au projet" /></div>');
                            echo('<ul>');
                            foreach ($docs as $one_doc)
                            {
                                $docInfo = explode('$',$one_doc);
                                ?>
                                <a href="../docs/projects/<?php echo strtolower($lta_infos['name']).'/'.$docInfo[0] ?>">
                                    <li><?php echo $docInfo[1] ?></li>
                                </a>    
                                <?php
                            }
                            echo('</ul>');
                        }
                    echo ('<div id="modules"><h3>Les modules du projet</h3><br />' .formatDbResult($lta_infos['modules'],'modules') .'</div>');
                    echo('<div id="skills">' .formatDbResult($lta_infos['skills'],'skills') .'</div>');
            }
        }
    }