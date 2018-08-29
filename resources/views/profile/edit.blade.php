@extends('layouts.app-left-profile-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Profile Info</h3>
            </div>
            <div class="panel-body">    
                <?php if (Session::has('success')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo Session::get('success', ''); ?>                                              
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" id="exampleStandardForm" role="form" method="POST" action="{{ route('profile.update', ['id' => $user_id]) }}">

                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">First Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="firstname" value="<?php echo $userDetails[0]->firstname; ?>" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Last Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="lastname" value="<?php echo $userDetails[0]->lastname; ?>" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Username</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="username" value="<?php echo $userDetails[0]->username; ?>" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $userDetails[0]->email; ?>" readonly/>
                    </div>
                    <div class="col-md-3"></div>
                  </div>                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="validateButton2">Update</button>
                  </div>
                </form>
            </div>            
        </div>
    </div>
</div>

@endsection