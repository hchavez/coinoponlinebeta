@extends('layouts.appmachine-left-template')
@section('content')


<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Info Settings</h3>
            </div>
            <div class="panel-body">
                @if ($message = Session::get('success'))    
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                    
                <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-management.updateinfo_settings', ['id' => $machine->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                    <div class="row row-lg">
                        <div class="col-lg-6">
                            <div class="example-wrap m-md-0">
                                <div class="example">
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">X Time: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="xTime"  value="{{ $machine->xTime }}">
                                            @if ($errors->has('xTime'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('xTime') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Y Time: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="yTime" value="{{ $machine->yTime }}">
                                            @if ($errors->has('yTime'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('yTime') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="example-wrap">
                                <div class="example">
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">X Speed: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="xSpeed" value="{{ $machine->xSpeed }}">
                                            @if ($errors->has('xSpeed'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('xSpeed') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Y Speed: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ySpeed" value="{{ $machine->ySpeed }}">
                                            @if ($errors->has('ySpeed'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ySpeed') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Z Speed: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="xSpeed" value="{{ $machine->xSpeed }}">
                                            @if ($errors->has('xSpeed'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('xSpeed') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 offset-md-5">
                            <button type="submit" class="btn btn-primary">Update Info Settings </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


@endsection