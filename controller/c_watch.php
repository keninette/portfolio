<?php
$action     = isset($_GET['action']) ? (string) htmlspecialchars($_GET['action']) : '';
$id         = isset($_GET['id']) ? (int) htmlspecialchars($_GET['id']) : 0;
$include    = 'v_watch';

switch ($action)
{
    case 'viewSingle':
        if ($id === 0) { break; }
        $selectedTheme = getSelectedTheme($id);
        $include = 'v_watch_single';
        break;
    default :
        $themes = getWatchThemes();
        break;
}

include('view/'.$include.'.php');

