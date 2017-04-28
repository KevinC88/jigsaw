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
  $query = mysql_query("SELECT patientsNumber, patientsFirstName, patientsLastName,prescribingPsych,dosageDate,drugSelect,dosage,frequency FROM patientRecord WHERE Status = 'NO'");
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
    <h4 class="panel-title">Audit Table - dosage guideline exceptions</h4>
  </div>
  <div class="panel-body">
							<div class="table-repsonsive">
<table id="audit_data" class="table table-bordered pretty" cellpadding="0" cellspacing = "0" data-page-length='5'>
<thead>
<tr>
                      <th>Patient's Number</th>
                <th>First Name</th>
                <th>Last Name</th>
    <th>Prescribing Psychiatrist</th>
                <th>Dosage Date</th>
                <th>Medication</th>
    <th>Dosage</th>
    <th>Frequency</th>
</tr>
</thead>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                   <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['patientsFirstName'];?></td>
                   <td><?php echo $row['patientsLastName'];?></td>
                       <td><?php echo $row['prescribingPsych'];?></td>
                   <td><?php echo $row['dosageDate'];?></td>
                   <td><?php echo $row['drugSelect'];?></td>
                       <td><?php echo $row['dosage'];?></td>
                   <td><?php echo $row['frequency'];?></td>
                   
                   
                   </tr>
              <?php  } ?>
</table>
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
	var table = $('#audit_data').DataTable({
       
        
        
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