
<input  type="hidden" class="form-control mb-4" value="{{$launch_info->id}}" name="id" id="type_id">

<div class="form-group">
	<label for="launch_name">Launch Name</label>
	<input  type="text" class="form-control mb-4" value="{{$launch_info->launch_name}}" name="launch_name" id="launch_name" placeholder="launch Name">
</div>

<div class="form-group">
	<label for="launch_image">Launch Image</label>
	<input type="file" id="launch_image" name="launch_image" class="form-control" >
</div>

<div class="form-group">
	<label for="launch_price_range">Launch Price Range</label>
	<input  type="text" class="form-control mb-4" name="launch_price_range" value="{{$launch_info->launch_price_range}}" id="launch_price_range" placeholder="500 - 5000">
</div>    

<div class="form-group">
	<label for="launch_description">Launch Description</label>
	<input  type="text" class="form-control mb-4" name="launch_description" value="{{$launch_info->launch_description}}" id="launch_description" placeholder="Launch Description">
</div> 



