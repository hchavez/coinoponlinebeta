@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            
<!--          
            <div class="col-xl-3 col-md-6">
                 Widget Linearea One
             
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
                 End Widget Linearea One 
            </div>
            <div class="col-xl-3 col-md-6">
                 Widget Linearea Two 
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
                 End Widget Linearea Two 
            </div>
            <div class="col-xl-3 col-md-6">
                 Widget Linearea Three 
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
                 End Widget Linearea Three 
            </div>
            <div class="col-xl-3 col-md-6">
                 Widget Linearea Four 
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
                 End Widget Linearea Four 
            </div>
**/-->

            <div class="col-xxl-12 col-lg-12">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="{{ route('machine-management.edit', ['id' => $machine->id]) }}"> <i class="icon wb-edit" ></i>  </a>  Machine Version - {{ $machine->version }} 
                        <a href="#">                        
                        <button class="delete-modal btn btn-danger" data-id="{{$machine->id}}" data-content="{{$machine->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> TEST GO!</button>
                        </a>
                        </h3>
                        
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
                                    <label class="col-sm-12 control-label">Category: {{ $machine->category }} </label>
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
                                <div id="containermoney" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                <div class="col-lg-12">
                                    <!-- Example Bordered Table -->
                                    <div class="example-wrap">                                     
                                      <div class="example table-responsive">
                                        <table class="table table-bordered">
                                          <thead><tr><th></th><th>Coin</th><th>Bill</th><th>Card</th><th>Total</th></tr></thead>
                                          <tbody>
                                            <tr><td>Today</td><td><?php echo round($coin['today'],2);  ?></td><td>{{ $bill['today'] }}</td><td>{{ $card['today'] }}</td><td><?php echo round($coin['today'] + $bill['today'] + $card['today'], 2); ?></td></tr>
                                            <tr><td>Yesterday</td><td><?php echo round( $coin['yesterday'],2);  ?></td><td>{{ $bill['yesterday'] }}</td><td>{{ $card['yesterday'] }}</td><td><?php echo round($coin['yesterday'] + $bill['yesterday'] + $card['yesterday'], 2); ?></td></tr>
                                            <tr><td>This week</td><td><?php echo round( $coin['thisWeek'],2);  ?></td><td>{{ $bill['thisWeek'] }}</td><td>{{ $card['thisWeek'] }}</td><td><?php echo round($coin['thisWeek'] + $bill['thisWeek'] + $card['thisWeek'], 2); ?></td></tr>
                                            <tr><td>This Month</td><td><?php echo round( $coin['thisMonth'],2);  ?></td><td>{{ $bill['thisMonth'] }}</td><td>{{ $card['thisMonth'] }}</td><td><?php echo round($coin['thisMonth'] + $bill['thisMonth'] + $card['thisMonth'], 2); ?></td></tr>
                                            <tr><td>This Financial Year</td><td><?php echo round( $coin['thisFinancial'],2);  ?></td><td>{{ $bill['thisFinancial'] }}</td><td>{{ $card['thisFinancial'] }}</td><td><?php echo round($coin['thisFinancial'] + $bill['thisFinancial'] + $card['thisFinancial'], 2); ?></td></tr>
                                            <tr><td>This Calendar Year</td><td><?php echo round( $coin['thisYear'],2);  ?></td><td>{{ $bill['thisYear'] }}</td><td>{{ $card['thisYear'] }}</td><td><?php echo round($coin['thisYear'] + $bill['thisYear'] + $card['thisYear'], 2); ?></td></tr>                        
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- End Example Bordered Table -->
                                </div>   
                                </div>
                                
                                <script type="text/javascript">
                                 var base_urllink = window.location.origin;
                   
                                    if (base_urllink == "http://localhost"){
                                        var base_url = "http://localhost/coinoponlinebeta/public/";
                                    }else{
                                        var base_url = "https://www.ascentri.com/";
                                    }
                                    
                                var georgeSeriesOptions = [], georgeSeriesCounter = 0, georgeNnames = ['dailyCoin','dailyBill','dailyCard'];
                                var id = {{ $machine->id }};  
                           
                                function georgeCreateChart() {
                                    Highcharts.stockChart('containermoney', {  
                                        chart: { height: 500 },
                                        title: { text: 'Daily TurnOver Graph' },        
                                        rangeSelector: { buttons: [{type: 'month',count: 3,text: '3m'},{type: 'month',count: 6,text: '6m'},{type: 'ytd',count: 1,text: 'YTD'},{type: 'year',count: 1,text: '1y'},{type: 'all',text: 'All'}],selected: 4},
                                        yAxis: { 
                                            min: 0, 
       
                                            tickInterval: 10,
                                            title: { text: 'Revenue'},
                                            plotLines: [{ value: 100, width: 1, color: '#333333', zIndex: 3 }]
                                        },
                                        plotOptions: { 
                                            series: { showInNavigator: true },
                                            column: {
                                                stacking: 'normal',
                                                dataLabels: {
                                                    enabled: false,
                                                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                                                    style: {textShadow: '0 0 3px black, 0 0 3px black' }
                                                },
                                                dataGrouping: {
                                                    enabled: true,
                                                    forced: true,
                                                    units: [ ['day', [1]] ]
                                                }
                                            }
                                        },
                                        tooltip: {            
                                          //  changeDecimals: 2,
                                            valueDecimals: 2,
                                            shared: true,
                                            useHTML: true,
                                            headerFormat: '<small>{point.key}</small><table>',
                                            pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' + '<td style="text-align: right"><b>{point.y} </b></td></tr>',
                                            footerFormat: '</table>'
                                        },
                                        series: georgeSeriesOptions
                                    });
                                }
                                $.each(georgeNnames, function (i, name) {
                                    $.getJSON(base_url + name + "/" + id, function (data) {  
                                        georgeSeriesOptions[i] = { type: 'column', name: name, data: data };       
                                        georgeSeriesCounter += 1;
                                        if (georgeSeriesCounter === georgeNnames.length) { georgeCreateChart(); }
                                    });
                                });
                                </script>
                                
                                 <div class="col-xl-12">
                                    <div id="containercompare" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                </div>
                                
                                
                                

                                <script type="text/javascript">
                                    var chart = null;

                                    $(document).ready(function () {
                                    //win graph version 2 using comparison data
                                    
                                    var seriesOptions = [];
                                    var seriesCounter = 0;
                                    var namesresult = ['winresult', 'excesswin', 'ownedwin'];
                                    var id = {{ $machine->id }};    
                                            
                                    /**
                                     * Create the chart when all data is loaded
                                     * @returns {undefined}
                                     */
                                    function createChart() {

                                        Highcharts.stockChart('containercompare', {
                                        //rangeSelector: { buttons: [{type: 'month',count: 3,text: '3m'},{type: 'month',count: 6,text: '6m'},{type: 'ytd',count: 1,text: 'YTD'},{type: 'year',count: 1,text: '1y'},{type: 'all',text: 'All'}],selected: 1},
                                       rangeSelector: {
                                                    inputPosition: {
                                                            align: 'left',
                                                            x: 5,
                                                            y: 23
                                            },
                                                    buttonPosition: {
                                                            align: 'right',
                                                            x: 4,
                                                            y: 45
                                            },
                                            },

                                            yAxis: {
                                                  min: -10,
                                                        tickInterval: 5,
                                                      title: {
                                                        text: 'Win Graph',
                                                    },
                                                plotLines: [{
                                                    value: 0,
                                                    width: 2,
                                                    color: 'silver'
                                                }]
                                            },

                                            plotOptions: {
                                                series: { showInNavigator: true }
                                            },

                                            tooltip: {
                                                valueDecimals: 0,
                                                split: true
                                            },
                                                    
//                                            tooltip: {
//                                                formatter: function() {
//                                                    var ex = this.points[0].series.xAxis.getExtremes();

                                                    //return 'min: ' + new Date(ex.min) + '<br>max: ' + new Date(ex.max) + '<br>actual point: ' + new Date(this.x);
//                                                }
//                                            },

                                            series: seriesOptions
                                        });
                                    }

                                    $.each(namesresult, function (i, name) {
                                       
                                    var base_urllink = window.location.origin;
                   
                                    if (base_urllink == "http://localhost"){
                                        var base_url = "http://localhost/coinoponlinebeta/public/";
                                    }else{
                                        var base_url = "https://www.ascentri.com/";
                                    }
                                        
                                        $.getJSON(base_url + name + "/" + id,    function (dataresult) {
                                            seriesOptions[i] = {
                                                name: name,
                                                data: dataresult
                                            };

                                            seriesCounter += 1;

                                            if (seriesCounter === namesresult.length) {
                                                createChart();
                                            }
                                        });
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
                                    
                                   
                                   
                                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!--                                    <div id="containervoltage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->

                                </div>

                                <script type="text/javascript">
                                    
                                 
                                    var chart = null;

                                    $(document).ready(function () {

                 
                                    //win graph version 2 using comparison data
                                    
                                    var seriesOptions = [];
                                    var seriesCounter = 0;
                                    var id = {{ $machine->id }};
                                    var names = ['pkvolt', 'slipvolt', 'retvolt'];

                                    /**
                                     * Create the chart when all data is loaded
                                     * @returns {undefined}
                                     */
                                    function createChartVolt() {

                                        Highcharts.stockChart('container', {

                                            rangeSelector: {
                                                selected: 4
                                            },

                                            yAxis: {
                                                     min: -10,
                                                     max: 50,
                                                     tickInterval: 5,
                                                     title: {
                                                        text: 'Voltage Graph',
                                                    },
                                                plotLines: [{
                                                    value: 0,
                                                    width: 2,
                                                    color: 'silver'
                                                }]
                                            },

                                            plotOptions: {
                                                series: {
                                                   
                                                    showInNavigator: true
                                                }
                                            },

                                            tooltip: {
                                                //pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                                                valueDecimals: 2,
                                                //split: true
                                            },

                                            series: seriesOptions
                                        });
                                    }

                                    $.each(names, function (i, name) {

                                    var base_urllink = window.location.origin;
                                    
                                    if (base_urllink == "http://localhost"){
                                        var base_url = "http://localhost/coinoponlinebeta/public/";
                                    }else{
                                        var base_url = "https://www.ascentri.com/";
                                    }
                                        
                                        $.getJSON(base_url + name + '/' + id,    function (data) {

                                            seriesOptions[i] = {
                                                name: name,
                                                data: data
                                            };

                                            // As we're loading the data asynchronously, we don't know what order it will arrive. So
                                            // we keep a counter and create the chart when all the data is loaded.
                                            seriesCounter += 1;

                                            if (seriesCounter === names.length) {
                                                createChartVolt();
                                            }
                                        });
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
                                    <td> Max Voltage : {{ $claw_settings->max_voltage }} </br>
                                        Min Voltage : {{ $claw_settings->min_voltage }}  </br>
                                        Max PWM : {{ $claw_settings->max_PWM }} </br>
                                        Min PWM : {{ $claw_settings->min_PWM }} </br>
                                        VoltDecRet %: {{ $claw_settings->voltDecRetPercentage }} </br>
                                        Latest Voltage : {{ $claw_settings->latest_voltage }} </br>
                                        Latest PWM : {{ $claw_settings->latest_PWM }} </br>
                                        Plus Pick : {{ $claw_settings->plusPick }} </br>
                                        Plus PickUp PWM : {{ $claw_settings->plusPickUpPWM }} </br>
                                        Start PWM : {{ $claw_settings->startPWM }} </br>
                                    </td>
                                    <td>
                                        Slip Voltage : {{ $claw_settings->startVolt }} </br>    
                                        Ret PWM : {{ $claw_settings->retPWM }} </br>
                                        Ret Voltage : {{ $claw_settings->retVolt }} </br>
                                        Pick PWM : {{ $claw_settings->pickPWM }} </br>
                                        Pick Voltage :  {{ $claw_settings->pickVolt }} </br>
                                        Inc Voltage : {{ $claw_settings->incVolt }} </br>
                                        Dec Voltage : {{ $claw_settings->decVolt  }} </br>
                                        Diff PickRe : {{ $claw_settings->diffPickRet }} </br>
                                        Volt Supply : {{ $claw_settings->voltSupply }} </br>
                                        Insuff Voltage Inc : {{ $claw_settings->insuffVoltInc  }} </br> 
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
                                        Play Index : {{ $game_settings->playIndex }} </br>
                                        Owed Win : {{ $game_settings->owedWin }} </br>
                                        Excess Win : {{ $game_settings->excessWin }}  </br>
                                        Prev Ewin : {{ $game_settings->prevEwin }}  </br>
                                        LuckyToWin : {{ $game_settings->luckyToWin }} </br>
                                        Game Left : {{ $game_settings->gameLeft }} </br>
                                        Random Time : {{ $game_settings->randomedTime }} </br>
                                        Game Time : {{ $game_settings->gameTime }} </br>

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
                                    <td> Total Won : {{ $machine_accounts->total_won }} </br>
                                        Total Dollar In : {{ $machine_accounts->total_dollar_in }}  </br>

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
                        <h3 class="panel-title"> <a href="{{ route('cash-boxes.edit', ['id' => $cash_boxes->machine_id]) }}"> 
                              <i class="icon wb-edit" aria-hidden="true"></i>  </a>Cash Boxes
                        </h3> 
                    </div>
                    <div class="panel-body">
                        <p>          
                        <table class="table table-bordered"> 
                            <tbody>
                                <tr>
                                    <td>  
                                        Coin1 Total In : {{ $cash_boxes->coin1_total_in }} </br>
                                        Coin2 Total In : {{ $cash_boxes->coin2_total_in }} </br>
                                        Coin3 Total In : {{ $cash_boxes->coin3_total_in }} </br>
                                        Coin4 Total In : {{ $cash_boxes->coin4_total_in }} </br>
                                        Total Game : {{ $cash_boxes->total_game }} </br>
                                        Total Test : {{ $cash_boxes->total_test }} </br>
                                        Rejection Counter : {{ $cash_boxes->rejectionCounter }} </br>
                                        InsuffMonPlay : {{ $cash_boxes->insuffMonPlay }} </br>
                                        InsuffMonClick : {{ $cash_boxes->insuffMonClick }} </br>
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
                                        Coin Per Play : {{ $product_def->coinPerPlay }} </br>
                                        Win Percentage : {{ $product_def->winPercentage }} </br>
                                        Total PurCost : {{ $product_def->ttlPurCost }} </br>
                                        No Of Plays : {{ $product_def->numberOfPlays }} </br>
                                        Stock Left : {{ $product_def->stockLeft }} </br>
                                        Stock Added : {{ $product_def->stockAdded }} </br>
                                        Stock Removed : {{ $product_def->stockRemoved }} </br>
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



  <!-- Modal form for test Go function -->
    <div id="testgoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <meta id="token" name="token" content="{ { csrf_token() } }">     
                        {{ csrf_field() }}   
<!--                        <input type="text" name="id" value="{{ $machine->id }} ">-->
                        <div class="form-group">
                            <div class="col-sm-10">                               
                                <input type="text" class="form-control" id="id_delete" disabled="" style="display: none;">
                                Please Enter Play Credits: <input type="text" id="playcredits">
                            </div>
                        </div>
                    
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Proceed
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
  
  <script>    
$(document).ready(function() {   
  
//Test Go Functionality
$('.delete-modal').on('click', function() {
           // $('.modal-title').text('Run Machine Test Go!');
            $('#id_delete').val($(this).data('id'));
            $('#testgoModal').modal('show');
            //playcredits = $('#playcredits').val();
            id = $('#id_delete').val();
});

$('.modal-footer').on('click', '.delete', function() {
           playcredits = $('#playcredits').val();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax({
                type: 'POST',
                url: "{{ URL::route('testGo') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                    'playcredits': playcredits
                },

                success: function(data) {
                     toastr.success('Test Go Successfully Sent! Machine now processing the data.', 'Success Alert', {timeOut: 10000});
                     console.log(data['gameLeft'])
                },
                error: function(response) {
                    console.log(response.msg);
                    console.log('errorrrrr')
                }
    
            });
    });
        
});


</script>

@endsection