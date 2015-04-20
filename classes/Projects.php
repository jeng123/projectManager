<?php
class Projects {

 function createProject($prjectData) {
  $projectID=uniqid();
  $project=array(
   'name'=>strip_tags($prjectData['name']),
   'description'=>strip_tags($prjectData['desc']),
   'points'=>0,
   'pointsDone'=>0,
   'createTime'=>time(),
   'owner'=>$_SESSION['user'],
   'collection'=>'projects'
  );
  $statistics=array(
   'projectID'=>$projectID,
   'pointsDone'=>0,
   'time'=>time(),
   'collection'=>'statistics'
  );
  Database::insertDocument($projectID, $project);
  Database::insertDocument(uniqid(), $statistics);
  return(array(true,''));
 }
 
 function projectList($userId) {
  $query = CPS_Term('projects', 'collection') . CPS_Term($_SESSION['user'], 'owner');
  $documents = Database::$cpsSimple->search($query);
  $owners=array();
  foreach($documents as $k=>$v) {
   $owners[]=(string)$v->owner;
  }
  if(count($owners)) {
   $ownerData=Database::$cpsSimple->retrieveMultiple($owners);
  }
  foreach($documents as $k=>$v) {
   $documents[$k]->owner=$ownerData[(string)$documents[$k]->owner]->email;
  }
  return($documents);
 }
 
 function getProject($id) {
  try {
   $document = Database::$cpsSimple->retrieveSingle($id);
   $query = CPS_Term('statistics', 'collection') . CPS_Term($id, 'projectID');
   $documents = Database::$cpsSimple->search($query);
   return(array($document,$documents));
  } catch (CPS_Exception $e) {
   return(false);
  }
 }

 function editProject($post) {
  $document=array();
  if(isset($post['points'])) {$document['points'] = (int)$post['points'];}
  if(isset($post['pointsDone'])) {$document['pointsDone'] = (int)$post['pointsDone'];}
  if(isset($post['name'])) {$document['name'] = strip_tags($post['name']);}
  if(isset($post['description'])) {$document['description'] = strip_tags($post['desc']);}
  Database::$cpsSimple->partialReplaceSingle($post['id'], $document);
 }
 
 function deleteProject($projectId) {
  $project=self::getProject($projectId);
  if($project!=false && $project[0]->owner==$_SESSION['user']) {
   Database::$cpsSimple->delete($projectId);
  }
 }
 
}
?>
