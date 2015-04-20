<?php if(isset($_SESSION['user'])) { ?>
<script>document.location='/dashboard'</script>
<?php } ?>

<?php include('templates/layout/head.php'); ?>

 <form method='post' action='?' class='loginForm'>
  <input type='text' name='email' placeholder='e-mail'><br>
  <input type='password' name='pass' placeholder='password'><br>
  <input type='submit' value='login'>
 </form>
 
<?php include('templates/layout/footer.php'); ?>
