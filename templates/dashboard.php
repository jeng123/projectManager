<?php
$postVar='newProject';
if(isset($project)) {
 $postVar='editProject';
}
?>

<?php include('templates/layout/head.php'); ?>
<div class='container'>

<h2>My Projects</h2>
<hr>
<?php
foreach($projectsList as $k=>$v) { 
 $descA=explode("\n",$v->description);
 $desc=$descA[0];
 if(count($descA)>1 || strlen($descA[0])>63) {
  $desc=substr($descA[0],0,60).'...';
 }
 $created=intval($v->createTime);
 $progress=0;
 if($v->points>0) {
  $progress=$v->pointsDone/$v->points;
  $progress*=100;
  $progress=(int)$progress;
 }
 $name=$v->name;
 if(strlen($name)>18) {$name=substr($name,0,18).'...';}
?>

<a href='/project/<?=$k?>'>
 <div class='myProjects'>
  <div><?=$v->pointsDone?>/<?=$v->points?>(<?=$progress?>% done)</div>
  <span class='title'><?=$name?></span>
  <span class='description'><?=$desc?></span>
  <span class='creator'>created by <b><?=$v->owner?></b> at <b><?=date('H:i d.m.Y',$created)?></b></span>
 </div>
</a>
<?php } ?>

<form method='post' action=''>
 <div class='myProjects'>
  <div>Create New Project</div>
  <span class='title'>
   <input type='text' name='<?=$postVar?>[name]' placeholder="Project name">
  </span>
  <span class='description'>
   <textarea name='<?=$postVar?>[desc]' placeholder="Description"></textarea>
  </span>
  <span class='creator'><input type='submit' value='Create' style='font-weight:bold'></span>
 </div>
</form>

<br class='clear'>


</div>
<?php include('templates/layout/footer.php'); ?>

