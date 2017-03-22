<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$patientsFirstName =$_POST['patientsFirstName'];
$patientsLastName =$_POST['patientsLastName'];
$T3 =$_POST['T3'];
$T4 =$_POST['T4'];
$TSH =$_POST['TSH']; 
$Record =$_POST['Record'];
    

$Thyroid = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,T3,T4,TSH,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$T3."','".$T4."','".$TSH."','".$Record."')";


$result = mysql_query($Thyroid);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>