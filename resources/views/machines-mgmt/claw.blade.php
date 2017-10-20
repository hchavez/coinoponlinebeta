
@extends('layouts.appmachine-left-template')

@section('content')

<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Claw Settings</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" action="{{ route('machine-management.update', ['id' => $machine->machine_id]) }}">

                    <div class="row row-lg">

                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-lg-6">
                            <div class="example-wrap m-md-0">

                                <div class="example">

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Max Voltage: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="max_voltage"  value="{{ $machine->max_voltage }}">
                                            @if ($errors->has('max_voltage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('max_voltage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 

                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Min Voltage: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="min_voltage"  value="{{ $machine->min_voltage }}">
                                            @if ($errors->has('min_voltage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('min_voltage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Max PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="max_PWM" value="{{ $machine->max_PWM }}">
                                            @if ($errors->has('max_PWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('max_PWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Min PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="min_PWM" value="{{ $machine->min_PWM }}">
                                            @if ($errors->has('min_PWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('min_PWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">voltDecRetPercentage: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="max_PWM" value="{{ $machine->voltDecRetPercentage }}">
                                            @if ($errors->has('voltDecRetPercentage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('voltDecRetPercentage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Latest Voltage: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="latest_voltage" value="{{ $machine->latest_voltage }}">
                                            @if ($errors->has('latest_voltage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('latest_voltage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Latest PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="latest_PWM" value="{{ $machine->latest_PWM }}">
                                            @if ($errors->has('latest_PWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('latest_PWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Plus Pick: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="plusPick" value="{{ $machine->plusPick }}">
                                            @if ($errors->has('plusPick'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('plusPick') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Plus PickUp PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="plusPickUpPWM" value="{{ $machine->plusPickUpPWM }}">
                                            @if ($errors->has('plusPickUpPWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('plusPickUpPWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Start PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="startPWM" value="{{ $machine->startPWM }}">
                                            @if ($errors->has('startPWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('startPWM') }}</strong>
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
                                        <label class="col-md-3 form-control-label">Start Volt: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="startVolt" value="{{ $machine->startVolt }}">
                                            @if ($errors->has('startVolt'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('startVolt') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Ret PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="startVolt" value="{{ $machine->retPWM }}">
                                            @if ($errors->has('retPWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('retPWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                        <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Ret Volt: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="retVolt" value="{{ $machine->retVolt }}">
                                            @if ($errors->has('retVolt'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('retVolt') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                      <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Pick PWM: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pickPWM" value="{{ $machine->pickPWM }}">
                                            @if ($errors->has('pickPWM'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pickPWM') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Pick Volt: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pickVolt" value="{{ $machine->pickVolt }}">
                                            @if ($errors->has('pickVolt'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pickVolt') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Inc Volt: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pickPWM" value="{{ $machine->incVolt }}">
                                            @if ($errors->has('incVolt'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('incVolt') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Dec Volt: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pickPWM" value="{{ $machine->decVolt }}">
                                            @if ($errors->has('decVolt'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('decVolt') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Diff PickRet: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="diffPickRet" value="{{ $machine->diffPickRet }}">
                                            @if ($errors->has('diffPickRet'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('diffPickRet') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Volt Supply: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="voltSupply" value="{{ $machine->voltSupply }}">
                                            @if ($errors->has('voltSupply'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('voltSupply') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Insufficient Volt Inc: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="insuffVoltInc" value="{{ $machine->insuffVoltInc }}">
                                            @if ($errors->has('insuffVoltInc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('insuffVoltInc') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                             
                        </div>


                            <div class="col-md-9 offset-md-5">
                                <button type="button" class="btn btn-primary">Update Claw Settings </button>

                            </div>
                       

                    </div>
                </form>
                
            </div>
        </div>
    </div>    
</div>


@endsection