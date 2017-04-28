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
      
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.1/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.1/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
    
<script type="text/javascript" src="dataTables.filter.html.js"></script>
 <script type="text/javascript" src="dataTables.filter.range.js"></script>
      
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"> </script>
      
      <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"> </script>
      
      
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
       <div class="col-xs-4 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
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
        <div class="col-xs-12 col-sm-10 central">
           <div class="col-md-12">
					<div class="row">
						<div class="col-md-12 buffer">
                            <div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    Patient Details
  </div>
  <div class="panel-body">
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
               <div class="col-md-12 central">
					<div class="row">
						<div class="col-md-12">
                            <div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    Medication Entry
  </div>
  <div class="panel-body">
                        
						
							<form  action="inputDosage.php" class="form-horizontal" id="contactForm" method="post" name="contactForm" role="form">
								<fieldset>
                                    <label><h4>Select a patient from the table.</h4></label>
                                    
									<div class="form-group form-group-sm">
                                        <div class="col-xs-3">
										<label for="patientsNumbInput">Patient No.:</label>
										
											<input autocomplete="off" class="form-control" id="patientsNumber" name="patientsNumber" placeholder="patient number" required="" type="text" readonly="readonly">
										
									</div>
                                    
                                    
                                          
                                              <div class="col-xs-3">
										<label  for="patientsFirstNameInput">First Name:</label>
										
											<input autocomplete="off" class="form-control" id="patientsFirstName" name="patientsFirstName" placeholder="first name" readonly required="" type="text">
                                              </div>
                                                   <div class="col-xs-3">
                                              <label  for="patientLastNameInput">Last Name:</label> 
    
        <input name="patientsLastName" class="form-control" id="patientsLastName" readonly required="" type="text" placeholder="last name" autocomplete="off">
                                              </div>
    
									</div>
                                    
 
   
     <div class="form-group form-group-sm">
                                	<div class="col-xs-3">
										<label for="psychiatrist">Psychiatrist:</label>
										
											<input autocomplete="off" class="form-control input-md" id="prescribingPsych" name="prescribingPsych" placeholder="Prescribing Psychiatrist" required="" type="text" pattern="[A-Za-z]*" title="Letters only">
										
                                    </div>
                                            
                                    
 
									
                                    
                                        	
								<div class="col-xs-3">
                                            
                                            <label for="date">Start date:</label>
    <input id="dosageDate" name="dosageDate" class="form-control input-md" type="date" value="2017-01-01">
  </div>
</div>
                                    <div class="form-group form-group-sm">
     <div class="col-xs-3">
  <label  for="sel1">Medication type:</label>
     
   <select id="drugSelect" name="drugSelect" class="selectpicker" data-size="5" data-width="fit" data-icon="glyphicon-heart"  data-live-search="true">
       <optgroup label="Anti-Psychotics">
           <option data-tokens="" value="Amisulpride"> Amisulpride</option>
            <option data-tokens="" value="Aripiprazole"> Aripiprazole</option>
            <option data-tokens="" value="Chlorpromazine"> Chlorpromazine</option>
            <option data-tokens="" value="Clozapine"> Clozapine</option>
            <option data-tokens="" value="Haloperdiol"> Haloperdiol </option>
            <option data-tokens="" value="Olanzapine"> Olanzapine</option>
            <option data-tokens="" value="Quetiapine"> Quetiapine</option>
            <option data-tokens="" value="Paliperidone"> Paliperidone</option>
            <option data-tokens="" value="Risperidone"> Risperidone </option>
            <option data-tokens="" value="Sulpiride"> Sulpiride</option>
            <option data-tokens="" value="Trifluoperazine"> Trifluoperazine</option>
            <option data-tokens="" value="Zuclopenthixol"> Zuclopenthixol</option>
       </optgroup>
        <optgroup label="Mood Stabilizers">
  <option data-tokens="" value="Lithium">Lithium</option>
            <option data-tokens="" value="Carbamazepine">Carbamazepine</option>
            <option data-tokens="" value="Lamotrigine">Lamotrigine</option>
            <option data-tokens="" value="Sodium Valporate">Sodium Valporate</option>
       </optgroup>
