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
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var url = 'http://localhost/coinoponlinebeta/public/history_api';
    }else{
        var url = 'https://www.ascentri.com/history_api';
    }
    setTimeout(function(){
        $('.table select').each(function(i) {
            var label = ['Date Time', 'Machine Model', 'Machine Type', 'Name & Serial No', 'Error Type', 'Error Message', 'Site','Resolve By', 'Date Resolve'];
            $(this).attr('id', 'filter'+(i+1));        
            $("#filter" + (i+1)).select2({
                placeholder: label[i]
            });        
        });  
      }, 2000);
    $('#machineErrorReport').dataTable({     
        pageLength: 20,
        paging:true,
        ajax: url,    
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
        columns:[{'data': 'created_at',
                    'render': function (data, type, row) { 
                        var str = row.created_at.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
                },
                {'data': 'machine_model'},{'data': 'machine_type'},
                {'data': 'name_serial'},
                {'data': 'errortype', 
                    'render': function (data, type, row) { 
                        if(row.errortype=='1'){ return '<span class="badge badge-danger">Needs Immediate Attention!</span>'; }
                        else if(row.errortype=='2'){ return '<span class="badge badge-warning">Warning!</span>'; }
                        else if(row.errortype=='3'){ return '<span class="badge badge-info">Notice!</span>'; }
                        else{ return '<span class="badge badge-warning">Warning!</span>'; }
                    }},
                {'data': 'error',
                    fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html(oData.error);
                    }
                },{'data': 'site_name'},
                {'data': 'resolve_by',
                    'render': function (data, type, row) { 
                        if(row.resolve_by=='0'){ return 'System'; }                      
                        else{ return ''; }
                    }
                },
                {'data': 'resolve_date',
                    'render': function (data, type, row) { 
                        var str = row.resolve_date.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
                }
            ]
    });   
        
    
    //Machine error report filter
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('.dt-buttons').append('<a href="machine-error-reports"><button type="button" class="btn btn-default" style="float:right;" >Error Lists</button></a><button type="button" id="clearFilter" class="btn btn-danger" value="0" style="vertical-align: bottom;float:right;">Clear Filter</button>&nbsp;&nbsp;&nbsp;');
    $('#machineErrorReport_filter').insertBefore('.dt-buttons');
    
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
    $("#select2-results-1").attr("disable");

});

</script>

@endsection

