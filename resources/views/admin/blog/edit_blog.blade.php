@extends('layouts.master')

@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
</style>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Blog Info</h4>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="add_form">

                @method('PUT')
                <input type="hidden" name="id" value="{{ $blog_info->id }}">

                <div class="form-row">

                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Date</label>
                           <input id="date" required  name="date" autocomplete="off"
                           class="form-control" placeholder="DD/MM/YY"
                           type="date" style="background-color: white;background: white">
                        </div>
                    </div> 
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>                    

                    <div class="form-group col-md-10">
                        <label for="Name">Title</label>
                        <input type="text" class="form-control" value="{{$blog_info->title}}" name="title" id="title" placeholder="Enter Title">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-11">
                        <label for="type_name">Short Summary</label>
                        <textarea class="summernote" name="short_summary"  placeholder="">{!!$blog_info->short_summary!!}</textarea>                          
                    </div> 
                    <div class="col-md-1"></div>
                    <div class="form-group col-12">
                        <label for="type_name">Full Summary</label>
                        <textarea class="summernote"  style="height:120px" name="full_summary" placeholder="Full summary">{!!$blog_info->full_summary!!}</textarea>                          
                    </div> 
                    <div class="form-group col-6">
                        <label for="type_name">Status</label>
                        <select class="form-control" name="status">
                            <option value="ACTIVE" @if($blog_info->status == "ACTIVE") selected @endif>Active</option>
                            <option value="INACTIVE" @if($blog_info->status == "INACTIVE") selected @endif>Inactive</option>
                        </select>
                    </div> 

                </div>

                <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>

<script>

    $("#add_btn").click(function () {

        $(".error_msg").html('');
        var data = new FormData($('#add_form')[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("admin/blogs")}}/" + $("[name=id]").val(),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            window.location.href = "{{ url('admin/blogs')}}";
//             location.reload();
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });
</script>


@endsection


