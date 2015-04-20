<?php
if(isset($_POST['email'])) {
 $alert=User::createAccount($_POST);
}

include('templates/createAccount.php');
?>
