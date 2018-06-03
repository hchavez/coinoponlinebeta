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
                
                <div class="col-lg-4"></div>
                <div class="col-lg-3"></div>                
                <div class="col-lg-3 text-right"></div>
                <div class="col-lg-2"></div>
                
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
                      <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">
                          <div id="container" style="height: 400px"></div>
                      </div>
                      <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
                            <div id="createGeorge" style="height: 400px"></div>
                      </div>   
                       <div class="tab-pane" id="exampleTabsThree" role="tabpanel">
                           Card reader
                      </div>  
                    </div>
                  </div>
                </div>
                <!-- End Example Tabs -->
              </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script>    
var seriesOptions = [], seriesCounter = 0, names = ['Coin', 'Bill','Card'];

function createChart() {
    Highcharts.stockChart('container', {
        title: { text: 'George system and Card reader' },        
        rangeSelector: { buttons: [{type: 'ytd',count: 1,text: 'YTD'}, {type: 'all',text: 'All'}],selected: 4},
        yAxis: { min: -10, max: 60, tickInterval: 10,title: { text: 'Revenue'},            
            plotLines: [{ value: 100, width: 1, color: '#333333', zIndex: 3 }] },
        plotOptions: { series: { showInNavigator: true }  },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
            changeDecimals: 2,
            valueDecimals: 2
        },
        series: seriesOptions
    });
}
$.each(names, function (i, name) {
    $.getJSON('http://localhost/coinoponlinebeta/public/financialLogs', function (data) {
        seriesOptions[i] = { name: name, data: data, type: 'column' };       
        seriesCounter += 1;
        if (seriesCounter === names.length) { createChart(); }
    });
});
</script>


@endsection