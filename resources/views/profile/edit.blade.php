@extends('layouts.app-left-profile-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update user</h3>

                <div class="page-header-actions">
                  <a href="{{ url('profile') }}"><button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="User Lists">
                    <i class="icon wb-refresh" aria-hidden="true"></i>
                  </button></a>
                  <a href="{{ url('profile/create') }}">
                  <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Add New User">
                    <i class="icon wb-user-add" aria-hidden="true"></i>
                  </button></a>
                  <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="User Roles">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </button>
                </div>
            </div>
            
            <div class="panel-body">               
                <?php if (Session::has('success')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo Session::get('success', ''); ?>                                              
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" id="exampleStandardForm" role="form" method="POST" action="{{ route('profile.update', ['id' => $id]) }}">

                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">First Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="firstname" value="{{ $firstname }}" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Last Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="lastname" value="{{ $lastname }}" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Username</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="username" value="{{ $username }}" />
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="email" value="{{ $email }}"/>
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