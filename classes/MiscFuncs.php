<?php
class MiscFuncs {

 function selectController($getRequestQuery) {
  $getVals=explode('/',$getRequestQuery);
  $controller= preg_replace("/[^a-zA-Z0-9]/", "", $getVals[0]);
  if(is_file('controllers/'.$controller.'.php')) {
   return('controllers/'.$controller.'.php');
  }
  return('controllers/index.php');
 }

}
?>
