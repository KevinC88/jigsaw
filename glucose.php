<?php
   require("config.php");
   if(empty($_SESSION['user'])) 
   {
       header("Location: index.php");
       die("Redirecting to index.php"); 
   }
   ?>
<!DOCTYPE html>
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
        tr.group,
tr.group:hover {
    background-color: #ddd !important;
}
} 
   table{
  margin: 0 auto;     
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; 
  word-wrap:break-word; 
}     
       
    </style>

</head>
<body>
    <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $query = mysql_query("SELECT patientsNumber, patientsFirstName, patientsLastName FROM patientRecord GROUP BY patientsNumber");
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
            
</tr>
</thead>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                   <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['patientsFirstName'];?></td>
                   <td><?php echo $row['patientsLastName'];?></td>
                 
                   </tr>
              <?php  } ?>
</table>
</div>
                                </div>
                            </div>
                            
						</div>
						<div class="col-md-12" style='background-color: #2ba6cb;'>
							<form action="inputG.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
									<legend>Glucose Levels</legend>
									<div class="form-group">
										<label class="col-md-6 control-label" for="patientsNumbInput">Patient No.:</label>
										<div class="col-md-6">
											<input autocomplete="off" class="form-control input-md" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-md-1 control-label" for="patientsFirstNameInput">First Name:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="patientsFirstName" name="patientsFirstName" placeholder="first name" readonly required="" type="text">
										</div><label class="col-md-1 control-label" for="patientLastNameInput">Last Name:</label>
										<div class="col-md-4">
											<input autocomplete="off" class="form-control input-md" id="patientsLastName" name="patientsLastName" placeholder="last name" readonly required="" type="text">
										</div>
									</div>
                                    
<div class="form-group">
<label class="col-md-3 control-label" for="glucose">Glucose:</label>
<div class="col-md-3">
<input autocomplete="off" class="form-control input-md" id="glucose" name="glucose" placeholder="Glucose levels" required="" type="text">
</div>
</div>
                                    
                                    
    
                                    
                                          <div>        
                                    <input name="Record" class="form-control input-md" id="Record" value="Glucose" required="" type="hidden" >
                                 </div>
                                    	      
                                    
                                    
                                    
									<div class="form-group">
										<label class="col-md-4 control-label" for="addGlucoseBtn"></label>
										<div class="col-md-4">
											<button class="btn btn-primary" id="submit" name="submit" type="submit">Add Glucose Levels</button>
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
$(document).ready(function() {
	var table = $('#patient_data').DataTable({
		 "autoWidth": false,
        dom: 'Bfrtip',
       fixedHeader: true,
       "paging":   false,
	});
});
    

 
$(document).ready(function() {
 	$("td", this).on("click", function() {
 		var tds = $(this).parents("tr").find("td");
 		$.each(tds, function(i, v) {
 			$($(".form-horizontal input")[i]).val($(v).text());
 		});
 	});
 });
</script>