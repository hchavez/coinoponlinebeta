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
                  <strong> <?php echo "&nbsp;There is an ongoing update! Please wait while the machine is still applying for the new machine acount settings." ?> </strong>
             </div>
             <?php endif; ?>
            
            <div class="panel-heading">
                <h3 class="panel-title"> Machine Accounts Details</h3>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-accounts.update', ['id' => $machine->id]) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="myreferrer" value="{{ $myreferrer }}"/>

                                 <div class="form-group{{ $errors->has('ipAdd') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">ipAdd</label>

                                    <div class="col-md-6">
                                        <input id="ipAdd" type="text" class="form-control" name="ipAdd" value="{{ $machine->ipAdd }}" required autofocus>

                                        @if ($errors->has('ipAdd'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ipAdd') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('total_won') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">total dollar in</label>

                                    <div class="col-md-6">
                                        <input id="total_dollar_in" type="text" class="form-control" name="total_dollar_in" value="{{ $machine->total_dollar_in }}" required autofocus>

                                        @if ($errors->has('total_dollar_in'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_dollar_in') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('total_won') ? ' has-error' : '' }}">
                                    <label for="xTime" class="col-md-4 control-label">total won</label>

                                    <div class="col-md-6">
                                        <input id="total_won" type="text" class="form-control" name="total_won" value="{{ $machine->total_won }}" required autofocus>

                                        @if ($errors->has('total_won'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_won') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Machine Account
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
