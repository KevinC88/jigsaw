<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test-login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT patientsNumber, patientsFirstName, patientsLastName, supervisingPsych, clinicName, addressLine1,addressLine2,cityInput,countyInput,contactInput,bloodTypeInput FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>
                  <td scope="row">' . $row["patientsNumber"]. '</td>
                  <td>' . $row["patientsFirstName"] .'</td>
                  <td> '.$row["patientsLastName"] .'</td>
                  <td>' . $row["supervisingPsych"] .'</td>
                  <td> '.$row["clinicName"] .'</td>
                  <td>' . $row["addressLine1"] .'</td>
                  <td> '.$row["addressLine2"] .'</td>
                  <td>' . $row["cityInput"] .'</td>
                  <td> '.$row["contactInput"] .'</td>
                  <td> '.$row["bloodTypeInput"] .'</td>
                </tr>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>