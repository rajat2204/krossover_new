<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Edit Client</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="clearfix">
				<h1 class="page-header">Edit Client</h1>
				<div class="pull-right back-admin">
	                <a href="{!! url('admin/clients') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	            </div>
	        </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-client" method="POST" action="{{url('admin/clients/'.___encrypt($client['id']))}}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($client['id'])?$client['id']:''}}">
							</div>
						</div>
					<div class="item form-group">
                        <label>Current Client Image</label>
                    	<div>
                            <img src="{!! url('/') !!}/assets/images/clients/{{$client['image']}}" style="max-height: 300px;" alt="No Banner Photo">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label>Change Client Image</label>
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
						<label>Client Title:</label>
						<input class="form-control" id="title" name="title" value="{{!empty($client['title'])?$client['title']:''}}" placeholder="Title">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-client"]'>Edit Slider</button>
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
