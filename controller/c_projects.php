<?php 
// Get all projects from db
$projects = getProjectsList();

// Include view
include('view/v_projects.php');