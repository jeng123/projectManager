<?php
include('classes/Projects.php');
include('classes/Tasks.php');

if(isset($_POST['newProject'])) {
 Projects::createProject($_POST['newProject']);
}
if(isset($_POST['editProject'])) {
 Projects::editProject($_POST['editProject']);
}
if(isset($_GET['deleteProject'])) {
 Projects::deleteProject($_GET['deleteProject']);
}
if(isset($_GET['project'])) {
 $project=Projects::getProject($_GET['project']);
 if($project==false) {unset($project);}
 $tasks=Tasks::getTasks($_GET['project']);
}

$projectsList=Projects::projectList($_SESSION['user']);

 include('templates/dashboard.php');
?>
