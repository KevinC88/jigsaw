<?php
   require("config.php");
   if(empty($_SESSION['user'])) 
   {
       header("Location: index.php");
       die("Redirecting to index.php"); 
   }
   ?>    


<?php

  $strUser = 6494;
  
$var1 = (isset($_GET['var1']) ? $_GET['var1'] : null);

/*if (isset($_GET['strUser'])) {
     $strUser = $_GET['strUser'];
     echo $strUser;
   echo "ok";
   }else{
   echo 'no variable received';
   }
   
   */

header('Content-Type: application/json');

define('DB_HOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','test-login');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);



  $query = sprintf("SELECT patientsNumber,T3,T4,TSH FROM patientRecord 
  WHERE Record='Thyroid' AND patientsNumber='var1' ORDER BY Added DESC LIMIT 1");

$result = $mysqli->query($query);
 
   $data = array();
foreach ($result as $row){
    $data[] = $row;
}
    
$result->close();

$mysqli->close();

print json_encode($data);
?>