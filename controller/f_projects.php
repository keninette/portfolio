<?php

/* 
 * function that displays the list of projects
 * parameters : 
 *  - $pn_idProject (int) : project's ID 
 *  - $ps_projectName (str) : project's name 
 *  - $ps_imgUrl (str) : url to display project's image
 * result : creates a div (<div class=oneProject" onclick="getProjectInfos(this)" meta="idProjet"><img src="imgUrl" alt="projectName" />ProjectName</div>)
 */
function displayProjectsList($pn_idProject, $ps_projectName, $ps_imgUrl){
    if ($pn_idProject == 0 || ($pn_idProject == 0 && $ps_projectName == '' && $ps_imgUrl == '')) { exit(); }
    echo('<div class="oneProject" onclick="getProjectInfos(this)" meta="' .$pn_idProject .'"><img src="'.$ps_imgUrl .'" alt="' .$ps_projectName .'" /><br />' .$ps_projectName .'</div>');
}