</select>
     </div>
                                        
                                         <div class="col-xs-3">
                                            <label for="frequency">Frequency:</label>
										
                                           <select id="frequency" name="frequency" class="selectpicker"  data-width="fit"   data-live-search="true">
       
  <option data-tokens="" value="Daily">Daily</option> 
  <option data-tokens="" value="Twice Daily">Twice Daily</option>
  <option data-tokens="" value="Thrice Daily">Thrice Daily</option>
<option data-tokens="" value="Weekly">Weekly</option>
  <option data-tokens="" value="Bi Weekly">Bi Weekly</option>
       
</select> 
									</div>
                                    
									
                                    
                                    	 <div class="col-xs-3">
										<label for="dosage">Dosage:</label>
										
											<input autocomplete="off" class="form-control input-md" id="dosage" name="dosage" placeholder="dosage" required="" type="text" maxlength="8" pattern="[0-9,.]*" title="Patient number can only contain numbers and has a max. length of 8 characters">
										</div>
                                            
                                       
                                    </div>
                                    
    
                                    <div>        
                                    <input name="Record" class="form-control input-md" id="Record" value="Dosage" required="" type="hidden" >
                                 </div>
                                    
                                    <div>        
                                    <input name="Status" class="form-control input-md" id="Status" value="ok" required="" type="hidden" >
                                 </div>
                                        
                                              
                                    
                                    
                                    
									<div class="form-group form-group-sm">
                                         <div class="col-xs-3">
                                        </div>
                                        <div class="col-xs-6">
										<label  for="addMedBtn"></label>
										
											<button class="btn btn-primary btn-block" onclick="return checkDose()" id="submit" name="submit" type="submit">Add Medication</button>
										</div>
									</div>
								</fieldset>
							</form>
    
						
                        </div>
                        </div>
                        
                        </div>
               </div>
            </div>
            </div>
          </div>
        </div>
     </div>
       
    </body>
            
       
        
                       <script>
function checkDose(){
var drugSelect = document.getElementById("drugSelect");
var drugValue = drugSelect.options[drugSelect.selectedIndex].text;

var frequency = document.getElementById("frequency");
var frequencyValue = frequency.options[frequency.selectedIndex].text;

var dose = document.getElementById("dosage").value;

  switch(drugValue){
          
          
          case "Amisulpride":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1200){
            document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
            
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 600){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
        document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 400){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
        document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          case "Aripiprazole":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 30){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 15){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 10){
      document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          case "Chlorpromazine":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1000){
      document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 500){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 334){
      document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }

case "Clozapine":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 900){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 450){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 300){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Haloperdiol":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 30){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 15){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 10){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Olanzapine":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 20){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 10){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 7){
      document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Quetiapine":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 800){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 400){
      document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 267){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Paliperidone":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 12){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 6){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 4){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Risperidone":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 16){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 8){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 5.5){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Sulpiride":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 150){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 75){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 50){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Trifluoperazine":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1000){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 500){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 334){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Zuclopenthixol":

			switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1000){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 500){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 334){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
case "Lithium":

switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1800){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 900){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 600){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Carbamazepine":

switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1600){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 800){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 533){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Lamotrigine":

switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 1600){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 800){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 533){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
          
          case "Sodium Valporate":

switch(frequencyValue){
      
      case "Weekly":
      case "Bi Weekly":
      case "Daily":
       	if(dose > 2000){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Twice Daily":
      	if(dose > 1000){
        document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      case "Thrice Daily":
      	if(dose > 666){
       document.getElementById('Status').value = 'NO';
        return confirm("This dosage exceeds the recommended guidelines for this medication.\n\nSelect OK if you wish to proceed\n\nSelect CANCEL to alter the dosage.");
        }else{
            document.getElementById('Status').value = 'OK';
        document.getElementById("dosageForm").submit();
        }
      break;
      
      
      }
}

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
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
   
</html>
 <script>
$(document).ready(function() {
	var table = $('#patient_data').DataTable({
		
        "autoWidth": false,
       fixedHeader: true,
       "paging":   true,
       "bInfo" : false,
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

