<div class="col-sm-8 col-sm-offset-4 col-lg-9 col-lg-offset-3 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<a href="{{url('admin/categories')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-sitemap color-blue"></em>
								<div class="large">{{ \App\Models\Category::count() }}</div>
								<div class="text-muted">Categories</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<a href="{{url('admin/subcategories')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-list-alt color-orange"></em>
								<div class="large">{{ \App\Models\Subcategories::count() }}</div>
								<div class="text-muted">Sub-Categories</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<a href="{{url('admin/products')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-teal"></em>
								<div class="large">{{ \App\Models\Products::count() }}</div>
								<div class="text-muted">Products</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<a href="{{url('admin/clients')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
								<div class="large">{{ \App\Models\Clients::count() }}</div>
								<div class="text-muted">Our Clients</div>
							</div>
						</a>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<div class="panel panel-container">
			<div class="row">
				<!-- <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<a href="{{url('admin/gallery')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-file-image-o color-teal"></em>
								<div class="large">{{ \App\Models\Gallery::count() }}</div>
								<div class="text-muted">Gallery</div>
							</div>
						</a>
					</div>
				</div> -->
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<a href="{{url('admin/offers')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-gift color-red"></em>
								<div class="large">{{ \App\Models\Offers::count() }}</div>
								<div class="text-muted">Offers</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<a href="{{url('admin/enquiries')}}">
							<div class="row no-padding"><em class="fa fa-xl fa-envelope color-blue"></em>
								<div class="large">{{ \App\Models\Enquiry::count() }}</div>
								<div class="text-muted">Enquiry</div>
							</div>
						</a>
					</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>