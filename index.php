<?php
session_start();

include('conf.php');

include('classes/Database.php');
 $database=new Database;
 $database->connect();

include('classes/MiscFuncs.php');
 $miscFuncs=new MiscFuncs;
 
include('classes/User.php');
 $user=new User;

$template=$miscFuncs->selectController($_GET['q']);
include($template);
 
//$query = '*';
//$documents = Database::$cpsSimple->search($query);
//print_r($documents);

$database->close();
?>
