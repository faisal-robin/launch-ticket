@extends('layouts.master')

@section('content')

<br> 
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Terminal</h4>
            <p style="text-align: right;margin: 0" ><button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i> Add New Terminal</button></p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Terminal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($terminal_list  as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->terminal_name}}</td>
                        <td>

                            <button data-id="{{$value->id}}" style="margin-right: 5px" type="button"  class="btn btn-success btn-sm float-left view_modal" >Edit</button>

                            <form method="post" action="{{url('admin/terminals/'.$value->id)}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Add Terminal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>                

            <div class="div">
                <p id="success_msg" style="color: green;text-align: center;"></p>
            </div>

            <form id="terminal_form">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="type_name">Terminal Name</label>
                        <input  type="text" class="form-control mb-4" name="terminal_name" id="terminal_name" placeholder="Terminal Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary terminal">Save</button>
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
    $(".terminal").click(function () {
        //alert('sdfas');
//var subject_name = $( ".subject_id option:selected" ).text();

        $(".error_msg").html('');

        var data = new FormData($('#terminal_form')[0]);
//data.append('department_name', department_name);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "terminals",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            document.getElementById('type_form').reset();
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
            url: "terminals/"+id+"/edit",
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
            url: "terminals/"+id,
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