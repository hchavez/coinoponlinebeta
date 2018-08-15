@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            

            <div class="col-xxl-12 col-lg-12">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php if($permit['editAll']): ?><a href="{{ route('machine-management.edit', ['id' => $machine->id]) }}"> <i class="icon wb-edit" ></i> <?php endif; ?>  </a> {{ $machine->machine_description }} - Version - {{ $machine->version }}  
                        <a href="#">                        
                            <?php if($machine->category != "cardreader"){ ?>
                                <?php if($permit['editAll']): ?>
                                    <button class="delete-modal btn btn-danger" data-id="{{$machine->id}}" data-content="{{$machine->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> TEST GO!</button>
                                <?php endif; ?>
                            <?php } ?>
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
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                            
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"> Teamviewer: {{ $machine->teamviewer }}</label>
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
                                          <thead><tr><th></th><th>Coin</th><th>Note</th><th>Card</th><th>Total</th></tr></thead>
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
                                     var chart = null;
                                 var base_urllink = window.location.origin;
                   
                                    if (base_urllink == "http://localhost"){
                                        var base_url = "http://localhost/coinoponlinebeta/public/";
                                    }else{
                                        var base_url = "https://www.ascentri.com/";
                                    }
                                var category = '{{ $machine->category }}';  
                                var georgeSeriesOptions = [], georgeSeriesCounter = 0; 
                                
                                if(category == 'cardreader'){
                                     var georgeNnames = ['dailyCard'];
                                }else{
                                     var georgeNnames = ['dailyCoin','dailyBill','dailyCard'];  
                                }
                                
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
                                    <?php if($machine->category != "cardreader"){ ?>
                                    <div id="containercompare" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                    <?php } ?>
                                </div>
                                
                                
                                

                                <script type="text/javascript">
                                    var chart = null;

                                    $(document).ready(function () {
                                    //win graph version 2 using comparison data
                                    
                                    var seriesOptions = [];
                                    var seriesCounter = 0;
                                    var namesresult = ['winresult', 'excesswin', 'owedwin'];
                                    var id = {{ $machine->id }};    
                                            
                                    /**
                                     * Create the chart when all data is loaded
                                     * @returns {undefined}
                                     */
                                    function createChart() {

                                        Highcharts.stockChart('containercompare', {
                                            
                                       rangeSelector: {
                                                    inputPosition: { align: 'left', x: 5, y: 23 },
                                                    buttonPosition: { align: 'right', x: 4, y: 45 },
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
                                                valueDecimals: 2,
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
                                     <?php if($machine->category != "cardreader"){ ?>
                                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                     <?php } ?>
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

                                        new Highcharts.stockChart('container', {

                                              rangeSelector: {
                                                    inputPosition: { align: 'left', x: 5, y: 23 },
                                                    buttonPosition: { align: 'right', x: 4, y: 45 },
                                            },


                                            yAxis: {
                                                     min: -20,
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

                            
                            <!--------------------NEW MERGE GRAPH ON WIN AND GOALS LOGS----------------->
                            
                            <div class="row row-lg">
                                
                                <div class="col-xl-12">
                                   <?php if($machine->category != "cardreader"){ ?>
                                    <div id="containermergegraph" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
                                   <?php } ?>
                                </div>

                                <script type="text/javascript">
                                    
                                  var chart = null; 
                                 $(document).ready(function (){
                                     
                                     var id = {{ $machine->id }};
                                     var name = "machinegraphdata";
                                     var base_urllink = window.location.origin;

                                        if (base_urllink == "http://localhost"){
                                            var base_url = "http://localhost/coinoponlinebeta/public/";
                                        }else{
                                            var base_url = "https://www.ascentri.com/";
                                        }
                                        
                                  
                                    $.getJSON(base_url + name + '/' + id,  function (data) {
                                            
                                            var winresult = [], asowedWin = [], asexcessWin  = [],
                                                voltage = [], slipVolt= [], pkVolt = [], dropVolt = [],
                                                dataLength = data.length;
  
                                             var i = 0;

                                            for (i; i < dataLength; i += 1) {
                                                slipVolt.push([
                                                    data[i][0], // the date
                                                    data[i][1], // slipVolt
                                                ]);
                                                
                                                dropVolt.push([
                                                    data[i][0], // the date
                                                    data[i][2], // dropVolt
                                                ]);
                                                
                                                pkVolt.push([
                                                    data[i][0], // the date
                                                    data[i][3], // retVolt
                                                ]);

                                                winresult.push([
                                                    data[i][0], // the date
                                                    data[i][4], // winresult
                                                ]);
                                                
                                                asowedWin.push([
                                                    data[i][0], // the date
                                                    data[i][5], // asowedWin
                                                ]);
                                                
                                                asexcessWin.push([
                                                    data[i][0], // the date
                                                    data[i][6], // excessWin
                                                ]);
                                            }
                                            
                                         
                                            // create the chart
                                            Highcharts.stockChart('containermergegraph', {

                                              rangeSelector: {
                                                    inputPosition: { align: 'left', x: 5, y: 23 },
                                                    buttonPosition: { align: 'right', x: 4, y: 45 },
                                            },

                                                 plotOptions: {
                                                        series: {
                                                            showInNavigator: true,
                                                            dataGrouping: {
                                                            enabled: false,
                                                            
                                                            }
                                                        }
                                                    },
        
                                                
                                                title: {
                                                    text: 'Win And Voltage Graph Set'
                                                },

                                                yAxis: [{
                                                        min: -20,
                                                     max: 40,
                                                     tickInterval: 5,
                                                    labels: {
                                                        align: 'right',
                                                        x: -3
                                                    },
                                                    title: {
                                                        text: 'Voltage and Win Result'
                                                    },
                                                    height: '90%',
                                                    resize: {
                                                        enabled: true
                                                    }
                                                }
                                            ],
//
                                                tooltip: {
                                                    split: true,
                                                    //valueDecimals: 2,
                                                },

//                                          

                                                series: [{
                                                    type: 'spline', name: 'SlipVolt', data: slipVolt,

                                                },{
                                                    type: 'spline', name: 'RetVolt', data: dropVolt,

                                                },{
                                                    type: 'spline', name: 'PkVolt', data: pkVolt,

                                                },{
                                                    type: 'spline', name: 'ExcessWin',data: asexcessWin,
                                                },{
                                                    type: 'spline',name: 'WinResult',data: winresult,
                                                    marker: {
                                                            symbol: "url(data:image/png;base64,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 1dT1gvWd+ 1YfqGnRs+FYmKrhTbF5cVf9go3HjlG4dvyr+Z3JS0qavEuWTPZtJm6ebeLZ5bDpaql+aXDm4N2dq0Dd9WtO319kXbL5fNKNu7g7ZDuaO/PLi8ZafJzs07P1SkVPRU+lQ27tLdtWHX+G7R7ht7vPY07NXbW7z3/T7JvttVAVVN1WbVZftJ+7P3P66Jqun4lvttXa1ObXHtxwPSA/0HIw6217nU1R3SPVRSj9Yr60cOxx+ 1/p3vdy0NNg1VjZzG4iNwRHnk6fcJ3/ceDTradox7rOEH0x92HWcdL2pCmvKaRptTmvtbYlu6T8w+0dbq3nr8R9sfD5w0PFl5SvNUyWna6YLTk2fyz4ydlZ19fi753GDborZ752PO32oPb+ 16EHTh0kX/i +c7vDvOXPK4dPKy2+UTV7hXmq86X23qdOo8/pPTT8e7nLuarrlca7nuer21e2b36RueN87d9L158Rb/1tWeOT3dvfN6b/fF9/XfFt1+cif9zsu72Xcn7q28T7xf9EDtQdlD3YfVP1v+3Njv3H9qwHeg89HcR/cGhYPP/pH1jw9DBY+Zj8uGDYbrnjg+OTniP3L96fynQ89kzyaeF/6i/suuFxYvfvjV69fO0ZjRoZfyl5O/bXyl/erA6xmv28bCxh6+yXgzMV70VvvtwXfcdx3vo98PT+R8IH8o/2j5sfVT0Kf7kxmTk/8EA5jz/GMzLdsAAAAgY0hSTQAAeiUAAICDAAD5/wAAgOkAAHUwAADqYAAAOpgAABdvkl/FRgAAAVVJREFUeNpi/P37NwOxYM2pHtm7lw8uYmBgYGAiVtPC3RWh+88vuneT474Dv4DkcUZibJy8PG72le/nkn+zMzAaMhnNyY1clMpCjKbz/86lMLAzMMA0MTAwMOC1Ea6JgYFB9pPwncbMg6owOaY1p3pk15zqkcWnie8j63ddY18nZHmWI2eW3vzN/Jf168c3UfGuHathAXHl+7lkBnYGBtafDP8NVd3jQ8xKHiNrZMyeqPPtE/9vTgYGBgb1H4oHlHXt43ZfWfDwNzsDIwMDA4POX831RXGrg9BdxLhob63VgTurjsAUsv5k+A9jC3/g/NCdfVoQm/+ZIu3qjhnyW3XABJANMNL19cYVcPBQrZpq9eyFwCdJmIT6D8UD5cmbHXFphKccI9Mgc84vTH9goYhPE4rGELOSx0bSjsUMDAwMunJ2FQST0+/fv1Hw5BWJbehi2DBgAHTKsWmiz+rJAAAAAElFTkSuQmCC)"
                                                        }
                                         
                                                },{
                                                    type: 'spline', name: 'OwedWin',data: asowedWin,

                                                }
//                                                , {
//                                                    type: 'column',
//                                                    name: 'Volume',
//                                                    data: winresult,
//                                                    yAxis: 1
//                                                }
                                                    ], credits: {
                                                        enabled: false
                                                    },
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
            
            <?php if($machine->category != "cardreader"){ ?>
            <div class="col-xxl-4 col-lg-6">
                <!-- Example Panel With Heading -->
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('claw-settings.edit', ['id' => $claw_settings->machine_id]) }}"> <i class="icon wb-edit" ></i><?php endif; ?>  </a> Claw</h3> 
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
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('machine-settings.edit', ['id' => $machine_settings->machine_id]) }}"> <i class="icon wb-edit" ></i><?php endif; ?>  </a> Machine</h3> 
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
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('game-settings.edit', ['id' => $game_settings->machine_id]) }}" > <i class="icon wb-edit" ></i> <?php endif; ?> </a> Game</h3> 
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
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('machine-accounts.edit', ['id' => $machine_accounts->machine_id]) }}"> <i class="icon wb-edit" ></i><?php endif; ?>  </a> Accounts</h3> 
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
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('cash-boxes.edit', ['id' => $cash_boxes->machine_id]) }}"> 
                              <i class="icon wb-edit" aria-hidden="true"></i> <?php endif; ?>  </a>Cash Boxes
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
                        
                        <h3 class="panel-title"> 
                            <?php if($permit['editAll']): ?><a href="{{ route('product-definitions.edit', ['id' => $product_def->machine_id]) }}" > <i class="icon wb-edit" aria-hidden="true"></i> <?php endif; ?> </a>Product Definations</h3> 
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
            <?php } ?>


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