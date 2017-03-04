<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$patientsNumber =$_POST['patientsNumber'];
$ALT =$_POST['ALT'];
$ALP =$_POST['ALP'];
$GGT =$_POST['GGT'];
$Bilirubin =$_POST['Bilirubin'];
$Albumin =$_POST['Albumin'];
  
    

$liver = "INSERT INTO Liver

        (patientsNumber,ALT,ALP,GGT,Bilirubin,Albumin)

        VALUES

        ('".$patientsNumber."','".$ALT."','".$ALP."','".$GGT."','".$Bilirubin."','".$Albumin."')";


$result = mysql_query($liver);

if($result){

    header("Location:dashboard.php");
    
    die("Redirecting to dashboard.php");

} else{

    echo("<br>Input data is fail");

}
?>