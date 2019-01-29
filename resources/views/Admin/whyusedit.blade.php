
<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit WhyUs</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit WhyUs</h1>
				<div class="pull-right back-admin">
                    <a href="{!! url('admin/whyus') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-whyus" action="{{url('admin/whyus/'.___encrypt($whyus['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{$whyus['id']}}">
						</div>
					</div>

					<div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Current Image:</label>
                        	<div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="{!! url('/') !!}/assets/images/whyus/{{$whyus['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                            </div>
                    </div>
                    <div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Change Image:</label>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
                            <span>max. size 2 MB.</span>
                            <p>(512X512 pixels)</p>
                        </div>
                    </div>

					<div class="form-group">
						<label>Title:</label>
						<input class="form-control" name="title" value="{{!empty($whyus['title'])?$whyus['title']:''}}" placeholder="E.g. Men's Clothing">
					</div>

					<div class="item form-group">
						<label>Description:</label>
						<textarea name="description" id="description" class="form-control" rows="6">{{$whyus['description']}}</textarea>
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-whyus"]'>Edit Whyus</button>
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