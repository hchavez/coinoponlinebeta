/*
* Custom script
*/
$(document).ready(function(){
      
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
    
    var origin   = window.location.origin;      
    if(origin==='http://localhost' || origin==='::1' || origin==="127.0.0.1"){
        var base_url = 'http://localhost/coinoponlinebeta/public/';
    }else{
        var base_url = 'https://www.ascentri.com/';
    }
    
    var export_icon = 'https://raw.githubusercontent.com/hchavez/coinoponlinebeta/master/public/assets/images/excel.png';
    
    var complete_url = window.location.href;
    var pathname = window.location.pathname; // Returns path only
    var parts = pathname.split('/');
    var currentID = parts.pop() || parts.pop();  // handle potential trailing slash
    
    var urlFilter = new URL(complete_url);
    var filter = urlFilter.searchParams.get("dateRange");
    var input = (filter!=null)? '?dateRange='+filter : '' ;
    $('#klogs').DataTable().destroy();
    $('#klogs').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'errorapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: '',
                filename: 'errorlogs',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastCol = sheet.getElementsByTagName('col').length - 1;
                    var colRange = createCellPos( lastCol ) + '1';                
                    var afSerializer = new XMLSerializer();
                    var xmlString = afSerializer.serializeToString(sheet);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                    var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                    var filterAttr = xmlDoc.createAttribute('ref');
                    filterAttr.value = 'A1:' + colRange;
                    xlsxFilter.setAttributeNode(filterAttr);
                    sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                    $('row c', sheet).attr( 's', '51' );
                }
            }],
        deferRender:    true,  
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        order: [[0,'desc']],
        columns:[{'data': 'created_at',
                'render': function (data, type, row) { 
                        var str = row.created_at.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
            },
            {'data': 'type'},
            {'data': 'error'},
            {'data': 'resolve_by', 
            'render': function (data, type, row) { 
                if ( row.resolve_by == '0'){ return 'System';} 
                else { return ''; }
            }},
            {'data': 'resolve_date'}]
    }); 
    $('#winlogs').DataTable().destroy();
    $('#winlogs').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'winapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: '',
                filename: 'winlogs',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastCol = sheet.getElementsByTagName('col').length - 1;
                    var colRange = createCellPos( lastCol ) + '1';                
                    var afSerializer = new XMLSerializer();
                    var xmlString = afSerializer.serializeToString(sheet);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                    var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                    var filterAttr = xmlDoc.createAttribute('ref');
                    filterAttr.value = 'A1:' + colRange;
                    xlsxFilter.setAttributeNode(filterAttr);
                    sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                    $('row c', sheet).attr( 's', '51' );
                }
            }],
        deferRender:    true, 
        order: [[3,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'created_at',                
                'render': function (data, type, row) { 
                        var str = row.created_at.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
            },{'data': 'testPlay'},{'data': 'winResult'},{'data': 'totalWon'},{'data': 'playIndex'},{'data': 'owedWin'},
            {'data': 'excessWin'},{'data': 'stockLeft'},{'data': 'stockRemoved'},{'data': 'stockAdded'},{'data': 'nTimesOfPlay'},{'data': 'status'}]       
    });    
    $('#moneyapi').DataTable().destroy();
    $('#moneyapi').dataTable({  
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'moneyapi/'+currentID+input,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: '',
                filename: 'moneylogs',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastCol = sheet.getElementsByTagName('col').length - 1;
                    var colRange = createCellPos( lastCol ) + '1';                
                    var afSerializer = new XMLSerializer();
                    var xmlString = afSerializer.serializeToString(sheet);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                    var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                    var filterAttr = xmlDoc.createAttribute('ref');
                    filterAttr.value = 'A1:' + colRange;
                    xlsxFilter.setAttributeNode(filterAttr);
                    sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                    $('row c', sheet).attr( 's', '51' );
                }
            }],
        deferRender:    true,   
        order: [[0,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,        
        columns:[{'data': 'created_at',                
                'render': function (data, type, row) { 
                        var str = row.created_at.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
                },{
                'data': 'coinIn', 
                render: function ( data, type, row ) {
                return '$ '+ Number(data).toFixed(2); }},{'data': 'ttlCoinIn',render: function ( data, type, row ) {
                return '$ '+ Number(data).toFixed(2); }},{'data': 'billIn'},{'data': 'ttlBillIn'},{'data': 'swipeIn'},{'data': 'type'},
                {'data': 'payment_result'},{'data': 'decline_reason'},{'data': 'cardType'},{'data': 'tCardData'},{'data': 'payment_span'},{'data': 'reference'},
                {'data': 'ttlMoneyIn',render: function ( data, type, row ) {return '$ '+ Number(data).toFixed(2); }},{'data': 'credits'}]       
  
    });    
    $('#goalsapi').DataTable().destroy();
    $('#goalsapi').dataTable({
        oLanguage: { sProcessing: "<img src='"+base_url+"global/photos/pacman.gif' width='32px;'>" },
        processing : true,
        ajax: base_url+'goalsapi/'+currentID+input,    
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: '',
                filename: 'goalslog',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var lastCol = sheet.getElementsByTagName('col').length - 1;
                    var colRange = createCellPos( lastCol ) + '1';                
                    var afSerializer = new XMLSerializer();
                    var xmlString = afSerializer.serializeToString(sheet);
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(xmlString,'text/xml');
                    var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','autoFilter');
                    var filterAttr = xmlDoc.createAttribute('ref');
                    filterAttr.value = 'A1:' + colRange;
                    xlsxFilter.setAttributeNode(filterAttr);
                    sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
                    $('row c', sheet).attr( 's', '51' );
                }
            }],
        deferRender:    true,       
        order: [[0,'desc']],
        pageLength: 25,
        scrollY: '400px',
        scrollCollapse: true,
        columns:[{'data': 'created_at',                
                'render': function (data, type, row) { 
                        var str = row.created_at.split(" ");
                        var date = str[0].split("-")
                        return date[2]+'/'+date[1]+'/'+date[0]+' '+str[1];                        
                    }
            },{'data': 'testPlay'},{'data': 'playIndex'},{'data': 'pkPWM'},{'data': 'pkVolt',render: function ( data, type, row ) {
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

function createCellPos( n ){
    var ordA = 'A'.charCodeAt(0);
    var ordZ = 'Z'.charCodeAt(0);
    var len = ordZ - ordA + 1;
    var s = "";
 
    while( n >= 0 ) {
        s = String.fromCharCode(n % len + ordA) + s;
        n = Math.floor(n / len) - 1;
    }
 
    return s;
}