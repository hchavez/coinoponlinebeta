

@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Users</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="exampleAddRow_length"><label>
                                    <a class="btn btn-primary" href="{{ route('user-management.create') }}">Add new user</a></label></div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                              <form method="POST" action="{{ route('user-management.search') }}">
                                {{ csrf_field() }}
                                @component('layouts.search', ['title' => 'Search'])
                                 @component('layouts.two-cols-search-row', ['items' => ['User Name', 'First Name'], 
                                 'oldVals' => [isset($searchingVals) ? $searchingVals['username'] : '', isset($searchingVals) ? $searchingVals['firstname'] : '']])
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
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Action</th>
                                      </tr>
                                </thead>
                                <tbody>

                                      @foreach ($users as $user)
                                        <tr role="row" class="odd">
                                          <td class="sorting_1">{{ $user->username }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td class="hidden-xs">{{ $user->firstname }}</td>
                                          <td class="hidden-xs">{{ $user->lastname }}</td>
                                          <td>
                                            <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-warning">
                                                Update
                                                </a>
                                                @if ($user->username != Auth::user()->username)
                                                 <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                  Delete
                                                </button>
                                                @endif
                                            </form>
                                          </td>
                                      </tr>
                                    @endforeach
            
                                </tbody>
                            </table>
                        </div></div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($users)}} of {{count($users)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                 {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection