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
               
                        
                        
                 
              <!-- Example Table section -->
              <div class="example-wrap">
                <h4 class="example-title">Machine LIVE Error Status</h4>
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
                    
                  @foreach ($machinelogs as $machinelog)
                    <tbody class="table-section" data-plugin="tableSection" >
                      <tr>
                        <td class="text-center">
                             <?php foreach ($machinelogsgroup as $machineloggroup):
                                if ($machinelog->error == $machineloggroup->error){
                                ?>
                                     <i class="table-section-arrow"></i>
                                     
                                <?php break; }
                                
                                endforeach; ?>
                         
                        </td>
                         <td class="text-left"> {{ date('d/m/Y h:i A', strtotime($machinelog->date_created))}} </td>
                           <td class="font-weight-medium">
                                                        {{ $machinelog->machine_model}} 
                                                  </td>
                                                  <td>
                                                  {{ $machinelog->machine_type}}
                                                  </td>
                                                  <td class="hidden-sm-down">
                                                    <span class="text-muted"> {{ $machinelog->comments}} - {{ $machinelog->serial_no}} </span>
                                                  </td>
                                                  <td class="hidden-sm-down">
                                                    <strong><a href="#" data-toggle="modal" data-target="#myModal{{$machinelog->error_id}}" style="text-decoration: none;">

                                                        @if ($machinelog->errortype == '2') 
                                                        <span class="badge badge-warning">Warning!</span> 
                                                        @endif @if ($machinelog->errortype == '3')
                                                        <span class="badge badge-info">Notice!</span> 
                                                        @endif
                                                        
                                                        @if ($machinelog->errortype == '1') 
                                                        <span class="badge badge-danger blink_me" style="font-size: 13px;"> <strong> Needs Immediate Attention!</strong></span> <span class="blink_me" sstyle="font-size: 14px;"tyle="font-size: 13px;"> <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?></span> 
                                                        @else
                                                        <?php $errorstring =str_replace(",","",$machinelog -> error); echo $errorstring;?>
                                                        @endif
                                                         </a></strong>
                                                    </td>
                                                    
                                                    <td class="hidden-sm-down">
                                                   @if ($machinelog->errortype == '1') {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @else
                                                    {{ $machinelog -> site_name}} {{ $machinelog -> street}} {{ $machinelog -> suburb}} {{ $machinelog -> statecode}} @endif 
                                                    </td>
                                                    
                                                    <td class="hidden-sm-down">
                                                        
                                                       <?php
                                                       $countarray = array();
                                                       $temp=0;
                                                       foreach ($machinelogsgroup as $machineloggroup):
                                                             
                                                              if ($machineloggroup->error == $machinelog->error){ ?>
                                                        
                                                            <?php 
                                                            $count = 1;
                                                            array_push($countarray, $count); 
                                                           
                                                            
                                                            ?>
                                                            
                                                               
                                                                
                                                       <?php }
                                                           endforeach;?>
                                                            <span class="text-muted"><?php echo sizeof($countarray);?></span>
                                                    </td>
                      </tr>
                    </tbody>
                    
                    <tbody> 
                         @foreach ($machinelogsgroup as $machineloggroup)
                            @if ($machineloggroup->error == $machinelog->error)
                         <tr>
                          <td> &nbsp;</td>
                            <td class="text-left">
                               {{ date('d/m/Y h:i A', strtotime($machineloggroup->created_at))}}
                           </td> <td> &nbsp;</td> <td> &nbsp;</td> <td> &nbsp;</td>
                           <td>
                              @if ($machineloggroup->type == '1') 
                              <span class="badge badge-danger" > Needs Immediate Attention! </span>
                              @endif
                              <?php $errorstring =str_replace(",","",$machineloggroup -> error); echo $errorstring;?>
                           </td>
                           <td class="hidden-sm-down">
                            
                           </td>
                           <td class="hidden-sm-down">
                               &nbsp;
                           </td>
                         </tr>
                            @endif
                         @endforeach
                    </tbody>
                    @endforeach
                
                  </table>
                </div>
              </div>
              <!-- End Example Table-section -->
        
                        
                        
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
         <form action="{{ URL::to('dashboard/update_error_status') }}" method="post" id="status-update" >   
         <meta id="token" name="token" content="{ { csrf_token() } }">     
         {{ csrf_field() }}   
          <input type="hidden" name="errorid" value="{{ $machinelog->error_id }}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                <h4 class="modal-title">Error Type: 
                <div id="md-msg"></div>
                
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
    
    $(document).ready(function() {   

    $("#status-update").submit(function(e) {
            e.preventDefault();

            $('.modal-dialog').css('text-align','center');
            $('.modal-dialog').html('<img src="https://www.ascentri.com/global/photos/loading.gif" width="60px">');            

            var statusval = $("input#error-resolve").val();            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response){                     
                    $('.modal-dialog').html('<div class="alert dark alert-success alert-dismissible" role="alert">Resolve Successfully!</div>'); 
                    setTimeout(function() { location.reload(); }, 2000);               
                },
                error: function(response){
                    $('.modal-dialog').html('<div class="alert dark alert-danger alert-dismissible" role="alert">Error!</div>');
                }
            }); 

    });

});


</script>

@endsection

