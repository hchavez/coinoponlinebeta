


@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">
    <div class="page-content">



        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Machine Information</h3>
            </div>
            <div class="panel-body">
                <div class="row row-lg">

                    <div class="col-lg-6">
                        <!-- Example Basic Constraints -->
                        <?php if (Session::has('success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo Session::get('success', ''); ?>
                            </div>
                        <?php endif; ?>
                        <div class="example-wrap m-md-0">
                            <h4 class="example-title"></h4>
                            <div class="example">
                                <form class="form-horizontal fv-form fv-form-bootstrap4" role="form" method="POST" action="{{ route('machine-management.update', ['id' => $machine->machine_id]) }}">

                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Machine Type</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="machine_type">
                                                @foreach ($machine_types as $machine_type)
                                                <option {{ $machine->machine_type_id == $machine_type->id ? 'selected' : ''}} value="{{$machine_type->id}}">{{$machine_type->machine_type}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Machine Model</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="machine_model">
                                                @foreach ($machine_models as $machine_model)
                                                <option {{ $machine->machine_model_id == $machine_model->id ? 'selected' : ''}} value="{{$machine_model->id}}">{{$machine_model->machine_model}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Site</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="site">
                                                @foreach ($sites as $site)
                                                <option {{ $machine->site_id == $site->id ? 'selected' : ''}} value="{{$site->id}}">{{$site->site_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Theme</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="theme">
                                                @foreach ($themes as $theme)
                                                <option {{ $machine->machine_theme_id == $theme->id ? 'selected' : ''}} value="{{$theme->id}}">{{$theme->theme}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    


                                    <div class="form-group row{{ $errors->has('serial_no') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Serial</label>
                                        <div class="col-md-9">
                                            <input id="serial_no" type="text" class="form-control" name="serial_no" value="{{ $machine->serial_no }}" required>

                                            @if ($errors->has('serial_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('serial_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row{{ $errors->has('ip_address') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">IP Address</label>
                                        <div class="col-md-9">
                                            <input id="ip_address" type="text" class="form-control" name="ip_address" value="{{ $machine->ip_address }}" required>

                                            @if ($errors->has('ip_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ip_address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>  





                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Comments</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="comments" rows="4" cols="20" placeholder="Comments">{{ $machine->comments }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Descriptions</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="description" rows="4" cols="20" placeholder="description"> {{ $machine->machine_description }} </textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <center> <button type="submit" class="btn btn-primary">
                                                    Update Machine Info
                                                </button>
                                            </center>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- End Example Basic Constraints -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Example Type -->
                        <div class="example-wrap">
                            <h4 class="example-title"></h4>
                            <div class="example">

                            </div>
                        </div>
                        <!-- End Example Type -->
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
