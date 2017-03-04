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
$bloodTypeInput =$_POST['bloodTypeInput'];    
    

$patient = "INSERT INTO patients

        (patientsNumber,patientsFirstName,patientsLastName,supervisingPsych,clinicName,addressLine1,addressLine2,cityInput,countyInput,contactInput,bloodTypeInput)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$supervisingPsych."','".$clinicName."','".$addressLine1."','".$addressLine2."','".$cityInput."','".$countyInput."','".$contactInput."','".$bloodTypeInput."')";


$result = mysql_query($patient);

if($result){

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>