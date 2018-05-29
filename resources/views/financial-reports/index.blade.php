@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Financial Reports</h3>
    </header>
    <div class="panel-body">
        <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> 
            <div class="row">
                <div class="col-xxl-12 col-md-12">
                <!-- Panel Bar Stacked -->
                <div class="card card-shadow" id="chartBarStacked">
                  <div class="card-block p-0 p-30 h-full">
                    <div class="chart-header pb-10" style="height:calc(100% - 350px);">
                      <div class="font-size-20 inline-block">
                        Overview of
                        <div class="dropdown vertical-align-bottom ml-3 font-size-20">
                          <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"
                            role="complementary">
                            Last year
                          </div>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">The year before last</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Three years ago</a>
                          </div>
                        </div>
                      </div>
                      <div class="card-header-actions">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <span class="icon wb-medium-point blue-600 mr-5"></span>Coin</li>
                          <li class="list-inline-item">
                            <span class="icon wb-medium-point purple-600 mr-5"></span>TYPE2</li>
                          <li class="list-inline-item">
                            <span class="icon wb-medium-point blue-grey-300 mr-5"></span>TYPE3</li>
                        </ul>
                      </div>
                    </div>
                    <div class="ct-chart h-350"></div>
                  </div>
                </div>
                <!-- End Panel Bar Stacked -->
              </div>
            </div>
        </div>
    </div>
</div>
@endsection