<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$Cholesterol =$_POST['Cholesterol'];
$Tryglyceride =$_POST['Tryglyceride'];
$HDL =$_POST['HDL'];
$LDL =$_POST['LDL'];
$CHRatio =$_POST['CHRatio'];
  
    

$lipids = "INSERT INTO Lipids

        (patientsNumber,Cholesterol,Tryglyceride,HDL,LDL,CHRatio)

        VALUES

        ('".$patientsNumber."','".$Cholesterol."','".$Tryglyceride."','".$HDL."','".$LDL."','".$CHRatio."')";


$result = mysql_query($lipids);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>