@extends('layouts.app-template')


@section('content')


<!-- Page -->


<h1 class="page-title font-size-26 font-weight-100">Machine Performance</h1>


<div class="row">
    <!-- First Row -->
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-warning">
                    <i class="icon wb-shopping-cart"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL PLAY</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">399</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-danger">
                    <i class="icon fa-dollar"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL MONEY</span>
                <div class="content-text text-center mb-0">
                    <i class="text-success icon wb-triangle-down font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">$18,628</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-success">
                    <i class="icon wb-eye"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL WIN</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">23,456</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 info-panel">
        <div class="card card-shadow">
            <div class="card-block bg-white p-20">
                <button type="button" class="btn btn-floating btn-sm btn-primary">
                    <i class="icon wb-user"></i>
                </button>
                <span class="ml-15 font-weight-400">TOTAL GOAL</span>
                <div class="content-text text-center mb-0">
                    <i class="text-danger icon wb-triangle-up font-size-20">
                    </i>
                    <span class="font-size-40 font-weight-100">4,367</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End First Row -->
    <!-- second Row -->
    <div class="col-12" id="ecommerceChartView">
        <div class="card card-shadow">
            <div class="row" ng-app="machineApp" ng-controller="machineController">

                <!-- Team Total Completed -->
                <div class="col-xxl-12">
                    <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                        <div class="card-block p-20 pb-25">
                            <div class="row pb-40" data-plugin="matchHeight">
                                <h4 class="example-title">Machine LIVE Status</h4>
                                <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
                                <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="exampleTableSearch" role="grid" aria-describedby="exampleTableSearch_info" >

                                    <thead>
                                        <tr role="row">
                                            <th>Machine Model</th>
                                            <th>Machine Type</th>
                                            <th>Error Messages</th>
                                            <th>Site</th>
                                        </tr>  
                                    </thead>
                                    <tbody>

                                        @foreach ($machinelogs as $machinelog)
                                        <tr role="row"  @if ($machinelog->errortype == '1') class="table-danger" @endif >
                                            <td>  @if ($machinelog->errortype == '1') <span class="blink_me">{{ $machinelog->machine_model}}</span> @else
                                               {{ $machinelog->machine_model}} @endif </td>
                                            <td>  @if ($machinelog->errortype == '1') <span class="blink_me">{{ $machinelog->machine_type}}</span> @else
                                               {{ $machinelog->machine_type}} @endif</td>
                                            <td><strong><a href="#" >
                                            @if ($machinelog->errortype == '1') <span class="blink_me">{{ $machinelog->error}}</span> @else
                                               {{ $machinelog->error}} @endif
                                           @if ($machinelog->errortype == '2') <span class="badge badge-warning">Warning!</span> @endif @if ($machinelog->errortype == '3')<span class="badge badge-info">Notice!</span> @endif </a></strong></td>
                                            <td>  @if ($machinelog->errortype == '1') <span class="blink_me">{{ $machinelog->site_name}} {{ $machinelog->street}} {{ $machinelog->suburb}} {{ $machinelog->statecode}}</span> @else
                                               {{ $machinelog->site_name}} {{ $machinelog->street}} {{ $machinelog->suburb}} {{ $machinelog->statecode}} @endif 
                                               </td>   

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team Total Completed -->
                <!-- End First Row -->

            </div>
        </div>
    </div>
    <!-- End Second Row -->


</div>

<!-- End Page -->



@endsection