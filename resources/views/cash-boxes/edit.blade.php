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
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new cashboxes settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Machine Cash Boxes Details</h3>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('cash-boxes.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                                <div class="form-group{{ $errors->has('coin1_total_in') ? ' has-error' : '' }}">
                                    <label for="coin1_total_in" class="col-md-4 control-label">Coin1 Total In</label>

                                    <div class="col-md-6">
                                        <input id="coin1_total_in" type="text" class="form-control" name="coin1_total_in" value="{{ $machine->coin1_total_in }}" required autofocus>

                                        @if ($errors->has('coin1_total_in'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coin1_total_in') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group{{ $errors->has('coin2_total_in') ? ' has-error' : '' }}">
                                    <label for="coin2_total_in" class="col-md-4 control-label">Coin2 Total In</label>

                                    <div class="col-md-6">
                                        <input id="coin2_total_in" type="text" class="form-control" name="coin2_total_in" value="{{ $machine->coin2_total_in }}" required>

                                        @if ($errors->has('coin2_total_in'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coin2_total_in') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('coin3_total_in') ? ' has-error' : '' }}">
                                    <label for="coin3_total_in" class="col-md-4 control-label">Coin3 Total In</label>

                                    <div class="col-md-6">
                                        <input id="coin3_total_in" type="text" class="form-control" name="coin3_total_in" value="{{ $machine->coin3_total_in }}" required>

                                        @if ($errors->has('coin3_total_in'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coin3_total_in') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('coin4_total_in') ? ' has-error' : '' }}">
                                    <label for="coin4_total_in" class="col-md-4 control-label">Coin4 Total In</label>

                                    <div class="col-md-6">
                                        <input id="coin4_total_in" type="text" class="form-control" name="coin4_total_in" value="{{ $machine->coin4_total_in }}" required>

                                        @if ($errors->has('coin4_total_in'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coin4_total_in') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('total_game') ? ' has-error' : '' }}">
                                    <label for="total_game" class="col-md-4 control-label">Total Game</label>

                                    <div class="col-md-6">
                                        <input id="total_game" type="text" disabled="disabled" class="form-control" name="total_game" value="{{ $machine->total_game }}" required>

                                        @if ($errors->has('total_game'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_game') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('total_test') ? ' has-error' : '' }}">
                                    <label for="total_test" class="col-md-4 control-label">Total Test</label>

                                    <div class="col-md-6">
                                        <input id="total_test" type="text" class="form-control" disabled="disabled" name="total_test" value="{{ $machine->total_test }}" required>

                                        @if ($errors->has('total_test'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_test') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('insuffMonPlay') ? ' has-error' : '' }}">
                                    <label for="insuffMonPlay" class="col-md-4 control-label">Insufficient Money Play</label>

                                    <div class="col-md-6">
                                        <input id="insuffMonPlay" type="text" class="form-control" disabled="disabled" name="insuffMonPlay" value="{{ $machine->insuffMonPlay }}" required>

                                        @if ($errors->has('insuffMonPlay'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('insuffMonPlay') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('rejectionCounter') ? ' has-error' : '' }}">
                                    <label for="rejectionCounter" class="col-md-4 control-label">Rejection Counter</label>

                                    <div class="col-md-6">
                                        <input id="rejectionCounter" type="text" class="form-control" disabled="disabled" name="rejectionCounter" value="{{ $machine->rejectionCounter }}" required>

                                        @if ($errors->has('rejectionCounter'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rejectionCounter') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('insuffMonClick') ? ' has-error' : '' }}">
                                    <label for="insuffMonClick" class="col-md-4 control-label">Insufficient Money Click</label>

                                    <div class="col-md-6">
                                        <input id="insuffMonClick" type="text" class="form-control" disabled="disabled" name="insuffMonClick" value="{{ $machine->insuffMonClick }}" required>

                                        @if ($errors->has('insuffMonClick'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('insuffMonClick') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Cash Boxes
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
