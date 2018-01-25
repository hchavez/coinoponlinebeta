/*
* Custom script
*/
$(document).ready(function(){

    var machine_details = ['state', 'type', 'model', 'serial', 'site', 'route', 'area'];

    $.each(machine_details, function(num, val){        
        $("#machine_" + val).select2(); //Dropdown autosuggest
        $("#machine_" + val).on('change', function(e){  $('form#filter_table').submit();  }); //Auto submit filter
    });  

    //Date picker
    $("#txtToDate").datepicker();
    $("#txtFromDate").datepicker();    
    
    var table = $('#fitlerThisMachine').DataTable( {  
        dom: 'Bfrtip',
        buttons: [
            'excel',
            'columnsToggle'
        ],
        scrollY: '450px',
        'paging': true,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select id="searchFilter"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
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
                });
            } );
        }
    });
    
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    //$('<b>Toggle Column:</b>').insertBefore('#fitlerThisMachine_wrapper .dt-buttons');
    $('.dt-button.buttons-excel span').html('Export to excel');
    
    $('#toggleColumn button').click(function(){
        $('.dt-buttons').toggle("slow");
    });
    
    $('#dashboard_sort').DataTable({
        "order": [[ 3, "desc" ]],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
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
                });
            } );
        }
    } );
    
    
});
