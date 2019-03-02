<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Add Sub Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h1 class="page-header">Add Sub Categories</h1>
					<div class="pull-right back-admin">
	                    <a href="{!! url('admin/subcategories') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	                </div>
	            </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="add-subcategory" action="{!! action('Admin\SubcategoryController@store') !!}" method="POST" class="form-horizontal form-label-left">
						{{csrf_field()}}
						<div class="form-group">
								<label>Main Category</label>
								<select class="form-control" name="cat_id">
									<option value="">Select Main Category</option>
									@foreach($categories as $category)
	                                    <option value="{{!empty($category->id)?$category->id:''}}">{{!empty($category->name)?$category->name:''}}</option>
	                                @endforeach
								</select>
							</div>
						<div class="form-group">
							<label>Category Display Name:</label>
							<input class="form-control" name="name" placeholder="E.g. Men's Clothing">
						</div>
						<div class="form-group">
							<label>Category URL Slug:</label>
							<input class="form-control" name="slug" placeholder="E.g. men's clothing">
						</div>
							<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-subcategory"]'>Add Sub Category</button>
						</div>
					</form>
				</div>
			</div>
	</div>		
</div>