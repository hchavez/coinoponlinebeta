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
                          <th>Role</th><td><?php echo $currentRole; ?></td>
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

</div>    
@endsection