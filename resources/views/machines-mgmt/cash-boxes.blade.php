@extends('layouts.appmachine-left-template')
@section('content')


<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Cash Boxes Settings</h3>
            </div>
            <div class="panel-body">
                
                <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-model.update', ['id' => $machine->machine_id]) }}">

                    <div class="row row-lg">

                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-lg-6">
                           
                            <div class="example-wrap m-md-0">

                                <div class="example">

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Coin1 Total In: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="coin1_total_in"  value="{{ $machine->coin1_total_in }}">
                                            @if ($errors->has('coin1_total_in'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coin1_total_in') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Coin2 Total In: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="coin2_total_in" value="{{ $machine->coin2_total_in }}">
                                            @if ($errors->has('coin2_total_in'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coin2_total_in') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Coin3 Total In: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="coin3_total_in" value="{{ $machine->coin3_total_in }}">
                                            @if ($errors->has('coin3_total_in'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coin3_total_in') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Coin4 Total In: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="coin4_total_in" value="{{ $machine->coin4_total_in }}">
                                            @if ($errors->has('coin4_total_in'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coin4_total_in') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Total game: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="total_game" value="{{ $machine->total_game }}">
                                            @if ($errors->has('total_game'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('total_game') }}</strong>
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
                                        <label class="col-md-3 form-control-label">Total test: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="total_test" value="{{ $machine->total_test }}">
                                            @if ($errors->has('total_test'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('total_test') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Insufficient MonPlay: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="insuffMonPlay" value="{{ $machine->insuffMonPlay }}">
                                            @if ($errors->has('insuffMonPlay'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('insuffMonPlay') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Insufficient MonClick: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="insuffMonClick" value="{{ $machine->insuffMonClick }}">
                                            @if ($errors->has('insuffMonClick'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('insuffMonClick') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Rejection Counter: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="rejectionCounter" value="{{ $machine->rejectionCounter }}">
                                            @if ($errors->has('rejectionCounter'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rejectionCounter') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                             
                        </div>


                        <div class="col-md-9 offset-md-5">
                            <button type="button" class="btn btn-primary">Update Cash Boxes Settings </button>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


@endsection