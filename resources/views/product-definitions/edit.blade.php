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
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new machine product definitions settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Product Definitions Details</h3>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('product-definitions.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                                <div class="form-group{{ $errors->has('coinPerPlay') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Coin Per Play</label>

                                    <div class="col-md-6">
                                        <input id="coinPerPlay" type="text" class="form-control" name="coinPerPlay" value="{{ $machine->coinPerPlay }}"  autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('coinPerPlay'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('coinPerPlay') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            

                                <div class="form-group{{ $errors->has('stockLeft') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Stock Left</label>

                                    <div class="col-md-6">
                                        <input id="stockLeft" type="text" class="form-control" name="stockLeft" value="{{ $machine->stockLeft }}"  autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('stockLeft'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockLeft') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('stockAdded') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Stock Added</label>

                                    <div class="col-md-6">
                                        <input id="stockAdded" type="text" class="form-control" name="stockAdded" value="{{ $machine->stockAdded }}"  autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('stockAdded'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockAdded') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('stockRemoved') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Stock Removed</label>

                                    <div class="col-md-6">
                                        <input id="stockRemoved" type="text" class="form-control" name="stockRemoved" value="{{ $machine->stockRemoved }}"  autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('stockRemoved'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stockRemoved') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('ttlPurCost') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Total Toy Purchase Cost </label>

                                    <div class="col-md-6">
                                        <input id="ttlPurCost" type="text" class="form-control" name="ttlPurCost" value="{{ $machine->ttlPurCost }}"  autofocus <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>

                                        @if ($errors->has('ttlPurCost'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ttlPurCost') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="form-group{{ $errors->has('numberOfPlays') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">Plays per win</label>

                                    <div class="col-md-6">
                                        <input id="numberOfPlays" type="text" class="form-control" name="numberOfPlays" value="{{ $machine->numberOfPlays }}"  autofocus>

                                        @if ($errors->has('numberOfPlays'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('numberOfPlays') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" <?php echo ($permit['edit']!=1)? 'disabled' : ''; ?>>
                                            Update Product Diff
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
