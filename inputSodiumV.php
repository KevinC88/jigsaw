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
$SodiumV =$_POST['SodiumV'];
$Record =$_POST['Record'];

  
    

$sodiumV = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,SodiumV,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$SodiumV."','".$Record."')";


$result = mysql_query($sodiumV);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>