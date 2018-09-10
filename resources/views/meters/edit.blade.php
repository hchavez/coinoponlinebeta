@extends('layouts.app-left-machine-settings-template')
@section('content')

<div class="page-main">
    <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Update Meter</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="get" action="#" style="width:100%">
                        <div class="col-md-9">                        
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Meters: </label>
                                <div class="col-md-7">
                                    <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                                    <input type="text" class="form-control" name="metername" value="{{ $data->metername }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Meter Type: </label>                               
                                <div class="col-md-7">
                                    <select class="form-control" name="meterTypeId">
                                        <option name="meterType" value="1" <?php echo ($data->MeterTypeID=='1')? 'selected' : ''; ?> >Money-Cash</option>
                                        <option name="meterType" value="2" <?php echo ($data->MeterTypeID=='2')? 'selected' : ''; ?> >Test Goes</option>
                                        <option name="meterType" value="3" <?php echo ($data->MeterTypeID=='3')? 'selected' : ''; ?> >Product Out</option>
                                        <option name="meterType" value="4" <?php echo ($data->MeterTypeID=='4')? 'selected' : ''; ?> >Win</option>
                                        <option name="meterType" value="5" <?php echo ($data->MeterTypeID=='5')? 'selected' : ''; ?> >Null</option>
                                        <option name="meterType" value="6" <?php echo ($data->MeterTypeID=='6')? 'selected' : ''; ?> >Tickets Awarded</option>
                                        <option name="meterType" value="7" <?php echo ($data->MeterTypeID=='7')? 'selected' : ''; ?> >Money--non-cash</option>
                                        <option name="meterType" value="8" <?php echo ($data->MeterTypeID=='8')? 'selected' : ''; ?> >Test Goes - Non Cash</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Description: </label>
                                <div class="col-md-7">
                                  <textarea class="form-control" name="meterdescription">{{ $data->meterdescription }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Click Value: </label>
                                <div class="col-md-7">
                                  <input type="text" class="form-control" name="clickvalue" value="{{ $data->clickvalue }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">No. of Decimal: </label>
                                <div class="col-md-7">
                                  <input type="text" class="form-control" name="numdecimal" value="{{ $data->nodecimals }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <legend class="col-md-2 col-form-legend"> </legend>
                                <div class="col-md-7">
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="mandatory" checked="<?php echo ($data->Mandatary=='1')? 'checked' : ''; ?>">
                                        <label for="inputHorizontalMale">Mandatory</label>
                                    </div>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="cumulative" checked="<?php echo ($data->Cumulative=='1')? 'checked' : ''; ?>">
                                        <label for="inputHorizontalFemale">Cumulative Meter</label>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="example-title">Acceptable Reading</h4>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Min: </label>
                                <div class="col-md-7">
                                  <input type="text" class="form-control" name="minvalue" value="{{ $data->MinValue }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Max: </label>
                                <div class="col-md-7">
                                    Warn if reading greater than: Previous Value+
                                    <input type="text" class="form-control" name="warnValue" value="{{ $data->WarnValue }}" autocomplete="off">
                                    <br>
                                    Disallow if reading greater than: Previous Value+
                                    <input type="text" class="form-control" name="disallowValue" value="{{ $data->DisallowValue }}" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-7">
                                   <button type="submit" class="btn btn-block btn-primary" style="width:30%;">Save</button>
                                </div>
                            </div>
                                                        
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection