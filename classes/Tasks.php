<?php
class Tasks {

 function addTask($data,$projectID) {
  $taskPoints=(int)$data['diff'];
  $task=array(
   'name'=>strip_tags($data['title']),
   'description'=>strip_tags($data['desc']),
   'points'=>$taskPoints,
   'projectId'=>$projectID,
   'status'=>0,
   'createTime'=>time(),
   'owner'=>$_SESSION['user'],
   'collection'=>'tasks',
   'progress'=>(int)$data['progress']
  );
  $project=Projects::getProject($projectID);
  $projectStatusUpdate['points']=$project[0]->points+$taskPoints;
  $projectStatusUpdate['id']=$projectID;
  Database::insertDocument(uniqid(), $task);
  Projects::editProject($projectStatusUpdate);
 }
 
 function getTasks($projectId) {
  $query = CPS_Term('tasks', 'collection') . CPS_Term($projectId, 'projectId');
  $documents = Database::$cpsSimple->search($query);
  return($documents);  
 }

 function getTask($taskId) {
  $document = Database::$cpsSimple->retrieveSingle($taskId);
  return($document);  
 }
 
 function editTask($task,$taskId) {
  $currentTask=self::getTask($taskId);
  $editedTask['name']=strip_tags($task['name']);
  $editedTask['progress']=(int)$task['progress'];
  $editedTask['description']=strip_tags($task['desc']);
  Database::$cpsSimple->partialReplaceSingle($taskId, $editedTask);
  $currentPoints=intVal($currentTask->points)*intVal($currentTask->progress)/100;
  $newPoints=intVal($currentTask->points)*$editedTask['progress']/100;
  
  $pointsUpdate=(int)$newPoints-(int)$currentPoints;
  $pointsUpdate=(int)$pointsUpdate;
  $project=Projects::getProject((string)$currentTask->projectId);
  $projectUpdate['pointsDone']=intVal($project[0]->pointsDone)+$pointsUpdate;
  $projectUpdate['id']=(string)$currentTask->projectId;
  Projects::editProject($projectUpdate);
 }
 
 function updateTaskStatus($taskId,$newStatus) {
 }
 
 function deleteTask($taskId,$projectId,$userId) {
  $project=Projects::getProject($projectId);
  try {
   $task = Database::$cpsSimple->retrieveSingle($taskId);
  } catch (CPS_Exception $e) {
   $task=false;
  }
  if($project!=false && $task!=false && ($project[0]->owner==$_SESSION['user'] || $task->owner=$userId)) {
   Database::$cpsSimple->delete($taskId);
   $projectUpdate['points']=$project[0]->points-$task->points;
   $projectUpdate['id']=$projectId;
   Projects::editProject($projectUpdate);
  }
 }

}
?>
