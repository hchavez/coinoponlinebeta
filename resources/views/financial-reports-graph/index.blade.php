@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Financial Reports</h3>
    </header>
    <?php //print_r($machinelogs); ?>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> 
            <div class="row">
                <div class="col-xl-12">
                <!-- Example Tabs -->
                <div class="example-wrap">
                  <div class="nav-tabs-horizontal" data-plugin="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne"
                          aria-controls="exampleTabsOne" role="tab">George System and Card Reader</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsTwo"
                          aria-controls="exampleTabsTwo" role="tab">George System</a></li>    
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsThree"
                          aria-controls="exampleTabsThree" role="tab">Card Reader</a></li>    
                    </ul>
                    <div class="tab-content pt-20">
                      <div class="tab-pane active" id="exampleTabsOne" role="tabpanel"><div id="container" style="height: 400px"></div></div>
                      <div class="tab-pane" id="exampleTabsTwo" role="tabpanel"><div id="createGeorge" style="height: 400px"></div></div>   
                       <div class="tab-pane" id="exampleTabsThree" role="tabpanel"><div id="cardReader" style="height: 400px"></div></div>  
                    </div>
                  </div>
                </div>
                <!-- End Example Tabs -->
              </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <!-- Example Bordered Table -->
                    <div class="example-wrap">                                     
                      <div class="example table-responsive">
                        <table class="table table-bordered">
                          <thead><tr><th></th><th>Coin</th><th>Bill</th><th>Card</th><th>Total</th></tr></thead>
                          <tbody>
                            <tr><td>Today</td><td><?php echo round($coin['today'],2);  ?></td><td>{{ $bill['today'] }}</td><td>{{ $card['today'] }}</td><td><?php echo round($coin['today'] + $bill['today'] + $card['today'], 2); ?></td></tr>
                            <tr><td>Yesterday</td><td><?php echo round( $coin['yesterday'],2);  ?></td><td>{{ $bill['yesterday'] }}</td><td>{{ $card['yesterday'] }}</td><td><?php echo round($coin['today'] + $bill['today'] + $card['today'], 2); ?></td></tr>
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
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script>   
//var base_urllink = window.location.origin;
//if (base_urllink = "http://localhost"){ var base_url = "http://localhost/coinoponlinebeta/public/"; }
//else{var base_url = "https://www.ascentri.com/";}
//console.log(base_urllink);

var base_url = "https://www.ascentri.com/";
var seriesOptions = [], seriesCounter = 0, names = ['coin','bill','card'];
var georgeSeriesOptions = [], georgeSeriesCounter = 0, georgeNnames = ['georgeCoin','georgeBill','georgeCard'];
var cardSeriesOptions = [], cardSeriesCounter = 0, cardNnames = ['cardReader_Coin','cardReader_Bill','cardReader_Swipe'];

function createChart() {
    Highcharts.stockChart('container', {    
        chart: { height: 500 },
        title: { text: 'George system and Card reader' },        
        rangeSelector: { buttons: [{type: 'month',count: 3,text: '3m'},{type: 'month',count: 6,text: '6m'},{type: 'ytd',count: 1,text: 'YTD'},{type: 'year',count: 1,text: '1y'},{type: 'all',text: 'All'}],selected: 4},
        yAxis: { 
            min: -10, 
            max: 700, 
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
            changeDecimals: 2,
            valueDecimals: 2,
            //shared: true,
            //useHTML: true,
            //headerFormat: '<small>{point.key}</small><table>',
            //pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' + '<td style="text-align: right"><b>{point.y} </b></td></tr>',
            //footerFormat: '</table>'
        },
        series: seriesOptions
    });
}
$.each(names, function (i, name) {
    $.getJSON(base_url +  name , function (data) {        
        seriesOptions[i] = { type: 'column', name: name, data: data };       
        seriesCounter += 1;
        
        if (seriesCounter === names.length) { createChart(); }
    });
});

//Georgie only
function georgeCreateChart() {
    Highcharts.stockChart('createGeorge', {  
        chart: { height: 500 },
        title: { text: 'George system' },        
        rangeSelector: { buttons: [{type: 'month',count: 3,text: '3m'},{type: 'month',count: 6,text: '6m'},{type: 'ytd',count: 1,text: 'YTD'},{type: 'year',count: 1,text: '1y'},{type: 'all',text: 'All'}],selected: 4},
        yAxis: { 
            min: -10, 
            max: 700, 
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
            changeDecimals: 2,
            valueDecimals: 2,
            //shared: true,
            //useHTML: true,
            //headerFormat: '<small>{point.key}</small><table>',
            //pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' + '<td style="text-align: right"><b>{point.y} </b></td></tr>',
            //footerFormat: '</table>'
        },
        series: georgeSeriesOptions
    });
}
$.each(georgeNnames, function (i, name) {
    $.getJSON(base_url +  name , function (data) {  
        georgeSeriesOptions[i] = { type: 'column', name: name, data: data };       
        georgeSeriesCounter += 1;
        if (georgeSeriesCounter === georgeNnames.length) { georgeCreateChart(); }
    });
});


//Card reader
function cardCreateChart() {
    Highcharts.stockChart('cardReader', {   
        chart: { height: 500 },
        title: { text: 'Card Reader' },        
        rangeSelector: { buttons: [{type: 'month',count: 3,text: '3m'},{type: 'month',count: 6,text: '6m'},{type: 'ytd',count: 1,text: 'YTD'},{type: 'year',count: 1,text: '1y'},{type: 'all',text: 'All'}],selected: 4},
        yAxis: { 
            min: -10, 
            max: 700, 
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
            changeDecimals: 2,
            valueDecimals: 2,
            //shared: true,
            //useHTML: true,
            //headerFormat: '<small>{point.key}</small><table>',
            //pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' + '<td style="text-align: right"><b>{point.y} </b></td></tr>',
            //footerFormat: '</table>'
        },
        series: cardSeriesOptions
    });
}
$.each(cardNnames, function (i, name) {
    $.getJSON(base_url +  name , function (data) {  
        cardSeriesOptions[i] = { type: 'column', name: name, data: data };       
        cardSeriesCounter += 1;
        if (cardSeriesCounter === cardNnames.length) { cardCreateChart(); }
    });
});

</script>
@endsection