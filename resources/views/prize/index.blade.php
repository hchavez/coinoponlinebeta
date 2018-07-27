@extends('layouts.app-template')
@section('content')

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">List of Prizes</h3>
    </header>
    <div class="panel-body"> 
      <div id="prize_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <!--div class="col-md-12 text-left">
                    <button type="submit" id="clearFilter" class="btn btn-danger">Clear Filter</button>
                </div-->
                <div class="col-sm-12">
                    <div id="filterDiv" class="machine-custom-width"><br/></div>
                    <table class="table table-hover dataTable table-striped w-full dtr-inline table-responsive" id="prizeDiv" role="grid" aria-describedby="exampleTableSearch_info" >
                       
                        <thead>
                            <tr role="row"  style="border-top: 1px solid #e4eaec;">
                                <th>Prize Code</th>	
                                <th>Prize Name</th>	
                                <th>Cost</th>	
                                <th>Active</th>	
                        </thead>
                        <tbody>
                            @foreach ($prizes as $prize)
                            <tr role="row">
                                <td> {{ $prize->prize_code  }} </td>
                                <td> {{ $prize->prize_name  }} </td>
                                <td> {{ $prize->cost  }}</td>
                                <?php if($prize->active == '1') {$active = "Yes"; }else{ $active = "No"; }  ?>
                                <td> <?php echo $active; ?> </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div></div>    
            
        </div>
    </div>
</div>
<style>
.select2-container{width:100% !important;}
</style>
<script>
$(document).ready(function() {
    $('#prizeDiv').DataTable( {
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
    $('#prizeDiv select').each(function(i) {
        var label = ['Prize Code', 'Prize Name', 'Cost', 'Active'];
        $(this).attr('id', 'filter'+(i+1));        
        $("#filter" + (i+1)).select2({
            placeholder: label[i]
        });        
    });  
   
});
</script>

@endsection

