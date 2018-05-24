
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
                        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" >
                            <thead>
                            <tr role="row">
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>                              
                              <th>Date Created</th>
                              <th>Last Login</th>   
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                            <tr role="row">
                              <td><a href="{{ route('user-mgmt.show', ['id' => $user->id]) }}">{{ $user->firstname }} {{ $user->lastname }}</a></td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>                              
                              <td>{{ $user->created_at }}</td>
                              <td>{{ $user->updated_at }}</td>                                 
                            </tr>
                            @endforeach                            
                          </tbody>
                            <tfoot>
                                
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