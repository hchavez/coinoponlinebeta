@extends('layouts.app-left-admin-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">             
             <div class="panel form-icons">
                <div class="panel-heading">
                  <h3 class="panel-title">Add Theme Form</h3>
                </div>
                 
               
                


           
                 <div class="panel-body" id="create_machineInfo">
                    <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                         <form class="form-horizontal" role="form" method="POST" action="{{ route('theme-lists.store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="row row-lg">
                                 <div class="col-md-12 col-lg-4">
                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Theme Name: </label>
                                                <div class="col-md-6">
                                                     <input id="theme_name" type="text" class="form-control" name="theme_name" value="{{ old('theme_name') }}" style="margin-top: -10px !important;" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Avg Weight: </label>
                                                <div class="col-md-6">
                                                    <input id="avgWeight" type="text" class="form-control" name="avgWeight" value="{{ old('avgWeight') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">slipVoltage: </label>
                                                <div class="col-md-6">
                                                  <input id="slipVoltage" type="text" class="form-control" name="slipVoltage" value="{{ old('slipVoltage') }}" required>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">pkVoltage: </label>
                                                <div class="col-md-6">
                                                   <input id="pkVoltage" type="text" class="form-control" name="pkVoltage" value="{{ old('pkVoltage')  }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">retVoltage: </label>
                                                <div class="col-md-6">
                                                     <input id="retVoltage" type="text" class="form-control" name="retVoltage" value="{{ old('retVoltage') }}" required>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <!-- End Example Horizontal Form -->
                                </div>
                                

                                <div class="col-md-12 col-lg-4">
                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">slipPWM: </label>
                                                <div class="col-md-6">
                                                   <input id="slipPWM" type="text" class="form-control" name="slipPWM" value="{{ old('slipPWM')  }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">pkupPWM: </label>
                                                <div class="col-md-6">
                                                     <input id="pkupPWM" type="text" class="form-control" name="pkupPWM" value="{{ old('pkupPWM')  }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">retPWM: </label>
                                                <div class="col-md-6">
                                                  <input id="retPWM" type="text" class="form-control" name="retPWM" value="{{ old('retPWM')  }}" required>
                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">diffPickRetPWM: </label>
                                                <div class="col-md-6">
                                                    <input id="diffPickRetPWM" type="text" class="form-control" name="diffPickRetPWM" value="{{ old('diffPickRetPWM')  }}" required>
                                                </div>
                                            </div>
                                        </div>

                                   



                                    </div>
                                    <!-- End Example Horizontal Form -->
                                </div>



                                <div class="col-md-12 col-lg-4">

                                    <!-- Example Horizontal Form -->
                                    <div class="example-wrap">  

                                           <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">totalToyPurchaseCost: </label>
                                                <div class="col-md-6">
                                                    <input id="totalToyPurchaseCost" type="text" class="form-control" name="totalToyPurchaseCost" value="{{ old('totalToyPurchaseCost') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">playsPerWin: </label>
                                                <div class="col-md-6">
                                                   <input id="playsPerWin" type="text" class="form-control" name="playsPerWin" value="{{ old('playsPerWin')  }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">stockLeft: </label>
                                                <div class="col-md-6">
                                                    <input id="stockLeft" type="text" class="form-control" name="stockLeft" value="{{ old('stockLeft')  }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-md-6 form-control-label">Product Code: </label>
                                                <div class="col-md-6">
                                                  <select class="selectpicker form-control" name="productCode" id="productCode" data-live-search="true"> 
                                                            @foreach ($productlist as $productlist)
                                                            <option value="{{$productlist->id}}" data-tokens="{{$productlist->product_name}}"> {{$productlist->product_name}} </option>
                                                            @endforeach
                                                </select> 
                                                </div>
                                            </div>
                                        </div>


                                    </div>





                                </div>
                            </div>

                            <center>
                                <button type="submit" class="btn btn-primary">
                                    Add New Theme
                                </button></center>


                        </form>
                    </div>

                </div>
                 
              </div>

        </div>
    </div>
</div>

@endsection