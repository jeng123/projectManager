<?php
foreach($tasks as $k=>$v) {
?>
<a href='/task/<?=$v->id?>'>
 <div class='myProjects myTasks'>
  <div>
   <?=$taskDifficulty[intVal($v->points)]?> | 
   <?=(int)$v->progress?>% done
  </div>
  <span class='title'><?=$v->name?></span>
  <span class='description'><?=$v->description?></textarea></span>
  <span class='creator'></span>
 </div>
</a>
<?php } ?>


<form method='post' action=''>
 <div class='myProjects myTasks'>
  <div>
   <select name='newTask[diff]'>
<?php foreach($taskDifficulty as $k=>$v) { ?>
  <option value='<?=$k?>'><?=$v?></option>
<?php } ?>
 </select>
   <input type='text' name='newTask[progress]'>% done
  </div>
  <span class='title'><input type='text' name='newTask[title]' placeholder='task title'></span>
  <span class='description'><textarea name='newTask[desc]' placeholder='task description'></textarea></span>
  <span class='creator'><input type='submit' value='Add New Task'></span>
 </div>
</form>
