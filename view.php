<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Tutorial</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"
    ></script>
    <link rel="stylesheet" href="https://maxcdn.boostrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    
    <script src="DataTables/media/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="DataTables/media/css/dataTables.bootstrap.min.css"/>
    
    

    
</head>

<body>
    <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $query = mysql_query("SELECT patientsNumber, patientsFirstName, patientsLastName, supervisingPsych, clinicName, addressLine1,addressLine2,cityInput,countyInput,contactInput,bloodTypeInput FROM patients"); 
?>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand">PHP Signup + Bootstrap Example</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li><a href="register.php">Register</a></li>
          <li class="divider-vertical"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
    </div>
    
       
   
    <div class="container hero-unit">
    
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">  
                    <a href="">About</a>
                </div>
                 <div class="col-md-6" style ='background-color: #2ba6cb;'>
                   
  



    
   
<!-- Third DIV -->
                </div>
                <div class="col-md-3"> 
                    <table id="pppp" class="table table-striped table-bordered">
                         <thead>
            <tr>
                <td>Patient's Number</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Supervising Psychiatrist</td>
                <td>Clinic</td>
                <td>Address line 1</td>
                <td>Address line 2</td>
                <td>City</td>
                <td>County</td>
                <td>Contact</td>
                <td>Blood type</td>
            </tr>
        </thead>
        <tbody>
   
    </tbody>
      <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                   <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['patientsFirstName'];?></td>
                   <td><?php echo $row['patientsLastName'];?></td>
                   <td><?php echo $row['supervisingPsych'];?></td>
                   <td><?php echo $row['clinicName'];?></td>
                   <td><?php echo $row['addressLine1'];?></td>
                   <td><?php echo $row['addressLine2'];?></td>
                   <td><?php echo $row['cityInput'];?></td>
                   <td><?php echo $row['countyInput'];?></td>
                   <td><?php echo $row['contactInput'];?></td>
                   <td><?php echo $row['bloodTypeInput'];?></td>
                   </tr>
              <?php  } ?>
  </table>
                </div>
            </div>
        </div>
    </div>
</div>
        
        

    </div> 
<script src="js/jquery.js"></script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    

</body>
</html>

<script>
$(document).ready(function()){
        $('#pppp').DataTable();          
                  });
</script>