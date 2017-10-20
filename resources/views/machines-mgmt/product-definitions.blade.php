@extends('layouts.appmachine-left-template')
@section('content')


<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Product Definitions Settings</h3>
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
                                        <label class="col-md-3 form-control-label">Coin Per Play: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="coinPerPlay"  value="{{ $machine->coinPerPlay  }}">
                                            @if ($errors->has('coinperplay'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('coinperplay') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 

                                     <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Win Percentage: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="winpercentage"  value="{{ $machine->winPercentage }}">
                                            @if ($errors->has('winpercentage'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('winpercentage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">ttlPurCost </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ttlPurCost" value="{{ $machine->ttlPurCost }}">
                                            @if ($errors->has('ttlPurCost'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ttlPurCost') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Number Of Plays: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="numberofplays" value="{{ $machine->numberOfPlays }}">
                                            @if ($errors->has('numberofplays'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('numberofplays') }}</strong>
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
                                        <label class="col-md-3 form-control-label">Stock Left: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="stockleft" value="{{ $machine->stockLeft }}">
                                            @if ($errors->has('stockleft'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('stockleft') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Stock Added: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="stockadded" value="{{ $machine->stockAdded }}">
                                            @if ($errors->has('stockadded'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('stockadded') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
  
                                        <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Stock Removed: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="stockremoved" value="{{ $machine->stockRemoved }}">
                                            @if ($errors->has('stockremoved'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('stockremoved') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    
                                </div>

                            </div>
                            <!-- End Example Type -->
                        </div>


                            <div class="col-md-9 offset-md-5">
                                <button type="button" class="btn btn-primary">Update Product Settings </button>

                            </div>
                       

                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


@endsection