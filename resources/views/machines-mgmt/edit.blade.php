


@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">
    <div class="page-content">



        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Machine Information</h3>
            </div>
            <div class="panel-body">
                 <form class="form-horizontal fv-form fv-form-bootstrap4" role="form" method="POST" action="{{ route('machine-management.update', ['id' => $machine->machine_id]) }}">

                 <?php if (Session::has('success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo Session::get('success', ''); ?>
                            </div>
                        <?php endif; ?>
                <div class="row row-lg">

                    <div class="col-lg-6">
                        <!-- Example Basic Constraints -->
                       
                        <div class="example-wrap m-md-0">
                            <h4 class="example-title"></h4>
                            <div class="example">                                

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
                                    
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Category</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="category">
                                                
                                            <option {{ $machine->category == "cardreader" ? 'selected' : '' }} value="cardreader">cardreader</option>
                                            <option {{ $machine->category == "george system" ? 'selected' : '' }} value="george system">george systems</option>
                                            <option {{ $machine->category == "george system and cardreader" ? 'selected' : '' }} value="george system and cardreader">both</option>
                                            
                                            </select>

                                        </div>
                                    </div>
                                    
                                    <div class="form-group row{{ $errors->has('version') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Version</label>
                                        <div class="col-md-9">
                                            <input id="version" type="text" class="form-control" name="version" value="{{ $machine->version }}" required>

                                            @if ($errors->has('version'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('version') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row{{ $errors->has('activation_date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Activation Date</label>
                                        <div class="col-md-9">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type="text" name="activation_date" value="{{$machine->activation_date}}" class="form-control" data-plugin="datepicker">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        @if ($errors->has('activation_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('activation_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    </div>

                                    <div class="form-group row{{ $errors->has('teamviewer') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Teamviewer ID</label>
                                        <div class="col-md-9">
                                            <input id="teamviewer" type="text" class="form-control" name="teamviewer" value="{{ $machine->teamviewer }}" required>

                                            @if ($errors->has('teamviewer'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('teamviewer') }}</strong>
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
                                    
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Status</label>
                                        <div class="col-md-9">

                                            <select class="form-control" name="status">
                                             
                                                <option {{ $machine->status == "1" ? 'selected' : ''}} value="1"> Online</option>
                                                <option {{ $machine->status == "0" ? 'selected' : ''}} value="0"> Offline </option>
                                                <option {{ $machine->status == "2" ? 'selected' : ''}} value="2"> Warehouse </option>
                                            </select>

                                        </div>
                                    </div>

                                
                                   
                            </div>
                        </div>
                        <!-- End Example Basic Constraints -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Example Type -->
                        <div class="example-wrap">
                            <h4 class="example-title"></h4>
                            <div class="example">
                                    
                                   <div class="form-group row{{ $errors->has('carrier') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Carrier</label>
                                        <div class="col-md-9">
                                            <input id="carrier" type="text" class="form-control" name="carrier" value="{{ $machine->carrier }}" >

                                            @if ($errors->has('carrier'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('carrier') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="form-group row{{ $errors->has('franchisee') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Franchisee</label>
                                        <div class="col-md-9">
                                            <input id="franchisee" type="text" class="form-control" name="franchisee" value="{{ $machine->franchisee }}" >

                                            @if ($errors->has('area'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('franchisee') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Route</label>
                                        <div class="col-md-9">
                                         

                                           @if ($machine->m_route)
                                                <input id="route" type="text" class="form-control" name="route" value="{{ $machine->m_route }}" >
                                           @else
                                             <input id="route" type="text" class="form-control" name="route" value="{{ $machine->route }}" >
                                           @endif
                                        </div>
                                    </div>
                                
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Area</label>
                                        <div class="col-md-9">

                                             @if ($machine->m_area)
                                                <input id="area" type="text" class="form-control" name="area" value="{{ $machine->m_area }}" >
                                           @else
                                             <input id="area" type="text" class="form-control" name="area" value="{{ $machine->area }}" >
                                           @endif
                                        </div>
                                    </div>
                                
                                 <div class="form-group row{{ $errors->has('sitegroup') ? ' has-error' : '' }}">
                                        <label class="col-md-3 form-control-label">Site Group</label>
                                        <div class="col-md-9">
                                            <input id="sitegroup" type="text" class="form-control" name="sitegroup" value="{{ $machine->sitegroup }}" >

                                            @if ($errors->has('sitegroup'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sitegroup') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                
                                
                                     






                                
                            </div>
                        </div>
                        <!-- End Example Type -->
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


    </div>
</div>

@endsection
