<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

$link = mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$patientsFirstName =$_POST['patientsFirstName'];
$patientsLastName =$_POST['patientsLastName'];
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

        (patientsNumber,patientsFirstName,patientsLastName,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,Neuts,Lymphs,Eosins,Basos,Mono,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$Haemoglobin."','".$Platelets."','".$WhiteCells."','".$HCT."','".$MCV."','".$MCH."','".$Neuts."','".$Lymphs."','".$Eosins."','".$Basos."','".$Mono."','".$Record."')";


$result = mysql_query($fbc);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo mysql_errno($link) . ": " . mysql_error($link). "\n";

}
?>