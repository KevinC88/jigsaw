<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$SodiumV =$_POST['SodiumV'];

  
    

$sodiumV = "INSERT INTO SodiumV

        (patientsNumber,SodiumV)

        VALUES

        ('".$patientsNumber."','".$SodiumV."')";


$result = mysql_query($sodiumV);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>