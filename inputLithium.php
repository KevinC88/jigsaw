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
$Lithium =$_POST['Lithium'];
$Record =$_POST['Record'];

  
    

$lithium = "INSERT INTO patientrecord

        (patientsNumber,patientsFirstName,patientsLastName,Lithium,Record)

        VALUES

        ('".$patientsNumber."','".$patientsFirstName."','".$patientsLastName."','".$Lithium."','".$Record."')";


$result = mysql_query($lithium);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>