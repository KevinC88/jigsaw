<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>
<!DOCTYPE html>
<html>
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
  $query = mysql_query("SELECT patientsNumber,patientsFirstName, patientsLastName, Record,supervisingPsych, clinicName,addressLine1,addressLine2,cityInput,countyInput,contactInput,Added,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,NEUTS,Lymphs,Eosins,Basos,Mono,Sodium,Potassium,Urea,Creatinine,ALT,ALP,GGT,Bilirubin,Albumin,Cholesterol,Tryglyceride,HDL,LDL,CHRatio,T3,T4,TSH,glucose FROM patientRecord") or die(mysql_error()); 
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
        <!-- main area -->
        <div class="col-sm-10 central buffer">
      <div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    Patient Records
  </div>
  <div class="panel-body">
   

<div class="table-responsive">
<table id="patient_data" class="table table-bordered pretty"  cellpadding="0" cellspacing = "0" data-page-length='7'>
<thead>
<tr>
                <th>Patient's Number</th>
                <th>First Name</th>
                <th>Last Name</th>
               <th>Record Type</th>
                <th>Supervising Psychiatrist</th>
                <th>Clinic</th>
                <th>Address line 1</th>
                <th>Address line 2</th>
                <th>City</th>
                <th>County</th>
                <th>Contact</th>
                <th>Added</th>
                <th>Haemoglobin</th>
                <th>Platelets</th>
                <th>WhiteCells</th>
                <th>HCT</th>
                <th>MCV</th>
                <th>MCH</th>
                <th>Neuts</th>
                <th>Lymphs</th>
                <th>Eosins</th>
                <th>Basos</th>
                <th>Mono</th>
                <th>Sodium</th>
                <th>Potassium</th>
                <th>Urea</th>
                <th>Creatinine</th>
                <th>ALT</th>
                <th>ALP</th>
                <th>GGT</th>
                <th>Bilirubin</th>
                <th>Albumin</th>
                <th>Cholesterol</th>
                <th>Tryglyceride</th>
                <th>HDL</th>
                <th>LDL</th>
                <th>CHRatio</th>
                <th>T3</th>
                <th>T4</th>
                <th>TSH</th>
                <th>Glucose</th>
</tr>
</thead>
    <tbody>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                  <td><?php echo $row['patientsNumber'];?></td>
       <!-- 1-->  <td><?php echo $row['patientsFirstName'];?></td>
       <!-- 2-->  <td><?php echo $row['patientsLastName'];?></td>
       <!-- 3-->  <td><?php echo $row['Record'];?></td>
       <!-- 4-->  <td><?php echo $row['supervisingPsych'];?></td>
       <!-- 5-->  <td><?php echo $row['clinicName'];?></td>
       <!-- 6-->  <td><?php echo $row['addressLine1'];?></td>
       <!-- 7-->  <td><?php echo $row['addressLine2'];?></td>
       <!-- 8-->  <td><?php echo $row['cityInput'];?></td>
       <!-- 9-->  <td><?php echo $row['countyInput'];?></td>
       <!-- 10--> <td><?php echo $row['contactInput'];?></td>    
       <!-- 11--> <td><?php echo $row['Added'];?></td>
       <!-- 12--> <td><?php echo $row['Haemoglobin'];?></td>
       <!-- 13--> <td><?php echo $row['Platelets'];?></td>
       <!-- 14--> <td><?php echo $row['WhiteCells'];?></td>
       <!-- 15--> <td><?php echo $row['HCT'];?></td>
       <!-- 16--> <td><?php echo $row['MCV'];?></td>
       <!-- 17--> <td><?php echo $row['MCH'];?></td>
       <!-- 18--> <td><?php echo $row['NEUTS'];?></td>
       <!-- 19--> <td><?php echo $row['Lymphs'];?></td>
       <!-- 20--> <td><?php echo $row['Eosins'];?></td>
       <!-- 21--> <td><?php echo $row['Basos'];?></td>
       <!-- 22--> <td><?php echo $row['Mono'];?></td>
       <!-- 23--> <td><?php echo $row['Sodium'];?></td>
       <!-- 24--> <td><?php echo $row['Potassium'];?></td>
       <!-- 25--> <td><?php echo $row['Urea'];?></td>
       <!-- 26--> <td><?php echo $row['Creatinine'];?></td>
       <!-- 27--> <td><?php echo $row['ALT'];?></td>
       <!-- 28--> <td><?php echo $row['ALP'];?></td>
       <!-- 29--> <td><?php echo $row['GGT'];?></td>
       <!-- 30--> <td><?php echo $row['Bilirubin'];?></td>
       <!-- 31--> <td><?php echo $row['Albumin'];?></td>
       <!-- 32--> <td><?php echo $row['Cholesterol'];?></td>
       <!-- 33--> <td><?php echo $row['Tryglyceride'];?></td>
       <!-- 34--> <td><?php echo $row['HDL'];?></td>
       <!-- 35--> <td><?php echo $row['LDL'];?></td>
       <!-- 36--> <td><?php echo $row['CHRatio'];?></td>
       <!-- 37--> <td><?php echo $row['T3'];?></td>
       <!-- 38--> <td><?php echo $row['T4'];?></td>
       <!-- 39--> <td><?php echo $row['TSH'];?></td>
       <!-- 40--> <td><?php echo $row['glucose'];?></td>
                   </tr>
              <?php  } ?>
    </tbody>
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
 

$(document).ready(function(){
    
    
   var table = $('#patient_data').DataTable({
   
       
        "autoWidth": false,
        dom: 'Bfrtip',
       fixedHeader: true,
       "paging":   true,
       "bInfo" : false,
       
       
       "columnDefs": [
       { targets: [0,1,2,3], visible: true},
        { targets: '_all', visible: false }
          
  ],
    
       
        
      
     buttons: [
         

         
         
            {
            extend: 'colvisGroup',
            text: 'Patient',
               
            action: function ( e, dt, node, config ) {
                  var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Registration', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
                
                   
            table.columns( [0, 1,2,4,5,6,7,8,9,10] ).visible( true, true );
        table.columns( [11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27 ] ).visible( false, false );
table.columns.adjust().draw( true );
                       
             }
             
               
            },
            
             {
                extend: 'colvisGroup',
                text: 'FBC',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('FBC', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,13,14,15,16,17,18,19,20,21,22 ] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,23,24,25,26,27 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
          {
                extend: 'colvisGroup',
                text: 'Renal',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Renal', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,22,23,24,25,26] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,27 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
         {
                extend: 'colvisGroup',
                text: 'Liver',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Liver', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,27,28,29,30,31] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
         
         {
                extend: 'colvisGroup',
                text: 'Lipid',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Lipid', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,32,33,34,35,36] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
         
          {
                extend: 'colvisGroup',
                text: 'Thyroid',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Thyroid', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,37,38,39] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
         
          {
                extend: 'colvisGroup',
                text: 'Glucose',
                 
                 
                action: function ( e, dt, node, config ) {
                      var _val = 2;
                
                if(_val == 2){   
        table
        .columns(3)
        .search('Glucose', true, false)
        .draw();
  }else{
        table
        .columns()
        .search('')
        .draw(); 
  }
               
         table.columns( [0,1,2,11,40] ).visible( true, true );
        table.columns( [3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39 ] ).visible( false, false );
table.columns.adjust().draw( true );      
             }
              
                 
             },
         
         
         
         
         
        ],
        
     
       
       
       
    } );
    
   
 
   
 
    
});
 


   


 

    

</script>

