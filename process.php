 <?php

$server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
 
$patientsNumber = $_REQUEST['patientsNumber'];    
$sql = mysqli_query($link, "SELECT patientsFirstName,patientsLastName FROM patientRecord WHERE patientsNumber = '".$patientsNumber."' ");
$row = mysqli_fetch_array($sql);

json_encode($row);die;

?>