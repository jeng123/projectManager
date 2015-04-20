<?php
include('classes/Tasks.php');

$q=explode('/',$_GET['q']);

if(isset($q[1])) {

 if(isset($_POST['editTask'])) {
  include('classes/Projects.php');
  Tasks::editTask($_POST['editTask'],$q[1]);
 }

 $task=Tasks::getTask($q[1]);
}

$taskDifficulty=array(
 1=>'Super easy',
 2=>'Easy',
 4=>'Normal',
 7=>'Hard',
 12=>'Extra hard'
);

if(isset($q[2]) && $q[2]=='edit') {
 include('templates/taskEdit.php');
} else {
 include('templates/task.php');
}
?>
