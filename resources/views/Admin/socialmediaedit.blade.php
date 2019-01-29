<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Edit Social Media</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Social Media</h1>
			<div class="pull-right back-admin">
                <a href="{!! url('admin/social') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
	</div><!--/.row-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-social" method="POST" action="{{url('admin/social/'.___encrypt($social['id']))}}" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" class="form-control" value="{{$social['id']}}">
							</div>
						</div>
					<div class="form-group">
						<label>Social Media Url:</label>
						<input class="form-control" id="url" name="url" value="{{$social['url']}}" placeholder="E.g. http://www.google.com">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-social"]'>Edit Social Media</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>

@section('requirejs')
@endsection
