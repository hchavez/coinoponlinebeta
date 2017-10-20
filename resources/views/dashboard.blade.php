@extends('layouts.app-template')


@section('content')

<div class="row" >
    <!-- First Row -->
    <!-- Completed Options Pie Widgets -->
    <div class="col-xxl-3">
        <div class="row h-full" data-plugin="matchHeight">
            <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                    <div class="card-block p-20">
                        <div class="row"> 
                            <div class="col-12">
                                <div class="counter-label font-size-20 mt-10">High</div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-danger alert-dismissible">
                                    <h4>ATTENTION!</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-danger alert-dismissible">
                                    <h4>ATTENTION!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                    <div class="card-block p-20">
                         
                        <div class="row"> 
                            <div class="col-12">
                                <div class="counter-label font-size-20 mt-10">High</div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-warning alert-dismissible">
                                    <h4>WARNING!</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-warning alert-dismissible">
                                    <h4>WARNING!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
                <div class="card card-shadow card-completed-options">
                    <div class="card-block p-20">
                       
                        <div class="row"> 
                            <div class="col-12">
                                <div class="counter-label font-size-20 mt-10">High</div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-info alert-dismissible">
                                    <h4>NOTICE!</h4>
                                </div>
                            </div>
                        </div>
                    <div class="row"> 
                            <div class="col-7">
                                <div class="counter text-left blue-grey-700">
                                    <div class="counter-label font-size-20 mt-10">Machine Naeme</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div role="alert" class="alert dark alert-info alert-dismissible">
                                    <h4>NOTICE!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Completed Options Pie Widgets -->
    <!-- Team Total Completed -->
    <div class="col-xxl-9">
        <div id="teamCompletedWidget" class="card card-shadow example-responsive">
            <div class="card-block p-20 pb-25">
                <div class="row pb-40" data-plugin="matchHeight">
                   <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >
           
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1"  aria-label="Office: activate to sort column ascending">Serial No</th>
                    <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Route</th>
                    <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Area</th>
                    <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">State</th>
                    <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Site</th>
                  
                      <th class="sorting" tabindex="0" aria-controls="exampleTableSearch" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Status</th>
                     
            </thead>
           {{ $machines }}
          </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Total Completed -->
    <!-- End First Row -->

</div>

@endsection