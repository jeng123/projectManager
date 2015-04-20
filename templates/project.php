<?php
$postVar='newProject';
if(isset($project)) {
 $postVar='editProject';
}
?>

<?php include('templates/layout/head.php'); ?>
<div class='container'>
<div style='text-align:left;'>
 <h2>Tasks on project: <span style='color:#033E76'><?=$project[0]->name?></span> <button onclick="openClose('projectDesc')" style='font-size:14px; float:right'>Show project info</button></h2>
 <div id='projectDesc' style='display:none;'>
  <?=str_replace("\n",'<br>',$project[0]->description)?><br><br>
  <a href='/dashboard?deleteProject=<?=$project[0]->id?>'>DELETE this project</a>
 </div>
</div>
<hr>
<?php include('templates/tasks.php'); ?>

</div>

<?php include('templates/layout/footer.php'); ?>
