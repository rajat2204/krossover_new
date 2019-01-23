	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>{{$productdata['title']}}</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="javascript:void(0);">{{$productdata['title']}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="{{url('assets/images/products')}}/{{$productdata['feature_image']}}" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="{{url('assets/images/products')}}/{{$productdata['feature_image']}}" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="{{url('assets/images/products')}}/{{$productdata['feature_image']}}" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{$productdata['title']}}</h3>
					<h2>${{$productdata['price']}}</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category:</span>{{$productdata['category']['name']}}</a></li>
						<li><a href="#"><span>Availibility:</span>
						@if(!empty($productdata['stock']))
							{{$productdata['stock']}}
						@else
						<span>Out of Stock</span>
						@endif
					</a></li>
					</ul>
					<p>{{strip_tags($productdata['description'])}}</p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
						 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
						 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
					</div>
					<div class="card_area d-flex align-items-center">
						<a class="primary-btn" href="javascript:void(0)">Get QUOTES</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p>{{strip_tags($productdata['description'])}}</p>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					@if(\App\Models\Products::where('status','active')->count() >0)
                  @php
                    $popular_product = \App\Models\Products::where('featured','1')->get();
                  @endphp
                    @foreach($popular_product as $popular_products)
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="javascript:void(0);"><img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" style="width: 80px" alt=""></a>
							<div class="desc">
								<a href="#" class="title">{{$popular_products->title}}</a>
								<div class="price">
									<h6>${{$popular_products->price}}</h6>
									<h6 class="l-through">${{$popular_products->previous_price}}</h6>
								</div>
							</div>
						</div>
					</div>
					@endforeach
              			@endif
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ctg-right">
					<a href="#" target="_blank">
						<img class="img-fluid d-block mx-auto" src="{{url('assets/images/offers')}}/{{$offer[1]['image']}}" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End related-product Area -->

	

	