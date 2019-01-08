@extends('admin.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Main Category</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-6">
			<form role="add-category" data-request="enable-enter" method="POST" action="{!! action('Admin\CategoryController@store') !!}" class="form-horizontal form-label-left">
				{{csrf_field()}}
				<div class="form-group">
					<label>Category Display Name:</label>
					<input class="form-control" name="name" placeholder="E.g. Men's Clothing">
				</div>
				<div class="form-group">
					<label>Category URL Slug:</label>
					<input class="form-control" name="slug" placeholder="E.g. men's clothing">
				</div>
					<button type="button" class="btn btn-success btn-block add_category" data-request="ajax-submit" data-target='[role="add-category"]'>Add Main Category</button>
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
        $('[data-request="enable-enter"]').find('.add_category').trigger('click');
        return false;   
        }
    }); 
},100);
</script>
@stop

@section('footer')

@stop