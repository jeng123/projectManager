<?php include('templates/layout/head.php'); ?>
<form method='post' action='/task/<?=$task->id?>'>
<div class='container'>
 <br><br>
 <h2>Edit task</h2>
 <hr>
 <div style='text-align:left; width:100%; max-width:800px; margin:auto;'>
  Title: <input type='text' name='editTask[name]' value='<?=$task->name?>'>
  &nbsp;&nbsp;&nbsp;&nbsp;
  Done: <input type='text' name='editTask[progress]' value='<?=(int)$task->progress?>' style='width:30px;'> %
  <br class='clear'>
  <br class='clear'>
  <center>
   <textarea name='editTask[desc]' style='width:100%; max-width:800px; height:250px;'><?=$task->description?></textarea><br>
  </center>
 </div>

</div>
<br>
<br>
<input type='submit' value='SAVE'>
</form>
<?php include('templates/layout/footer.php'); ?>
