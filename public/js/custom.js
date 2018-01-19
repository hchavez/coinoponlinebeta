
// A $( document ).ready() block.
$( document ).ready(function() {
    
    $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $('select[name="machine_type"]').on('change', function() {
            var machinetype_id = $(this).val();
            console.log(machinetype_id);
            if(machinetype_id) {
                $.ajax({
                    url: 'http://localhost/coinoponlinebeta/public/machine-management/ajax_getmachinemodel/'+machinetype_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                     

                        $('select[name="machine_model"]').empty();
                        $.each(data, function(key, value) {
                            console.log(value);
                            $('select[name="machine_model"]').append('<option value="'+ value.id +'">'+ value.machine_model +'</option>');
                        });

                         console.log('this value here...');
                    }
                });
            }else{
                $('select[name="machine_model"]').empty();
            }
        });
   
   
});


