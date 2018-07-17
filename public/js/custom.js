
// A $( document ).ready() block.
$( document ).ready(function() {
    
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $('select[name="machine_type"]').on('change', function() {
            var machinetype_id = $(this).val();
           
            if(machinetype_id) {
                $.ajax({
                    url: 'https://www.ascentri.com/machine-management/ajax_getmachinemodel/'+machinetype_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                     

                        $('select[name="machine_model"]').empty();
                        $.each(data, function(key, value) {
           
                            $('select[name="machine_model"]').append('<option value="'+ value.id +'">'+ value.machine_model +'</option>');
                        });

                       
                    }
                });
            }else{
                $('select[name="machine_model"]').empty();
            }
        });
   
   
});


