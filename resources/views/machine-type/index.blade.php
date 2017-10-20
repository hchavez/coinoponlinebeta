@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Machine Types</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('machine-type.create') }}">Add new type</a></label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <form method="POST" action="{{ route('machine-type.search') }}">
                                {{ csrf_field() }}
                                @component('layouts.search', ['title' => 'Search'])
                                @component('layouts.two-cols-search-row', ['items' => ['Title'], 
                                'oldVals' => [isset($searchingVals) ? $searchingVals['title'] : '']])
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

                                    @foreach ($types as $type)
                                    <tr role="row" class="odd">
                                        <td>{{ $type->machine_type }}</td>
                                        <td>
                                              <form class="row" method="POST" action="{{ route('machine-type.destroy', ['id' => $type->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ route('machine-type.edit', ['id' => $type->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                Update
                                                </a>
                                                 <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                  Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($types)}} of {{count($types)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $types->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection