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
     <link rel="stylesheet" type="text/css" href="css/projectstyle.css">


</head>
<body>
     <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
 $query = mysql_query("SELECT patientsNumber, patientsFirstName, patientsLastName FROM patientRecord GROUP BY patientsNumber");
?>
	
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
           <a class="navbar-brand" href="#">Jigsaw medical</a>
    	</div>
       </div>
    </div>
      
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!-- sidebar -->
        <div class="col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
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
                <li><a href="medLog.php">Medication History</a></li>
                <li><a href="auditLog.php">Audit Records</a></li>
                <li>
						<a href="logout.php">Log Out</a>
					</li>
            </ul>
        </div>
        <!-- main area -->
        <div class="col-sm-10 central buffer">
                   <div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h4 class="panel-title">Patient Details</h4>
  </div>
  <div class="panel-body">
    
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
                  
							<div class="table-repsonsive">
<table id="patient_data" class="table table-bordered pretty" cellpadding="0" cellspacing = "0" data-page-length='5'>
<thead>
<tr>
                <th>Patient's Number</th>
                <th>First Name</th>
                <th>Last Name</th>
              
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
                            </div>
                            
						</div>
						
            
                      <div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h4 class="panel-title">Sodium Valporate</h4>
  </div>
  <div class="panel-body">
							<form action="inputSodiumV.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
									
									<div class="form-group form-group-sm">
                                        <div class="col-xs-3">
										<label for="patientsNumbInput">Patient No.:</label>
											<input autocomplete="off" class="form-control" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										</div>
									
                                    
                                      <div class="col-xs-3">
										<label for="patientsFirstNameInput">First Name:</label>
											<input autocomplete="off" class="form-control" id="patientsFirstName" name="patientsFirstName" placeholder="first name" readonly required="" type="text">
										</div>
                                        
                                        <div class="col-xs-3">
                                        <label for="patientLastNameInput">Last Name:</label>
											<input autocomplete="off" class="form-control" id="patientsLastName" name="patientsLastName" placeholder="last name" readonly required="" type="text">
										</div>
									</div>
                                    
                                    	<div class="form-group form-group-sm">
                                            <div class="col-xs-3">
										<label for="SodiumV">Sodium level:</label>
											<input autocomplete="off" class="form-control" id="SodiumV" name="SodiumV" placeholder="Sodium valporate levels" required="" type="number" step="0.1">
										</div>
                                          
                                            
									</div>
                                    
    
                                    
                                       <div>        
                                    <input name="Record" class="form-control" id="Record" value="Sodium Valporate" required="" type="hidden" >
                                 </div>
                                       	      
                                    
                                    
                                    
									<div class="form-group form-group-sm">
                                        <div class="col-xs-3">
										<label for="addLithiumBtn"></label>
											<button class="btn btn-primary" id="submit" name="submit" type="submit">Add Lithium Level</button>
										</div>
									</div>
								</fieldset>
							</form>
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
       fixedHeader: true,
       "paging":   true,
       "bInfo" : false,
       fixedHeader: true
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