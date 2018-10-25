@extends('layouts.app-template')
@section('content')
<!-- Page -->
<meta http-equiv="refresh" content="300" >
<div class="row" id="boxesCount">  
    <!-- end boxes -->
    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <header class="panel-heading">
                <h3 class="panel-title">Machine Error Reports History</h3>       
            </header>
                        
            <div class="row" ng-app="machineApp" ng-controller="machineController" style="margin:0;">   
                <!-- Team Total Completed -->
                <div class="col-xxl-12">
                    <form role="form" method="GET" class="error-list-form" id="formFilter">                                
                        <div class="col_date ky-columns ky_date">
                            <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Search date range" autocomplete="off">     
                        </div>
                    </form>
                    <table class="table table-hover" id="machineErrorReport">                                    
                        <thead>
                            <tr role="row">        
                                        <th>Date Time</th>
                                        <th>Machine Model</th>                                                
                                        <th>Machine Type</th>
                                        <th>Name & Serial No</th>                                       
                                        <th>Error Type</th>
                                        <th>Error Message</th>
                                        <th>Site</th>
                                        <th>Resolve By</th>
                                        <th>Date Resolve</th>
                                       </tr> 
                        </thead> 

                        <tbody class="table-section" data-plugin="tableSection" >

                        </tbody>                              

                        <tfoot></tfoot>
                    </table>
                    <br><br>
                </div>
                <!-- End Team Total Completed -->
                <!-- End First Row -->

            </div>
        </div>
    </div>
    <!-- End Second Row -->

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
.select2-container{width:100% !important;}

</style>
<script>    
$(document).ready(function() {
    
    var origin   = window.location.origin;     
    var urlFilter = new URL(origin);
    var filter = urlFilter.searchParams.get("dateRange");
    var input = (filter!=null)? '?dateRange='+filter : '' ;
    
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/';
    }else{
        var url = 'https://www.ascentri.com/';
    }
    setTimeout(function(){
        $('.table select').each(function(i) {
            var label = ['Date Time', 'Machine Model', 'Machine Type', 'Name & Serial No', 'Error Type', 'Error Message', 'Site','Resolve By', 'Date Resolve'];
            $(this).attr('id', 'filter'+(i+1));        
            $("#filter" + (i+1)).select2({
                placeholder: label[i]
            });        
        });

      }, 3000);
    $('#machineErrorReport').DataTable().destroy();
    $('#machineErrorReport').dataTable({     
        pageLength: 20,
        paging:true, 
        ajax: url + 'error_reports_api/' + input,    
        dom: 'Bfrtip',
        buttons: ['excel'],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        deferRender:    true,       
        order: [[4,'asc']],
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': '',
                    'render': function (data, type, row) { 
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!
                        var yyyy = today.getFullYear();

                        if(dd<10) { dd = '0'+dd } 
                        if(mm<10) { mm = '0'+mm } 

                        return today = mm + '/' + dd + '/' + yyyy;
                        //return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
                },
                {'data': 'machine_model'},{'data': 'machine_type'},
                {'data': 'name_serial'},                
                {'data': 'errortype', 
                    'render': function (data, type, row) { 
                        if(row.errortype=='1'){ return '<span class="badge badge-danger">Needs Immediate Attention!</span>'; }
                        else if(row.errortype=='2'){ return '<span class="badge badge-warning">Warning!</span>'; }
                        else if(row.errortype=='3'){ return '<span class="badge badge-info">Notice!</span>'; }
                        else{ return 'Warning'; }
                    }},
                {'data': 'error'}, {'data': 'site_name'},
                {'data': 'resolve_by', 
                    'render': function (data, type, row) { 
                        return 'System';
                    }}, 
                {'data': 'resolve_date'}
            ]
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
    
    $('.dt-buttons').append('<a href="machine-error-reports"><button type="button" class="btn btn-default" style="float:right;" >Error List</button></a><button type="button" id="clearFilter" class="btn btn-danger" value="0" style="vertical-align: bottom;float:right;">Clear Filter</button>&nbsp;&nbsp;&nbsp;');
    $('#machineErrorReport_filter').insertBefore('.dt-buttons');
    
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
    $("#select2-results-1").attr("disable");

});

</script>

@endsection

