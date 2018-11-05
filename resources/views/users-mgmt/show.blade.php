@extends('layouts.app-template')
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
                        <div class="col-sm-5"> 
                            <h4 class="example-title">User Details</h4>                               
                            <div class="example table-responsive">
                              <table class="table table-bordered text-left">                                    
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
                        
                        <div class="col-sm-3">     
                            <div id="success_msg">
                                @if(session()->has('message'))
                                    <div class="alert dark alert-success alert-dismissible" role="alert">{{ session()->get('message') }}</div>
                                @endif
                            </div>
                            <h4 class="example-title">Update user type</h4>                            
                            <p>Select user role</p>
                            <div class="example table-responsive">
                                <form role="form" method="GET" action="{{ url('set_permission') }}">
                                    @foreach ($users as $user) <input type="hidden" value="{{ $user->id }}" name="user_id"> @endforeach 
                                    <div class="col-sm-8">
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
                        
                        <div class="col-sm-4">
                            <div id="success_msg">
                                @if(session()->has('message'))
                                    <div class="alert dark alert-success alert-dismissible" role="alert">{{ session()->get('message') }}</div>
                                @endif
                            </div>
                            <a href="{{ url('user-mgmt') }}">
                                <button type="button" class="btn btn-deault ladda-button" style="float:right;" data-style="slide-right" data-plugin="ladda">
                                    <span class="ladda-label">Users<i class="icon wb-arrow-right ml-10" aria-hidden="true"></i></span>
                                <span class="ladda-spinner"></span></button>         
                            </a>                            
                            <h4 class="example-title">STATUS</h4>    
                            <?php if($status[0]['status']=='1'): ?>
                                <button type="button" class="btn btn-success"><i class="icon wb-thumb-up" aria-hidden="true"></i>Active</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-danger"><i class="icon wb-thumb-down" aria-hidden="true"></i>Disabled</button>
                            <?php endif; ?>
                            
                            <hr>
                            <div class="example-wrap">
                                <p>Update user status &nbsp; <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit Status">
                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                  </button></p>
                                <form role="form" method="GET" action="{{ url('update_status') }}">
                                    <input type="hidden" value="<?php echo $status[0]['user_id']; ?>" name="user_id">
                                    <div class="radio-custom radio-primary">
                                      <input type="radio" id="inputRadiosUnchecked" name="status" value="1" <?php echo ($status[0]['status']=='1')? 'checked' : ''; ?> >
                                      <label for="inputRadiosUnchecked">Enable</label>
                                    </div>
                                    <div class="radio-custom radio-primary">
                                        <input type="radio" id="inputRadiosChecked" name="status" value="0" <?php echo ($status[0]['status']!='1')? 'checked' : ''; ?> >
                                      <label for="inputRadiosChecked">Disable</label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary" style="width:15%;">SAVE</button>
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
                        <h4 class="example-title">Machine Restriction</h4>  
                        <div class="table-responsive">
                            <table class="table table-bordered text-left" data-plugin="dataTable">   
                                <thead>
                                    <tr>
                                        <th>Grant</th>
                                        <th>Machine Model</th>
                                        <th>Machine type</th>                                                             
                                        <th>Serial</th>                                                                  
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php //print_r($machines); ?>
                                    @foreach($machines as $key => $log)
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="inputcheckboxUnchecked" name="status[]" value="{{ $log->id }}" >
                                                <label for="inputCheckboxUnchecked"></label>
                                            </div>
                                        </td>
                                        <td>{{ $log->machine_model }}</td>
                                        <td>{{ $log->machine_type }}</td>                                        
                                        <td>{{ $log->serial_no }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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