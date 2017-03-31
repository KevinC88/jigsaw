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
$Clozapine =$_POST['Clozapine'];
$Record =$_POST['Record'];

  
    

$clozapine = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,Clozapine,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$Clozapine."','".$Record."')";


$result = mysql_query($clozapine);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>