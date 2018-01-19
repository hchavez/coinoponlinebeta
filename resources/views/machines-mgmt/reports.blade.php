@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Machines Report</h3>
    </header>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

            <form role="form" method="GET" action="{{ route('machine-management.index') }}">
            <div class="example">
                <div class="input-daterange" data-plugin="datepicker" style="width: 25% !important;">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                        <input type="text" class="form-control" name="startdate" value="<?php if ($start) {echo $start;} ?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">to</span>
                      <input type="text" class="form-control" name="enddate" value="<?php if ($start) {echo $end;} ?>">
                    </div>
                  </div> <button type="submit" class="btn btn-primary"> Go!</button>
                </div> 
            </form>

            
            <div class="row"><div class="col-sm-12">
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
                        <thead>
                            <tr><th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""> </option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">
                                    <select class="form-control w-full">
                                        <option value="">All</option>
                                        <option value=""></option>
                                    </select>
                                </th>
                                <th rowspan="1" colspan="1">

                                </th>
                                <th rowspan="1" colspan="1">

                                </th>
<!--                                <th rowspan="1" colspan="1">

                                </th>-->
                                <th rowspan="1" colspan="1">

                                </th>
                                <th rowspan="1" colspan="1">
                                    <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                        <span class="site-menu-title"><!-- Export --></span>
                                    </a> 
                                </th>
                            </tr>
                        </thead>
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