	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{url('admin/home')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{url('admin/categories')}}"><i class="fa fa-fw fa-sitemap">&nbsp;</i>Main Categories</a></li>
			<li><a href="{{url('admin/subcategories')}}"><i class="fa fa-fw fa-list-alt">&nbsp;</i>Sub Categories</a></li>
			<li><a href="{{url('admin/products')}}"><i class="fa fa-fw fa-shopping-cart">&nbsp;</i>Products</a></li>
			<li><a href="{{url('admin/brands')}}"><i class="fa fa-bitbucket">&nbsp;</i>Brands</a></li>
			<li><a href="{{url('admin/colors')}}"><i class="fa fa-bitbucket">&nbsp;</i>Colors</a></li>
			<li><a href="{{url('admin/sliders')}}"><i class="fa fa-fw fa-sliders">&nbsp;</i>Slider Settings</a></li>
			<li><a href="{{url('admin/staticpages')}}"><i class="fa fa-fw fa-cogs">&nbsp;</i>Static Pages</a></li>
		</ul>
	</div>