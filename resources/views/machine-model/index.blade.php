@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Machine Model</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('machine-model.create') }}">Add new model</a></label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <form method="POST" action="{{ route('machine-model.search') }}">
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
                                        <th>Machine Model</th>
                                        <th>Machine Model Code</th>
                                        <th>Machine Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($models as $model)
                                    <tr role="row" class="odd">
                                        <td>{{ $model->machine_model }}</td>
                                        <td>{{ $model->machine_model_code }}</td>
                                        <td>{{ $model->machine_type }}</td>
                                        <td>
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($models)}} of {{count($models)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $models->links() }}
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>

@endsection