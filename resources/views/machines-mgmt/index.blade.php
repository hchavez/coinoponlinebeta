@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Machines</h3>
    </header>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">     
            <div id="byDate">
                <form role="form" method="GET" action="{{ route('machine-management.index') }}">
                    <div class="input-group input-daterange">
                    <input type="text" id="min-date" name="startdate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                    <div class="input-group-addon">to</div>
                    <input type="text" id="max-date" name="enddate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">                        
                    <button type="submit" class="btn btn-primary">Search</button> 
                    </div>
                </form>
            </div>
            <div class="row"><div class="col-sm-12 longFilter">     
                    <!--div id="toggleColumn">                          
                        <a href="#" data-toggle="modal" data-target="#filterModal" style="text-decoration: none;"><button type="button" class="btn dark btn-primary">Filter</button></a>
                        <button class="btn btn-primary dark" id="buttonSelectAll" type="button">Toggle Column/ Export CSV</button>
                    </div>
                    
                    <div id="filterModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">                                 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>                
                                    Filter Machine List
                                </div>
                                <div class="modal-body">
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" >Update</button>
                                </div>            
                            </div>
                        </form>
                        </div>
                    </div-->                    
                    <button type="button" class="btn btn-outline btn-info"  id="filterBy">Filter By</button>                    
                    <div id="filterDiv"></div>
                        <table class="display table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" cellspacing="0" width="100%">
                            <thead>
                            <tr role="row">
                                <th>State</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>Serial No</th>
                                <th>Site</th>
                                <th>Route</th>
                                <th>Area</th>
                                <th>Comments</th>
                                <th>Total Money </th>	
                                <th>Total Toys won </th>	
                                <th>Stock left </th>
                                <th>Slip Voltage </th>
                                <th>PK Volt </th>	
                                <th>RET Volt </th>	
                                <th>Owed Win </th>	
                                <th>Excess win  </th>	
                                <th>Error</th>
                                <th>Activity  </th>	
                                <th>Sync Status</th>
                                <th>Active</th>
                            </tr>                            
                            </thead>
                            <tbody>
                            @foreach ($machines as $machine)                            
                                <tr class="clickable-row" role="row" data-href="{{ route('machine-management.show', ['id' => $machine->id]) }}">
                                    <td> {{ $machine->state }} </td>
                                    <td>{{ $machine->machine_type }}</td>
                                    <td>{{ $machine->machine_model }}</td>
                                    <td> {{ $machine->machine_serial_no }}</td>
                                    <td> {{ $machine->site }} </td>  
                                    <td>{{ $machine->route }} </td>
                                    <td> {{ $machine->area }}</td>
                                    <td>{{ $machine->comments }} - {{ $machine->version }}</td>
                                    <td> {{ $machine->total_money }} </td>
                                    <td> {{ $machine->total_toys_win }} </td>                                   
                                    <td> {{ $machine->stock_left }} </td>
                                    <td> {{ $machine->slip_volt }} </td>
                                    <td>{{ $machine->pkup_volt }}</td>
                                    <td>{{ $machine->ret_volt }}</td>
                                    <td>{{ $machine->owed_win }}</td>
                                    <td>{{ $machine->excess_win }}</td>                                
                                    <td></td>
                                    <td>{{date('d/m/Y h:i A', strtotime($machine->last_played))}}</td>
                                    <td></td>                                         
                                    <td> <?php if($machine->status == '1') {$active = "Yes"; }else{ $active = "No"; }  ?><?php echo $active; ?> </td>
                                </tr>                            
                            @endforeach
                            </tbody>
                            
                        </table>
                </div></div>

            
        </div>
    </div>
</div>
@endsection