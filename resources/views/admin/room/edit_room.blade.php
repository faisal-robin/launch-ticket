
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

    <div class="form-group col-md-6">
        <label for="purchase_price">Purchase PRice</label>
        <input type="number" id="purchase_price" name="purchase_price" value="{{$room_info->purchase_price}}" class="form-control" >
    </div>

    <div class="form-group col-md-6">
        <label for="sell_price">Sell PRice</label>
        <input type="number" id="sell_price" name="sell_price" value="{{$room_info->sell_price}}" class="form-control" >
    </div>

    <div class="form-group col-6">
        <label for="type_name">Room Description</label>
        <textarea class="summernote" name="room_description" >{!! $room_info->room_description !!}</textarea>                          
    </div> 


    <div class="form-group col-6">                                                                
        <div class="card border-primary mb-3">
            <div class="card-header">Categories</div>
            <div class="card-body text-primary" style="padding-left: 0px;list-style: none">
                <select class="form-control" name="category_id" id="category_id">
                    <option>Select Category</option>
                    @foreach($all_category as $v_category)
                    <option value="{{$v_category->id}}" @if($v_category->id == $room_info->main_category) selected @endif>{{$v_category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div> 


</div>




