<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Edit Slider</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Slider</h1>
			<div class="pull-right back-admin">
                <a href="{!! url('admin/sliders') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-slider" method="POST" action="{{url('admin/sliders/'.___encrypt($slider['id']))}}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($slider['id'])?$slider['id']:''}}">
							</div>
						</div>
					<div class="item form-group">
                        <label>Current Slider Image</label>
                        	<div>
                                <img src="{!! url('/') !!}/assets/images/sliders/{{$slider['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                            </div>
                    </div>
                    <div class="item form-group">
                        <label>Change Slider Image</label>
						<p>(700X450 pixels)</p>
                        <div>
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
							<p>max. size 2 MB.</p>
                        </div>
                        <div>
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                        
                    </div>
					<div class="form-group">
						<label>Slider Title:</label>
						<input class="form-control" id="title" name="title" value="{{!empty($slider['title'])?$slider['title']:''}}" placeholder="E.g. Men's Clothing">
					</div>
					<div class="form-group">
						<label>Slider Text:</label>
						<input class="form-control" id="text" name="text" value="{{!empty($slider['text'])?$slider['text']:''}}" placeholder="E.g. men's clothing">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-slider"]'>Edit Slider</button>
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
