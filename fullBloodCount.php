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
< <head>
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
    
    ///////////////
    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
//////////////////////////
</head>
<body>
    <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $query = mysql_query("SELECT patientsNumber,Haemoglobin, Platelets, WhiteCells, HCT, MCV,MCH,Neuts,Lymphs,Eosins,Basos,Mono FROM patientRecord"); 
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
                           <ul class="nav nav-tabs">
  <li class="active"><a href="#">Full Blood Count</a></li> 
   <li><a href="test.php">Patient Info</a></li>                         
                            
                          <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Full Blood Count</h3>
  </div>
  <div class="panel-body">
    
     
							<div class="table-repsonsive">
<table id="patient_data" class="table table-bordered" data-page-length='5'>
<thead>
<tr>
                <td>Patients Number</td>
                <td>Haemoglobin</td>
                <td>Platelets</td>
                <td>WhiteCells</td>
                <td>HCT</td>
                <td>MCV</td>
                <td>MCH</td>
                <td>Neuts</td>
                <td>Lymphs</td>
                <td>Eosins</td>
                <td>Basos</td>
                <td>Mono</td>
                
    
</tr>
</thead>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                  <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['Haemoglobin'];?></td>
                   <td><?php echo $row['Platelets'];?></td>
                   <td><?php echo $row['WhiteCells'];?></td>
                   <td><?php echo $row['HCT'];?></td>
                   <td><?php echo $row['MCV'];?></td>
                   <td><?php echo $row['MCH'];?></td>
                   <td><?php echo $row['Neuts'];?></td>
                   <td><?php echo $row['Lymphs'];?></td>
                   <td><?php echo $row['Eosins'];?></td>
                   <td><?php echo $row['Basos'];?></td>
                   <td><?php echo $row['Mono'];?></td>
                   </tr>
              <?php  } ?>
</table>
</div>
      

          
          
                                </div>
                              
                            </div>  
                            
                            
         
						</div>
                        </div>
                        </ul>
                        
                        
						<div class="col-md-12" style='background-color: #2ba6cb;'>
							<form action="inputFBC.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
									<legend>Full Blood Count</legend>
									<div class="form-group">
										<label class="col-md-6 control-label" for="patientsNumbInput">Patient No.:</label>
										<div class="col-md-6">
											<input autocomplete="off" class="form-control input-md" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										</div>
									</div>
                               
 
                                   
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label" for="Haemoglobin">Haemoglobin:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Haemoglobin" name="Haemoglobin" placeholder="Haemoglobin levels" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="Platelets">Platelets:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Platelets" name="Platelets" placeholder="Platelet levels" required="" type="text">
										</div>
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label" for="WhiteCells">WhiteCells:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="WhiteCells" name="WhiteCells" placeholder="White cell levels" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="MCH">MCH:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="MCH" name="MCH" placeholder="MCH levels" required="" type="text">
										</div>
                                            
									</div>
                                    
                                         	<div class="form-group">
										<label class="col-md-3 control-label" for="HCT">HCT:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="HCT" name="HCT" placeholder="HCT levels" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="MCV">MCV:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="MCV" name="MCV" placeholder="MCV levels" required="" type="text">
										</div>
									</div>
                                    
                                         	<div class="form-group">
										<label class="col-md-3 control-label" for="Neuts">Neuts:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Neuts" name="Neuts" placeholder="Neut levels" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="Lymphs">Lymphs:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Lymphs" name="Lymphs" placeholder="Lymph levels" required="" type="text">
										</div>
									</div>
                                    
                                         	<div class="form-group">
										<label class="col-md-3 control-label" for="Eosins">Eosins:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Eosins" name="Eosins" placeholder="Eosin levels" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="Mono">Mono:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Mono" name="Mono" placeholder="Mono levels" required="" type="text">
										</div>
									</div>
                                    
                                         	<div class="form-group">
										<label class="col-md-3 control-label" for="Basos">Basos:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="Basos" name="Basos" placeholder="Basos levels" required="" type="text">
										</div>
                                            
                                          
									</div>
                                    
                                          <div>        
                                    <input name="Record" class="form-control input-md" id="Record" value="FBC" required="" type="hidden" >
                                 </div>
                                    
                                    
                                    
									<div class="form-group">
										<label class="col-md-4 control-label" for="addFBCBtn"></label>
										<div class="col-md-4">
											<button class="btn btn-primary" id="submit" name="submit" type="submit">Add FBC Record</button>
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