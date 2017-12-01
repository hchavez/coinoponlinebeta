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
                                        <span class="site-menu-title">Export</span>
                                    </a> 
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">IP Address</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Type</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Model</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1"  aria-label="Office: activate to sort column ascending">Serial No</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Route</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Area</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">State</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Site</th>
                                <!--<th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Purchase Date</th>-->
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Active</th>
                                <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Comments</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($machines as $machine)
                            <tr role="row">
                                <td> {{ $machine->ip_address }} </td>
                                <td>{{ $machine->machine_type }}</td>
                                <td>{{ $machine->machine_model }}</td>
                                <td>  <a href="{{ route('machine-management.show', ['id' => $machine->id]) }}" >{{ $machine->machine_serial_no }}</a></td>
                                <td>{{ $machine->route }} </td>
                                <td> {{ $machine->area }}</td>
                                 <td> {{ $machine->state }}</td>
                                <td> {{ $machine->site }} </td>   
                                <!--<td>{{date('d F, Y H:i:s', strtotime($machine->purchase_date))}} </td>-->
                                
                                <?php if($machine->status == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>
                                <td>{{ $machine->comments }}</td>
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
                        {{ $machines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection