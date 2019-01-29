
<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Static Pages</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Static Pages</h1>
				<div class="pull-right">
                    <a href="{!! url('admin/staticpages') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-staticpage" method="POST" action="{{url('admin/staticpages/'.___encrypt($staticpage['id']))}}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{$staticpage['id']}}">
						</div>
					</div>
					<div class="form-group">
						<label>Title:</label>
						<input class="form-control" name="title" value="{{$staticpage['title']}}" placeholder="E.g. Men's Clothing">
					</div>

					<div class="item form-group">
	                    <label  class="control-label col-md-3 col-sm-3 col-xs-12"> Current Featured Image</label>
	                    <div class="col-md-3 col-sm-6 col-xs-12">
	                       <img style="max-width: 250px;" src="{{url('assets/images/staticpage')}}/{{$staticpage['image']}}" id="adminimg" alt="No Featured Image Added">
	                    </div>
	                    <div class="col-md-3 col-sm-6 col-xs-12">
	                        <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
	                    </div>
                	</div>

					<div class="item form-group">
						<label>Description:</label>
						<textarea name="description" id="description" class="form-control" rows="6">{{$staticpage['description']}}</textarea>
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-staticpage"]'>Edit Slider</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>

@section('requirejs')
<script type="text/javascript">
    CKEDITOR.replace( 'description' );

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