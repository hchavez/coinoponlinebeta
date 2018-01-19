@extends('layouts.app-left-profile-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add New User</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                    <div class="row"><div class="col-sm-8">
                        <form class="" id="exampleStandardForm" role="form" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">                                 
                                {{ csrf_field() }}

                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname"/>
                                </div>
                                <div class="col-md-3"></div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname"/>
                                </div>
                                <div class="col-md-3"></div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">Username</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username"/>
                                </div>
                                <div class="col-md-3"></div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="{{ $pass }}" value="{{ $pass }}"/>
                                </div>
                                <div class="col-md-3"></div>
                                </div>
                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email"/>
                                </div>
                                <div class="col-md-3"></div>
                                </div>


                                <div class="form-group row">
                                <label class="col-md-3 form-control-label">User Role</label>
                                <div class="col-md-6">
                                    <div class="bootstrap-select show-tick">
                                        <select class="form-control form-control-sm" name="user_role">
                                            <option value="">Select</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Manager">Manager</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                </div>



                                <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="validateButton2">Add User</button>
                                </div>
                            </form>
                        </div></div>


                </div>


            </div>
        </div>
    </div>
</div>

@endsection