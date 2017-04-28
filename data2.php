<?php
   require("config.php");
   if(empty($_SESSION['user'])) 
   {
       header("Location: index.php");
       die("Redirecting to index.php"); 
   }
   ?>    


<?php

  
  



header('Content-Type: application/json');

define('DB_HOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','test-login');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);



  $query = sprintf("SELECT patientsNumber,T3,T4,TSH FROM patientRecord 
  WHERE Record='Thyroid' ORDER BY Added DESC LIMIT 1");

$result = $mysqli->query($query);
 
   $data = array();
foreach ($result as $row){
    $data[] = $row;
}
    
$result->close();

$mysqli->close();

print json_encode($data);
?>