<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Child Category</h1>
		</div>
	</div><!--/.row-->

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-childcategory" data-request="enable-enter" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<div class="form-group">
							<label>Main Category</label>
							<select class="form-control">
							</select>
						</div>
						<div class="form-group">
							<label>Sub Category</label>
							<select class="form-control">
							</select>
						</div>
					<div class="form-group">
						<label>Category Display Name:</label>
						<input class="form-control" value="{{$childcategories['name']}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Category URL Slug:</label>
						<input class="form-control" value="{{$childcategories['slug']}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block edit_childcategory" data-request="ajax-submit" data-target='[role="edit-childcategory"]'>Edit Child Category</button>
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
        $('[data-request="enable-enter"]').find('.edit_childcategory').trigger('click');
        return false;   
        }
    }); 
},100);
</script>