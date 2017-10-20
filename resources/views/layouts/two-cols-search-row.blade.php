<div class="row">
  @php
    $index = 0;
  @endphp
  @foreach ($items as $item)
   
      
          @php
            $stringFormat =  strtolower(str_replace(' ', '', $item));
          @endphp
          
          
      <form class="form-inline">
                <div class="form-group">
                  <label class="sr-only" for="inputUnlabelUsername">Search</label>
                  <input value="{{isset($oldVals) ? $oldVals[$index] : ''}}" type="text" class="form-control" name="<?=$stringFormat?>" id="input<?=$stringFormat?>" placeholder="{{$item}}"> 
           
                </div>
             
                <div class="form-group">
                    &nbsp; <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>

  @php
    $index++;
  @endphp
  @endforeach
</div>