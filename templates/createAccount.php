<?php include('templates/layout/head.php'); ?>
<div class='container'>
 <br><br>

 <style>
  input {
   margin:5px;
  }
 </style>

<?php if(isset($alert) && $alert[0]) { ?>
 You are successfully registered in our system. <a href='/'>You can login now.</a><br>
<?php } else if(isset($alert) && !$alert[0]) { ?>
 Please check your data<br>
<?php } ?>

<form method='post' action=''>
 <input type='text' name='email' placeholder='e-mail'><br>
 <input type='password' name='pass' placeholder='password'><br>
 <input type='password' name='pass2' placeholder='repeat password'><br>
 <input type='submit'>
</form>

<?php include('templates/layout/footer.php'); ?>
