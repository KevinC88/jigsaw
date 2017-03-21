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
       
       
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
       
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
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
							<form  action="inputDosage.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
									<legend>Medications</legend>
									<div class="form-group">
										<label class="col-md-4 control-label" for="patientsNumbInput">Patient No.:</label>
										<div class="col-md-6">
											<input autocomplete="off" class="form-control input-md" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										</div>
									</div>
                                    
                                          <div class="form-group">
										<label class="col-md-1 control-label" for="patientsFirstNameInput">First Name:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="patientsFirstName" name="patientsFirstName" placeholder="first name" readonly required="" type="text">
										</div>
                                              <label class="col-md-1 control-label" for="patientLastNameInput">Last Name:</label> 
    <div class="col-md-4">
        <input name="patientsLastName" class="form-control input-md" id="patientsLastName" readonly required="" type="text" placeholder="last name" autocomplete="off">
    </div>
									</div>
                                    
 <div class="form-group">
  <label lass="col-md-4 control-label" for="sel1">Medication type:</label>
     <div class="col-md-6">
   <select id="drugSelect" name="drugSelect" class="selectpicker" data-style="btn-danger" data-width="fit" data-icon="glyphicon-heart"  data-live-search="true">
       <optgroup label="Class A">
  <option data-tokens="" value="Clozapine"> Clozapine</option>
       </optgroup>
        <optgroup label="Class B">
  <option data-tokens="" value="Morphine">Morphine</option>
       </optgroup>
</select>
     </div>   
     
   
</div>                                  	<div class="form-group">
										<label class="col-md-3 control-label" for="psychiatrist">Psychiatrist:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="prescribingPsych" name="prescribingPsych" placeholder="Prescribing Psychiatrist" required="" type="text">
										</div>
                                            
            
 
									</div>
                                    
                                        	<div class="form-group">
								
                                            
                                            <label class="col-md-3 control-label" for="date">Start date:</label>
							<div class="form-group row">
  <div class="col-md-3">
    <input id="dosageDate" name="dosageDate" class="form-control input-md" type="date" value="2016-01-01">
  </div>
</div>
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label" for="dosage">Dosage:</label>
										<div class="col-md-3">
											<input autocomplete="off" class="form-control input-md" id="dosage" name="dosage" placeholder="dosage" required="" type="text">
										</div>
                                            
                                            <label class="col-md-3 control-label" for="frequency">Frequency:</label>
										
                                           <select id="frequency" name="frequency" class="selectpicker"  data-width="fit"   data-live-search="true">
       
  <option data-tokens="" value="daily">daily</option> 
  <option data-tokens="" value="twiceDaily">twiceDaily</option>
  <option data-tokens="" value="thriceDaily">thriceDaily</option>
<option data-tokens="" value="weekly">weekly</option>
  <option data-tokens="" value="biWeekly">byWeekly</option>
       
</select> 
									</div>
                                    
    
                                    <div>        
                                    <input name="Record" class="form-control input-md" id="Record" value="Dosage" required="" type="hidden" >
                                 </div>
                                              
                                    
                                    
                                    
									<div class="form-group">
										<label class="col-md-4 control-label" for="addMedBtn"></label>
										<div class="col-md-4">
											<button class="btn btn-primary" onclick="return checkDose()" id="submit" name="submit" type="submit">Add Medication</button>
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
function checkDose(){
var drugSelect = document.getElementById("drugSelect");
var drugValue = drugSelect.options[drugSelect.selectedIndex].text;

var frequency = document.getElementById("frequency");
var frequencyValue = frequency.options[frequency.selectedIndex].text;

var dose = document.getElementById("dosage").value;

  switch(drugValue){

case "Clozapine":

			switch(frequencyValue){
      
      case "weekly":
      case "biWeekly":
      case "daily":
       	if(dose > 1000){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "twiceDaily":
      	if(dose > 500){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "thriceDaily":
      	if(dose > 334){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
case "Morphine":

switch(frequencyValue){
      
      case "weekly":
      case "biWeekly":
      case "daily":
       	if(dose > 600){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "twiceDaily":
      	if(dose > 300){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "thriceDaily":
      	if(dose > 200){
        alert("This dosage exceeds guidelines");
        return false;
        }else{
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
}

}
</script>        
       
       
 <script>
function myFunction() {
    alert("I am an alert box!");
}
</script>
       
      
        
       
       <script>
           $(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});
        </script>
       
        
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
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

