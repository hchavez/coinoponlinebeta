@extends('layouts.app-template')


@section('content')


<!-- Page -->

<meta http-equiv="refresh" content="300" >
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
                                            <th>Date Time</th>
                                            <th>Machine Model</th>
                                            <th>Machine Type</th>
                                            <th>Name & Serial No</th>
                                            <th>Error Messages</th>
                                            <th>Site</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                          @foreach ($machinelogs as $machinelog)
                                        <tr role="row"  @if ($machinelog->errortype == '1') class="table-danger" @endif >
                                            <td>  {{ date('d/m/Y h:i A', strtotime($machinelog->date_created))}}</td>
                                            <td>  {{ $machinelog->machine_model}} </td>
                                            <td>  {{ $machinelog->machine_type}} </td>
                                            <td>  {{ $machinelog->comments}} - {{ $machinelog->serial_no}}</td>
                                            <td> <strong><a href="#" data-toggle="modal" data-target="#myModal{{$machinelog->error_id}}" style="text-decoration: none;">

                                                        @if ($machinelog->errortype == '2') 
                                                        <span class="badge badge-warning">Warning!</span> 
                                                        @endif @if ($machinelog->errortype == '3')
                                                        <span class="badge badge-info">Notice!</span> 
                                                        @endif
                                                        
                                                        @if ($machinelog->errortype == '1') 
                                                        <span class="blink_me"> <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?></span> 
                                                        @else
                                                        <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?>
                                                        @endif
                                                         </a></strong>
                                            </td>
                                                        
                                            <td>@if ($machinelog->errortype == '1') <span class="blink_me">{{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}}</span> @else
                                                {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @endif 
                                            </td>   

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                        <div class="example-wrap">
                <h4 class="example-title">Table Section</h4>
                <div class="example">
                  <table class="table table-hover">
                        <thead>
                           <tr role="row">
                               <th></th>
                               <th>Date Time</th>
                               <th>Machine Model</th>
                               <th>Machine Type</th>
                               <th>Name & Serial No</th>
                               <th>Error Messages</th>
                               <th>Site</th>
                               <th>Instances</th>
                           </tr>  
                        </thead>
              
                             <tbody class="table-section" data-plugin="tableSection">
                                  
                            
                          <tr>
                            <td class="text-left"><i class="table-section-arrow"></i></td>
                            <td class="text-left">date</td>
                            <td class="font-weight-medium">
                             
                            </td>
                            <td>
                              <span class="badge badge-danger">Canceled</span>
                            </td>
                            <td class="hidden-sm-down">
                              <span class="text-muted">July 10, 2017</span>
                            </td>
                             <td class="hidden-sm-down">
                              <span class="text-muted">July 10, 2017</span>
                            </td>
                             <td class="hidden-sm-down">
                              <span class="text-muted">July 10, 2017</span>
                            </td>
                            <td class="hidden-sm-down">
                              <span class="text-muted">0</span>
                            </td>
                          </tr>
                             
                        </tbody>
                 
                        
                         
                   
                        <tbody>
                          <tr>
                            <td></td>
                            <td class="font-weight-medium text-success">
                              ##MODULE-1111
                            </td>
                            <td>
                              Done
                            </td>
                            <td class="hidden-sm-down">
                              July 27, 2017
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td class="font-weight-medium text-success">
                              ##MODULE-723
                            </td>
                            <td>
                              Done
                            </td>
                            <td class="hidden-sm-down">
                              July 7, 2017
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td class="font-weight-medium text-success">
                              ##MODULE-4200c
                            </td>
                            <td>
                              Done
                            </td>
                            <td class="hidden-sm-down">
                              July 12, 2017
                            </td>
                          </tr>
                        </tbody>
                    
                    <tbody class="table-section" data-plugin="tableSection">
                      <tr>
                        <td class="text-center"><i class="table-section-arrow"></i></td>
                        <td class="font-weight-medium">
                          Project #28686
                        </td>
                        <td>
                          <span class="badge badge-info">Testing</span>
                        </td>
                        <td class="hidden-sm-down">
                          <span class="text-muted">July 12, 2017</span>
                        </td>
                      </tr>
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

@foreach ($machinelogs as $machinelog)

<div id="myModal{{$machinelog -> error_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

         Modal content
         <form action="{{ URL::to('dashboard/update_error_status') }}" method="post" id="status-update">
          <input type="text" name="errorid" value="{{ $machinelog->error_id }}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                <h4 class="modal-title">Error Type: 

                
                @if ($machinelog->errortype == "1")
                   <span class="badge badge-danger">Needs Immediate Attention!</span> 
                @endif
                
                @if ($machinelog->errortype == "2")
                    <span class="badge badge-warning">Warning!</span
                @endif
                
                @if ($machinelog->errortype == "3")
                   <span class="badge badge-info">Notice!</span> 
                @endif

                                                        
                
                </h4>
            </div>
            <div class="modal-body">
                <p><strong>Error Message: <?php $errorstring = str_replace(",","",$machinelog -> error); echo $errorstring;?></strong></p>
                <p>Name and Serial No:  {{ $machinelog->comments}} - {{ $machinelog->serial_no}} </p> 
                <p>Machine Type:  {{ $machinelog->machine_type}} </p>
                 <p>Machine Model: {{ $machinelog->machine_model}} </p>
                 <p>Site Address:  {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} </p>
                 <p>  <input type="checkbox" id="error-resolve" name="resolve" value="2" > Resolve</p>
            </div>
            <div class="modal-footer">
                 <input class="btn btn-primary" type="submit" value="Update" />
                 <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
            
        </div>
    </form>
    </div>
</div>

@endforeach

<script>
//    $('#status-update').on("click", function(e){
//        $('input:checkbox').change(function(e) {
//            e.preventDefault();
//            var data = $(this).serialize();
//            var url = $(this).attr('action');
//            var isChecked = $("input:checkbox").is(":checked") ? 2:1;
//            $.post(url,data, function(data){
//                console.log(isChecked)
//            })
//    });
    
    
    $(document).ready(function() {

    $("#status-update").submit(function(e) {
            e.preventDefault();
             
            var statusval = $("input#error-resolve").val();
            var data = {status:statusval};
            console.log(data);
            
            var request = $.ajax({
              url: 'http://localhost/coinoponlinebeta/public/dashboard/update_error_status',
              type: "POST",
              data: data ,
              dataType: "html"              
            });
  
          request.done(function( msg ) {
            var response = JSON.parse(msg);
            console.log(response.msg);
          });

          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });

    });

});


</script>

@endsection

