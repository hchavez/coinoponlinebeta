@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
             <?php if($machine->status == '2'): ?>
             <div class="alert dark alert-icon alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-info" aria-hidden="true"></i> 
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new machine game settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Game Settings Details</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <?php if (Session::has('success')): ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo Session::get('success', ''); ?>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('game-settings.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                                <div class="form-group{{ $errors->has('playIndex') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Play Index</label>

                                    <div class="col-md-6">
                                        <input id="playIndex" type="text" class="form-control" name="playIndex" value="{{ $machine->playIndex }}" required autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('playIndex'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('playIndex') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('owedWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Owed Win</label>

                                    <div class="col-md-6">
                                        <input id="owedWin" type="text" class="form-control" name="owedWin" value="{{ $machine->owedWin }}" required autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('owedWin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('owedWin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('excessWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Excess Win</label>

                                    <div class="col-md-6">
                                        <input id="excessWin" type="text" class="form-control" name="excessWin" value="{{ $machine->excessWin }}" required autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>> 

                                        @if ($errors->has('excessWin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('excessWin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('gameLeft') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">gameLeft</label>

                                    <div class="col-md-6">
                                        <input id="gameLeft" type="text" class="form-control" name="gameLeft" value="{{ $machine->gameLeft }}" required autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('gameLeft'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gameLeft') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('gameTime') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Game Time</label>

                                    <div class="col-md-6">
                                        <input id="gameTime" type="text" class="form-control" name="gameTime" value="{{ $machine->gameTime }}" required autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('gameTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gameTime') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('prevEwin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">PrevE win</label>

                                    <div class="col-md-6">
                                        <input id="prevEwin" type="text" class="form-control" disabled="disabled" name="prevEwin" value="{{ $machine->prevEwin }}" required autofocus>

                                        @if ($errors->has('prevEwin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prevEwin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('winGap') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Win Gap</label>

                                    <div class="col-md-6">
                                        <input id="winGap" type="text" class="form-control" disabled="disabled" name="winGap" value="{{ $machine->winGap }}" required autofocus>

                                        @if ($errors->has('winGap'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('winGap') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('prevEwin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Prev Win Index</label>

                                    <div class="col-md-6">
                                        <input id="prevWinIndex" type="text" class="form-control" disabled="disabled" name="prevWinIndex" value="{{ $machine->prevWinIndex }}" required autofocus>

                                        @if ($errors->has('prevWinIndex'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prevWinIndex') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('numberOfPlaysStayVoltage') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Number Of Plays Stay Voltage</label>

                                    <div class="col-md-6">
                                        <input id="numberOfPlaysStayVoltage" type="text" disabled="disabled" class="form-control" name="numberOfPlaysStayVoltage" value="{{ $machine->numberOfPlaysStayVoltage }}" required autofocus>

                                        @if ($errors->has('numberOfPlaysStayVoltage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('numberOfPlaysStayVoltage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                   
                                
                                <!--
                                <div class="form-group{{ $errors->has('luckyToWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Lucky To Win</label>

                                    <div class="col-md-6">
                                        <input id="luckyToWin" type="text" class="form-control"  name="luckyToWin" value="{{ $machine->luckyToWin }}" required autofocus>

                                        @if ($errors->has('luckyToWin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('luckyToWin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                  
                                <div class="form-group{{ $errors->has('gameLeft') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">gameLeft</label>

                                    <div class="col-md-6">
                                        <input id="gameLeft" type="text" class="form-control" name="gameLeft" value="{{ $machine->gameLeft }}" required autofocus>

                                        @if ($errors->has('gameLeft'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gameLeft') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('randomedTime') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">randomedTime</label>

                                    <div class="col-md-6">
                                        <input id="randomedTime" type="text" class="form-control" name="randomedTime" value="{{ $machine->randomedTime }}" required autofocus>

                                        @if ($errors->has('randomedTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('randomedTime') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            -->
                             


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>
                                            Update Game Settings
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
