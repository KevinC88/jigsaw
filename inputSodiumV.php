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

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>