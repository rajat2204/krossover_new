<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Sub Category</h1>
		</div>
	</div><!--/.row-->

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-subcategory" data-request="enable-enter" action="{{url('admin/subcategories/'.___encrypt($subcategories['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{$subcategories['id']}}">
						</div>
					</div>
					<div class="form-group">
							<label>Main Category</label>
							<select class="form-control" name="cat_id">
								<option value="">Select Main Category</option>
                                    @foreach($subcategories as $cat)
                                        @if($cat->id == $category->id)
                                            <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endif
                                    @endforeach
							</select>
						</div>
					<div class="form-group">
						<label>Category Display Name:</label>
						<input class="form-control" name="name" value="{{$subcategories['name']}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Category URL Slug:</label>
						<input class="form-control" name="slug" value="{{$subcategories['slug']}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block edit_subcategory" data-request="ajax-submit" data-target='[role="edit-subcategory"]'>Edit Sub Category</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.edit_subcategory').trigger('click');
        return false;   
        }
    }); 
},100);
</script>