@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Toy</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                 

                    <div class="row"><div class="col-sm-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('toy-lists.update', ['id' => $route->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('toy_name') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="toy_name" type="text" class="form-control" name="toy_name" value="{{ $toylist->toy_name }}" >

                                @if ($errors->has('toy_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('toy_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('toy_code') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="toy_code" type="text" class="form-control" name="toy_code" value="{{ $toylist->toy_code }}" >

                                @if ($errors->has('toy_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('toy_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group">

                            <div class="col-md-6">
                                <select class="selectpicker form-control" name="status" id="status" data-live-search="true"> 
                                            <option value="1">Active</option> 
                                             <option value="0">Inactive</option>     
                                </select>  
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
                        </div></div>

               
                </div>


            </div>
        </div>
    </div>
</div>

@endsection