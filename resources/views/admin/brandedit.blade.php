<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Brand</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h1 class="page-header">Edit Brand</h1>
					<div class="pull-right back-admin">
	                    <a href="{!! url('admin/brands') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	                </div>
	            </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="edit-brand" action="{{url('admin/brands/'.___encrypt($brand['id']))}}" method="POST" class="form-horizontal form-label-left">
						{{csrf_field()}}
						<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($brand['id'])?$brand['id']:''}}">
							</div>
						</div>
						<div class="form-group">
								<label>Main Category</label>
								<select class="form-control" name="category_id">
									@foreach($categories as $cat)
				                        @if($cat->id == $brand['category_id'])
				                            <option value="{{!empty($cat->id)?$cat->id:''}}" selected>{{!empty($cat->name)?$cat->name:''}}</option>
				                        @else
				                            <option value="{{!empty($cat->id)?$cat->id:''}}">{{!empty($cat->name)?$cat->name:''}}</option>
				                        @endif
				                    @endforeach
								</select>
							</div>
						<div class="form-group">
							<label>Brand Name:</label>
							<input class="form-control" name="brand_name" value="{{!empty($brand['brand_name'])?$brand['brand_name']:''}}" placeholder="E.g. Men's Clothing">
						</div>
						<div class="form-group">
							<label>Brand URL Slug:</label>
							<input class="form-control" name="slug" value="{{!empty($brand['slug'])?$brand['slug']:''}}" placeholder="E.g. men's clothing">
						</div>
							<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-brand"]'>Edit Brand</button>
						</div>
					</form>
				</div>
			</div>
	</div>		
</div>
