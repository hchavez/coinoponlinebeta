@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Machines</h3>       
    </header>
    
    <div class="panel-body">
        
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">     
            <form role="form" method="GET" class="error-list-form" id="formSearch">
                <div class="ky-columns" style="width:15%;" >
                    <input type="text" name="dateRange" id="dateRange" class="form-control pull-left" placeholder="Filter by Date">  
                </div>    
                <?php echo (!empty($data['dateRange']))? '<code>Filtered Date: '.$data['dateRange'].'</code>' : ''; ?>               
            </form>
            <br>
            <div class="row"><div class="col-sm-12 longFilter" style="padding:0;">     
                     
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
                                <tr class="clickable-row" role="row" data-href="{{ route('machine-management.show', ['id' => $machine->machine_id]) }}">
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
                                    <!--<td></td>-->
                                    <td>{{date('d/m/Y h:i A', strtotime($machine->last_played))}}</td>
<!--                                    <td></td>                                         
                                    <td> <?php //if($machine->status == '1') {$active = "Yes"; }else{ $active = "No"; }  ?><?php //echo $active; ?> </td>-->
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
<script>    
$(document).ready(function() {   
    /*Resolve*/
    $('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
    });
    $('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        var select = $(this), form = select.closest('form'); form.attr('action', 'machine-management'); form.submit();
    });
    
});
</script>

@endsection