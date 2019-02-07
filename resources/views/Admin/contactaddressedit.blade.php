
<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Contact Edit</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h1 class="page-header">Contact Edit</h1>
					<div class="pull-right back-admin">
	                    <a href="{!! url('admin/contact') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
	                </div>
	            </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="edit-contact" action="{{url('admin/contact/'.___encrypt($contact['id']))}}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}
					<input type="hidden" value="PUT" name="_method">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id" class="form-control" value="{{!empty($contact['id'])?$contact['id']:''}}">
						</div>
					</div>

					<div class="form-group">
						<label>Contact Address:</label>
						<input class="form-control" name="address" value="{{!empty($contact['address'])?$contact['address']:''}}" placeholder="Enter Address">
					</div>

					<div class="form-group">
						<label>Contact E-mail:</label>
						<input class="form-control" name="email" value="{{!empty($contact['email'])?$contact['email']:''}}" placeholder="Enter E-mail">
					</div>

					<div class="form-group">
						<label>Contact Number:</label>
						<input class="form-control" name="mobile" value="{{!empty($contact['mobile'])?$contact['mobile']:''}}" placeholder="Enter Contact Number">
					</div>

						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="edit-contact"]'>Edit Whyus</button>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>