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
        buttons: [{
                extend: 'excel',
                title: '',
                filename: 'coinopsoftware'
            }],
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
    //var base_url = 'http://localhost/coinoponlinebeta/public/';
    var base_url = 'https://www.ascentri.com/';
    
    var export_icon = 'https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png';
    
    var complete_url = window.location.href;
    var pathname = window.location.pathname; // Returns path only
    var parts = pathname.split('/');
    var currentID = parts.pop() || parts.pop();  // handle potential trailing slash
    
    var urlFilter = new URL(complete_url);
    var filter = urlFilter.searchParams.get("dateRange");
    var input = (filter!=null)? '?dateRange='+filter : '' ;
    
    $('#klogs').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'errorapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                title: '',
                filename: 'errorlogs'
            }],
        deferRender:    true,       
        order: [[3,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'id'},{'data': 'type'},{'data': 'error'},{'data': 'created_at'},{'data': 'status'}]
    }); 
    $('#winlogs').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'winapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                title: '',
                filename: 'winlogs'
            }],
        deferRender:    true, 
        order: [[3,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'id'},{'data': 'testPlay'},{'data': 'winResult'},{'data': 'created_at'},{'data': 'totalWon'},{'data': 'playIndex'},{'data': 'owedWin'},
            {'data': 'excessWin'},{'data': 'stockLeft'},{'data': 'stockRemoved'},{'data': 'stockAdded'},{'data': 'nTimesOfPlay'},{'data': 'status'}]       
    });    
    $('#moneyapi').dataTable({  
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'moneyapi/'+currentID+input,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                title: '',
                filename: 'moneylogs'
            }],
        deferRender:    true,   
        order: [[0,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,        
        columns:[{'data': 'created_at'},{
                'data': 'coinIn', 
                render: function ( data, type, row ) {
                return '$ '+ Number(data).toFixed(2); }},{'data': 'ttlCoinIn',render: function ( data, type, row ) {
                return '$ '+ Number(data).toFixed(2); }},{'data': 'billIn'},{'data': 'ttlBillIn'},{'data': 'swipeIn'},{'data': 'type'},
                {'data': 'payment_result'},{'data': 'decline_reason'},{'data': 'cardType'},{'data': 'tCardData'},{'data': 'payment_span'},{'data': 'reference'},
                {'data': 'ttlMoneyIn',render: function ( data, type, row ) {return '$ '+ Number(data).toFixed(2); }},{'data': 'credits'}]       
  
    });    
    $('#goalsapi').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'goalsapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                title: '',
                filename: 'goalslog'
            }],
        deferRender:    true,       
        order: [[0,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'created_at'},{'data': 'testPlay'},{'data': 'playIndex'},{'data': 'pkPWM'},{'data': 'pkVolt',render: function ( data, type, row ) {
                return Number(data).toFixed(2); }},{'data': 'retPWM'}, {'data': 'retVolt',render: function ( data, type, row ) { return Number(data).toFixed(2); }},{'data': 'slipPWM'},{'data': 'slipVolt'},
            {'data': 'voltDecRetPercentage', render: function ( data, type, row ) { return Number(data).toFixed(2); }},
            {'data': 'plusPickUp',render: function ( data, type, row ) { return Number(data).toFixed(2); }},{'data': 'dropCount'},{'data': 'dropPWM'},{'data': 'dropVolt', render: function ( data, type, row ) {
                return Number(data).toFixed(2); }},{'data': 'incVoltage', render: function ( data, type, row ) { return Number(data).toFixed(2); }},{'data': 'decVoltage', render: function ( data, type, row ) {
                return Number(data).toFixed(2); }}]       
    });
    
    //excel button append
    $('#klogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#winlogs_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#moneyapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
    $('#goalsapi_wrapper button').html('<img src="'+export_icon+'" width="32px">'); 
      
    //Machine error report filter
    

});

