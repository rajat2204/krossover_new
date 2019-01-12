<select class="form-control select_block" name="subcategory" >
	<option value="">Select Sub Category</option>
		@foreach($subcategoryProduct as $subcategoryProducts)
            <option value="{{$subcategoryProducts->id}}">{{$subcategoryProducts->name}}</option>
        @endforeach
</select>