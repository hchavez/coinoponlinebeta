@extends('layouts.app-left-sites-template')

@section('content')

<div class="page-main">

    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Managing Agents Listings</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered" id="managing_agent_table">
                            <thead><tr><th>Edit</th><th class="text-left">Managing Agent</th></tr></thead>
                            <tbody>
                                @foreach ($agents as $data)
                                <tr>
                                    <td style="width:10%">
                                        <div class="icondemo vertical-align-middle" style="cursor:pointer;" id="{{ $data->id }}-{{ $data->managing_agent }}">
                                            <i class="icon wb-edit" aria-hidden="true"></i>                                                
                                        </div>
                                    </td>
                                    <td class="text-left">{{ $data->managing_agent }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <form method="get" >
                            <div class="form-group">
                                <label class="form-control-label" for="inputBasicEmail">Managing Agent</label>
                                <input type="hidden" name="agent_id" id="agent_id">
                                <input type="text" class="form-control" id="managing_agent" name="managing_agent" placeholder="Enter Managing Agent" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" onclick="clearFields()">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset("/global/vendor/jquery/jquery.js") }}"></script>
<script>
$(document).ready(function(){
    $('#managing_agent_table td div').click(function() { 
        var id = $(this).attr('id');
        var split_val = id.split('-');
        
        $('#managing_agent').val(split_val[1]);
        $('#agent_id').val(split_val[0]);              
    });    
});

function clearFields(){
    document.getElementById('managing_agent').value = '';
    document.getElementById('agent_id').value = '';
}
</script>
@endsection