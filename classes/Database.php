<?php
class Database {

 public static $cpsSimple;

 private static $connectionStrings = array(	
  'tcp://78.154.146.20:9007',	
  'tcp://78.154.146.21:9007',	
  'tcp://78.154.146.22:9007',	
  'tcp://78.154.146.23:9007',	
 );
 
 function connect() {
  require_once 'php_cps_api-150317/cps_simple.php';
  $cpsConn = new CPS_Connection(new CPS_LoadBalancer(self::$connectionStrings), DB_NAME, DB_USER, DB_PASS, 'document', '//document/id', array('account' => DB_ACCOUNT));	
  self::$cpsSimple = new CPS_Simple($cpsConn);
 }

 function insertDocument($id,$valuesArray) {
  self::$cpsSimple->insertSingle($id,$valuesArray);
 }
 
 function close() {
  // close database
 }

}
?>
