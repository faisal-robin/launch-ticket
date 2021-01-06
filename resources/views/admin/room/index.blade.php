@extends('layouts.master')

@section('content')

<br> 
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Room</h4>
            <p style="text-align: right;margin: 0" ><button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add New Room</button></p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Room</th>
                        <th>Launch</th>
                        <th>Category</th>
                        <th>Purchase Price</th>
                        <th>Sell Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($room_list  as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->room_no}}</td>
                        <td>{{$value->launch_info->launch_name}}</td>
                        <td>{{$value->category_info->category_name}}</td>
                        <td>
                            {{ $value->purchase_price }}
                        </td>
                        <td>
                            {{ $value->sell_price }}
                        </td>
                        <td>

                            <button data-id="{{$value->id}}" style="margin-right: 5px" type="button"  class="btn btn-success btn-sm float-left view_modal" >Edit</button>

                            <form method="post" action="{{url('admin/rooms/'.$value->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content"  style="width: 880px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>                

            <div class="div">
                <p id="success_msg" style="color: green;text-align: center;"></p>
            </div>

            <form id="room_form">

                <div class="modal-body">

                    <div class="row">

                        <div class="form-group col-6">
                            <label for="type_name">Select Launch</label>
                            <select class="form-control" name="launch_id" id="launch_id">
                                <option value="">Select Launch</option>
                                @foreach($launch_list as  $value)
                                <option value="{{$value->id}}">{{$value->launch_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="type_name">Room No</label>
                            <input  type="text" class="form-control mb-4" name="room_no" id="room_no" placeholder="Room No">
                        </div> 
                        
                          <!-- /.form-group -->
                           <div class="form-group col-12">
                                        <div id="myId" class="dropzone" style="text-align: center;">
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
                            <input type="number" id="purchase_price" name="purchase_price" class="form-control" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sell_price">Sell Price</label>
                            <input type="number" id="sell_price" name="sell_price" class="form-control" >
                        </div>

                        <div class="form-group col-6">
                            <label for="type_name">Room Description</label>
                            <textarea class="summernote" name="room_description" placeholder=""></textarea>                          
                        </div> 


                        <div class="form-group col-6">                                                                
                            <div class="card border-primary mb-3">
                                <div class="card-header">Categories</div>
                                <div class="card-body text-primary" style="padding-left: 0px;list-style: none">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option>Select Category</option>
                                        @foreach($all_category as $v_category)
                                        <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> 


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary room-add">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTable" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 880px">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTable">Edit Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="edit_form">
                <div id="modal_body" class="modal-body">

                </div>
                @method('PUT')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit_button">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
     if($("#myId").length) {
        var myDropzone = new Dropzone("div#myId", {
            addRemoveLinks: true,
            url: "{{ url('admin/room-image-upload') }}",
            maxFilesize: 2000,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function() {
            },
            success: function (file, response) {
                $('form#room_form').append('<input type="hidden" name="images_name[]" value="' + response + '">')
            }
        });
    }
  
    $(".room-add").click(function () {
        $(".error_msg").html('');
        var data = new FormData($('#room_form')[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "rooms",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            document.getElementById('room_form').reset();
            setTimeout(function () {
                document.location.reload();
            }, 2000);
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });
</script>

<script type="text/javascript">
    $(".view_modal").click(function () {

        var id = $(this).data("id");

        $.ajax({
            method: "GET",
            url: "rooms/" + id + "/edit",
            data: id,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                $("#modal_body").html(data);
                $("#editModal").modal("show");

            }
        });
    });
</script>

<script type="text/javascript">
    $(".edit_button").click(function () {
        //alert('sdfas');
        $(".error_msg").html('');

        var data = new FormData($('#edit_form')[0]);

        var id = $('[name=id]').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "rooms/" + id,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            location.reload();
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });
</script>

<script>
    $(document).ready(function () {

        $('.select2').select2();

        $('.dynamic').change(function () {
            if ($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "get_all_subject",
                    method: "POST",
                    data: {select: select, value: value, _token: _token},
                    success: function (result)
                    {
                        $('.subject_id').html(result);
                    }

                })
            }
        });

        $('.department_id').change(function () {
            $('.subject_id').val('');
        });
    });
</script>

<!-- /.box -->
@endsection