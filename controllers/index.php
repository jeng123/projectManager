<?php
if(isset($_POST['email'])) {
 User::login($_POST);
}
if(isset($_GET['logout'])) {
 User::logout();
}

 include('templates/index.php');
?>
