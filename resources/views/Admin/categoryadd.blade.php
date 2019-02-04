<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
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
			<div class="pull-right back-admin">
                <a href="{!! url('admin/categories') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="add-category" method="POST" action="{!! action('Admin\CategoryController@store') !!}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<div class="item form-group">
                    	<label>Category Image:</label>
                        <div class="image-margin">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
                            <span>max. size 2 MB.</span>
                            <span>(125X125 pixels)</span>
                        </div>
                        <div>
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                	</div>
					<div class="form-group">
						<label>Category Display Name:</label>
						<input class="form-control" id="name" name="name" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Category URL Slug:</label>
						<input class="form-control" id="slug" name="slug" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-category"]'>Add Main Category</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>

@section('requirejs')
<script type="text/javascript">

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection