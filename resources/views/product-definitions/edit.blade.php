@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Product Definitions Details</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('product-definitions.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group{{ $errors->has('coinPerPlay') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">coinPerPlay</label>

                                    <div class="col-md-6">
                                        <input id="coinPerPlay" type="text" class="form-control" name="xTime" value="{{ $machine->coinPerPlay }}" required autofocus>

                                        @if ($errors->has('coinPerPlay'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coinPerPlay') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('winPercentage') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">winPercentage</label>

                                    <div class="col-md-6">
                                        <input id="winPercentage" type="text" class="form-control" name="xTime" value="{{ $machine->winPercentage }}" required autofocus>

                                        @if ($errors->has('winPercentage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('winPercentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('ttlPurCost') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">ttlPurCost</label>

                                    <div class="col-md-6">
                                        <input id="ttlPurCost" type="text" class="form-control" name="xTime" value="{{ $machine->ttlPurCost }}" required autofocus>

                                        @if ($errors->has('ttlPurCost'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ttlPurCost') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('numberOfPlays') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">numberOfPlays</label>

                                    <div class="col-md-6">
                                        <input id="numberOfPlays" type="text" class="form-control" name="xTime" value="{{ $machine->numberOfPlays }}" required autofocus>

                                        @if ($errors->has('numberOfPlays'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('numberOfPlays') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('stockLeft') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">stockLeft</label>

                                    <div class="col-md-6">
                                        <input id="stockLeft" type="text" class="form-control" name="xTime" value="{{ $machine->stockLeft }}" required autofocus>

                                        @if ($errors->has('stockLeft'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockLeft') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('stockAdded') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">stockAdded</label>

                                    <div class="col-md-6">
                                        <input id="stockAdded" type="text" class="form-control" name="xTime" value="{{ $machine->stockAdded }}" required autofocus>

                                        @if ($errors->has('stockAdded'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockAdded') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('stockRemoved') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">stockRemoved</label>

                                    <div class="col-md-6">
                                        <input id="stockRemoved" type="text" class="form-control" name="xTime" value="{{ $machine->stockRemoved }}" required autofocus>

                                        @if ($errors->has('stockRemoved'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockRemoved') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update 
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
