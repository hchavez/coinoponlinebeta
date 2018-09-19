@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Themes</h3>
    </header>
    <div class="panel-body"> 
       <div id="theme_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


            <div class="row">
                <!--div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div-->
                <div class="col-sm-12">
                    <button type="button" id="clearFilter" class="btn btn-danger"  value="0" style="vertical-align: bottom;">Clear Filter</button>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="themesDiv" role="grid" aria-describedby="exampleTableSearch_info" >
                        
                        <thead>
                            <tr role="row"  style="border-top: 1px solid #e4eaec;">
                                <th>Prize Code</th>	
                                <th>Theme</th>	
                                <th>Cost</th>	
                                <th>PrizeSetting</th>	
                                <th>Min Exp $perwin</th>	
                                <th>Max Exp $perwin</th>
                                <th>Active</th>
                                
                        </thead>
                           <tbody>
                            @foreach ($themes as $theme)
                            <tr role="row">
                                <td> {{ $theme->product_code  }} </td>
                                <td> {{ $theme->theme  }} </td>
                                <td> {{ $theme->cost  }}</td>
                                <td> {{ $theme->prize_setting  }}</td>
                                <td> {{ $theme->min_expected_doll_per_win  }}</td>
                                <td> {{ $theme->max_expected_doll_per_win  }}</td>
                                <?php if($theme->active == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>

                            </tr>
                            @endforeach
                        </tbody>                        
                       
                    
                    </table>
                </div></div>
            
            
              <div class="row">
               
               
            </div>
            
            
        </div>
    </div>
</div>
<style>
.select2-container{width:100% !important;}
.select2-container .select2-choice > .select2-chosen{color:#333 !important;}
</style>
<script>
$(document).ready(function() {
    $('#themesDiv').DataTable( {
        pageLength: 20,
        dom: 'Bfrtip',
        buttons: ['excelHtml5'],
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
    $('#themesDiv select').each(function(i) {
        var label = ['Prize Code', 'Theme', 'Cost', 'Prize Setting','Min Exp $perwin','Max Exp $perwin','Active'];
        $(this).attr('id', 'filter'+(i+1));        
        $("#filter" + (i+1)).select2({
            placeholder: label[i]
        });        
    });  
   
    $('#clearFilter').click(function(){ 
        $('select').val($(this).data('val')).trigger('change');
    });
   
});
</script>

@endsection

