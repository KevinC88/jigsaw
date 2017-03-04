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
          
     <div class="col-md-12">
                  <div class="row">
                    
                      
                     <div class="col-md-12" style ='background-color: #2ba6cb;'>
                        <form action="input.php" method="POST" role="form" id="contactForm" class="form-horizontal">
                           <fieldset>
                              <!-- Form Name -->
                              <legend>Patient Record</legend>
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-6 control-label" for="patientsNumbInput" >Patient No.:</label> 
                                 <div class="col-md-6">
                                    <input name="patientsNumber" class="form-control input-md" id="patientsNumber" required="" type="text" placeholder="patient number" autocomplete="off">
                                 </div>
                                   
                              </div>
                              
                     
                              <!-- Text input-->
<div class="form-group">
                                  
<label class="col-md-1 control-label" for="patientsFirstNameInput">First Name:</label> 
    <div class="col-md-3">
        <input name="patientsFirstName" class="form-control input-md" id="patientsFirstName" required=""                    type="text" placeholder="first name" autocomplete="off">
    </div>
<label class="col-md-1 control-label" for="patientLastNameInput">Last Name:</label> 
    <div class="col-md-4">
        <input name="patientsLastName" class="form-control input-md" id="patientsLastName" required=""                      type="text" placeholder="last name" autocomplete="off">
    </div>
</div>
                            
                               <!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="supervisingPsychInput">Psychiatrist:</label> 
<div class="col-md-6">
    <input name="supervisingPsych" class="form-control input-md" id="supervisingPsych" required="" type="text"      placeholder="supervising psychiatrist" autocomplete="off">
</div>
</div>
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="clinicNameInput">Clinic Name:</label> 
                                 <div class="col-md-6">
                                    <input name="clinicName" class="form-control input-md" id="clinicName" required="" type="text" placeholder="clinic name" autocomplete="off">
                                 </div>
                              </div>
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="addressLine1Input">Address Line 1:</label> 
                                 <div class="col-md-8">
                                    <input name="addressLine1" class="form-control input-md" id="addressLine1" required="" type="text" placeholder="address line 1" autocomplete="off">
                                 </div>
                              </div>
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="addressLine2Input">Address Line 2:</label> 
                                 <div class="col-md-8">
                                    <input name="addressLine2" class="form-control input-md" id="addressLine2" required="" type="text" placeholder="address line 2" autocomplete="off">
                                 </div>
                              </div>
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-3 control-label" for="cityInput">Town/City:</label> 
                                 <div class="col-md-3">
                                    <input name="cityInput" class="form-control input-md" id="cityInput" required="" type="text" placeholder="town/city" autocomplete="off">
                                 </div>
                                  <label class="col-md-3 control-label" for="countyInput">County:</label> 
                                 <div class="col-md-4">
                                    <input name="countyInput" class="form-control input-md" id="countyInput" required="" type="text" placeholder="County" autocomplete="off">
                                 </div>
                              </div>
                              
                              <!-- Text input-->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="contactInput">Contact Number:</label> 
                                 <div class="col-md-4">
                                    <input name="contactInput" class="form-control input-md" id="contactInput" required="" type="text" placeholder="home/mobile" autocomplete="off">
                                 </div>
                              </div>
                              <!-- Select Basic -->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="bloodTypeInput">Blood Type:</label>
                                 <div class="col-md-4">
                                    <select name="bloodTypeInput" class="form-control" id="bloodTypeInput">
                                       <option value="1">NOT SELECTED</option>
                                       <option value="2">A+</option>
                                       <option value="3">O-</option>
                                    </select>
                                 </div>
                              </div>
                              <!-- Button -->
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="createPatientBtn"></label>
                                 <div class="col-md-4">
                                    <button name="submit" type ="submit" name="submit" class="btn btn-primary" id="createPatientBtn">CREATE</button>
                                 </div>
                              </div>
                           </fieldset>
                        </form>
                        <!-- Third DIV -->
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