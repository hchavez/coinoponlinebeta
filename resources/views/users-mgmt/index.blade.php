
@extends('layouts.app-left-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">   
            <div class="panel-body">                
                <div class="example-wrap">                    
                    <h4 class="example-title">Manage Users</h4>                    
                    <div class="example">
                      <div class="table-responsive">
                        <div id="filterDiv" class="machine-custom-width">Filter by: <br/></div>                        
                        <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="dashboard_sort" role="grid" aria-describedby="exampleTableSearch_info" >
                            <thead>
                            <tr role="row">
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>                              
                              <th>Date Created</th>
                              <th>Last Login</th>                             
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                            <tr role="row" class="clickable-row" role="row" data-href="{{ route('user-mgmt.show', ['id' => $user->id]) }}">
                              <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>                              
                              <td>{{ $user->created_at }}</td>
                              <td>{{ $user->updated_at }}</td>                              
                              <td>{{ $user->status }}</td>
                              
                            </tr>
                            @endforeach                            
                          </tbody>
                            <tfoot>
                                <tr role="row">
                                  <th>Name</th>
                                  <th>Username</th>
                                  <th>Email</th>                              
                                  <th>Date Created</th>
                                  <th>Last Login</th>                                 
                                  <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>


            </div>
        </div>
    </div>
</div>

@endsection