<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Catalogue</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Catalogue</h1>
		</div>
	</div>
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light">
					<div class="portlet-body">
						<div class="table-container">
							<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
								<tr>
									<th>Name</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								<tr>
									<td>Catalogue</td>
									<td><a href="{{url('kross_over.pdf')}}" download><img src="{{asset('pdf.svg')}}" height="100" width="100"></a></td>
									<td><a href="{{url('admin/catalogue/create')}}">Click here for Update Catalogue</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
