<?php
	
    // function that returns html to format modules and skills returned by db query
    // parameters :
    //      - $ps_stringToFormat : string to format
    //      - $ps_whatToFormat : 'modules' or 'skills'
    function formatDbResult($ps_stringToFormat, $ps_whatToFormat){
        if ($ps_stringToFormat === '' ||$ps_whatToFormat === '') { return(''); }
        
        if ($ps_whatToFormat == 'skills'){
            $ls_res = '<table><tr><th colspan="2">Situations obligatoires</th></tr>';
            $ls_res2 = '<tr><th colspan="2">Comp&eacute;tences mises en oeuvre</th></tr>';
            
        } else {
            $ls_res = '';
            $ls_res2 = '';
        }   
        
        $lta_temp = explode('¤', $ps_stringToFormat);
        foreach ($lta_temp as $value){
            $lta_tempContent = explode('$',$value);
            if ($ps_whatToFormat == 'modules'){
                $ls_res = $ls_res .formatExplodeResult($lta_tempContent, $ps_whatToFormat);    
            } elseif ($ps_whatToFormat == 'skills') {
                if ($lta_tempContent[0] == 'Situations obligatoires.'){
                    $ls_res = $ls_res .formatExplodeResult($lta_tempContent, $ps_whatToFormat);
                } else {
                   $ls_res2 = $ls_res2 .formatExplodeResult($lta_tempContent, $ps_whatToFormat);
                }
            }
        }
        
        $ls_res2 = $ps_whatToFormat = 'skills' ? $ls_res2 .'</table>' : '';
         
        return($ls_res .$ls_res2);
    }
    
    // returns html code (used in formatDbResult) according to what is needed (modules or skills)
    function formatExplodeResult($pta_infos, $ps_whatToFormat){
        switch($ps_whatToFormat){
            case 'modules':
                $ls_res = '<h4>' .$pta_infos[0] .'</h4><p>' .$pta_infos[1] .'</p>';
                break;
            case 'skills':
                $ls_res = '<tr><td>' .$pta_infos[1] .'</td><td>' .$pta_infos[2] .'</td></tr><tr><td></td><td>' .$pta_infos[3] .'</td></tr>';
                break;
        }
        return($ls_res);
    }
	
	// $ps_file : file to look for, does NOT include its extension (ex : home, not home.php)
	// $ps_dir : directory in which is done the search, include the whole path since root directory 

	function searchDirectory ($ps_file, $ps_dir, $ps_extension) {
		if ($ps_file != '' && $ps_dir != '') {
			// open dir
			$dir = opendir($ps_dir);
			if ($dir != '') {
				//read dir    
				while (false !== ($file = readdir($dir))) {
					if ($file != '.' && $file != '..' && $file == $ps_file .$ps_extension){
						return (true);
					}
				}
			}
		}
	}
	return (false);

