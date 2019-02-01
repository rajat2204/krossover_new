<select class="form-control select_block" name="subcategory" >
	<option value="">Select Sub Category</option>
		@foreach($subcategory as $subcategories)
            <option value="{{$subcategories->id}}">{{!empty($subcategories->name)?$subcategories->name:''}}</option>
        @endforeach
</select>