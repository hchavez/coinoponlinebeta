@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Machines</h3>       
    </header>
    
    <div class="panel-body">
        
        <?php if (Session::has('success')): ?>
            <div class="alert  <?php echo Session::get('alert-class', ''); ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo Session::get('success', ''); ?> 
            </div>
        <?php endif; ?>
        
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">     
            <form role="form" method="GET" class="error-list-form" id="formSearch">
                <div class="ky-columns" style="width:15%;" >
                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Filter by Date">  
                </div>    
                <?php echo (!empty($data['dateRange']))? '<code>Filtered Date: '.$data['dateRange'].'</code>' : ''; ?>               
            </form>
            <br>
            <div class="row"><div class="col-sm-12 longFilter" style="padding:0;"> 
<!--                <div class="col-md-12 text-right"><button type="button" class="btn btn-danger" id="clear_filter">Clear Filter</button></div>
                <div class="col-sm-12 longFilter" style="padding:0;">  -->
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                    <button type="button" class="btn btn-outline btn-info"  id="filterBy">Filter By</button>              
                    <div id="filterDiv"></div>                        
                        <table class="display table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" cellspacing="0" width="100%">
                            <thead>
                            <tr role="row">
                                <th>Category</th>                                
                                <!--th>Type</th-->
                                <th>Model</th>
                                <th>Serial No</th>
                                <th>Site</th>
                                <th>State</th>
                                <th>Route</th>
                                <th>Area</th>
                                <th>Comments</th>                                
                                <th>Total Money </th>	
                                <th>Toys won </th>	
                                <th>Stock left </th>
                                <th>Slip Voltage </th>
                                <th>PK Volt </th>	
                                <th>RET Volt </th>	
                                <th>Owed Win </th>	
                                <th>Excess win  </th>	
<!--                                <th>Error</th>-->
                                <th>Activity  </th>	
<!--                                <th>Sync Status</th>
                                <th>Active</th>-->
                            </tr>                            
                            </thead>
                            <tbody>
                            @foreach ($machines as $machine)                            
                            <tr <?php echo ($permit['readAll'])? 'class="clickable-row"' : ''; ?> role="row" data-href="{{ route('machine-management.show', ['id' => $machine->machine_id]) }}"  <?php if($machine->status == '0') { ?> style="background-color: #FF6666; color:  #fff;" <?php } ?>>

                                    <td> {{ $machine->category }} </td>                                    
                                    <!--td>{{ $machine->machine_type }}</td-->
                                    <td>{{ $machine->machine_model }}</td>
                                    <td> {{ $machine->machine_serial_no }}</td>
                                    <td> {{ $machine->site }} </td>  
                                    <td> {{ $machine->state }} </td>
                                    <td>{{ $machine->route }} </td>
                                    <td> {{ $machine->area }}</td>
                                    <td>{{ $machine->comments }} - {{ $machine->version }}</td>                                    
                                    <td> {{ number_format($machine->total_money ,2) }} </td>
                                    <td> {{ $machine->total_toys_win }} </td>                                   
                                    <td> {{ $machine->stock_left }} </td>
                                    <td> {{ $machine->slip_volt }} </td>
                                    <td>{{ $machine->pkup_volt }}</td>
                                    <td>{{ $machine->ret_volt }}</td>
                                    <td>{{ $machine->owed_win }}</td>
                                    <td>{{ $machine->excess_win }}</td>    
                                    <td>{{date('d/m/Y h:i A', strtotime($machine->last_played))}}</td>
                                </tr>                            
                            @endforeach 
                            </tbody>
                            
                        </table>
                </div></div>

            
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style> 
/* .select2-container{width:100% !important;} 
.select2-container .select2-choice > .select2-chosen{color:#333 !important;}
div.dataTables_wrapper div.dataTables_filter { text-align: left !important; } */
</style>
<script>    
//$(document).ready(function() {
//    $('#machine_list_table').DataTable( {
//        pageLength: 15,
//        dom: 'Bfrtip',
//        buttons: ['excelHtml5'],
//        initComplete: function () {
//            this.api().columns().every( function () {
//                var column = this;
//                var select = $('<select><option value=""></option></select>')
//                    .appendTo( $(column.header()).empty() )
//                    .on( 'change', function () {
//                        var val = $.fn.dataTable.util.escapeRegex(
//                            $(this).val()
//                        );
// 
//                        column
//                            .search( val ? '^'+val+'$' : '', true, false )
//                            .draw();
//                    } );
// 
//                column.data().unique().sort().each( function ( d, j ) {
//                    select.append( '<option value="'+d+'">'+d+'</option>' )
//                } );
//            } );
//        }
//    });
//    //Filter customization   
//    $('#machine_list_table select').each(function(i) {
//        var label = ['Category', 'Model', 'Serial No', 'Site', 'State', 'Route','Area','Comments','Total Money','Toys Won','Stock left','Slip Voltage','PK Volt','RET Volt','Owed Win','Excess Win','Activity'];
//        $(this).attr('id', 'filter'+(i+1));        
//        $("#filter" + (i+1)).select2({
//            //placeholder: label[i]
//        });        
//    });
//    //Clear filter 
//    $('#clear_filter').click(function(){
//        $('select').val('').change();
//        $('input').val('').change();
//    });
//    
//    
//    /*Resolve*/
//    $('input[name="dateRange"]').daterangepicker({
//        autoUpdateInput: false,
//        locale: {
//            cancelLabel: 'Clear'
//        }
//    });
//    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
//        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
//    });
//    $('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
//        $(this).val('');
//        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
//    });
//    $('#machine_list_table_wrapper .buttons-excel').css('float','inherit');
//    $('#machine_list_table_wrapper .buttons-excel').insertAfter('#machine_list_table_filter label');
//});
</script>

@endsection