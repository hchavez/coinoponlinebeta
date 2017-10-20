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
                        <div class="col-sm-12 col-md-6">
                            <form method="POST" action="{{ route('route.search') }}">
                                {{ csrf_field() }}
                                @component('layouts.search', ['title' => 'Search'])
                                @component('layouts.two-cols-search-row', ['items' => ['Title'], 
                                'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
                                @endcomponent
                                @endcomponent
                            </form>
                        </div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                    <tr role="row">
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($routes as $route)
                                    <tr role="row" class="odd">
                                        <td>{{ $route->name }}</td>
                                        <td>
                                         
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($routes)}} of {{count($routes)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $routes->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection