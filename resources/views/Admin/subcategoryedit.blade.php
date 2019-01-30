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
				<div class="pull-right back-admin">
                    <a href="{!! url('admin/subcategories') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="edit-subcategory" action="{{url('admin/subcategories/'.___encrypt($subcategories['id']))}}" method="POST" class="form-horizontal form-label-left">
						{{csrf_field()}}
						<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($subcategories['id'])?$subcategories['id']:''}}">
							</div>
						</div>

						<div class="form-group">
							
								<label>Main Category</label>
								<select class="form-control" name="cat_id">
					                    @foreach($categories as $cat)
					                        @if($cat->id == $subcategories['cat_id'])
					                            <option value="{{!empty($cat->id)?$cat->id:''}}" selected>{{!empty($cat->name)?$cat->name:''}}</option>
					                        @else
					                            <option value="{{!empty($cat->id)?$cat->id:''}}">{{!empty($cat->name)?$cat->name:''}}</option>
					                        @endif
					                    @endforeach
								</select>
							</div>
						<div class="form-group">
							<label>Category Display Name:</label>
							<input class="form-control" name="name" value="{{!empty($subcategories['name'])?$subcategories['name']:''}}" placeholder="E.g. Men's Clothing">
						</div>
						<div class="form-group">
							<label>Category URL Slug:</label>
							<input class="form-control" name="slug" value="{{!empty($subcategories['slug'])?$subcategories['slug']:''}}" placeholder="E.g. men's clothing">
						</div>
							<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-subcategory"]'>Edit Sub Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>
				
</div>