<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Change Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change Password</h1>
				<div class="pull-right">
                    <a href="{!! url('admin/changepassword') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<form role="changepwd" data-request="enable-enter" action="{!! action('Admin\BrandsController@changePassword') !!}" method="POST" class="form-horizontal form-label-left">
						{{csrf_field()}}						
						<div class="form-group">
							<label>Current Password:</label>
							<input class="form-control" name="password" placeholder="Enter Your Current Password">
						</div>
						<div class="form-group">
							<label>New Password:</label>
							<input class="form-control" name="password" placeholder="Enter New Password">
						</div>
						<div class="form-group">
							<label>Confirm New Password:</label>
							<input class="form-control" name="password" placeholder="Confirm New Password">
						</div>
							<button type="button" class="btn btn-success btn-block change_pwd" data-request="ajax-submit" data-target='[role="changepwd"]'>Add Brand</button>
						</div>
					</form>
				</div>
			</div>
	</div>		
</div>
@section('requirejs')
<script type="text/javascript">
    setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.change_pwd').trigger('click');
        return false;   
        }
    }); 
},100);
</script>
@endsection