@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Reports</h3>
    </header>
    <div class="panel-body"> 
<!--        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


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
                                <th>Route</th>	
                                <th>Area</th>	
                                <th>SiteType</th>	
                                <th>SiteGroup</th>	
                                <th>State</th>	
                                <th>Site</th>
                                <th>Street</th>
                                <th>Suburb</th>
                                <th>City</th>
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                            <tr role="row">
                                <td> {{ $site->state  }} </td>
                                <td> {{ $site->state  }} </td>
                                <td> {{ $site->state  }}</td>
                                <td> {{ $site->state  }} </td>
                                <td> {{ $site->state }} </td>
                                <td> {{ $site->site_name }} </td>
                                <td> {{ $site->street }} </td>
                                <td> {{ $site->suburb }} </td>   
                                <td> {{ $site->city }} </td>
                          
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
                        {{ $sites->links() }}
                    </div>
                </div>
            </div>
            
            
        </div>-->
    </div>
</div>
@endsection

