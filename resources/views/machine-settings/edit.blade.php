@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            
             <?php if($machine->status == '0'): ?>
             <div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-info" aria-hidden="true"></i> 
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new machine settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Machine Settings Details</h3>
            </div>
            
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo Session::get('success', ''); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-settings.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>
                                 
                             <div class="form-group{{ $errors->has('xSpeed') ? ' has-error' : '' }}">
                                    <label for="xSpeed" class="col-md-4 control-label">xSpeed</label>

                                    <div class="col-md-6">
                                        <input id="xSpeed" type="text" class="form-control" name="xSpeed" value="{{ $machine->xSpeed }}" required>

                                        @if ($errors->has('xSpeed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('xSpeed') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-group{{ $errors->has('ySpeed') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-4 control-label">ySpeed</label>

                                    <div class="col-md-6">
                                        <input id="ySpeed" type="text" class="form-control" name="ySpeed" value="{{ $machine->ySpeed }}" required>

                                        @if ($errors->has('ySpeed'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ySpeed') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                

                                <div class="form-group{{ $errors->has('zSpeed') ? ' has-error' : '' }}">
                                    <label for="zSpeed" class="col-md-4 control-label">zSpeed</label>

                                    <div class="col-md-6">
                                        <input id="zSpeed" type="text" class="form-control" name="zSpeed" value="{{ $machine->zSpeed }}" required>

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
                                            Update Machine Settings
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>


@endsection

        <!--                    <div class="row">
                                            <div class="col-sm-12">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-settings.update', ['id' => $machine->id]) }}">
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
                                        </div>-->
