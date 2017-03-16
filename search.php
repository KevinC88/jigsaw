<?php

$user_name = "root";
$password = "";
$database = "test-login";
$server = "localhost";

$conn = mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");


$test =$_POST['test'];

    

$sql = "SELECT patientsNumber FROM '.$testT.';

$result=mysql_query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo " . $row["patientsNumber"]. ";
    }
} else {
    
}

$conn->close();
?>