@extends('admin.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Sub Category</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="add-subcategory" data-request="enable-enter" method="POST" class="form-horizontal form-label-left">
								{{csrf_field()}}
								<div class="form-group">
										<label>Main Category</label>
										<select class="form-control">
											<option>Option 1</option>
											<option>Option 2</option>
										</select>
									</div>
								<div class="form-group">
									<label>Category Display Name:</label>
									<input class="form-control" placeholder="E.g. Men's Clothing">
								</div>
								<div class="form-group">
									<label>Category URL Slug:</label>
									<input class="form-control" placeholder="E.g. men's clothing">
								</div>
									<button type="button" class="btn btn-success btn-block add_subcategory" data-request="ajax-submit" data-target='[role="add-subcategory"]'>Add Sub Category</button>
								</div>
							</form>
						</div>
					</div>
</div><!-- /.panel-->

<script type="text/javascript">
    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.add_subcategory').trigger('click');
        return false;   
        }
    }); 
},100);
</script>
@stop

@section('footer')

@stop