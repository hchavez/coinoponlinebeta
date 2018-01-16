@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Machines</h3>
    </header>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
      
            
            <div class="row"><div class="col-sm-12">         
            
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
                        <thead>                       
                        <form class="" id="filter_table" role="form" autocomplete="off"  method="POST" action="{{ route('machine-management.filter') }}" enctype="multipart/form-data">  
                        {{ csrf_field() }}   
                              
                            <tr><th rowspan="1" colspan="1">                                    
                                    <select class=" w-full" name="machine_state" id="machine_state" class="auto_select">                                       
                                        <option value="all">All State</option>
                                        @foreach ($m_state as $state)
                                        <option value="{{ $state->name }}" {{ $state->name == $getData['machine_state'] ? "selected" : "" }} >{{ $state->name }}</option>
                                        @endforeach                                        
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                   
                                    <select class=" w-full"  name="machine_type" id="machine_type" class="machine_select">                                       
                                        <option value="all">All Machine Type</option>
                                        @foreach ($m_type as $types)                                        
                                        <option value="{{ $types->id }}" {{ $types->id == $getData['machine_type'] ? "selected" : "" }} > {{ $types->machine_type }} </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                   
                                    <select class="w-full" name="machine_model" id="machine_model" class="machine_select">                                        
                                        <option value="all">All Machine Model</option>
                                        @foreach ($m_model as $model)                                        
                                        <option value="{{ $model->id }}" {{ $model->id == $getData['machine_model'] ? "selected" : "" }} > {{ $model->machine_model }} </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                   
                                    <select class="w-full" name="machine_serial" id="machine_serial">                                       
                                        <option value="all">All Serial</option>
                                        @foreach ($m_serial as $serial)
                                            <option value="{{$serial->machine_serial_no}}" {{ $serial->machine_serial_no == $getData['machine_serial'] ? "selected" : "" }} >{{$serial->machine_serial_no}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                   
                                    <select class="w-full" id="machine_site">                                                                            
                                        <option value="">All Site</option>                                       
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                    
                                    <select class="w-full" name="machine_route" id="machine_route">                                        
                                        <option value="all">All Route</option>
                                        @foreach ($m_route as $route)
                                            <option value="{{ $route->id }}" {{ $route->id == $getData['machine_route'] ? "selected" : "" }} >{{ $route->route }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">                                   
                                    <select class="w-full" name="area" id="machine_area">                                        
                                        <option value="all">All Area</option>
                                        @foreach ($m_area as $area)
                                            <option value="{{ $area->id }}" {{ $area->id == $getData['area'] ? "selected" : "" }}  >{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1" id="">                                                                 
                                    <input type="text" class="form-control" name="machine_comments" placeholder="Comments" autocomplete="on">                                    
                                </th>
                                <th rowspan="1" colspan="1" id="">                                    
                                <!--button type="submit" class="btn btn-primary">Search</button--> 
                                <a href="{{ route('machine-management.index') }}"><button type="button" class="btn btn-primary">Refresh</button></a>                              
                                </th>
                                <!--th rowspan="1" colspan="1">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                        <span class="site-menu-title">Export </span>
                                    </a> 
                                </th-->
                            </tr>
                            
                        </thead>
                        </form>
                        <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
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
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Total money </th>	
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Total Toys won </th>	
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Stock left </th>
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Slip Voltage </th>
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  PK Volt </th>	
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  RET Volt </th>	
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Owed Win </th>	
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Excess win  </th>	
                                <th>Error</th>
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Activity  </th>	
                                <th>Sync Status</th>
                                <th class="sort_filter"><label><i class="icon wb-sort-vertical" aria-hidden="true"></i></label>  Active</th>
                       
                            
                        </thead>
                        <tbody>
                            @foreach ($machines as $machine)
                            <tr role="row">
                                <td> {{ $machine->state }} </td>
                                <td>{{ $machine->machine_type }}</td>
                                <td>{{ $machine->machine_model }}</td>
                                <td>  <a href="{{ route('machine-management.show', ['id' => $machine->id]) }}" >{{ $machine->machine_serial_no }}</a></td>
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
                                 <?php if($machine->status == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div></div>

            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <?php ?>
                        {{ $machines->links() }}
                        
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection