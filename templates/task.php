<?php include('templates/layout/head.php'); ?>
<div class='container'>
 <br><br>
 <a href='/project/<?=$task->projectId?>?deleteTask=<?=$task->id?>'><button style='float:right; cursor:pointer'>Delete task</button></a>
 <a href='/task/<?=$task->id?>/edit'><button style='float:right; margin-right:30px; cursor:pointer'>Edit task</button></a>
 <div style='text-align:left'>
  <h2>TASK: <?=$task->name?></h2><br>
  <div style='float:left;'><?=$taskDifficulty[intVal($task->points)]?></div>
  <div style='float:right; font-weight:bold;'>Done: <?=$task->progress?>%</div>
  <br class='clear'>
  <hr>
  <?=str_replace("\n",'<br>',$task->description)?><br>
 </div>

</div>

<?php include('templates/layout/footer.php'); ?>
