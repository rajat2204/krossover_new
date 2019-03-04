<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Change Password</li>
		</ol>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="clearfix">
				<h1 class="page-header">Change Password</h1>
				<div class="pull-right back-admin">
            <a href="{!! url('admin/changepassword') !!}" class="btn btn-info btn-back"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    	</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
				<form role="changepwd" action="{!! action('Admin\BrandsController@adminchangePass',['id' => $admin['id']]) !!}" method="POST" class="form-horizontal form-label-left">
					{{csrf_field()}}						
					<div class="form-group">
						<label>Current Password:</label>
						<input class="form-control" type="password" name="password" placeholder="Enter Your Current Password">
					</div>
					<div class="form-group">
						<label>New Password:</label>
						<input class="form-control" type="password" name="new_password" placeholder="Enter New Password">
					</div>
					<div class="form-group">
						<label>Confirm New Password:</label>
						<input class="form-control" type="password" name="confirm_password" placeholder="Confirm New Password">
					</div>
						<button type="button" class="btn btn-success btn-block" data-request="ajax-submit" data-target='[role="changepwd"]'>Change Password</button>
				</form>
			</div>
		</div>
	</div>		
</div>