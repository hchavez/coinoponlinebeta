@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">            
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12"> 
                            <h4 class="example-title">User Details</h4>                               
                            <div class="example table-responsive">
                              <table class="table">                                    
                                <tbody>
                                    @foreach ($users as $user)                                    
                                        <tr><td><b>Name</b></td><td>{{ $user->firstname }} {{ $user->lastname }}</td></tr>
                                        <tr><td><b>Username</b></td><td>{{ $user->username }}</td></tr>
                                        <tr><td><b>Email</b></td><td>{{ $user->email }}</td></tr>
                                        <tr><td><b>Role</b></td><td>  
                                                
                                            </td></tr>
                                        <tr><td><b>Date Created</b></td><td>{{ $user->created_at }} </td></tr>
                                        <tr><td><b>Status</b></td><td></td></tr>
                                    @endforeach                                      
                                </tbody>
                              </table>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12"> 
                        <h4 class="example-title">User Logs/History</h4>  
                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Subject</th>
                                <th>URL</th>                            
                                <th>Ip Address</th>
                                <th width="500px">User Agent</th>
                                <th>Date</th>                            
                            </tr>
                            @if($logs->count())
                            @foreach($logs as $key => $log)                           
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $log->username }}</td>
                                <td>{{ $log->subject }}</td>
                                <td class="text-success">{{ $log->url }}</td>                            
                                <td class="text-warning">{{ $log->ip }}</td>
                                <td class="text-danger">{{ $log->agent }}</td>
                                <td>{{ $log->updated_at }}</td>                            
                            </tr>                           
                            @endforeach
                            @endif
                            </table> 
                        </div>
                    </div>
                    <div class="col-sm-12"> 
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>                
        </div> 
        
    </div>    
</div>

@endsection