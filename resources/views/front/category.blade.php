
	<!-- Start Banner Area -->
	<section class="banner-area">
	    <div class="container">
	      <div class="row fullscreen align-items-center justify-content-start">
	        <div class="col-lg-12">
	          <div class="active-banner-slider owl-carousel">
	            <!-- single-slide -->
	            <div class="row single-slide align-items-center d-flex">
	              <div class="col-lg-5 col-md-6">
	                <div class="banner-content">
	                  <h1>Frisbee</h1>
	                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
	                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
	                  {{-- <div class="add-bag d-flex align-items-center">
	                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
	                    <span class="add-text text-uppercase">Add to Bag</span>
	                  </div> --}}
	                </div>
	              </div>
	              <div class="col-lg-7">
	                <div class="banner-img">
	                  <img class="img-fluid" src="{{url('img/banner/5.jpg')}}" alt="">
	                </div>
	              </div>
	            </div>
	            <!-- single-slide -->
	            <div class="row single-slide">
	              <div class="col-lg-5">
	                <div class="banner-content">
	                  <h1>Bayer Promotional <br>Gifts!</h1>
	                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
	                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
	                  {{-- <div class="add-bag d-flex align-items-center">
	                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
	                    <span class="add-text text-uppercase">Add to Bag</span>
	                  </div> --}}
	                </div>
	              </div>
	              <div class="col-lg-7">
	                <div class="banner-img">
	                  <img class="img-fluid" src="{{url('img/banner/3.jpg')}}" alt="">
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
    </section>
	<!-- End Banner Area -->
	<section class="section_gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5">
					<div class="sidebar-categories">
						<div class="head">Browse Categories</div>
						<ul class="main-categories">
							
							@if(\App\Models\Category::where('status','active')->count() >0)
				              @php
				                $category = \App\Models\Category::where('status','active')->get();
				              @endphp
				                @foreach($category as $categories)
							<li class="main-nav-list">
								<a data-toggle="collapse" href="#{{$categories->name}}{{$categories->id}}" aria-expanded="false" aria-controls="{{$categories->name}}{{$categories->id}}">{{$categories->name}}<span class="number">({{ \App\Models\Subcategories::where('cat_id',$categories->id)->count() }})</span></a>
								@if(\App\Models\Subcategories::where('cat_id',$categories->id)->where('status','active')->count() >0)
								<ul class="collapse" id="{{$categories->name}}{{$categories->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{$categories->name}}{{$categories->id}}">
									@foreach(\App\Models\Subcategories::where('cat_id',$categories->id)->where('status','active')->get() as $submenu)
									<li class="main-nav-list child"><a href="{{url('/category')}}/{{$submenu->slug}}">{{$submenu->name}}</a></li>
									@endforeach
									@endif
								</ul>
							</li>
							@endforeach
							@endif
						</ul>

					</div>
					<div class="sidebar-filter mt-50">
						<div class="top-filter-head">Product Filters</div>
						<div class="common-filter">

							@if(\App\Models\Brands::where('status','active')->count() >0)
				              @php
				                $brand = \App\Models\Brands::where('status','active')->get();
				              @endphp
							<div class="head">Brands</div>
							<form action="#">
								<ul>
				                @foreach($brand as $brands)
									<li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">{{$brands->brand_name}}</label></li>
								@endforeach
								</ul>
							</form>
						@endif
						</div>
						<div class="common-filter">
							<div class="head">Color</div>
							<form action="#">
								<ul>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
											Leather<span>(29)</span></label></li>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
											with red<span>(19)</span></label></li>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
									<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
								</ul>
							</form>
						</div>
						<div class="common-filter">
							<div class="head">Price</div>
							<div class="price-range-area">
								<div id="price-range"></div>
								<div class="value-wrapper d-flex">
									<div class="price">Price:</div>
									<span>$</span>
									<div id="lower-value"></div>
									<div class="to">to</div>
									<span>$</span>
									<div id="upper-value"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-8 col-md-7">
					<!-- Start Filter Bar -->
					<div class="filter-bar d-flex flex-wrap align-items-center">
						<div class="sorting">
							<select>
								<option value="1">Default sorting</option>
								<option value="1">Default sorting</option>
								<option value="1">Default sorting</option>
							</select>
						</div>
						<div class="sorting mr-auto">
							<select>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
							</select>
						</div>
						<div class="pagination">
							<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
							<a href="#">6</a>
							<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</div>
					</div>
					<!-- End Filter Bar -->
					<!-- Start Best Seller -->
					<section class="lattest-product-area pb-40 category-list">
						<div class="row">
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p8.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p2.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p3.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p4.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p5.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{url('img/product/p6.jpg')}}" alt="">
									<div class="product-details">
										<h6>addidas New Hammer sole
											for Sports person</h6>
										<div class="price">
											<h6>$150.00</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
										{{-- <div class="prd-bottom">

											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-sync"></span>
												<p class="hover-text">compare</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div> --}}
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- End Best Seller -->
					<!-- Start Filter Bar -->
					<div class="filter-bar d-flex flex-wrap align-items-center">
						<div class="sorting mr-auto">
							<select>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
							</select>
						</div>
						<div class="pagination">
							<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
							<a href="#">6</a>
							<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</div>
					</div>
					<!-- End Filter Bar -->
				</div>
			</div>
		</div>
	</section>
	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
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
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r1.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r2.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r3.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r5.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r6.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r7.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r9.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r10.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="{{url('img/r11.jpg')}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

	

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


