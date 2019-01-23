<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Sub Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Sub Categories</h1>
				<div class="pull-right">
                    <a href="{!! url('admin/subcategories') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
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
					                    @foreach($categories as $cat)
					                        @if($cat->id == $subcategories['cat_id'])
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