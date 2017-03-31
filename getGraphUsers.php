<?php
   require("config.php");
   if(empty($_SESSION['user'])) 
   {
       header("Location: index.php");
       die("Redirecting to index.php"); 
   }


    <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $sql = mysql_query("SELECT patientsNumber FROM patientRecord GROUP BY patientsNumber"); 



$result = mysql_query($sql);

$users_arr = array();

while( $row = mysql_fetch_array($result) ){
    $patientsNumber = $row['patientsNumber'];

    $users_arr[] = array("patientsNumber" => $patientsNumber);
}

// encoding array to json format
echo json_encode($users_arr);
   ?>

