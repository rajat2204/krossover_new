<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Add Client</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Add Client</h1>
			<div class="pull-right">
                <a href="{!! url('admin/clients') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="add-client" method="POST" action="{!! action('Admin\ClientController@store') !!}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Client Image:</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                           <img style="max-width: 250px;" src="{{asset('/img/avatar.png')}}" id="adminimg" alt="No Featured Image Added">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input onchange="readURL(this)" id="uploadFile" accept="image/*" name="image" type="file">
                        </div>
                    </div>
					<div class="form-group">
						<label>Client Title:</label>
						<input class="form-control" id="title" name="title" placeholder="Title">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="add-client"]'>Add Client</button>
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
