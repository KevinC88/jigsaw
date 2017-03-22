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
$ALT =$_POST['ALT'];
$ALP =$_POST['ALP'];
$GGT =$_POST['GGT'];
$Bilirubin =$_POST['Bilirubin'];
$Albumin =$_POST['Albumin'];
  $Record =$_POST['Record'];
    

$liver = "INSERT INTO patientRecord

        (patientsNumber,patientsFirstName,patientsLastName,ALT,ALP,GGT,Bilirubin,Albumin,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$ALT."','".$ALP."','".$GGT."','".$Bilirubin."','".$Albumin."','".$Record."')";


$result = mysql_query($liver);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>