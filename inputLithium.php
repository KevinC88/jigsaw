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

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>