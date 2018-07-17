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
                            <th>Name</th><td><?php echo $userDetails[0]['firstname'] ." ". $userDetails[0]['lastname']; ?></td>          
                          </tr>
                          <tr>
                            <th>Username</th><td><?php echo $userDetails[0]['username']; ?></td>
                          </tr>
                          <tr>
                            <th>Email</th><td><?php echo $userDetails[0]['email']; ?></td>
                          </tr>
                          <tr>
                            <th>Role</th><td><?php echo $userGroup; ?></td>
                          </tr>          
                        </table>                          
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