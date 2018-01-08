@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea One-->
             
                   <div class="card card-shadow" id="widgetLineareaTwo">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>  Total Money
                            </div>
                            @unless ( empty($totalMoneyquery->ttlMoneyIn) )
                            <span class="float-right grey-700 font-size-30">${{ $totalMoneyquery->ttlMoneyIn }}</span>
                            @endunless                            
                        </div>
  
                    </div>
                </div>
                <!-- End Widget Linearea One -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Two -->
                <div class="card card-shadow" id="widgetLineareaOne">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-account grey-600 font-size-24 vertical-align-bottom mr-5"></i>  Total Win
                            </div>
                            @unless ( empty($machinerecords->totalWon) )
                            <span class="float-right grey-700 font-size-30">{{ $machinerecords->totalWon }}</span>
                            @endunless 
                        </div>

                    </div>
                </div>
                <!-- End Widget Linearea Two -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Three -->
                <div class="card card-shadow" id="widgetLineareaThree">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i>  Total Play
                            </div>
                            @unless ( empty($machinerecords->playIndex) )
                            <span class="float-right grey-700 font-size-30">{{ $machinerecords->playIndex }}</span>
                            @endunless
                        </div>
                        

                    </div>
                </div>
                <!-- End Widget Linearea Three -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- Widget Linearea Four -->
                <div class="card card-shadow" id="widgetLineareaFour">
                    <div class="card-block p-20 pt-10">
                        <div class="clearfix">
                            <div class="grey-800 float-left py-10">
                                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i> Total Stock Left
                            </div>
                            @unless ( empty($machinerecords->stockLeft) )
                            <span class="float-right grey-700 font-size-30">{{ $machinerecords->stockLeft }}</span>
                            @endunless

                        </div>
                    </div>
                </div>
                <!-- End Widget Linearea Four -->
            </div>


            <div class="col-xxl-12 col-lg-12">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="{{ route('machine-management.edit', ['id' => $machine->id]) }}"> <i class="icon wb-edit" ></i>  </a>  Machine Version - {{ $machine->version }} </h3>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Type: {{ $machine->machine_type }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Machine Model: {{ $machine->machine_model }} </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Serial No: {{ $machine->serial_no }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Site: {{ $machine->site }}</label>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> Description: {{ $machine->machine_description }}</label>
                                </div>
                            </div>
                            
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Theme: {{ $machine->theme }}</label>
                                </div>
                            </div>
                            
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> IP Address: {{ $machine->ip_address }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                        
                        </div> 
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>

            <div class="col-xxl-12 col-lg-12">
                <!-- Widget Jvmap -->
                <div class="card card-shadow">
                    <div class="card-block p-0">
                        <!-- Example css animation Chart -->
                        <div class="example-wrap">
                            <div class="row row-lg">
                                <div class="col-xl-12">
                                    <div id="containerwin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


                                </div>

                                <script type="text/javascript">
                                    var chart = null;

                                    $(document).ready(function () {

                                        chart = new Highcharts.chart('containerwin', {
                                            chart: {
                                                type: 'line'
                                            },
                                            title: {
                                                text: ''
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                              
                                            },
                                            yAxis: {
                                                 min: 0,
                                                    max: 10,
                                                      tickInterval: 10,
                                                title: {
                                                    text: 'Win Graph ',
                                                    
                                                }
                                            },
                                            plotOptions: {
                                                line: {
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    enableMouseTracking: true
                                                }
                                            },
                                            series: [ {
                                                    name: 'OwedWin',
                                                    data: [ {{ $graphdataOwnedWinResult }} ]
                                                }, {
                                                    name: 'ExcessWin',
                                                    data: [ {{ $graphdataExcessWinResult }} ]
                                                }, {
                                                    name: 'WinResult',
                                                    data: [ {{ $graphdataWinResult }} ]
                                                }]
                                        });
                                    });



                                </script>

                            </div>
                        </div>
                        <!-- End Example css animation Chart -->
                    </div>

                </div>
                <!-- End Widget Jvmap -->
            </div>
            
            <div class="col-xxl-12 col-lg-12">
                <!-- Widget Jvmap -->
                <div class="card card-shadow">
                    <div class="card-block p-0">
                        <!-- Example css animation Chart -->
                        <div class="example-wrap">
                            <div class="row row-lg">
                                <div class="col-xl-12">
                                    <div id="containervoltage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


                                </div>

                                <script type="text/javascript">
                                    var chart = null;

                                    $(document).ready(function () {

                                        chart = new Highcharts.chart('containervoltage', {
                                            chart: {
                                                type: 'line'
                                            },
                                            title: {
                                                text: ''
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                              
                                            },
                                            yAxis: {
                                                 min: 0,
                                                    max: 50,
                                                      tickInterval: 10,
                                                title: {
                                                    text: 'Voltage Graph',
                                                    
                                                }
                                            },
                                            plotOptions: {
                                                line: {
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    enableMouseTracking: true
                                                }
                                            },
                                            series: [{
                                                    name: 'PickupVoltage', 
                                                    data: [ {{ $graphdataPkVoltResult }} ], 
                                                }, {
                                                    name: 'RetVoltage',
                                                    data: [ {{ $graphdataDropVoltResult }} ], 
                                                }]
                                        });
                                    });



                                </script>

                            </div>
                        </div>
                        <!-- End Example css animation Chart -->
                    </div>

                </div>
                <!-- End Widget Jvmap -->
            </div>

            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a href="{{ route('claw-settings.edit', ['id' => $claw_settings->machine_id]) }}"> <i class="icon wb-edit" ></i>  </a> Claw</h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td> max_voltage : {{ $claw_settings->max_voltage }} </br>
                                        min_voltage : {{ $claw_settings->min_voltage }}  </br>
                                        max_PWM : {{ $claw_settings->max_PWM }} </br>
                                        min_PWM : {{ $claw_settings->min_PWM }} </br>
                                        voltDecRetPercentage : {{ $claw_settings->voltDecRetPercentage }} </br>
                                        latest_voltage : {{ $claw_settings->latest_voltage }} </br>
                                        latest_PWM : {{ $claw_settings->latest_PWM }} </br>
                                        plusPick : {{ $claw_settings->plusPick }} </br>
                                        plusPickUpPWM : {{ $claw_settings->plusPickUpPWM }} </br>
                                        startPWM : {{ $claw_settings->startPWM }} </br>
                                    </td>
                                    <td>
                                        startVolt : {{ $claw_settings->startVolt }} </br>    
                                        retPWM : {{ $claw_settings->retPWM }} </br>
                                        retVolt : {{ $claw_settings->retVolt }} </br>
                                        pickPWM : {{ $claw_settings->pickPWM }} </br>
                                        pickVolt :  {{ $claw_settings->pickVolt }} </br>
                                        incVolt : {{ $claw_settings->incVolt }} </br>
                                        decVolt : {{ $claw_settings->decVolt  }} </br>
                                        diffPickRe : {{ $claw_settings->diffPickRet }} </br>
                                        voltSupply : {{ $claw_settings->voltSupply }} </br>
                                        insuffVoltInc : {{ $claw_settings->insuffVoltInc  }} </br> 
                                    </td>
                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>
            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a href="{{ route('machine-settings.edit', ['id' => $machine_settings->machine_id]) }}"> <i class="icon wb-edit" ></i>  </a> Machine</h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td>  
                                        xTime : {{ $machine_settings->xTime }} </br>
                                        yTime : {{ $machine_settings->yTime }} </br>
                                        xSpeed : {{ $machine_settings->xSpeed }} </br>
                                        zSpeed : {{ $machine_settings->zSpeed }} </br>
                                        ySpeed : {{ $machine_settings->ySpeed }} </br>
                                    </td>

                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>
            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a href="{{ route('game-settings.edit', ['id' => $game_settings->machine_id]) }}" > <i class="icon wb-edit" ></i>  </a> Game</h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td> 
                                        playIndex : {{ $game_settings->playIndex }} </br>
                                        owedWin : {{ $game_settings->owedWin }} </br>
                                        excessWin : {{ $game_settings->excessWin }}  </br>
                                        prevEwin : {{ $game_settings->prevEwin }}  </br>
                                        luckyToWin : {{ $game_settings->luckyToWin }} </br>
                                        gameLeft : {{ $game_settings->gameLeft }} </br>
                                        randomedTime : {{ $game_settings->randomedTime }} </br>
                                        gameTime : {{ $game_settings->gameTime }} </br>

                                    </td>

                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>



            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a href="{{ route('machine-accounts.edit', ['id' => $machine_accounts->machine_id]) }}"> <i class="icon wb-edit" ></i>  </a> Accounts</h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td> total_won : {{ $machine_accounts->total_won }} </br>
                                        total_dollar_in : {{ $machine_accounts->total_dollar_in }}  </br>

                                    </td>

                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>
            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <a href="{{ route('machine-settings.edit', ['id' => $cash_boxes->machine_id]) }}"> 
                              <i class="icon wb-edit" aria-hidden="true"></i>  </a>Cash Boxes
                        </h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td>  
                                        coin1_total_in : {{ $cash_boxes->coin1_total_in }} </br>
                                        coin2_total_in : {{ $cash_boxes->coin2_total_in }} </br>
                                        coin3_total_in : {{ $cash_boxes->coin3_total_in }} </br>
                                        coin4_total_in : {{ $cash_boxes->coin4_total_in }} </br>
                                        total_game : {{ $cash_boxes->total_game }} </br>
                                        total_test : {{ $cash_boxes->total_test }} </br>
                                        insuffMonPlay : {{ $cash_boxes->insuffMonPlay }} </br>
                                        rejectionCounter : {{ $cash_boxes->rejectionCounter }} </br>
                                        insuffMonClick : {{ $cash_boxes->insuffMonClick }} </br>
                                    </td>

                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>
            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        
                        <h3 class="panel-title"> <a href="{{ route('product-definitions.edit', ['id' => $product_def->machine_id]) }}" > <i class="icon wb-edit" aria-hidden="true"></i> </a>Product Definations</h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td> 
                                        coinPerPlay : {{ $product_def->coinPerPlay }} </br>
                                        winPercentage : {{ $product_def->winPercentage }} </br>
                                        ttlPurCost : {{ $product_def->ttlPurCost }} </br>
                                        numberOfPlays : {{ $product_def->numberOfPlays }} </br>
                                        stockLeft : {{ $product_def->stockLeft }} </br>
                                        stockAdded : {{ $product_def->stockAdded }} </br>
                                        stockRemoved : {{ $product_def->stockRemoved }} </br>
                                    </td>

                                </tr>

                            </tbody></table>
                        </p>
                    </div>
                </div>
                <!-- End Example Panel With Heading -->
            </div>



        </div>
    </div>  
</div>





@endsection