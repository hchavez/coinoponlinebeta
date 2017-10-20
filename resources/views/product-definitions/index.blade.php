

@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Machine Settings</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('machine-settings.create') }}">Add New Machine Settings</a></label></div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                              <form method="POST" action="{{ route('machine-settings.search') }}">
                                {{ csrf_field() }}
                                @component('layouts.search', ['title' => 'Search'])
                                 @component('layouts.two-cols-search-row', ['items' => ['User Name', 'First Name'], 
                                 'oldVals' => [isset($searchingVals) ? $searchingVals['machine_settingname'] : '', isset($searchingVals) ? $searchingVals['firstname'] : '']])
                                 @endcomponent
                                 </br>
                                 @component('layouts.two-cols-search-row', ['items' => ['Last Name', 'Department'],
                                 'oldVals' => [isset($searchingVals) ? $searchingVals['lastname'] : '', isset($searchingVals) ? $searchingVals['department'] : '']])
                                 @endcomponent
                               @endcomponent
                             </form>
                        </div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                            <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >

                                <thead>
                                      <tr role="row">
                                        <th>Machine ID</th>
                                        <th>xTime</th>
                                        <th>yTime</th>
                                        <th>xSpeed</th>
                                        <th>zSpeed</th>
                                      </tr>
                                </thead>
                                <tbody>

                                      @foreach ($claw_settings as $claw_setting)
                                        <tr role="row" class="odd">
                                          <td class="sorting_1">{{ $claw_setting->machine_id }}</td>
                                          <td>{{ $claw_setting->xTime }}</td>
                                          <td class="hidden-xs">{{ $claw_setting->yTime }}</td>
                                          <td class="hidden-xs">{{ $claw_setting->xSpeed }}</td>
                                          <td class="hidden-xs">{{ $claw_setting->zSpeed }}</td>
                                          <td>
                                            <form class="row" method="POST" action="{{ route('machine-settings.destroy', ['id' => $claw_setting->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ route('machine-settings.edit', ['id' => $claw_setting->id]) }}" class="btn btn-warning">
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
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($claw_settings)}} of {{count($claw_settings)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                 {{ $claw_settings->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection