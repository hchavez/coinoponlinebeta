@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Meters</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">   
                        <table class="table table-bordered" id="meters_table">
                            <thead>
                              <tr>
                                <th class="text-left">Meter Name</th>
                                <th class="text-left">Meter Description</th>
                                <th class="text-left">Meter Type</th>             
                                <th>Click Value</th> 
                                <th disabled>Edit</th> 
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($meters as $data)
                                <?php
                                $meter_type;
                                if($data->MeterTypeID=='1'): $meter_type = 'Money-Cash';
                                elseif($data->MeterTypeID=='2'): $meter_type = 'Test Goes';
                                elseif($data->MeterTypeID=='3'): $meter_type = 'Product Out';
                                elseif($data->MeterTypeID=='4'): $meter_type = 'Win';
                                elseif($data->MeterTypeID=='5'): $meter_type = 'Null';
                                elseif($data->MeterTypeID=='6'): $meter_type = 'Tickets Awarded';
                                elseif($data->MeterTypeID=='7'): $meter_type = 'Money--non-cash';
                                elseif($data->MeterTypeID=='8'): $meter_type = 'Test Goes – Non Cash';
                                else: $meter_type= '';
                                endif;
                                ?>
                                <tr>
                                    <td class="text-left">{{ $data->metername }}</td>
                                    <td class="text-left">{{ $data->meterdescription }}</td>
                                    <td class="text-left"><?php echo $meter_type; ?></td>
                                    <td>{{ $data->clickvalue }}</td>
                                    <td><a href="{{ url('meters/edit') }}?id={{ $data->id }}">EDIT</a></td>
                                    <!--td><a href="#">EDIT</a></td-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
.table td, .table th{padding:4px;}
.select2-container{width:100% !important;}
.select2-container .select2-choice > .select2-chosen{color:#333 !important;}
#meters_table_filter label{font-size:0.1px;color:#fff;}
</style>
<script>
$(document).ready(function() {
    
    $('#meters_table').DataTable( {
        pageLength: 15,        
        lengthChange: false,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });    
        
    //Filter customization   
    $('#meters_table select').each(function(i) {
        var label = ['Meter Name', 'Meter Description', 'Meter Type', 'Click Value'];
        $(this).attr('id', 'filter'+(i+1));        
        $("#filter" + (i+1)).select2({
            placeholder: label[i]
        });        
    });  
    
    //search adjustment
    $('#meters_table_filter label input').attr('placeholder','Search...');
    $('#meters_table_filter label input').addClass('form-control');
    $('select#filter5').attr('disabled','disabled');
   
});
</script>
@endsection