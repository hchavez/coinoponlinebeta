@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Claw Settings Details</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-settings.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group{{ $errors->has('max_voltage') ? ' has-error' : '' }}">
                                    <label for="max_voltage" class="col-md-4 control-label">max_voltage</label>

                                    <div class="col-md-6">
                                        <input id="max_voltage" type="text" class="form-control" name="max_voltage" value="{{ $machine->max_voltage }}" required autofocus>

                                        @if ($errors->has('max_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('max_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                               
                                <div class="form-group{{ $errors->has('min_voltage') ? ' has-error' : '' }}">
                                    <label for="min_voltage" class="col-md-4 control-label">min_voltage</label>

                                    <div class="col-md-6">
                                        <input id="min_voltage" type="text" class="form-control" name="min_voltage" value="{{ $machine->min_voltage }}" required autofocus>

                                        @if ($errors->has('max_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('max_PWM') ? ' has-error' : '' }}">
                                    <label for="max_PWM" class="col-md-4 control-label">max_PWM</label>

                                    <div class="col-md-6">
                                        <input id="max_PWM" type="text" class="form-control" name="max_PWM" value="{{ $machine->max_PWM }}" required autofocus>

                                        @if ($errors->has('max_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('max_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('min_PWM') ? ' has-error' : '' }}">
                                    <label for="min_PWM" class="col-md-4 control-label">min_PWM</label>

                                    <div class="col-md-6">
                                        <input id="min_PWM" type="text" class="form-control" name="min_PWM" value="{{ $machine->min_PWM }}" required autofocus>

                                        @if ($errors->has('min_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('voltDecRetPercentage') ? ' has-error' : '' }}">
                                    <label for="voltDecRetPercentage" class="col-md-4 control-label">voltDecRetPercentage</label>

                                    <div class="col-md-6">
                                        <input id="voltDecRetPercentage" type="text" class="form-control" name="voltDecRetPercentage" value="{{ $machine->voltDecRetPercentage }}" required autofocus>

                                        @if ($errors->has('voltDecRetPercentage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voltDecRetPercentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('latest_voltage') ? ' has-error' : '' }}">
                                    <label for="latest_voltage" class="col-md-4 control-label">latest_voltage</label>

                                    <div class="col-md-6">
                                        <input id="latest_voltage" type="text" class="form-control" name="latest_voltage" value="{{ $machine->latest_voltage }}" required autofocus>

                                        @if ($errors->has('latest_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('latest_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('latest_PWM') ? ' has-error' : '' }}">
                                    <label for="latest_PWM" class="col-md-4 control-label">latest_PWM</label>

                                    <div class="col-md-6">
                                        <input id="latest_PWM" type="text" class="form-control" name="latest_PWM" value="{{ $machine->latest_PWM }}" required autofocus>

                                        @if ($errors->has('latest_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('latest_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('plusPick') ? ' has-error' : '' }}">
                                    <label for="plusPick" class="col-md-4 control-label">plusPick</label>

                                    <div class="col-md-6">
                                        <input id="plusPick" type="text" class="form-control" name="plusPick" value="{{ $machine->plusPick }}" required autofocus>

                                        @if ($errors->has('plusPick'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plusPick') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('plusPickUpPWM') ? ' has-error' : '' }}">
                                    <label for="plusPickUpPWM" class="col-md-4 control-label">plusPickUpPWM</label>

                                    <div class="col-md-6">
                                        <input id="plusPickUpPWM" type="text" class="form-control" name="plusPickUpPWM" value="{{ $machine->plusPickUpPWM }}" required autofocus>

                                        @if ($errors->has('plusPickUpPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plusPickUpPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('startPWM') ? ' has-error' : '' }}">
                                    <label for="startPWM" class="col-md-4 control-label">startPWM</label>

                                    <div class="col-md-6">
                                        <input id="startPWM" type="text" class="form-control" name="startPWM" value="{{ $machine->startPWM }}" required autofocus>

                                        @if ($errors->has('startPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('startPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('startVolt') ? ' has-error' : '' }}">
                                    <label for="startVolt" class="col-md-4 control-label">startVolt</label>

                                    <div class="col-md-6">
                                        <input id="startVolt" type="text" class="form-control" name="startVolt" value="{{ $machine->startVolt }}" required autofocus>

                                        @if ($errors->has('startVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('startVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('retPWM') ? ' has-error' : '' }}">
                                    <label for="retPWM" class="col-md-4 control-label">retPWM</label>

                                    <div class="col-md-6">
                                        <input id="retPWM" type="text" class="form-control" name="retPWM" value="{{ $machine->retPWM }}" required autofocus>

                                        @if ($errors->has('retPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('retPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('retVolt') ? ' has-error' : '' }}">
                                    <label for="retVolt" class="col-md-4 control-label">retVolt</label>

                                    <div class="col-md-6">
                                        <input id="retVolt" type="text" class="form-control" name="retVolt" value="{{ $machine->retVolt }}" required autofocus>

                                        @if ($errors->has('retVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('retVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pickPWM') ? ' has-error' : '' }}">
                                    <label for="pickPWM" class="col-md-4 control-label">pickPWM</label>

                                    <div class="col-md-6">
                                        <input id="pickPWM" type="text" class="form-control" name="pickPWM" value="{{ $machine->pickPWM }}" required autofocus>

                                        @if ($errors->has('pickPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pickPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pickVolt') ? ' has-error' : '' }}">
                                    <label for="pickVolt" class="col-md-4 control-label">pickVolt</label>

                                    <div class="col-md-6">
                                        <input id="pickVolt" type="text" class="form-control" name="pickVolt" value="{{ $machine->pickVolt }}" required autofocus>

                                        @if ($errors->has('pickVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pickVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('incVolt') ? ' has-error' : '' }}">
                                    <label for="incVolt" class="col-md-4 control-label">incVolt</label>

                                    <div class="col-md-6">
                                        <input id="incVolt" type="text" class="form-control" name="incVolt" value="{{ $machine->incVolt }}" required autofocus>

                                        @if ($errors->has('incVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('incVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('decVolt') ? ' has-error' : '' }}">
                                    <label for="decVolt" class="col-md-4 control-label">decVolt</label>

                                    <div class="col-md-6">
                                        <input id="decVolt" type="text" class="form-control" name="decVolt" value="{{ $machine->decVolt }}" required autofocus>

                                        @if ($errors->has('decVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('decVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('diffPickRet') ? ' has-error' : '' }}">
                                    <label for="diffPickRet" class="col-md-4 control-label">diffPickRet</label>

                                    <div class="col-md-6">
                                        <input id="diffPickRet" type="text" class="form-control" name="diffPickRet " value="{{ $machine->diffPickRet }}" required autofocus>

                                        @if ($errors->has('diffPickRet'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('diffPickRet') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              
                                <div class="form-group{{ $errors->has('voltSupply ') ? ' has-error' : '' }}">
                                    <label for="incVolt" class="col-md-4 control-label">voltSupply </label>

                                    <div class="col-md-6">
                                        <input id="voltSupply " type="text" class="form-control" name="voltSupply " value="{{ $machine->voltSupply  }}" required autofocus>

                                        @if ($errors->has('voltSupply '))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voltSupply ') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('insuffVoltInc') ? ' has-error' : '' }}">
                                    <label for="insuffVoltInc" class="col-md-4 control-label">insuffVoltInc </label>

                                    <div class="col-md-6">
                                        <input id="insuffVoltInc" type="text" class="form-control" name="insuffVoltInc" value="{{ $machine->insuffVoltInc }}" required autofocus>

                                        @if ($errors->has('insuffVoltInc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('insuffVoltInc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>





                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Claw Settings
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
