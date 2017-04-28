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
    
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
       
     <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/helpful.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/projectstyle.css">
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
    <h5>Create a Patient Record</h5>
  </div>
  <div class="panel-body">
                     
                        <form action="input.php" method="POST" role="form" id="contactForm" class="form-horizontal">
                            
                         
                              <div class="form-group form-group-sm">
                                   <div class="col-xs-3">
                                 <label for="patientsNumbInput" >Patient No.:</label> 
                                 
                                    <input name="patientsNumber" class="form-control" id="patientsNumber" required="" type="text" placeholder="patient number" autocomplete="off" maxlength="8" pattern="[0-9]*" title="Patient number can only contain numbers and has a max. length of 8 characters">
                                  
                              </div>
                              
                
            <div class="col-xs-3">                      
<label for="patientsFirstNameInput">First Name:</label> 

<input name="patientsFirstName" class="form-control" id="patientsFirstName" required="" type="text" placeholder="first name" autocomplete="off" pattern="[A-Za-z]*" maxlength="15" title="Letters only">
    </div>
                                  <div class="col-xs-3">
<label for="patientLastNameInput">Last Name:</label> 
    
        <input name="patientsLastName" class="form-control" id="patientsLastName" required=""                      type="text" placeholder="last name" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
    </div>
                            </div>
                                  
                                  <div class="form-group form-group-sm">
      <div class="col-xs-3">                      
    <label for="supervisingPsychInput">Psychiatrist:</label> 

    <input name="supervisingPsych" class="form-control" id="supervisingPsych" required="" type="text"      placeholder="supervising psychiatrist" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
</div>
                                        <div class="col-xs-3">
                                 <label for="clinicNameInput">Clinic Name:</label> 
                                    <input name="clinicName" class="form-control" id="clinicName" required="" type="text" placeholder="clinic name" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
                                 </div>
                                      
                                      <div class="col-xs-3">
                                       <label for="contactInput">Contact Number:</label> 
                                 
                                    <input name="contactInput" class="form-control" id="contactInput" required="" type="text" placeholder="home/mobile" autocomplete="off" maxlength="11" pattern="[0-9-]*" title="Contact number can only contain numbers and dashes">
                                 </div>
                            </div>
                            
                              <!-- Text input-->
                              <div class="form-group form-group-sm">
                                  <div class="col-xs-5">
                                 <label for="addressLine1Input">Address Line 1:</label> 
                                
                                    <input name="addressLine1" class="form-control" id="addressLine1" required="" type="text" placeholder="address line 1" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
                                 </div>
                              <div class="col-xs-5">
                                 <label for="addressLine2Input">Address Line 2:</label> 
                                <input name="addressLine2" class="form-control" id="addressLine2" required="" type="text" placeholder="address line 2" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
                                 </div>
                              </div>
                             
                              <div class="form-group form-group-sm">
                                 
                                  <div class="col-xs-3">
                  <label for="countyInput">County:</label>
    
  <select class="form-control" id="countyInput" name="countyInput">
    <option value="Antrim">Antrim</option>
    <option value="Armagh">Armagh</option>
    <option value="Carlow">Carlow</option>
    <option value="Cavan">Cavan</option>
       <option value="Clare">Clare</option>
    <option value="Cork">Cork</option>
       <option value="Derry">Derry</option>
    <option value="Donegal">Donegal</option>
    <option value="Down">Down</option>
    <option value="Dublin">Dublin</option>
       <option value="Fermanagh">Fermanagh</option>
    <option value="Galway">Galway</option>
       <option value="Kerry">Kerry</option>
    <option value="Kildare">Kildare</option>
    <option value="Kilkenny">Kilkenny</option>
    <option value="Laois">Laois</option>
       <option value="Leitrim">Leitrim</option>
    <option value="Limerick">Limerick</option>
       <option value="Longford">Longford</option>
    <option value="Louth">Louth</option>
    <option value="Mayo">Mayo</option>
    <option value="Meath">Meath</option>
       <option value="Monaghan">Monaghan</option>
    <option value="Offaly">Offaly</option>
            <option value="Roscommon">Roscommon</option>
    <option value="Sligo">Sligo</option>
       <option value="Tipperary">Tipperary</option>
    <option value="Tyrone">Tyrone</option>
    <option value="Waterford">Waterford</option>
    <option value="Westmeath">Westmeath</option>
       <option value="Wexford">Wexford</option>
    <option value="Wicklow">Wicklow</option>
  </select>
