
<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
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
				<div class="pull-right back-admin">
                    <a href="{!! url('admin/categories') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-category" action="{{url('admin/categories/'.___encrypt($category['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($category['id'])?$category['id']:''}}">
						</div>
					</div>
					<div class="item form-group">
                        <label>Current Category Image</label>
                    	<div>
                            <img src="{!! url('/') !!}/assets/images/categories/{{$category['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label>Change Category Image</label>
                        <div>
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file" class="image-margin">
                            <span>max. size 2 MB.</span>
                            <span>(125X125 pixels)</span>
                        </div>
                        <div>
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                    </div>
					<div class="form-group">
						<label>Category Display Name:</label>
						<input class="form-control" name="name" value="{{!empty($category['name'])?$category['name']:''}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Category URL Slug:</label>
						<input class="form-control" name="slug" value="{{!empty($category['slug'])?$category['slug']:''}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-category"]'>Edit Main Category</button>
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