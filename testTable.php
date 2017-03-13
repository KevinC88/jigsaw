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

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
</script>

<script src="https://cdn.dataTables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
      
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.1/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/r-2.1.1/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
    
<script type="text/javascript" src="dataTables.filter.html.js"></script>
 <script type="text/javascript" src="dataTables.filter.range.js"></script>
      
      
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
        
       
    </style>

</head>
    
    <body>
 <?php
  $server = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("test-login", $server); 
  $query = mysql_query("SELECT patientsNumber,patientsFirstName, patientsLastName, supervisingPsych, clinicName,addressLine1,addressLine2,cityInput,countyInput,contactInput,Added,Haemoglobin,Platelets,WhiteCells,HCT,MCV,MCH,NEUTS,Lymphs,Eosins,Basos,Mono FROM patientRecord") or die(mysql_error()); 
?>
        
        <div class="col-xs-12 col-sm-9">
     
   
<div class="col-md-12">
<div class="table-responsive">
<table id="patient_data" class="table table-bordered"  data-page-length='5'>
<thead>
<tr>
                <td>Patient's Number</td>
                <td>First Name</td>
                <td>Last Name</td>
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
</tr>
</thead>
  <?php
               while ($row = mysql_fetch_array($query)) {?>
                   <tr>
                  <td><?php echo $row['patientsNumber'];?></td>
                   <td><?php echo $row['patientsFirstName'];?></td>
                   <td><?php echo $row['patientsLastName'];?></td>
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
                   </tr>
   
              <?php  } ?>
    
    <tfoot>
<tr>
                <td>Patient's Number</td>
                <td>First Name</td>
                <td>Last Name</td>
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
</tr>
</tfoot>
</table>
</div>
</div>
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
    $('#patient_data').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                      
                            column.search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
 


   



    

</script>
