<?php
include('classes/Projects.php');
include('classes/Tasks.php');

$q=explode('/',$_GET['q']);

if(isset($q[1])) {
 if(isset($_POST['newTask'])) {
  Tasks::addTask($_POST['newTask'],$q[1]);
 }
 if(isset($_GET['deleteTask'])) {
  Tasks::deleteTask($_GET['deleteTask'],$q[1],$_SESSION['user']);
 }

 $project=Projects::getProject($q[1]);
 if($project==false) {unset($project);}
 $tasks=Tasks::getTasks($q[1]);
}

$taskDifficulty=array(
 1=>'Super easy',
 2=>'Easy',
 4=>'Normal',
 7=>'Hard',
 12=>'Extra hard'
);


 include('templates/project.php');
?>
