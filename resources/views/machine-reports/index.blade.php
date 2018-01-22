@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Machines Report</h3>
    </header>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <form role="form" method="GET" action="{{ route('machine-reports.index') }}" id="filter_table">
            <div class="example">
                <!--div class="input-daterange" data-plugin="datepicker" style="width: 25% !important;">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>                       
                        <input type="text" class="form-control" name="startdate" value='{{ $start }}'>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">to</span>
                      <input type="text" class="form-control" name="enddate" value="<?php //if ($start) {echo $end;} ?>">
                    </div>
                  </div> <!--button type="submit" class="btn btn-primary"> Go!</button-->
                </div-->  
            
            <div class="row"><div class="col-sm-12">
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
                        <thead>                                        
                            <tr><th rowspan="1" colspan="1">
                                <select class=" w-full" name="machine_state" id="machine_state" class="auto_select">                                       
                                    <option value="">All State</option>
                                    @foreach ($m_state as $state)
                                    <option value="{{ $state->name }}" {{ $state->name == $data['machine_state'] ? "selected" : "" }} >{{ $state->name }}</option>
                                    @endforeach                                        
                                </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class=" w-full"  name="machine_type" id="machine_type" class="machine_select">                                       
                                        <option value="">All Machine Type</option>
                                        @foreach ($m_type as $types)                                        
                                        <option value="{{ $types->id }}" {{ $types->id == $data['machine_type'] ? "selected" : "" }} > {{ $types->machine_type }} </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="w-full" name="machine_model" id="machine_model" class="machine_select">                                        
                                        <option value="">All Machine Model</option>
                                        @foreach ($m_model as $model)                                        
                                        <option value="{{ $model->id }}" {{ $model->id == $data['machine_model'] ? "selected" : "" }} > {{ $model->machine_model }} </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="w-full" name="machine_serial" id="machine_serial">                                       
                                        <option value="">All Serial</option>
                                        @foreach ($m_serial as $serial)
                                            <option value="{{$serial->machine_serial_no}}" {{ $serial->machine_serial_no == $data['machine_serial'] ? "selected" : "" }}>{{$serial->machine_serial_no}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="w-full" id="machine_site" name="machine_site">                                                                            
                                        <option value="">All Site</option>   
                                        @foreach ($m_sites as $site)      
                                            <option value="{{ $site->id }}" {{ $site->id == $data['machine_site'] ? "selected" : "" }}  >{{ $site->site_name }}</option>    
                                        @endforeach                              
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="w-full" name="machine_route" id="machine_route">                                        
                                        <option value="">All Route</option>
                                        @foreach ($m_route as $route)
                                            <option value="{{ $route->id }}" {{ $route->id == $data['machine_route'] ? "selected" : "" }} >{{ $route->route }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="w-full" name="machine_area" id="machine_area">                                        
                                        <option value="">All Area</option>
                                        @foreach ($m_area as $area)
                                            <option value="{{ $area->id }}"  {{ $area->id == $data['machine_area'] ? "selected" : "" }} >{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th rowspan="1" colspan="4">
                                    <div class="input-daterange" data-plugin="datepicker" >
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>                                               
                                                <input type="text" class="form-control" name="startdate" value='{{ $start }}'>
                                            </div>
                                            <div class="input-group">
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control" name="enddate" value="<?php if ($start) {echo $end;} ?>">
                                            </div>
                                        </div> <!--button type="submit" class="btn btn-primary"> Go!</button-->
                                    </div>                                      
                                </th>
                                <!--<th rowspan="1" colspan="1">
                                </th>-->
                                <th rowspan="1" colspan="1">
                                    <a href="{{ url('machine-reports') }}"><button type="button" class="btn btn-primary"> Reset Filter </button></a>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                        <span class="site-menu-title"><!-- Export --></span>
                                    </a> 
                                </th>
                            </tr>
                        </thead>
                        </form>
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
                                <th>Total money</th>	
                                <th>Total Toys won</th>	
                                <th>Stock left</th>
                                <th>Slip Voltage</th>
                                <th>PK Volt</th>	
                                <th>RET Volt</th>	
                                <th>Owed Win </th>	
                                <th>Excess win</th>	
                                <th>Error</th>
                                <th>Last visit</th>	
                                <th>Activity</th>
                                <th>Active</th>  
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
                                <td>{{ $machine->comments }} - {{ $machine->version }} </td>
                                 <td> {{ $machine->total_money }} </td>
                                <td> {{ $machine->total_toys_win }} </td>                                   
                                <td> {{ $machine->stock_left }} </td>
                                <td> {{ $machine->slip_volt }} </td>
                                <td>{{ $machine->pkup_volt }}</td>
                                <td>{{ $machine->ret_volt }}</td>
                                <td>{{ $machine->owed_win }}</td>
                                <td>{{ $machine->excess_win }}</td>
                                <td></td>
                                <td>{{ $machine->last_visit }}</td>
                                <td>{{date('d-m-Y', strtotime($machine->date_created))}} </td>
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