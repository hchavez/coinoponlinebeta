@extends('layouts.app-left-profile-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Profile</h3>
                <div class="page-header-actions">                  
                </div>
            </div>
            
            <div class="panel-body">               
              <div class="row">                
                
                <div class="col-sm-6">  
                    <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">  
                      <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
                        <tr>
                          <th>Name</th><td>{{ $fname }} {{ $lname }}</td>          
                        </tr>
                        <tr>
                          <th>Username</th><td>{{ $username }}</td>
                        </tr>
                        <tr>
                          <th>Email</th><td>{{ $email }}</td>
                        </tr>
                        <tr>
                          <th>Role</th><td>{{ $user_role }}</td>
                        </tr>          
                      </table>  
                        <!--a href="{{ route('profile.edit', ['id' => $user_id]) }}"><button type="submit" class="btn btn-primary">Update</button></a-->
                    </div>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </div>            
        </div>
    </div>
</div>

<!--div class="panel">
<header class="panel-heading">
    <h3 class="panel-title">List of users</h3>
</header>
<div class="panel-body">
    <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">  
        
        <div class="row"><div class="col-sm-12">    
        <table  class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
          <tr>
            <th><input type="text" class="form-control" name="fname" placeholder="Firstname" autocomplete="on"></th>
            <th><input type="text" class="form-control" name="lname" placeholder="Lastname" autocomplete="on"></th>
            <th><input type="text" class="form-control" name="usernmae" placeholder="Username" autocomplete="on"></th>
            <th><input type="text" class="form-control" name="Firstname" placeholder="Email" autocomplete="on"></th>
            <th><input type="text" class="form-control" name="Firstname" placeholder="Role" autocomplete="on"></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </table>
        <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
                      <thead>
                        <tr>                        
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Created</th>
                          <th>Updated</th>
                          <th>Status</th>
                          <th>Role</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $user)
                        <tr>                          
                          <td>{{ $user->firstname  }} </td>
                          <td>{{ $user->lastname  }}</td>
                          <td>{{ $user->username  }}</td>
                          <td> {{ $user->email  }}</td>
                          <td> {{ $user->created_at  }} </td> 
                          <td> {{ $user->updated_at  }} </td> 
                          <td> {{ $user->status  }} </td> 
                          <td>
                            <?php //$badge = '';  ?>   
                            @if (  $user->role   == 'Manager')
                                <?php//$badge = 'badge-warning'; ?>                  
                            @endif  
                            @if (  $user->role   == 'Super Admin')
                                <?php //$badge = 'badge-danger'; ?>                  
                            @endif    
                            @if (  $user->role   == 'User')
                                <?php //$badge = 'badge-success'; ?>                  
                            @endif                    
                            <span class="badge <?php //echo $badge; ?>">{{ $user->role  }}</span>
                          </td>
                          <td> 
                          <a href="{{ route('profile.edit', ['id' => $user->id]) }}">
                            <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Update">
                              <i class="icon wb-edit" aria-hidden="true"></i>
                            </button>
                          </a>
                          <a href="#">
                            <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete">
                              <i class="icon wb-trash" aria-hidden="true"></i>
                            </button>
                          </a>
                         
                          </td>
                        </tr>
                        @endforeach                        
                      </tbody>
                    </table>
        </div>

    </div>
</div-->

  

</div>    
@endsection