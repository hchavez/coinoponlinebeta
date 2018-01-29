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
            'excel'           
        ],
        scrollY: '450px',
        paging: true,
        autoFill: true,
        pageLength: 100,       
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;                
                var select = $('<select><option value=""></option></select>')
                    .appendTo( '#filterDiv' )
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
     
    $('#filterDiv select').each(function(i) {
        $(this).attr('id', 'filter'+(i+1));
        $("#filter" + i).select2();     
        
        $('#fitlerThisMachine thead tr th div').each(function(i) {
            var kim = $(this).html();
            console.log(kim);
            
        });
        
        //$(this).attr('value',kim);
        
    });   
     
    $('#dashboard_sort').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'           
        ],
        scrollY: '450px',
        paging: true,
        autoFill: true,     
        pageLength: 100,
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
    
    
    $('#dashboard_sort select').each(function(i) {
        $(this).attr('id', 'filter'+(i+1));
        $("#filter" + i).select2();             
    });
    
    //Click whole row
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    
    //Change export button label
    $('.dt-button.buttons-excel span').html('Export to excel');
       
    
});
