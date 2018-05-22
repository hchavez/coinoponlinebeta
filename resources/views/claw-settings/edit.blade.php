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
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new machine claw settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Claw Settings Details</h3>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('claw-settings.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>


                                <div class="form-group{{ $errors->has('max_voltage') ? ' has-error' : '' }}">
                                    <label for="max_voltage" class="col-md-4 control-label">Max Voltage</label>

                                    <div class="col-md-6">
                                        <input id="max_voltage" type="text" class="form-control" name="max_voltage" value="{{ $machine->max_voltage }}"   autofocus>

                                        @if ($errors->has('max_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('max_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                               
                                <div class="form-group{{ $errors->has('min_voltage') ? ' has-error' : '' }}">
                                    <label for="min_voltage" class="col-md-4 control-label">Min Voltage</label>

                                    <div class="col-md-6">
                                        <input id="min_voltage" type="text" class="form-control" name="min_voltage" value="{{ $machine->min_voltage }}"   autofocus>

                                        @if ($errors->has('max_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('max_PWM') ? ' has-error' : '' }}">
                                    <label for="max_PWM" class="col-md-4 control-label">Max PWM</label>

                                    <div class="col-md-6">
                                        <input id="max_PWM" type="text" class="form-control" name="max_PWM" value="{{ $machine->max_PWM }}"   autofocus>

                                        @if ($errors->has('max_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('max_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('min_PWM') ? ' has-error' : '' }}">
                                    <label for="min_PWM" class="col-md-4 control-label">Min PWM</label>

                                    <div class="col-md-6">
                                        <input id="min_PWM" type="text" class="form-control" name="min_PWM" value="{{ $machine->min_PWM }}"   autofocus>

                                        @if ($errors->has('min_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('voltDecRetPercentage') ? ' has-error' : '' }}">
                                    <label for="voltDecRetPercentage" class="col-md-4 control-label">Volt Dec Ret Percentage</label>

                                    <div class="col-md-6">
                                        <input id="voltDecRetPercentage" type="text" class="form-control" name="voltDecRetPercentage" value="{{ $machine->voltDecRetPercentage }}"   autofocus>

                                        @if ($errors->has('voltDecRetPercentage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voltDecRetPercentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              
                                <div class="form-group{{ $errors->has('plusPick') ? ' has-error' : '' }}">
                                    <label for="plusPick" class="col-md-4 control-label">Plus Pick</label>

                                    <div class="col-md-6">
                                        <input id="plusPick" type="text" class="form-control" name="plusPick" value="{{ $machine->plusPick }}"   autofocus>

                                        @if ($errors->has('plusPick'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plusPick') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            
                           
                                <!--
                                <div class="form-group{{ $errors->has('pickUpLoLimitPWM') ? ' has-error' : '' }}">
                                    <label for="pickUpLoLimitPWM" class="col-md-4 control-label">pickUpLoLimitPWM</label>

                                    <div class="col-md-6">
                                        <input id="pickUpLoLimitPWM" type="text" class="form-control" name="pickUpLoLimitPWM" value="{{ $machine->pickUpLoLimitPWM }}"   autofocus>

                                        @if ($errors->has('pickUpLoLimitPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pickUpLoLimitPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->
                                
                                <div class="form-group{{ $errors->has('incVolt') ? ' has-error' : '' }}">
                                    <label for="incVolt" class="col-md-4 control-label">Inc Volt</label>

                                    <div class="col-md-6">
                                        <input id="incVolt" type="text" class="form-control" name="incVolt" value="{{ $machine->incVolt }}"   autofocus>

                                        @if ($errors->has('incVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('incVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('decVolt') ? ' has-error' : '' }}">
                                    <label for="decVolt" class="col-md-4 control-label">Dec Volt</label>
                                    <div class="col-md-6">
                                        <input id="decVolt" type="text" class="form-control" name="decVolt" value="{{ $machine->decVolt }}"   autofocus>
                                        @if ($errors->has('decVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('decVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--
                                <div class="form-group{{ $errors->has('diffPickRet') ? ' has-error' : '' }}">
                                    <label for="diffPickRet" class="col-md-4 control-label">diffPickRet</label>
                                    <div class="col-md-6">
                                        <input id="diffPickRet" type="text" class="form-control" name="diffPickRet" value="{{ $machine->diffPickRet }}"   autofocus>
                                        @if ($errors->has('diffPickRet'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('diffPickRet') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->
                              
                                <div class="form-group{{ $errors->has('voltSupply ') ? ' has-error' : '' }}">
                                    <label for="incVolt" class="col-md-4 control-label">Volt Supply </label>
                                    <div class="col-md-6">
                                        <input id="voltSupply" type="text" class="form-control" name="voltSupply" value="{{ $machine->voltSupply  }}"  autofocus>
                                        @if ($errors->has('voltSupply '))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voltSupply ') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('insuffVoltInc') ? ' has-error' : '' }}">
                                    <label for="insuffVoltInc" class="col-md-4 control-label">Insufficient Volt Inc </label>
                                    <div class="col-md-6">
                                        <input id="insuffVoltInc" type="text" class="form-control" name="insuffVoltInc" value="{{ $machine->insuffVoltInc }}"   autofocus>
                                        @if ($errors->has('insuffVoltInc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('insuffVoltInc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('voltReso') ? ' has-error' : '' }}">
                                    <label for="voltReso" class="col-md-4 control-label">Volt Reso </label>

                                    <div class="col-md-6">
                                        <input id="voltReso" type="text" class="form-control" name="voltReso" value="{{ $machine->voltReso }}"   autofocus>

                                        @if ($errors->has('voltReso'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voltReso') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                  <div class="form-group{{ $errors->has('latest_voltage') ? ' has-error' : '' }}">
                                    <label for="latest_voltage" class="col-md-4 control-label">Latest Voltage</label>

                                    <div class="col-md-6">
                                        <input id="latest_voltage" type="text" class="form-control" disabled="disabled" name="latest_voltage" value="{{ $machine->latest_voltage }}"   autofocus>

                                        @if ($errors->has('latest_voltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('latest_voltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('latest_PWM') ? ' has-error' : '' }}">
                                    <label for="latest_PWM" class="col-md-4 control-label">Latest PWM</label>

                                    <div class="col-md-6">
                                        <input id="latest_PWM" type="text" class="form-control" disabled="disabled" name="latest_PWM" value="{{ $machine->latest_PWM }}"   autofocus>

                                        @if ($errors->has('latest_PWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('latest_PWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('retPWM') ? ' has-error' : '' }}">
                                    <label for="retPWM" class="col-md-4 control-label">Ret PWM</label>

                                    <div class="col-md-6">
                                        <input id="retPWM" type="text" class="form-control" disabled="disabled" name="retPWM" value="{{ $machine->retPWM }}"   autofocus>

                                        @if ($errors->has('retPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('retPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('retVolt') ? ' has-error' : '' }}">
                                    <label for="retVolt" class="col-md-4 control-label">Ret Volt</label>

                                    <div class="col-md-6">
                                        <input id="retVolt" type="text" class="form-control" disabled="disabled" name="retVolt" value="{{ $machine->retVolt }}"   autofocus>

                                        @if ($errors->has('retVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('retVolt') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pickPWM') ? ' has-error' : '' }}">
                                    <label for="pickPWM" class="col-md-4 control-label">Pick PWM</label>

                                    <div class="col-md-6">
                                        <input id="pickPWM" type="text" class="form-control" disabled="disabled" name="pickPWM" value="{{ $machine->pickPWM }}"   autofocus>

                                        @if ($errors->has('pickPWM'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pickPWM') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pickVolt') ? ' has-error' : '' }}">
                                    <label for="pickVolt" class="col-md-4 control-label">Pick Volt</label>

                                    <div class="col-md-6">
                                        <input id="pickVolt" type="text" class="form-control" disabled="disabled" name="pickVolt" value="{{ $machine->pickVolt }}"   autofocus>

                                        @if ($errors->has('pickVolt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pickVolt') }}</strong>
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
