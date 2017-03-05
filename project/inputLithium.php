<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$Lithium =$_POST['Lithium'];

  
    

$lithium = "INSERT INTO Lithium

        (patientsNumber,Lithium)

        VALUES

        ('".$patientsNumber."','".$Lithium."')";


$result = mysql_query($lithium);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>