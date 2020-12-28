@extends('layouts.master')

@section('content')

<br> 
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All launch</h4>
            <p style="text-align: right;margin: 0" ><button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add New launch</button></p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Launch Image</th>
                        <th>Launch Name</th>
                        <th>Launch Price Range</th>
                        <th>Launch Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($launch_list  as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td><img  src="{{ asset("storage/app/".$value->launch_image) }}" alt="launch image" style="width: 80px;height:50px"></td>
                        <td>{{$value->launch_name}}</td>
                        <td>{{$value->launch_price_range}}</td>
                        <td>{{$value->launch_status}}</td>
                        <td>

                            <button data-id="{{$value->id}}" style="margin-right: 5px" type="button"  class="btn btn-success btn-sm float-left view_modal" >Edit</button>

                            <form method="post" action="{{url('admin/launchs/'.$value->id)}}">
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add launch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>                

            <div class="div">
                <p id="success_msg" style="color: green;text-align: center;"></p>
            </div>

            <form id="launch_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="launch_name">Launch Name</label>
                        <input  type="text" class="form-control mb-4" name="launch_name" id="launch_name" placeholder="launch Name">
                    </div>

                    <div class="form-group">
                        <label for="launch_image">Launch Image</label>
                        <input type="file" id="launch_image" name="launch_image" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="launch_price_range">Launch Price Range</label>
                        <input  type="text" class="form-control mb-4" name="launch_price_range" id="launch_price_range" placeholder="500 - 5000">
                    </div> 
                    
                    <!-- <div class="form-group">
                        <label for="launch_price_range">From</label>
                        <input  type="text" class="form-control mb-4" name="launch_price_range" id="launch_price_range" placeholder="500 - 5000">
                    </div> 
                         
                    <div class="form-group">
                        <label for="launch_price_range">To</label>
                        <input  type="text" class="form-control mb-4" name="launch_price_range" id="launch_price_range" placeholder="500 - 5000">
                    </div>  -->

                    <div class="form-group">
                        <label for="launch_description">Launch Description</label>
                        <input  type="text" class="form-control mb-4" name="launch_description" id="launch_description" placeholder="Launch Description">
                    </div>           
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" id="launch" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTable" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTable">Edit Client category</h5>
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
    $("#launch").click(function () {
        $(".error_msg").html('');
        var data = new FormData($('#launch_form')[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("admin/launches")}}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            // document.getElementById('launch_form').reset();
            // setTimeout(function () {
            //     document.location.reload();
            // }, 2000);
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
            url: "launches/" + id + "/edit",
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
            url: "launches/" + id,
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
<!-- /.box -->
@endsection