@extends('layouts.app-left-sites-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Site Group</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('site-group.create') }}">Add new sitegroup</a></label></div>
                        </div>
                        
                    </div>

                    <div class="row"><div class="col-sm-12">
                            <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Site Group Name</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sitegroups as $sitegroup)
                                    <tr role="row" class="odd">
                                        <td>{{ $sitegroup->site_group_name }}</td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr role="row">
                                        <th>Site Group Name</th>
                                        <th>Last Modified</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div></div>

                    <!--div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($sitegroups)}} of {{count($sitegroups)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                 {{ $sitegroups->links() }}
                            </div>
                        </div>
                    </div-->
                </div>


            </div>
        </div>
    </div>
</div>

@endsection