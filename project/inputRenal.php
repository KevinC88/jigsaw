<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$Sodium =$_POST['Sodium'];
$Potassium =$_POST['Potassium'];
$Urea =$_POST['Urea'];
$Creatinine =$_POST['Creatinine'];

  
    

$renal = "INSERT INTO Renal

        (patientsNumber,Sodium,Potassium,Urea,Creatinine)

        VALUES

        ('".$patientsNumber."','".$Sodium."','".$Potassium."','".$Urea."','".$Creatinine."')";


$result = mysql_query($renal);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>