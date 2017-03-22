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
$glucose =$_POST['glucose'];
$Record =$_POST['Record'];

  
    

$sample = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,glucose,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$glucose."','".$Record."')";


$result = mysql_query($sample);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>