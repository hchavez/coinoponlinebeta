@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Area Listing</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    
                    <div class="row"><div class="col-sm-12">
                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Area</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($area as $area)
                                    <tr role="row" class="odd">
                                        <td>{{ $area->area }}</td>
                                        <td>{{ $area->last_modified }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr role="row">
                                        <th>Area</th>
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