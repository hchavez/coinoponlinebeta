@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Site Group</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                  

                    <div class="row"><div class="col-sm-12">
                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Site Group Name</th>
                                        <th>State</th>                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cities as $cities)
                                    <tr role="row" class="odd">
                                        <td>{{ $cities->name }}</td>
                                        <td>{{ $cities->state_name }}</td>                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr role="row">
                                        <th>Site Group Name</th>
                                        <th>State</th>                                       
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