</div>  
                                  
                                  
                                  
                                  <div class="col-xs-3">
                                 <label for="cityInput">Town/City:</label> 
                               
                                    <input name="cityInput" class="form-control" id="cityInput" required="" type="text" placeholder="town/city" autocomplete="off" pattern="[A-Za-z]*" title="Letters only">
                                 </div>
                                  
                                       	
                               </div>		
										
                                            
   
									
              <div class="form-group form-group-sm">
  <div class="col-xs-3">
                  <label for="mStatus">Marital Status:</label>
    
  <select class="form-control" id="mStatus" name="mStatus">
    <option value="single">Single</option>
    <option value="married">Married</option>
    <option value="separated_divorced">Separated/Divorced</option>
    <option value="civil partnership">Civil Partnership</option>
       <option value="widowed">Widowed</option>
    <option value="other">Other</option>
  </select>
</div>     
                  
                  
                   <div class="col-xs-3">
                   <label for="gender">Gender:</label>
                  
  <select class="form-control" id="gender" name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    
  </select>
</div>  
    
                                   
                                         <div class="col-xs-3">
  <label for="ageGroup">Age Group:</label>
                  
  <select class="form-control" id="ageGroup" name="ageGroup">
    <option value="18-25">18-25</option>
    <option value="26-35">26-35</option>
    <option value="36-45">36-45</option>
    <option value="46-55">46-55</option>
       <option value="56-65">56-65</option>
    <option value="over 65">Over 65</option>
  </select>
</div>    
                            </div>
                  
                  
                    <div class="form-group form-group-sm">
                        <div class="col-xs-5">
                   <label for="initialD">Initial Diagnosis:</label>
                  
  <select class="form-control" id="initialD" name="initialD">
    <option value="F20-Schizophrenia">F20-Schizophrenia</option>
    <option value="F21-Schizotypal disorder">F21-Schizotypal disorder</option>
      <option value="F22-Persistent deulsional disorders">F22-Persistent deulsional disorders</option>
    <option value="F23-Acute and transient psychotic disorders">F23-Acute and transient psychotic disorders</option>
      <option value="F24-Induced dilusional disorder">F24-Induced dilusional disorder</option>
    <option value="F25-Schizoaffective disorders">F25-Schizoaffective disorders</option>
      <option value="F28-Other nonorganic psychotic disorders">F28-Other nonorganic psychotic disorders</option>
    <option value="F29-Unspecified nonorganic psychotic disorders">F29-Unspecified nonorganic psychotic disorders</option>
      <option value="F30-Manic episode">F30-Manic episode</option>
    <option value="F31-Bipolar affective disorder">F31-Bipolar affective disorder</option>
      <option value="F32-Depressive episode">F32-Depressive episode</option>
    <option value="F33-Recurrent depressive disorder">F33-Recurrent depressive disorder</option>
      <option value="F34-Persistent mood [affective] disorders">F34-Persistent mood [affective] disorders</option>
    <option value="F38-Other mood [affective] disorders">F38-Other mood [affective] disorders</option>
      <option value="F39-Unspecified mood [affective] disorder">F39-Unspecified mood [affective] disorder</option>
  </select>
</div>  
    </div>
                              
                               <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            
                                       
                                    <input name="Record" class="form-control input-md" id="Record" value="Registration" required="" type="hidden" >
                                 </div>
                            
          
                            
                              
                             
                              <div class="form-group form-group-sm">
                                    <div class="col-xs-3">
                                 <label for="createPatientBtn"></label>
                                
                                    <button name="submit" type ="submit" name="submit" class="btn btn-primary btn-block" id="createPatientBtn">CREATE</button>
                                 </div>
                              </div>
                          
                        <!-- Third DIV -->
                     </div>
                         </form>
                  </div>
               </div>
          
        </div><!-- /.col-xs-12 main -->
   
         </div>
      
            </div>
     </div>
     
    
       
       

        </body>
          
       <script>
           $(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});
        </script>
     
       <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html>