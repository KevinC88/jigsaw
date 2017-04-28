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
$Sodium =$_POST['Sodium'];
$Potassium =$_POST['Potassium'];
$Urea =$_POST['Urea'];
$Creatinine =$_POST['Creatinine'];
$Record =$_POST['Record'];
  
    

$renal = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,Sodium,Potassium,Urea,Creatinine,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$Sodium."','".$Potassium."','".$Urea."','".$Creatinine."','".$Record."')";


$result = mysql_query($renal);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>