/*
* Custom script
*/
$(document).ready(function(){
    $.fn.dataTable.ext.errMode = 'none';
    var machine_details = ['state', 'type', 'model', 'serial', 'site', 'route', 'area'];
    $.each(machine_details, function(num, val){        
        $("#machine_" + val).select2(); //Dropdown autosuggest
        $("#machine_" + val).on('change', function(e){  $('form#filter_table').submit();  }); //Auto submit filter
    });  
    
    //Date picker
    $("#txtToDate").datepicker();
    $("#txtFromDate").datepicker(); 
    $("#min-date").datepicker();
    $("#max-date").datepicker();
    
    //toggle filter for machine list and report
    $('#filterBy').on('click', function(event) {        
        $('#filterDiv').toggle('show'); 
    });
       
    //filter table
    var table = $('#dashboard_sort').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel'],
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
    } );    
    
    //Click whole row
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });    
    
    //Filter customization
    $('#filterDiv select').each(function(i) {
        $(this).attr('id', 'filter'+(i+1));
        $("#filter" + (i+1)).select2();         
    });          
      
    $('#dashboard_sort thead th div').each(function(i, val) {        
        var label = $(this).html(); 
        $('#select2-chosen-'+ (i+1)).html(label);
    });
    
    //Change export button label    
    $('.dt-button.buttons-excel span').html('<img src="https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png" width="32px">'); 
    
    //search input in all tables
    $('#dashboard_sort_filter input').addClass('form-control');       
            
    //Display machine list from json query result
    var base_url = 'http://localhost/coinoponlinebeta/public/';
    var export_icon = 'https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png';
    
    
    var searchDate = '';
    $('#filterDate').click(function(){
        var today = new Date();
        var datey = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    
        var searchDate = '?date='+datey;        
    });
    console.log(searchDate);
    $('#klogs').dataTable({
        ajax: base_url+'errorapi',    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        columns:[{'data': 'id'},{'data': 'type'},{'data': 'error'},{'data': 'created_at'},{'data': 'status'}]
    }); 
    $('#winlogs').dataTable({
        ajax: base_url+'winapi',    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        columns:[{'data': 'id'},{'data': 'testPlay'},{'data': 'winResult'},{'data': 'created_at'},{'data': 'totalWon'},{'data': 'playIndex'},{'data': 'owedWin'},
            {'data': 'excessWin'},{'data': 'stockLeft'},{'data': 'stockRemoved'},{'data': 'stockAdded'},{'data': 'nTimesOfPlay'},{'data': 'status'}]       
    });    
    $('#moneyapi').dataTable({
        ajax: base_url+'moneyapi',    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        columns:[{'data': 'id'},{'data': 'created_at'},{'data': 'coinIn'},{'data': 'ttlCoinIn'},{'data': 'billIn'},{'data': 'ttlBillIn'},{'data': 'swipeIn'},{'data': 'type'},
            {'data': 'payment_result'},{'data': 'decline_reason'},{'data': 'ttlMoneyIn'},{'data': 'forPlay'},{'data': 'forClick'},{'data': 'pricePlay'},{'data': 'credits'},{'data': 'status'}]       
    });    
    $('#goalsapi').dataTable({
        ajax: base_url+'goalsapi',    
        dom: 'Bfrtip',
        buttons: ['excel'],
        deferRender:    true,       
        columns:[{'data': 'id'},{'data': 'testPlay'},{'data': 'pkPWM'},{'data': 'created_at'},{'data': 'pkVolt'},{'data': 'retPWM'},{'data': 'retVolt'},{'data': 'voltDecRetPercentage'},
            {'data': 'plusPickUp'},{'data': 'dropCount'},{'data': 'dropPWM'},{'data': 'dropVolt'},{'data': 'incVoltage'},{'data': 'decVoltage'},{'data': 'status'}]       
    });
    
    //excel button append
    $('#klogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#winlogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#moneyapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#goalsapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
      
    // filter date range
    /*$('.input-daterange input').each(function() {
      $(this).datepicker('clearDates');
    });
    
    table = $('#klogs').DataTable({ paging: false, info: false }); 
    moneytable = $('#moneyapi').DataTable({ paging: false, info: false });    
    
    $.fn.dataTable.ext.search.push( function(settings, data, dataIndex) {
        var min = $('#min-date').val();
        var max = $('#max-date').val();
        var createdAt = data[3] || 0; 
        var moneyapi = data[1] || 0;
        if ( (min == "" || max == "") || (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max)) ) { return true; }
        if ( (min == "" || max == "") || (moment(moneyapi).isSameOrAfter(min) && moment(moneyapi).isSameOrBefore(max)) ) { return true; }
        return false;
    });
    
    $('.date-range-filter').change(function(){  table.draw();  });
    $('.date-range-filter').change(function(){  moneytable.draw();  });
    $('#my-table_filter').hide();*/
    
    //clear filter
    $('#clearFilter').click(function() {        
        var baseurl = window.location.origin+window.location.pathname;
        window.location.href = baseurl;       
    });
    
    //Show filter indicator on mouse hover
    $(".table th").each(function() {
        $(this).hover(
          function() {
            $(this).append('<i class="wb-sort-vertical"></i>');
          }, function() {
            $(".wb-sort-vertical").css('display','none');
          }
        );
    });
  
    
});
