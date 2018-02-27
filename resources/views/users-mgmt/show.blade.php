@extends('layouts.app-left-template')
@section('content')

<div class="page-main">
    <ol class="breadcrumb breadcrumb-arrow">
        <li class="breadcrumb-item"><a href="{{ url('user-mgmt') }}"><i class="fa fa-dashboard"></i>Admin Panel</a></li>
        <?php $segments = ''; ?>
        @foreach(Request::segments() as $segment)
            @foreach ($users as $user) 
            <?php 
            $user = ($segment == $user->id)? $user->firstname.' '.$user->lastname : '';
            $segmentLabel = ($segment == 'user-mgmt')? 'User Management' : $user;
            $segments .= '/'.$segmentLabel;         
            ?>
            @endforeach
            <li class="breadcrumb-item">
              <a href="{{ url('user-mgmt') }}">{{$segmentLabel}}</a>
            </li>
        @endforeach
    </ol> 
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
                                                <span class="badge badge-<?php echo $userBadge; ?>"><?php echo $groupSelected; ?></span>
                                            </td></tr>
                                        <tr><td><b>Date Created</b></td><td>{{ $user->created_at }} </td></tr>
                                        <tr><td><b>Status</b></td><td>{{ $user->status }}</td></tr>
                                    @endforeach                                      
                                </tbody>
                              </table>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12"> 
                        <h4 class="example-title">User Permission</h4>  
                        <?php if (Session::has('success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo Session::get('success', ''); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <form role="form" method="POST" action="{{ route('user-mgmt.set_permission', ['id' => $user->id]) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-control-label">Set Permission</label>                                
                                    <div>
                                        @foreach ($role as $user)                                      
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="role_superAdmin" name="inputRole" {{ $user->user_group == $groupSelected ? "checked" : "" }} value="{{ $user->id }}"/>
                                            <label for="inputBasicMale">{{ $user->user_group }}</label>
                                        </div>
                                        @endforeach                                          
                                    </div>   
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Role</button>
                                </div>
                            </form>
                      </div>
                    </div>
                </div>
            </div>                
        </div--> 
        
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12"> 
                        <h4 class="example-title">User Logs/History</h4>  
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Last Signed in</th>
                                  <th>Log out</th>                                  
                                  <th>Hours Spent</th>                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><span class="text-muted"><i class="wb wb-time"></i> 2018-01-11 08:32:34</span></td>
                                  <td>2018-02-02 01:15:22 </td>
                                  <td>
                                    <span class="badge badge-outline badge-success">Online</span>
                                  </td>                                  
                                </tr>
                                <tr>
                                  <td><span class="text-muted"><i class="wb wb-time"></i> 2018-01-10 07:57:35</span></td>
                                  <td>2018-02-02 01:15:22 </td>
                                  <td>
                                    2hrs
                                  </td>                                  
                                </tr>
                                <tr>
                                  <td><span class="text-muted"><i class="wb wb-time"></i> 2018-01-10 07:37:29</span></td>
                                  <td>2018-02-02 01:15:22 </td>
                                  <td>
                                    1hr
                                  </td>                                  
                                </tr>
                                <tr>
                                  <td><span class="text-muted"><i class="wb wb-time"></i> 2017-03-25 10:43:48</span></td>
                                  <td>2018-02-02 01:15:22 </td>
                                  <td>
                                    2.5hrs
                                  </td>
                                  
                                </tr>
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