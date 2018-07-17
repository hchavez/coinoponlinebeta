@extends('layouts.app-left-admin-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">             
             <div class="panel form-icons">
                <div class="panel-heading">
                  <h3 class="panel-title">Add Product Form</h3>
                </div>
                 
               <form class="form-horizontal" role="form" method="POST" action="{{ route('product-lists.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-body container-fluid">
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Product Name </label>
                        <div class="example">
                          <div class="input-group">
                            <input id="product_name" type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="example-warp">
                          <label class=" form-control-label">Product Code </label>
                        <div class="example">
                          <div class="input-group">
                            <input id="product_code" type="text" class="form-control" name="product_code" value="{{ old('product_code') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                   
                
                  </div>
                </div>
                
                  <center>
                    <button type="submit" class="btn btn-primary">
                        Add New Product
                    </button></center>


            </form>
                 
                 
              </div>

        </div>
    </div>
</div>

@endsection