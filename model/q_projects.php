<?php
// function to get projects list, their images and and names
function getProjectsList() {
    $ls_query = 'SELECT     idProject,'
                            .'name,'
                            .'imgUrl'
                .' FROM      pf_projects'
                .' ORDER BY  name ASC';
    // connection to database
    $DB = connectDB();
    if($DB != null){
        try {
            $ls_res = $DB->query($ls_query);
        }
        catch (Exception $e){
            die('Erreur : ' .$e->getMessage());
            $DB = connectDB(true);
            return(CST_RETURN_FALSE);
        }
    } else {
            return (CST_RETURN_FALSE);
        }

    // managing answers
    return($ls_res->fetchAll());
}


// function to get a project's complete information
function getProjectFullInfo($pn_idProject){
    if ($pn_idProject === 0) { return(null); }
    
    $ls_query = //'SET GLOBAL group_concat_max_len = 1000000;'
                'SELECT     p.idProject,'
                            .'p.name,'
                            .'p.imgUrl,'
                            .'p.description,'
                            .'p.startDate,'
                            .'p.endDate,'
                            .'p.link,'
                            .'group_concat(DISTINCT concat_ws("$",m.name,m.description) SEPARATOR "¤")              as modules,'
                            .'group_concat(DISTINCT t.name)                                                         as techs,'
                            .'group_concat(DISTINCT concat_ws("$",s.context,s.code,s.description, sp.explanation) SEPARATOR "¤")    as skills,'
                            .'group_concat(DISTINCT concat_ws("$",d.url,d.title) SEPARATOR "¤")                     as docs'
                .' FROM      pf_projects            as p'
                .' LEFT JOIN pf_module              as m    ON (m.idProject = p.idProject)'
                .' LEFT JOIN pf_techsperproject     as tp   ON (tp.idProject = p.idProject)'
                .' LEFT JOIN pf_techs               as t    ON (t.idTech = tp.idTech)'
                .' LEFT JOIN pf_skillsperproject    as sp   ON (sp.idProject = p.idProject)'
                .' LEFT JOIN pf_skills              as s    ON (s.idSkill = sp.idSkill)'
                .' LEFT JOIN pf_docs                as d    ON (d.idProject = p.idProject)'
                .' WHERE     p.idProject = ' .$pn_idProject
                .' ORDER BY  name ASC';
    // connection to database
    $DB = connectDB();
    if($DB != null){
        try {
            $ls_res = $DB->query($ls_query);
        }
        catch (Exception $e){
            die('Erreur : ' .$e->getMessage());
            $DB = connectDB(true);
            return(null);
        }
    } else {
            return (null);
        }
    // managing answers
    $lta_infos = $ls_res->fetch();

    // disconnection
    $ls_res->closeCursor();
    $DB = connectDB(true);

    return($lta_infos);
}