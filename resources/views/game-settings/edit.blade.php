@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
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
                                    <label for="xTime" class="col-md-4 control-label">playIndex</label>

                                    <div class="col-md-6">
                                        <input id="playIndex" type="text" class="form-control" name="playIndex" value="{{ $machine->playIndex }}" required autofocus>

                                        @if ($errors->has('playIndex'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('playIndex') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('owedWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">owedWin</label>

                                    <div class="col-md-6">
                                        <input id="owedWin" type="text" class="form-control" name="owedWin" value="{{ $machine->owedWin }}" required autofocus>

                                        @if ($errors->has('owedWin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('owedWin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('excessWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">excessWin</label>

                                    <div class="col-md-6">
                                        <input id="excessWin" type="text" class="form-control" name="excessWin" value="{{ $machine->excessWin }}" required autofocus>

                                        @if ($errors->has('excessWin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('excessWin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('prevEwin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">prevEwin</label>

                                    <div class="col-md-6">
                                        <input id="prevEwin" type="text" class="form-control" name="prevEwin" value="{{ $machine->prevEwin }}" required autofocus>

                                        @if ($errors->has('prevEwin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('prevEwin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('luckyToWin') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">luckyToWin</label>

                                    <div class="col-md-6">
                                        <input id="luckyToWin" type="text" class="form-control" name="luckyToWin" value="{{ $machine->luckyToWin }}" required autofocus>

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

                                <div class="form-group{{ $errors->has('gameTime') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">gameTime</label>

                                    <div class="col-md-6">
                                        <input id="gameTime" type="text" class="form-control" name="gameTime" value="{{ $machine->gameTime }}" required autofocus>

                                        @if ($errors->has('gameTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gameTime') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
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
