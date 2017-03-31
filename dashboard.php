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
<title></title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
</script>

<script src="https://cdn.dataTables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
   
       
       
    
    
     <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/helpful.css" rel="stylesheet">
    <style type="text/css">
        body { background: url(css/bglight.png); }
        .center { display: block; margin: 0 auto; }
    </style>
       <style> /* set the CSS */
 
body { font: 12px Arial;}
 
path { 
  stroke: steelblue;
  stroke-width: 2;
  fill: none;
}
 
.axis path,
.axis line {
	fill: none;
	stroke: grey;
	stroke-width: 1;
	shape-rendering: crispEdges;
}
 
</style>
       
       <style>
           .chart-container {
               width:640px;
               height: 600px;
           }
       </style>
       
    

</head>
   <body>
 <div class="page-container">
  
	<!-- top navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
       <div class="container">
    	<div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Project Name</a>
    	</div>
       </div>
    </div>
      
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!-- sidebar -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav">
              <li class="active"><a href="dashboard.php">Dashboard</a></li>
              <li><a href="secret.php">Add Patient</a></li>
              <li><a href="patientTable.php">View Patient Records</a></li>
              
               <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Standard blood Tests <span class="caret"></span></a>
						<ul class="dropdown-menu">
          <li><a href="fullBloodCount.php">Full blood count</a></li>
          <li><a href="renal.php">Renal profile</a></li>
          <li><a href="liver.php">Liver profile</a></li>
            <li><a href="Lipids.php">Lipid profile</a></li>
            <li><a href="thyroid.php">Thyroid function tests</a></li>
            <li><a href="glucose.php">Glucose</a></li>
        </ul>
					</li> 
                <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Monitoring blood Tests <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="lithium.php">Lithium levels</a>
							</li>
							<li>
								<a href="sodiumV.php">Sodium Valproate levels</a>
							</li>
							<li>
								<a href="clozapine.php">Clozapine levels</a>
							</li>
						</ul>
					</li>
                <li><a href="medications.php">Medication History</a></li>
               <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="">Medical Investigations <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="physical.php">Physical Exam</a>
							</li>
							<li>
								<a href="ecg.php">ECG</a>
							</li>
                            <li>
								<a href="ctmri.php">CT/MRI</a>
							</li>
						</ul>
					</li>
                <li><a href="graphs.php">Patient Graphs</a></li>
                <li>
						<a href="logout.php">Log Out</a>
					</li>
            </ul>
        </div>
  	
        <!-- main area -->
        <div class="col-xs-12 col-sm-9">
          
           
 <?php
 
//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=test-login', 'root', '');
 
//Our select statement. This will retrieve the data that we want.
$sql = "SELECT patientsNumber FROM patientRecord GROUP BY patientsNumber";
 
//Prepare the select statement.
$stmt = $pdo->prepare($sql);
 
//Execute the statement.
$stmt->execute();
 
//Retrieve the rows using fetchAll.
$users = $stmt->fetchAll();
 
?>
 <form action="data.php" method="post"  onchange="myFunction()">
<select name="pGraph" id="pGraph">
    <?php foreach($users as $user): ?>
        <option value="<?= $user['patientsNumber']; ?>"><?= $user['patientsNumber']; ?></option>
    <?php endforeach; ?>
</select>
</form>

            
    <input type="button" value="refresh" onclick="refresh()">   
  <div class="chart-container">
            <canvas id="myCanvas"></canvas>
            </div>          
            
             
        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
</div><!--/.page-container-->
      
      
       
       
       
      
        
       
       <script>
           $(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});
        </script>

    
        <script type="text/javascript" src="js/Chart.min.js"></script>
       <script type="text/javascript" src="js/linegraph.js"></script>
       
   </body>
</html>
   <script>
       function myFunction() {
           var e = document.getElementById("pGraph");
var strUser = e.options[e.selectedIndex].value;
           
        $.ajax({
            url: 'data.php',
            type: 'POST',
            data: {var1: strUser},
            success: function(data) {
                console.log("success");
            }
        });
            

}
       
 </script>  


