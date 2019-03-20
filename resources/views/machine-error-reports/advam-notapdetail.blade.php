@extends('layouts.app-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">
                
          

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
             <header class="panel-heading">
                                    <h3 class="panel-title">Machine Advam with No-Taps Report</h3> 
                                </header>
                    <div class="row">
                         
                                
                       
                        <div class="col-md-6">                            
                          
                     
                        </div> 
                     
                        <div class="col-sm-12">
                            
                            <!-- second Row -->
                        <div class="col-12" id="ecommerceChartView">
                            <div class="card card-shadow">
                              

                             
                                <div class="row" ng-app="machineApp" ng-controller="machineController">   
                                    <!-- Team Total Completed -->
                                    <div class="col-xxl-12">
                                        <div id="teamCompletedWidget" class="card card-shadow example-responsive">                       

                                            <!-- Example Table section -->
                                            <div class="example-wrap">
                                              <!-- <h4 class="example-title">Machine LIVE Error Status</h4> -->
                                            
                                               <div class="alert dark alert-dismissible" role="alert"> <!-- Filter By: --> <?php //echo $_GET['dateRange']; ?></div>
                                              
                                      
                                               <div class="example">                               

                                                <table id="advam-notapdetail" class="display table table-hover dataTable table-bordered w-full dtr-inline table-responsive" role="grid" aria-describedby="example2_info"">                                    
                                                    <thead>
                                                        <tr role="row"> 
                                                           
                                                            <th>ID</th>
                                                            <th>Machine</th>
                                                            <th>Serial</th>
                                                            <th>Site</th>
                                                            <th>Machine Malfunction</th>
                                                            <th>Machine Offline</th>
                                                            <th>Internet Lost</th>
                                                            <th>Start of Internet Lost</th>
                                                        </tr> 
                                                    </thead>                                                     
                                                    <tbody class="table-section" data-plugin="tableSection" >                                                        
                                                    </tbody>                                                    
                                                    <tfoot></tfoot>
                                                </table>
                                              </div>
                                            </div>              
                                            <!-- End Example Table-section -->
                                        </div>                                        
                                    </div>
                                    <!-- End Team Total Completed -->
                                    <!-- End First Row -->

                                </div>
                            </div>
                        </div>
                        <!-- End Second Row -->
                                             
                                   
                        </div></div>

                        
                </div>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset("/js/export-table.js") }}"></script>
<style>
.dt-button.buttons-excel{margin: 1em 2em 0 0;}
.dt-buttons{position:static !important;}
.ladda-button, .dt-buttons{display:inline-block;vertical-align: top;}
.ladda-button{margin-top:10px;}
</style>
<script>    
    
$(document).ready(function() {
    
    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

    
       var origin   = window.location.origin;      
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var base_url = 'http://localhost/coinoponlinebeta/public/';
    }else{
        var base_url = 'https://www.ascentri.com/';
    }
    
    var days = getUrlParameter('days');
     var machine_id = getUrlParameter('machine_id');
    
    
    $('#advam-notapdetail').DataTable().destroy();
    $('#advam-notapdetail').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/loading.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'notapmachinedetail?machine_id='+machine_id+'&days='+days+'',  
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: '',
                filename: 'advamnotaps',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastCol = sheet.getElementsByTagName('col').length - 1;
                    var colRange = createCellPos( lastCol ) + '1';                
                    var afSerializer = new XMLSerializer();
                    var xmlString = afSerializer.serializeToString(sheet);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                    var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                    var filterAttr = xmlDoc.createAttribute('ref');
                    filterAttr.value = 'A1:' + colRange;
                    xlsxFilter.setAttributeNode(filterAttr);
                    sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                    $('row c', sheet).attr( 's', '51' );
                }
            }],
        
        deferRender:  true,  
        pageLength: 35,
        scrollY: '500px',
        scrollCollapse: true,
        order: [[0,'date_played']], 
        columns:[{'data': 'date_played'},
        {'data': 'machine'},
        {'data': 'machine_serial'},
        {'data': 'site'},{'data': 'machine_malfunction'},{'data': 'machine_offline'},{'data': 'internet_lost'},{'data': 'start_of_internet_lost'}]
    });
    



    //Machine error report filter
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });    
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form');  form.submit();
    });

       
});

</script>
@endsection

