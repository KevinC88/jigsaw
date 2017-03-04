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
  
    

$fbc = "INSERT INTO FBC

        (patientsNumber,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,Neuts,Lymphs,Eosins,Basos,Mono)

        VALUES

        ('".$patientsNumber."','".$Haemoglobin."','".$Platelets."','".$WhiteCells."','".$HCT."','".$MCV."','".$MCH."','".$Neuts."','".$Lymphs."','".$Eosins."','".$Basos."','".$Mono."')";


$result = mysql_query($fbc);

if($result){

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>