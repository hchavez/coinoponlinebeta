@extends('layouts.appmachine-left-template')
@section('content')


<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Game Settings</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-model.update', ['id' => $machine->machine_id]) }}">

                    <div class="row row-lg">

                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-lg-6">
                            <!-- Example Basic Constraints -->
                            <div class="example-wrap m-md-0">

                                <div class="example">

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Play Index: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="playIndex"  value="{{ $machine->playIndex }}">
                                            @if ($errors->has('playIndex'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('playIndex') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Owed Win: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="owedWin" value="{{ $machine->owedWin }}">
                                            @if ($errors->has('owedWin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('owedWin') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Excess Win: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="excessWin" value="{{ $machine->excessWin }}">
                                            @if ($errors->has('excessWin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('excessWin') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Prev Ewin: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="prevEwin" value="{{ $machine->prevEwin }}">
                                            @if ($errors->has('prevEwin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('prevEwin') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- End Example Basic Constraints -->
                        </div>



                        <div class="col-lg-6">
                            <!-- Example Type -->
                            <div class="example-wrap">

                                <div class="example">


                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Lucky To Win: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="luckyToWin" value="{{ $machine->luckyToWin }}">
                                            @if ($errors->has('luckyToWin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('luckyToWin') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Game Left: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="gameLeft" value="{{ $machine->gameLeft }}">
                                            @if ($errors->has('gameLeft'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gameLeft') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Randomed Time: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="randomedTime" value="{{ $machine->randomedTime }}">
                                            @if ($errors->has('randomedTime'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('randomedTime') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Game Time: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="gameTime" value="{{ $machine->gameTime }}">
                                            @if ($errors->has('gameTime'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gameTime') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- End Example Type -->
                        </div>


                        <div class="col-md-9 offset-md-5">
                            <button type="button" class="btn btn-primary">Update Game Settings </button>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


@endsection