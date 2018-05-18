@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Sites</h3>
    </header>
    <div class="panel-body">
        <div id="site_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
               
                <div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div>
                    
                <div class="col-sm-12">                    
                    <div id="filterDiv"><br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >
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
                                <td> {{ $site->route_name  }} </td>
                                <td> {{ $site->area  }} </td>
                                <td> {{ $site->site_type  }}</td>
                                <td> {{ $site->site_group  }} </td>
                                <td> {{ $site->state }} </td>
                                <td> {{ $site->site_name }} </td>
                                <td> {{ $site->street }} </td>
                                <td> {{ $site->suburb }} </td>   
                                <td> {{ $site->city }} </td>
                          
                            </tr>
                            @endforeach
                        </tbody>
                        
                        <tfoot>
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
                        </tfoot>
                        
                    </table>
                </div></div>
            
            
           
            
            
        </div>
    </div>
</div>
@endsection

