@extends('layouts.master')

@section('content')
<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
    .hide{
        display: none;
    }
    #valid-msg{
        color: green;
    }
    #error-msg{
        color: red;
    }
    .close {
      position: absolute;
      right: 0;
      top: 0;
      width: 15px;
      height: 15px;
      opacity: 0.3;
    }
    .close:hover {
      opacity: 1;
    }
    .close:before, .close:after {
      position: absolute;
      top: 5px;
      left: 0;
      content: ' ';
      height: 15px;
      width: 2px;
      background-color: red;
    }
    .close:before {
      transform: rotate(45deg);
    }
    .close:after {
      transform: rotate(-45deg);
    }

</style>

<div class="col-8 offset-2">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Launch Schedules</h4>           
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="edit_form" autocomplete="off">
                <div class="form-row">
                    @method('PUT')
                    <div class="form-group col-md-12">
                        <label for="launch">Launch</label>
                        <input type="hidden" id="launch_name" name="launch_name" value="{{$launch_schedule_info->launch_name}}">
                        <input type="hidden" id="schedule_id" name="schedule_id" value="{{$launch_schedule_info->id}}">
                        <select name="launch" class="form-control" id="launch" >
                            <option value="">Select Launch</option>
                            @foreach($launch_list as $key => $value)
                            <option <?php if($value->id == $launch_schedule_info->launch_id){echo "selected";}?> value="{{$value->id}}">{{$value->launch_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="terminal_from">Terminal From</label>
                        <select name="terminal_from" class="form-control" id="terminal_from" >
                            <option value="">Select Launch</option>
                            @foreach($terminal_list as $key => $value)
                            <option <?php if($value->id == $launch_schedule_info->terminal_from) { echo "selected";}?> value="{{$value->id}}">{{$value->terminal_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="terminal_to">Terminal To</label>
                        <select name="terminal_to" class="form-control" id="terminal_to" >
                            <option value="">Select Launch</option>
                            @foreach($terminal_list as $key => $value)
                            <option <?php if($value->id == $launch_schedule_info->terminal_to) { echo "selected";}?> value="{{$value->id}}">{{$value->terminal_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="schedule_date">Schedule Date</label>
                        <input id="schedule_date" value="{{ $launch_schedule_info->schedule_date }}" class="form-control datepicker" name="schedule_date">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="schedule_time">Schedule  Time</label>
                        <input id="schedule_time" value="{{ $launch_schedule_info->schedule_time }}" class="form-control timepicker" name="schedule_time">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="search_room">Rooms</label>
                        <input id="search_room" class="form-control" name="room">
                        <input type="hidden" id="room_id" value="">
                        <input type="hidden" id="room_name" name="room_name" value="">
                    </div>

                    <div class="form-group col-md-4" style="margin-top: 30px">
                        <a style="color: #fff" id="add_btn" class="btn btn-primary">Add</a>
                    </div>
                </div>

                <div class="row list-items">
                  @foreach($launch_schedule_item as $key => $room)
                   <div  style='border: 1px solid gray;margin:5px;padding:10px;text-align:center' class='col-md-2 previewBox'><a class='close'></a><input class='room_no' type='hidden' name='room_id[]' value='{{$room->id}}'>{{$room->room_no}}</div>
                   @endforeach
                </div>

                <button type="button" id="edit_schedule" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.close').on('click', function(e) { 
        // $('.previewBox').remove(); 
        $(this).parent().remove();
    });
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function () {

        //get country
        $("#search_room").autocomplete({
            source: function (request, response) {
                // Fetch data
                var id = $('#launch').val();
                $.ajax({
                    url: "{{ url('admin/get-rooms') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                            id: id,
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $(this).val(ui.item.label); // display the selected text
                $('#room_id').val(ui.item.value); // save selected id to input
                $('#room_name').val(ui.item.label); // save selected id to input
                return false;
            }
        });

        
        var id = 1;
        $("#add_btn").click(function(){
            id++;

            $('#search_room').val('');
            var room_id = $('#room_id').val();
            var room_name = $('#room_name').val();
            
            var exists = 0;
            $( ".room_no" ).each( function( index, element ){
                if ($( this ).val() == room_id) {
                   alert('Room no already exists');
                   exists = 1;
                }
            });
            
            if (!exists) {

                $(".list-items").append("<div  style='border: 1px solid gray;margin:5px;padding:10px;text-align:center' class='col-md-2 previewBox'><a class='close'></a><input class='room_no' type='hidden' name='room_id[]' value='"+room_id+"'>"+room_name+"</div>");

                $('.close').on('click', function(e) { 
                    // $('.previewBox').remove(); 
                    $(this).parent().remove();
                });
            }
            
        });
    });
 
</script>

<script type="text/javascript">

    $("#edit_schedule").click(function () {

        $(".error_msg").html('');
        var data = new FormData($('#edit_form')[0]);
        var id = $('#schedule_id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("admin/launch-schedules")}}/" + id,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            // window.location.href = "{{ url('admin/launch-schedules')}}";
            window.location.reload();
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });

    $('#launch').on('change', function() {
      var launch_name = $(this).find(":selected").text();
      $('#launch_name').val(launch_name);
    });

    $('#terminal_from').on('change', function() {
      var terminal_from = $(this).find(":selected").val();
      var terminal_to = $('#terminal_to').find(":selected").val();

      if (terminal_from == terminal_to) {
        var option = $('#terminal_from');
        option[0].selectedIndex = 0;
        alert('Terminal already selected');
        
        return;
      }
    });

    $('#terminal_to').on('change', function() {
      var terminal_to = $(this).find(":selected").val();
      var terminal_from = $('#terminal_from').find(":selected").val();

      if (terminal_from == terminal_to) {
         var option = $('#terminal_to');
         option[0].selectedIndex = 0;
        alert('Terminal already selected');
        
        return;
      }
    });
</script>

@endsection


