<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$Haemoglobin =$_POST['Haemoglobin'];
$Platelets =$_POST['Platelets'];
$WhiteCells =$_POST['WhiteCells'];
$HCT =$_POST['HCT'];
$MCV =$_POST['MCV'];
$MCH =$_POST['MCH'];
$Neuts =$_POST['Neuts'];
$Lymphs =$_POST['Lymphs'];
$Eosins =$_POST['Eosins'];
$Basos =$_POST['Basos'];
$Mono =$_POST['Mono'];
 $Record =$_POST['Record'];
    

$fbc = "INSERT INTO patientRecord

        (patientsNumber,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,Neuts,Lymphs,Eosins,Basos,Mono,Record)

        VALUES

        ('".$patientsNumber."','".$Haemoglobin."','".$Platelets."','".$WhiteCells."','".$HCT."','".$MCV."','".$MCH."','".$Neuts."','".$Lymphs."','".$Eosins."','".$Basos."','".$Mono."','".$Record."')";


$result = mysql_query($fbc);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>