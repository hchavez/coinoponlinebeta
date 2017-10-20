@extends('layouts.appmachine-left-template')
@section('content')


<div class="page-main">

    <div class="page-content">

        <!-- Panel Inline Form -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Machine Account Settings</h3>
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
                                        <label class="col-md-3 form-control-label">Total Dollar In: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="playIndex"  value="{{ $machine->total_dollar_in }}">
                                            @if ($errors->has('total_dollar_in'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('total_dollar_in') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label">Total Won: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="owedWin" value="{{ $machine->total_won }}">
                                            @if ($errors->has('total_won'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('total_won') }}</strong>
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


                                </div>

                            </div>
                            
                        </div>


                        <div class="col-md-9 offset-md-5">
                            <button type="button" class="btn btn-primary">Update Account Settings </button>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>


@endsection