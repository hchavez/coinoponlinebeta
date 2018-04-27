@extends('layouts.appmachine-left-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">

            <div class="panel-body">

                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
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
                                    <label class="col-sm-12 control-label"> IP Address: {{ $machine->ip_address }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Comments: {{ $machine->machine_comments }}  </label>
                                </div>
                            </div>
                        
                        </div> 

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="GET" action="#">
                                <div class="input-group input-daterange">
                                <input type="hidden" name="logtype" value="winlogs">
                                <input type="hidden" name="id" value="{{ $machine->id }}">
                                <input type="text" id="min-date" name="startdate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="From:">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="max-date" name="enddate" class="form-control date-range-filter" data-date-format="yyyy-mm-dd" placeholder="To:">                        
                                <button type="submit" class="btn btn-primary">Search</button> 
                                </div>
                            </form>
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                            
                            <table id="" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    
                                    <tr role="row">
                                        <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" >ID</th>
                                        <th width="20%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >swipeIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >type</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >paymentResult</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >declineReason</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forPlay</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forClick</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >pricePlay</th>
                                        <th width="15%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>

                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    @foreach($money as $data)                                        
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $data['id'] }} </td>
                                            <td class="hidden-xs">{{date('d/m/Y h:i A', strtotime($data['created_at']))}}</td>
                                            <td class="hidden-xs">{{ $data['coinIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['ttlCoinIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['billIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['ttlBillIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['swipeIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['type'] }}</td>
                                            <td class="hidden-xs">{{ $data['payment_result'] }}</td>
                                            <td class="hidden-xs">{{ $data['decline_reason'] }}</td>
                                            <td class="hidden-xs">{{ $data['ttlMoneyIn'] }}</td>
                                            <td class="hidden-xs">{{ $data['forPlay'] }}</td>
                                            <td class="hidden-xs">{{ $data['forClick'] }}</td>
                                            <td class="hidden-xs">{{ $data['pricePlay'] }}</td>
                                            <td class="hidden-xs">{{ $data['credits'] }}</td>
                                            <td class="hidden-xs">{{ $data['status'] }}</td>
                                        </tr>      
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr role="row">
                                        <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>              
                                        <th width="25%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Date Time Log</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >coinIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlCoinIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >billIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlBillIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >swipeIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >type</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >paymentResult</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >declineReason</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ttlMoneyIn</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forPlay</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >forClick</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >pricePlay</th>
                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >credits</th>

                                        <th width="5%"  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Status</th>
                                    </tr>

                                </tfoot>
                            </table>
                        </div></div>
                        <div class="row">
                            
                            <div class="col-sm-12 text-center">
                                <div class="dataTables_paginate paging_simple_numbers" id="custom_paging">
                                    <?php                 
                                    if($total < 10){}else{
                                        $pages = array($total); for ($i=1;$i<=$total;$i++) $pages[$i-1]='<p>page'.$i.'</p>';
                                        if (empty($_GET['page'])) {
                                            $current = 1;
                                        }else{
                                            $current = $_GET['page'];
                                        }                                   
                                        $last = count($pages)+1;
                                        $curr0 = $current-4;
                                        $curr1 = $current+4;
                                            if ($curr0<=1) {
                                              $curr0 = 1;
                                              $curr1 = $last>10? 10 : $last;
                                            }
                                            if ($curr1>=$last) {
                                              $curr0 = $last-9 < 1 ? 1 : $last-9;
                                              $curr1 = $last;
                                            }
                                        if(empty($_GET['startdate'])){
                                            echo '<a href="?page=1">&#171;</a> ';
                                            for ($i=$curr0; $i<=$curr1; $i++) {
                                              $style = ($i==$current)? 'font-weight:bold':'';
                                              echo ' <a href="?page='.$i.'" style="'.$style.'">'.$i.'</a> ';
                                            }
                                            echo '<a href="?page='.$last.'">&#187;</a> ';
                                        }else{
                                            echo '<a href="'.$url.'&page=1">&#171;</a> ';
                                            for ($i=$curr0; $i<=$curr1; $i++) {
                                              $style = ($i==$current)? 'font-weight:bold':'';
                                              echo ' <a href="'.$url.'&page='.$i.'" style="'.$style.'">'.$i.'</a> ';
                                            }
                                            echo '<a href="'.$url.'&page='.$last.'">&#187;</a> ';
                                        } 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
