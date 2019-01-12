<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Add Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Categories</h1>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="add-category" data-request="enable-enter" method="POST" action="{!! action('Admin\CategoryController@store') !!}" class="form-horizontal form-label-left">
						{{csrf_field()}}
						<div class="form-group">
							<label>Category Display Name:</label>
							<input class="form-control" id="name" name="name" placeholder="E.g. Men's Clothing">
						</div>
						<div class="form-group">
							<label>Category URL Slug:</label>
							<input class="form-control" id="slug" name="slug" placeholder="E.g. men's clothing">
						</div>
							<button type="button" class="btn btn-success btn-block add_category" data-request="ajax-submit" data-target='[role="add-category"]'>Add Main Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>		
</div>
