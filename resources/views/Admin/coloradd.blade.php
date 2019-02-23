<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Add Color</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h1 class="page-header">Add Color</h1>
					<div class="pull-right back-admin">
	                    <a href="{!! url('admin/colors') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	                </div>
	            </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="add-color" action="{!! action('Admin\ColorsController@store') !!}" method="POST" class="form-horizontal form-label-left">
						{{csrf_field()}}
						
						<div class="form-group">
							<label>Color Name:</label>
							<input class="form-control" name="color_name" placeholder="E.g. Color">
						</div>
						<div class="form-group">
							<label>Color URL Slug:</label>
							<input class="form-control" name="slug" placeholder="E.g. Color">
						</div>
							<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-color"]'>Add Color</button>
						</div>
					</form>
				</div>
			</div>
	</div>		
</div>