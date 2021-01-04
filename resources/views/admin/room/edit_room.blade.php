
<input  type="hidden" class="form-control mb-4" value="{{$room_info->id}}" name="id" id="room_id">


<div class="row">

    <div class="form-group col-6">
        <label for="type_name">Select Launch</label>
        <select class="form-control" name="launch_id" id="launch_id">
            <option value="">Select Launch</option>
            @foreach($launch_list as  $value)
            <option value="{{$value->id}}" @if($room_info->launch_id == $value->id) selected @endif>{{$value->launch_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-6">
        <label for="type_name">Room No</label>
        <input  type="text" class="form-control mb-4" value="{{$room_info->room_no}}" name="room_no" id="room_no" placeholder="Room No">
    </div> 


    <div class="form-group col-6">
        <label for="type_name">Room Description</label>
        <textarea id="summernote1" name="room_description" placeholder="">{{$room_info->room_description}}</textarea>                          
    </div> 


    <div class="form-group col-6">                                                                
        <div class="card border-primary mb-3">
            <div class="card-header">Categories</div>
            <div class="card-body text-primary" style="padding-left: 0px;list-style: none">
                <?php echo $category_list; ?>
            </div>
        </div>
    </div> 


</div>




