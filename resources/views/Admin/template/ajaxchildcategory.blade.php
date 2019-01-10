<select class="form-control" name="subcategory" >
	<option value="">Select Sub Category</option>
		@foreach($subcategory as $subcategories)
            <option value="{{$subcategories->id}}">{{$subcategories->name}}</option>
        @endforeach
</select>