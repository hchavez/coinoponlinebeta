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
                                
<!--                                <div class="col-xl-12">
                                    <div id="containerwin" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                                </div>-->
                                
                                 <div class="col-xl-12">
                                     
                                    <div id="containercompare" style="min-width: 310px; height: 600px; margin: 0 auto"></div>

                                </div>
                                
                                
                                

                                <script type="text/javascript">
                                    var chart = null;

                                    $(document).ready(function () {
                                        
                                                         
                                    //win graph version 2 using comparison data
                                    
                                    var seriesOptions = [],
                                        seriesCounter = 0,
                                        id = {{ $machine->id }}
                                        namesresult = ["winresult", "excesswin", "ownedwin"];
                                        //names = ["excesswin"];       
                                            
                                    /**
                                     * Create the chart when all data is loaded
                                     * @returns {undefined}
                                     */
                                    function createChart() {

                                        Highcharts.stockChart('containercompare', {

                                            rangeSelector: {
                                                //selected: 4
                                            },

                                            yAxis: {
                                                  min: -10,
                                                        max: 60,
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
                                                series: {
                                                    showInNavigator: true
                                                }
                                            },

                                            tooltip: {
                                               //pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                                                valueDecimals: 0,
                                                //split: true
                                            },

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
                                            //console.log(dataresult);
                                            // As we're loading the data asynchronously, we don't know what order it will arrive. So
                                            // we keep a counter and create the chart when all the data is loaded.
                                            seriesCounter += 1;

                                            if (seriesCounter === names.length) {
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
                                    
                                    var seriesOptions = [],
                                        seriesCounter = 0,
                                        id = {{ $machine->id }}
                                        names = ['pkvolt', 'slipvolt', 'retvolt'];

                                    /**
                                     * Create the chart when all data is loaded
                                     * @returns {undefined}
                                     */
                                    function createChart() {

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
                                                split: true
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