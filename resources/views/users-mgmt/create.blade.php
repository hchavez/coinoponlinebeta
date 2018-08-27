@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add New User</h3>
            </div>
            <div class="panel-body">
                
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <form name="myform" method="post" action="" style="width:100%;">
                        <input type="hidden" name="length" value="10">
                        <div class="col-sm-6">
                            
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                  <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                  <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                  <span class="input-group-addon">
                                    <span class="icon wb-user" aria-hidden="true"></span>
                                  </span>
                                  <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                  <span class="input-group-addon">
                                    <span class="icon wb-envelope" aria-hidden="true"></span>
                                  </span>
                                  <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="row_password" placeholder="Password">
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-outline" onClick="generate();">Generate Password</button>
                                  </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-sm-6">
                            <h4 class="example-title">Select User Role</h4>
                            <div class="form-group">
                                <select class="form-control" name="user_role">
                                    @foreach ($group as $role) 
                                    <option value="{{ $role->id }}" <?php echo ($currentRole->user_role == $role->id)? 'selected' : ''; ?>>{{ $role->users_group }}</option>
                                    @endforeach                                         
                                </select> 
                            </div>
                            <h4 class="example-title">User Status</h4>
                            <div class="form-group" style="width:20%;">
                                <div class="input-group">
                                    <div class="radio-custom radio-primary">
                                        <input type="radio" id="inputEnable" name="inputEnable" checked>
                                        <label for="inputRadiosUnchecked">Enable</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="radio-custom radio-primary">
                                        <input type="radio" id="inputPending" name="inputPending">
                                        <label for="inputRadiosUnchecked">Pending</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="radio-custom radio-primary">
                                        <input type="radio" id="inputDisable" name="inputDisable">
                                        <label for="inputRadiosUnchecked">Disable</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group" style="width:15%;">
                                <div class="input-group">
                                  <button type="button" class="btn btn-block btn-primary">Save New User</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
    myform.row_password.value = randomPassword(myform.length.value);
}
</script>

@endsection
