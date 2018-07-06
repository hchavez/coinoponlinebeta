@extends('layouts.app-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Group Permission</h3>
            </div>
            <div class="panel-body">
                <div id="exampleTableSearch_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row"> 
                        
                        <div class="col-md-12">
                            <form role="form" method="GET" class="error-list-form" id="groupPermission" method="GET" action="{{ route('group-permission.index') }}">
                                <div class="form-group row">
                                    <label class="col-md-1 col-form-label">User Groups: </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="user_group" id="userGroup">
                                            <option value="" disabled="" selected="">Select Group</option>
                                            @foreach ($user_group as $group)
                                            <option value="{{ $group->id }}" <?php echo ($getData['user_group'] == $group->id)? 'selected': ''; ?> >{{ $group->users_group }}</option>                                            
                                            @endforeach 
                                        </select> <br><br>
                                    </div>
                                    <label class="col-md-6 col-form-label"></label>
                                    <label class="col-md-1 col-form-label">
                                        <button type="button" class="btn btn-raised btn-success btn-block" data-target="#exampleFormModal" data-toggle="modal" type="button">ADD GROUP</button></label>
                                    <label class="col-md-1 col-form-label"><button type="button" class="btn btn-raised btn-info btn-block" data-target="#exampleFormModalEdit" data-toggle="modal" type="button">EDIT GROUP</button></label>
                                    
                                    
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover table-striped" cellspacing="0" id="exampleAddRow">
                                            <thead>
                                               <tr role="row">
                                                  <th class="sorting_asc text-left">Application Object</th>
                                                  <th class="sorting text-left">Security Group</th>
                                                  <th class="sorting">Read All Access</th>
                                                  <th class="sorting">Add New Access</th>
                                                  <th class="sorting">Edit All Access</th>
                                                  <th class="sorting">Read Access</th>
                                                  <th class="sorting">Edit Access</th>
                                                  <th class="sorting">Delete Access</th>
                                               </tr>
                                            </thead>
                                            <!--tfoot>
                                               <tr>
                                                  <th rowspan="1" colspan="1">Name</th>
                                                  <th rowspan="1" colspan="1">Position</th>
                                                  <th rowspan="1" colspan="1">Office</th>
                                                  <th rowspan="1" colspan="1">Age</th>
                                                  <th rowspan="1" colspan="1">Date</th>
                                                  <th rowspan="1" colspan="1">Salary</th>
                                               </tr>
                                            </tfoot-->
                                            <tbody>
                                                @foreach ($app_object as $object)  
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1  text-left" tabindex="0">{{ $object->app_object_type }}</td>
                                                    <td class="text-left">{{ $object->sec_type }}</td>
                                                    <td>                                                          
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="checkbox" name="read_all_access_{{ $object->obj_id }}" <?php echo ($object->read_all_access)? 'checked': ''; ?> >
                                                          <label></label> 
                                                        </div>                                                        
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-custom checkbox-primary">
                                                          <input type="checkbox" name="add_new_access_{{ $object->obj_id }}" <?php echo ($object->add_new_access)? 'checked': ''; ?>>
                                                          <label></label>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-custom checkbox-primary">
                                                          <input type="checkbox" name="edit_all_access_{{ $object->obj_id }}" <?php echo ($object->edit_all_access)? 'checked': ''; ?>>
                                                          <label></label>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-custom checkbox-primary">
                                                          <input type="checkbox" name="read_access_{{ $object->obj_id }}" <?php echo ($object->read_access)? 'checked': ''; ?>>
                                                          <label></label>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-custom checkbox-primary">
                                                          <input type="checkbox" name="edit_access_{{ $object->obj_id }}" <?php echo ($object->edit_access)? 'checked': ''; ?>>
                                                          <label></label>
                                                        </div>  
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-custom checkbox-primary">
                                                          <input type="checkbox" name="delete_access_{{ $object->obj_id }}" <?php echo ($object->delete_access)? 'checked': ''; ?>>
                                                          <label></label>
                                                        </div>  
                                                    </td>
                                                </tr>
                                                @endforeach       
                                            </tbody>
                                         </table>
                                    </div>
                                    
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <br><br>
                                        <button type="button" class="btn btn-raised btn-primary btn-block" id="savePermission">SAVE</button>
                                    </div>
                                </div>                             
                            </form> 
                        </div>                              
                                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add new modal -->
    <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <form class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Add New Group</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xl-12 form-group">
                <input type="text" class="form-control" name="firstName" placeholder="Group Name">
              </div>              
              <div class="col-xl-12 form-group">
                <textarea class="form-control" rows="5" placeholder="Description"></textarea>
              </div>
              <div class="col-md-12 float-right">
                <button class="btn btn-primary btn-outline" data-dismiss="modal" type="button">Add Group</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
<!-- End Modal -->
<!-- EDit new modal -->
    <div class="modal fade" id="exampleFormModalEdit" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <form class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Edit Group</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xl-12 form-group">
                <select class="form-control" name="user_group" id="userGroupmodal">
                    @foreach ($user_group as $group)
                    <option value="{{ $group->id }}">{{ $group->users_group }}</option>                                            
                    @endforeach 
                </select>
              </div>   
               <div class="col-xl-12 form-group">
                <input type="text" class="form-control" name="firstName" placeholder="Group Name">
              </div>  
              <div class="col-xl-12 form-group">
                <textarea class="form-control" rows="5" placeholder="Description"></textarea>
              </div>
              <div class="col-md-12 float-right">
                <button class="btn btn-primary btn-outline" data-dismiss="modal" type="button">Edit Group</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
<!-- End Modal -->
<script>
$(document).ready(function() {
    $("#savePermission").click(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'group-permission/'); form.submit(); });  
    $("#userGroup").change(function(){ var select = $(this), form = select.closest('form'); form.attr('action', 'group-permission/'); form.submit(); });  
    
});
</script>

@endsection