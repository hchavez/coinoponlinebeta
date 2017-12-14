@extends('machines-mgmt.base')

@section('content')
<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title"> Machine Information</h3>
    </header>


    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('machine-management.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row row-lg">


                    <div class="col-md-12 col-lg-6">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Machine Type: </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="machine_type" required>
                                            <option value="">-- Select Machine Type --</option>
                                            @foreach ($machine_types as $mtype)
                                            <option value="{{$mtype->id}}"> {{$mtype->machine_type}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Machine Model: </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="machine_model" required>
                                            <option value="">-- Select Machine Model --</option>
                                            @foreach ($machine_models as $machine_model)
                                            <option value="{{$machine_model->id}}">{{$machine_model->machine_model}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Site: </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="site" required>
                                            <option value="">-- Select Site --</option>
                                            @foreach ($sites as $site)
                                            <option value="{{$site->id}}">{{$site->site_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Theme: </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="site" required>
                                            <option value="">-- Select Theme --</option>
                                            @foreach ($themes as $theme)
                                            <option value="{{$theme->id}}">{{$theme->theme}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="description" class="col-md-3 form-control-label">Description: </label>

                                    <div class="col-md-9">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>

                                        @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="comments" class="col-md-3 form-control-label">Comments: </label>

                                    <div class="col-md-9">
                                        <textarea  id="comments" type="text" class="form-control" name="comments" value="{{ old('comments') }}" > </textarea>

                                        @if ($errors->has('comments'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('comments') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">IP Address: </label>
                                    <div class="col-md-9">
                                        <input id="ipaddress" type="text" class="form-control" name="ipaddress" value="{{ old('ipaddress') }}" required>

                                        @if ($errors->has('ipaddress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ipaddress') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- End Example Horizontal Form -->
                    </div>



                    <div class="col-md-12 col-lg-6">

                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">  
                            <div class="form-group{{ $errors->has('serial_no') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="serial_no" class="col-md-3 form-control-label">Serial No: </label>

                                    <div class="col-md-9">
                                        <input id="serial_no" type="text" class="form-control" name="serial_no" value="{{ old('serial_no') }}" required>

                                        @if ($errors->has('serial_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('serial_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('purchase_amount') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="purchase_amount" class="col-md-3 form-control-label">Purchase Amount: </label>

                                    <div class="col-md-9">
                                        <input id="purchase_amount" type="text" class="form-control" name="purchase_amount" value="{{ old('purchase_amount') }}" >

                                        @if ($errors->has('purchase_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('purchase_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="purchase_date" class="col-md-3 form-control-label">Purchase Date: </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="purchase_date"  class="form-control" data-plugin="datepicker" data-multidate="true">
                                        </div>
                                        @if ($errors->has('purchase_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('purchase_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('purchase_amount') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="sold" class="col-md-3 form-control-label">Sold: </label>

                                    <div class="col-md-9">
                                        <input type="checkbox" id="inputCheckboxAgree" name="sold" >
                                    </div>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('sold_amount') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="sold_amount" class="col-md-3 form-control-label">Sold Amount: </label>

                                    <div class="col-md-9">
                                        <input id="sold_amount" type="text" class="form-control" name="sold_amount" value="{{ old('sold_amount') }}" >

                                        @if ($errors->has('sold_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sold_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sold_date') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="sold_date" class="col-md-3 form-control-label">Sold Date: </label>

                                    <div class="col-md-9">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="sold_date" class="form-control" data-plugin="datepicker" data-multidate="true">
                                        </div>
                                        @if ($errors->has('sold_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sold_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>





                    </div>
                </div>

                <center>
                    <button type="submit" class="btn btn-primary">
                        Add New Machine
                    </button></center>


            </form>
        </div>

    </div>
</div>
@endsection
