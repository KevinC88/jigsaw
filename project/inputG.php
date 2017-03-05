<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$glucose =$_POST['glucose'];

  
    

$sample = "INSERT INTO glucose

        (patientsNumber,glucose)

        VALUES

        ('".$patientsNumber."','".$glucose."')";


$result = mysql_query($sample);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
?>