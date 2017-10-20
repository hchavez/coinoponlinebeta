@extends('layouts.app-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add Machine Settings</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                    <div class="row"><div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-settings.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('xTime') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">xTime</label>

                                    <div class="col-md-6">
                                        <input id="xTime" type="text" class="form-control" name="xTime" value="{{ old('xTime') }}" required autofocus>

                                        @if ($errors->has('xTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('xTime') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('yTime') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">yTime</label>

                                    <div class="col-md-6">
                                        <input id="yTime" type="text" class="form-control" name="yTime" value="{{ old('yTime') }}" required autofocus>

                                        @if ($errors->has('yTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('yTime') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('xSpeed') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">xSpeed</label>

                                    <div class="col-md-6">
                                        <input id="xSpeed" type="text" class="form-control" name="xSpeed" value="{{ old('xSpeed') }}" required autofocus>

                                        @if ($errors->has('xSpeed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('xSpeed') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('ySpeed') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">ySpeed</label>

                                    <div class="col-md-6">
                                        <input id="ySpeed" type="text" class="form-control" name="ySpeed" value="{{ old('ySpeed') }}" required autofocus>

                                        @if ($errors->has('ySpeed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ySpeed') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                    
                              
                              <div class="form-group{{ $errors->has('zSpeed') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">zSpeed</label>

                                    <div class="col-md-6">
                                        <input id="zSpeed" type="text" class="form-control" name="zSpeed" value="{{ old('zSpeed') }}" required autofocus>

                                        @if ($errors->has('zSpeed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zSpeed') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div></div>


                </div>


            </div>
        </div>
    </div>
</div>

@endsection
