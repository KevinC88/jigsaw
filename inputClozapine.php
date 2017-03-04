<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$Clozapine =$_POST['Clozapine'];

  
    

$clozapine = "INSERT INTO Clozapine

        (patientsNumber,Clozapine)

        VALUES

        ('".$patientsNumber."','".$Clozapine."')";


$result = mysql_query($clozapine);

if($result){

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>