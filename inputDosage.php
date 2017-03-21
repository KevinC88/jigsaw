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
$prescribingPsych =$_POST['prescribingPsych'];
$dosageDate =$_POST['dosageDate'];
$drugSelect =$_POST['drugSelect'];
$dosage =$_POST['dosage'];
$frequency =$_POST['frequency'];
 $Record =$_POST['Record'];
    

$dose = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,prescribingPsych,dosageDate,drugSelect,dosage,frequency,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$prescribingPsych."','".$dosageDate."','".$drugSelect."','".$dosage."','".$frequency."','".$Record."')";


$result = mysql_query($dose);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>