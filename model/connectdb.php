<?php
    /* Function : connect or disconnect from database
     * Parameters :
     *      $pb_emptyPdo : bool (true = connect to database, false = disconnect from database)
     */ 

    function connectDB($pb_emptyPdo = false) {
        // disconnect from db
        if ($pb_emptyPdo) {
            $DB = null;
        // connect to db    
        } else {
            // getting db informations
            $user = getDbInfo('user'); 
            $pwd = getDbInfo('pwd');
            $dsn = 'mysql:host=' .getDbInfo('host') .';dbname=' .getDbInfo('dbName');
            try{ 
                $DB = new PDO($dsn,$user,$pwd);
            }catch (Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
        }
        return ($DB);
    }
