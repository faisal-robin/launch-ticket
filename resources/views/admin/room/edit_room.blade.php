
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

    <!-- /.form-group -->
    <div class="form-group col-12">
        <div id="myIdOne" class="dropzone" style="text-align: center;">
            <i class="fa fa-camera" style="font-size: 60px;color: #bbcdd2;"></i>
            <br>Drop images here
            <br>
            <strong>or select files</strong>
            <br>
            <small>Recommended size 800 x 800px for default theme.<br>JPG, GIF or PNG format.</small>
        </div>
    </div>
    <!-- /.form-group -->

    <div class="form-group col-md-6">
        <label for="purchase_price">Purchase Price</label>
        <input type="number" id="purchase_price" name="purchase_price" value="{{$room_info->purchase_price}}" class="form-control" >
    </div>

    <div class="form-group col-md-6">
        <label for="sell_price">Sell Price</label>
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

<script>
       if($("#myIdOne").length) {
        var myDropzone = new Dropzone("div#myIdOne", {
            addRemoveLinks: true,
            url: "{{ url('admin/room-image-upload') }}",
            maxFilesize: 2000,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function() {
            },
            success: function (file, response) {
                $('form#edit_form').append('<input type="hidden" name="images_name[]" value="' + response + '">')
            }
        });
    }
</script>


