@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Routes</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                <a class="btn btn-primary" href="{{ route('route.create') }}">Add new route</a></label></div>
                        </div>
                        
                    </div>

                    <div class="row"><div class="col-sm-12">
                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Route</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($routes as $route)
                                    <tr role="row" class="odd">
                                        <td>{{ $route->route }}</td>
                                        <td>{{ $route->last_modified }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr role="row">
                                        <th>Route</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div></div>

                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection