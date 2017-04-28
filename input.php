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
$supervisingPsych =$_POST['supervisingPsych'];
$clinicName =$_POST['clinicName'];
$addressLine1 =$_POST['addressLine1'];
$addressLine2 =$_POST['addressLine2'];
$cityInput =$_POST['cityInput'];
$countyInput =$_POST['countyInput'];
$contactInput =$_POST['contactInput'];
$mStatus =$_POST['mStatus'];
$gender =$_POST['gender'];
$ageGroup =$_POST['ageGroup'];
$initialD =$_POST['initialD'];
$Record =$_POST['Record'];

   
    

$patient = "INSERT INTO patientRecord

        (patientsNumber,patientsFirstName,patientsLastName,supervisingPsych,clinicName,addressLine1,addressLine2,cityInput,countyInput,contactInput,mStatus,gender,ageGroup,initialD,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$supervisingPsych."','".$clinicName."','".$addressLine1."','".$addressLine2."','".$cityInput."','".$countyInput."','".$contactInput."','".$mStatus."','".$gender."','".$ageGroup."','".$initialD."','".$Record."')";


$result = mysql_query($patient);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>