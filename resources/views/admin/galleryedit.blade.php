
<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Inspirational Gallery</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h1 class="page-header">Edit Inspirational Gallery</h1>
					<div class="pull-right back-admin">
	                    <a href="{!! url('admin/gallery') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	                </div>
	            </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-gallery" action="{{url('admin/gallery/'.___encrypt($gallery['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($gallery['id'])?$gallery['id']:''}}">
						</div>
					</div>

					<div class="item form-group">
                        <label>Current Image:</label>
                        	<div>
                                <img src="{!! url('/') !!}/assets/images/gallery/{{$gallery['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                            </div>
                    </div>
                    <div class="item form-group">
                        <label>Change Image:</label>
                        
                        <div class="image-margin">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
                            <span>max. size 2 MB.</span>
                            <span>(458X184 pixels)</span>
                        </div>
                        <div>
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                    </div>

					<div class="form-group">
						<label>Name:</label>
						<input class="form-control" name="name" value="{{!empty($gallery['name'])?$gallery['name']:''}}" placeholder="Gallery Name">
					</div>

						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-gallery"]'>Edit Whyus</button>
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