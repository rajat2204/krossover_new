
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Categories</h1>
				<div class="pull-right">
                    <a href="{!! url('admin/categories') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-category" data-request="enable-enter" action="{{url('admin/categories/'.___encrypt($category['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{$category['id']}}">
						</div>
					</div>
					<div class="form-group">
						<label>Category Display Name:</label>
						<input class="form-control" name="name" value="{{$category['name']}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Category URL Slug:</label>
						<input class="form-control" name="slug" value="{{$category['slug']}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block edit_category" data-request="ajax-submit" data-target='[role="edit-category"]'>Edit Main Category</button>
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
        $('[data-request="enable-enter"]').find('.edit_category').trigger('click');
        return false;   
        }
    }); 
},100);
</script>