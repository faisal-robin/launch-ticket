
<input  type="hidden" class="form-control mb-4" value="{{$terminal_info->id}}" name="id" id="terminal_id">


<div class="form-group">
    <label for="terminal_name">Terminal Name</label>
    <input  type="text" class="form-control mb-4" value="{{$terminal_info->terminal_name}}" name="terminal_name" id="terminal_name" placeholder="Terminal Name">
</div>

<div class="form-group">
    <label for="type_name">Select City</label>
    <select class="form-control" id="city_name" name="city_name">
         <option value="">Select</option>
        @foreach($state_list as $st_list)       
        <option value="{{$st_list->id}}" @if($st_list == $terminal_info->state_id) selected @endif>{{$st_list->name}}</option>
        @endforeach
    </select>

</div>



