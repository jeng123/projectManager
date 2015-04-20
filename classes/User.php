<?php
class User {
 
 function login($user) {
  $query = CPS_Term('users', 'collection') . CPS_Term('active', 'status') . CPS_Term($user['email'], 'email') . CPS_Term(md5($user['pass']), 'password');
  $documents = Database::$cpsSimple->search($query);
  if(count($documents)==1) {$_SESSION['user']=key($documents);}
  else {echo 'wrong';}
 }
 
 function logout() {
  unset($_SESSION['user']);
 }
 
 function createAccount($userData) {
  $user['email']=$userData['email'];
  $user['password']=md5($userData['pass']);
  $user['status']='active';
  $user['collection']='users';
  Database::insertDocument(uniqid(), $user);
  return(array(true,''));
 }

}
?>
