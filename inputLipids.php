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
$Cholesterol =$_POST['Cholesterol'];
$Tryglyceride =$_POST['Tryglyceride'];
$HDL =$_POST['HDL'];
$LDL =$_POST['LDL'];
$CHRatio =$_POST['CHRatio'];
$Record =$_POST['Record'];
  
    

$lipids = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,Cholesterol,Tryglyceride,HDL,LDL,CHRatio,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$Cholesterol."','".$Tryglyceride."','".$HDL."','".$LDL."','".$CHRatio."','".$Record."')";


$result = mysql_query($lipids);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>