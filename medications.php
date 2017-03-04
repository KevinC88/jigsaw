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
  <script src="js/jcanvas.min.js"></script>  
    
     <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/helpful.css" rel="stylesheet">
    <style type="text/css">
        body { background: url(css/bglight.png); }
        .center { display: block; margin: 0 auto; }
    </style>

</head>
   <body>
           <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $query = mysql_query("SELECT patientsNumber, patientsFirstName, patientsLastName, supervisingPsych, clinicName, addressLine1,addressLine2,cityInput,countyInput,contactInput,bloodTypeInput FROM patients"); 
?>
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
           <div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
                            <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
							<div class="table-repsonsive">
<table id="patient_data" class="table table-bordered" data-page-length='5'>
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
						<div class="col-md-12" style='background-color: #2ba6cb;'>
							<form action="inputRenal.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
									<legend>Medications</legend>
									<div class="form-group">
										<label class="col-md-4 control-label" for="patientsNumbInput">Patient No.:</label>
										<div class="col-md-6">
											<input autocomplete="off" class="form-control input-md" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										</div>
									</div>
                                    
 <div class="form-group">
  <label lass="col-md-2 control-label" for="sel1">Medication type:</label>
     <div class="col-md-3">
  <select class="form-control input-md" id="sel1">
    <option>1</option>
    <option>2</option>
  </select>
</div>
     
     
     <label lass="col-md-2 control-label" for="sel1">Medication Name:</label>
     <div class="col-md-3">
  <select class="form-control input-md" id="sel1">
    <option>1</option>
    <option>2</option>
  </select>
</div>
</div>                                  	<div class="form-group">
										<label class="col-md-3 control-label" for="psychiatrist">Psychiatrist:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="psychiatrist" name="psychiatrist" placeholder="Psychiatrist" required="" type="text">
										</div>
                                            
            
 
									</div>
                                    
                                        	<div class="form-group">
								
                                            
                                            <label class="col-md-3 control-label" for="date">Start date:</label>
							<div class="form-group row">
  <div class="col-md-3">
    <input class="form-control input-md" type="date" value="2016-01-01" id="example-date-input">
  </div>
</div>
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label" for="dosage">Dosage:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="dosage" name="dosage" placeholder="dosage" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="frequency">Frequency:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Frequency" name="Frequency" placeholder="medication frequency" required="" type="text">
										</div>
                                            
									</div>
                                    
    
                                    
                                              
                                    
                                    
                                    
									<div class="form-group">
										<label class="col-md-4 control-label" for="addMedBtn"></label>
										<div class="col-md-4">
											<button class="btn btn-primary" id="submit" name="submit" type="submit">Add Medication</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						
					</div>
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
   </body>
</html>
<script>
$(document).ready(function(){
    
    $('#patient_data').DataTable({
        
        "scrollX":true,
        
        
        
    });
    
});
    

 
$(document).ready(function () {
    $("td", this).on("click", function () {
        var tds = $(this).parents("tr").find("td");
        $.each(tds, function (i, v) {
            $($("#patientsNumber")[i]).val($(v).text());
        });
    });
});
</script>

<script>
    $(function() {
        $(".dial").knob();
    });
</script>