<?php

function getWatchThemes() {
    $ls_query = 'SELECT     id,'
                            .'title'
                .' FROM      pf_techwatch'
                .' ORDER BY  title ASC';
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

function getSelectedTheme($id_theme) {
    $ls_query = 'SELECT     w.id, '
                            .'w.title, '
                            .'w.content, '
                            .'group_concat(DISTINCT concat_ws("$",d.url,d.title) SEPARATOR "¤") as docs'
                .' FROM      pf_techwatch w '
                .' LEFT JOIN pf_docs d '
                .' ON       d.idDoc = w.idDoc'
                .' WHERE    w.id =' .$id_theme
                .' ORDER BY  title ASC';
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
    return($ls_res->fetch());
}