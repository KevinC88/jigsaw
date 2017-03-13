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
  $query = mysql_query("SELECT patientsNumber,patientsFirstName, patientsLastName, Record,supervisingPsych, clinicName,addressLine1,addressLine2,cityInput,countyInput,contactInput,Added,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,NEUTS,Lymphs,Eosins,Basos,Mono,Sodium,Potassium,Urea,Creatinine FROM patientRecord") or die(mysql_error()); 
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
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="secret.php">Add Patient</a></li>
              <li class="active"><a href="patientTable.php">View Patient Records</a></li>
              
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
        <!-- main area -->
        <div class="col-xs-12 col-sm-9">
      
   
<div class="col-md-12">
<div class="table-responsive">
<table id="patient_data" class="table table-bordered"  cellpadding="0" cellspacing = "0" data-page-length='10'>
<thead>
<tr>
                <td>Patient's Number</td>
                <td>First Name</td>
                <td>Last Name</td>
               <td>Record Type</td>
                <td>Supervising Psychiatrist</td>
                <td>Clinic</td>
                <td>Address line 1</td>
                <td>Address line 2</td>
                <td>City</td>
                <td>County</td>
                <td>Contact</td>
                <td>Added</td>
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
    <td>Sodium</td>
                <td>Potassium</td>
                <td>Urea</td>
                <td>Creatinine</td>
</tr>
</thead>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                  <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['patientsFirstName'];?></td>
                   <td><?php echo $row['patientsLastName'];?></td>
                       <td><?php echo $row['Record'];?></td>
                   <td><?php echo $row['supervisingPsych'];?></td>
                   <td><?php echo $row['clinicName'];?></td>
                   <td><?php echo $row['addressLine1'];?></td>
                   <td><?php echo $row['addressLine2'];?></td>
                   <td><?php echo $row['cityInput'];?></td>
                   <td><?php echo $row['countyInput'];?></td>
                   <td><?php echo $row['contactInput'];?></td>    
                   <td><?php echo $row['Added'];?></td>
                   <td><?php echo $row['Haemoglobin'];?></td>
                   <td><?php echo $row['Platelets'];?></td>
                   <td><?php echo $row['WhiteCells'];?></td>
                   <td><?php echo $row['HCT'];?></td>
                   <td><?php echo $row['MCV'];?></td>
                   <td><?php echo $row['MCH'];?></td>
                   <td><?php echo $row['NEUTS'];?></td>
                   <td><?php echo $row['Lymphs'];?></td>
                   <td><?php echo $row['Eosins'];?></td>
                   <td><?php echo $row['Basos'];?></td>
                   <td><?php echo $row['Mono'];?></td>
                       <td><?php echo $row['Sodium'];?></td>
                   <td><?php echo $row['Potassium'];?></td>
                   <td><?php echo $row['Urea'];?></td>
                   <td><?php echo $row['Creatinine'];?></td>
                   </tr>
              <?php  } ?>
    
</table>
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
       "paging":   false,
        
      
     buttons: [
         

         'excelFlash',
         
            {
            extend: 'colvisGroup',
            text: 'Patient',
               
            action: function ( e, dt, node, config ) {
                var $rowsNo = $('#patient_data tbody tr').filter(function () {
                    return $.trim($(this).find('td').eq(2).text()) === "FBC","Renal"
                    }).hide();
                
                 var $rowsNo = $('#patient_data tbody tr').filter(function () {
                    return $.trim($(this).find('td').eq(2).text()) === "Registration"
                    }).show();
                
                   table.columns( [ 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26 ] ).visible( false, false );
            table.columns( [ 1,2,3,4,5,6,7,8,9,10] ).visible( true, true );
table.columns.adjust().draw( true );
                       
             }
             
               
            },
            
             {
                
                 extend: 'colvisGroup',
                text: 'FBC',
                 
                    action: function ( e, dt, node, config ) {
                var $rowsNo = $('#patient_data tbody tr').filter(function () {
                   return $.trim($(this).find('td').eq(2).text()) === "Registration","Renal"
                    }).hide();
                     
                        var $rowsNo = $('#patient_data tbody tr').filter(function () {
                   return $.trim($(this).find('td').eq(2).text()) === "FBC"
                    }).show();
                        
                        
            table.columns( [ 4,5,6,7,8,9,10,23,24,25,26 ] ).visible( false, false );
            table.columns( [ 1,2,3,11,12,13,14,15,16,17,18,19,20,21,22 ] ).visible( true, true );
table.columns.adjust().draw( true );
                       
             }
              
                 
            },
         
          {
                extend: 'colvisGroup',
                text: 'Renal',
              
                     action: function ( e, dt, node, config ) {
                var $rowsNo = $('#patient_data tbody tr').filter(function () {
                   return $.trim($(this).find('td').eq(2).text()) === "Registration","FBC"
                    }).hide();
                     
                        var $rowsNo = $('#patient_data tbody tr').filter(function () {
                   return $.trim($(this).find('td').eq(2).text()) === "Renal"
                    }).show();
                        
                        
            table.columns( [ 4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22] ).visible( false, false );
            table.columns( [ 1,2,3,11,23,24,25,26 ] ).visible( true, true );
table.columns.adjust().draw( true );
                       
             }
                
            },
         
          {
                extend: 'colvisGroup',
                text: 'Liver',
               
            },
         
          {
                extend: 'colvisGroup',
                text: 'Lipid',
              
            },
          {
                extend: 'colvisGroup',
                text: 'Thyroid Fct.',
               
            },
          {
                extend: 'colvisGroup',
                text: 'Glucose',
               
            }
        ],
        
     "columnDefs": [
            { "visible": false, "targets": 0,width:'20%' }
        
         
        ],
        "order": [[ 0, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="25">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
       
       
    } );
 
    // Order by the grouping
    $('#patient_data tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 0, 'desc' ] ).draw();
        }
        else {
            table.order( [ 0, 'asc' ] ).draw();
        }
        
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

