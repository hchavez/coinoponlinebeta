@extends('machines-mgmt.base')

@section('content')
<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title"> Machine Information</h3>
    </header>


    <div class="panel-body" id="create_machineInfo">
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
                                        <select class="selectpicker form-control" name="machine_type" id="machine_type" data-live-search="true"> 
                                            <option value="">-- Select Machine Type --</option>
                                            @foreach ($machine_types as $mtype)
                                            <option value="{{$mtype->id}}" data-tokens="{{$mtype->machine_type}}"> {{$mtype->machine_type}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Machine Model: </label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker" name="machine_model" id="machine_model" data-live-search="true" >
                                            <option value="">-- Select Machine Type --</option>
                                       
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Site: </label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker" name="site" id="site" data-live-search="true">
                                            <option value="">-- Select Site --</option>
                                            @foreach ($sites as $site)
                                            <option value="{{$site->id}}" data-tokens="{{$site->site_name}}">{{$site->site_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Route: </label>
                                    <div class="col-md-9">
                                        <input id="route" type="text" class="form-control" name="route" value="{{ old('route') }}">

                                        @if ($errors->has('route'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('route') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            
                            
                             <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Theme: </label>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker" name="theme" id="theme" data-live-search="true" >
                                            <option value="">-- Select Theme --</option>
                                            @foreach ($themes as $theme)
                                            <option value="{{$theme->id}}" data-tokens="{{$theme->theme}}">{{$theme->theme}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Category: </label>
                                    <div class="col-md-9">
                                         <select class="form-control selectpicker" name="category" id="category" data-live-search="true" required>
                                            <option value="">-- Select Category --</option>
                                            <option value="cardreader">cardreader</option>
                                            <option value="george system">george systems</option>
                                            <option value="george system and cardreader">both</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="description" class="col-md-3 form-control-label">Description: </label>

                                    <div class="col-md-9">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" >

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
                                    <label class="col-md-3 form-control-label">Teamviewer ID: </label>
                                    <div class="col-md-9">
                                        <input id="teamviewer" type="text" class="form-control" name="teamviewer" value="{{ old('teamviewer') }}">

                                        @if ($errors->has('teamviewer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('teamviewer') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--
                             <div class="form-group{{ $errors->has('activation_date') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="activation_date" class="col-md-3 form-control-label">Activation Date: </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="activation_date"  class="form-control" data-plugin="datepicker">
                                        </div>
                                        @if ($errors->has('activation_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('activation_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            -->

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
                                        <input id="serial_no" type="text" class="form-control" name="serial_no" value="{{ old('serial_no') }}" >

                                        @if ($errors->has('serial_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('serial_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                                <div class="form-group row">
                                    <label for="version" class="col-md-3 form-control-label">Version: </label>

                                    <div class="col-md-9">
                                        <input id="version" type="text" class="form-control" name="version" value="{{ old('version') }}" >

                                        @if ($errors->has('version'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('version') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Area: </label>
                                    <div class="col-md-9">
                                        <input id="area" type="text" class="form-control" name="area" value="{{ old('area') }}">

                                        @if ($errors->has('area'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Carrier: </label>
                                    <div class="col-md-9">
                                        <input id="carrier" type="text" class="form-control" name="carrier" value="{{ old('carrier') }}">

                                        @if ($errors->has('carrier'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carrier') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Franchisee: </label>
                                    <div class="col-md-9">
                                        <input id="franchisee" type="text" class="form-control" name="franchisee" value="{{ old('franchisee') }}">

                                        @if ($errors->has('franchisee'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('franchisee') }}</strong>
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

                            <!-- 
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
                               -->

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

