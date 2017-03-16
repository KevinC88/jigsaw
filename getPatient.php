<?php

$link = mysqli_connect("localhost", "root", "","test-login");

$patientsNumber = $_REQUEST['patientsNumber'];    
$sql = mysqli_query($link, "SELECT patientsFirstName,patientsLastName FROM patientRecord WHERE name = '".$patientsNumber."' ");
$row = mysqli_fetch_array($sql);

json_encode($row);die;
