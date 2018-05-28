@extends('layouts.app-left-template')
@section('content')

<div class="page-main">
<?php
$urole = ''; $color = '';
if($currentRole->user_role == '0'){ $urole = 'Super Admin'; $color = 'danger';}
if($currentRole->user_role == '1'){ $urole = 'Admin'; $color = 'warning';}
if($currentRole->user_role == '2'){ $urole = 'AMF Admin'; $color = 'info';}
if($currentRole->user_role == '3'){ $urole = 'Manager'; $color = 'success';}
if($currentRole->user_role == '4'){ $urole = 'Operator'; $color = 'primary';}
if($currentRole->user_role == '5'){ $urole = 'Service'; $color = 'dark';}
?>
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
                                    <?php //print_r($user); ?>
                                        <tr><td><b>Name</b></td><td>{{ $user->firstname }} {{ $user->lastname }}</td></tr>
                                        <tr><td><b>Username</b></td><td>{{ $user->username }}</td></tr>
                                        <tr><td><b>Email</b></td><td>{{ $user->email }}</td></tr>                                       
                                        <tr><td><b>Date Created</b></td><td>{{ $user->created_at }} </td></tr>                                        
                                    @endforeach                                  
                                    <tr><td><b>User Type</b></td><td><span class="badge badge-<?php echo $color; ?>"><?php echo $urole; ?></span> </td></tr>
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
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-7"> 
                            <div id="success_msg">
                                @if(session()->has('message'))
                                    <div class="alert dark alert-success alert-dismissible" role="alert">{{ session()->get('message') }}</div>
                                @endif
                            </div>
                            <h4 class="example-title">Update user role</h4>
                            <p>Select user role</p>
                            <div class="example table-responsive">
                                <form role="form" method="GET" action="{{ url('set_permission') }}">
                                    @foreach ($users as $user) <input type="hidden" value="{{ $user->id }}" name="user_id"> @endforeach 
                                    <div class="col-sm-4">
                                    <select class="form-control" name="user_role">
                                        @foreach ($group as $role) 
                                        <option value="{{ $role->id }}" <?php echo ($currentRole->user_role == $role->id)? 'selected' : ''; ?>>{{ $role->users_group }}</option>
                                        @endforeach                                         
                                      </select>   
                                    </div>
                                    <br>
                                    <div class="col-sm-3">
                                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                                    </div>
                                </form>
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
                            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Subject</th>
                                        <th>URL</th>                            
                                        <th>Ip Address</th>
                                        <th width="500px">User Agent</th>
                                        <th>Date</th>                            
                                    </tr>
                                </thead>
                            <tbody>
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
                            </tbody>
                            </table> 
                        </div>
                    </div>
                    
                </div>
            </div>                
        </div> 
        
    </div>    
</div>

@endsection