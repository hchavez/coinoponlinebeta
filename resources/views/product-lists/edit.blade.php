@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Product</h3>
            </div>
            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                 

                    <div class="row"><div class="col-sm-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('product-lists.update', ['id' => $route->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ $productlist->product_name }}" >

                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="product_code" type="text" class="form-control" name="product_code" value="{{ $productlist->product_code }}" >

                                @if ($errors->has('product_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_code') }}</strong>
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