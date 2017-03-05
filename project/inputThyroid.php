<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$T3 =$_POST['T3'];
$T4 =$_POST['T4'];
$TSH =$_POST['TSH']; 
    

$sample = "INSERT INTO thyroid

        (patientsNumber,T3,T4,TSH)

        VALUES

        ('".$patientsNumber."','".$T3."','".$T4."','".$TSH."')";


$result = mysql_query($sample);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>