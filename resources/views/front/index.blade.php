<div class="homewrapper">
<!-- Start brand Area -->
<section class="banner-area">
    <div class="homecontainer">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 categoryFront">
          <div class="active-banner-slider owl-carousel" id="active-banner-slider">
          @foreach($slider as $sliders)
          <!-- single-slide -->
          <div class="row item single-slide align-items-center d-flex">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="sliderphoneupper">
                <img src="{{asset('assets/images/output-onlinepngtools-5.png')}}">
              </div>
           <!--  <div class="col-lg-5 col-md-4 col-sm-4">
              <div class="banner-content"><h1>{{!empty($sliders['title'])?$sliders['title']:''}}</h1>
                <p>{{!empty($sliders['text'])?$sliders['text']:''}}</p>
              </div>

            </div> -->
            <div class="sliderphone">
              <div class="slidertext">View our<br>New<br>Collection</div>
              <div class="sliderhandphone">
                <img src="{{asset('assets/images/output-onlinepngtools-6.png')}}">
              </div>
            </div>
              {{-- <div class="banner-img">
                @if(!empty($sliders['product_id']))
                  <a href="{{url('product')}}/{{___encrypt($sliders['product']['id'])}}"><img class="img-fluid" src="{{url('/')}}/assets/images/sliders/{{$sliders['image']}}" alt=""></a>
                @else
                  <img class="img-fluid" src="{{url('/')}}/assets/images/sliders/{{$sliders['image']}}" alt="">
                @endif
              </div> --}}
            </div>
          </div>
        @endforeach
        </div>
        </div>
    
    {{-- <div class="fullscreen align-items-center justify-content-start"> --}}
      <div class="col-lg-6 col-md-12 col-sm-12 bannerFront">
        <div class="right-active-banner-slider">
          <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="rightupperWrap rightbg bg-colorblue m-b-30">
              <p class="headingright">View<br> Our<br> <span style="color:#fff;">mugs & bottles</span></p>
              <div class="imageinner">
              <span><img src="{{asset('assets/images/DRNK2.png')}}"></span>
              <span><img src="{{asset('assets/images/DRINK1.png')}}"></span>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
            <div class="rightupperWrap bg-colorpurple">
              <p class="headingright headbtm">View<br> Our<br> <span style="color:#fff;">best products</span></p>
              <div class="imageinnerbtm">
                <span><img src="{{asset('assets/images/outputtool.png')}}"></span>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12" style="padding-left: 0;">
            <div class="rightupperWrap bg-colorpink">
              <p class="headingright headbtm">View<br> Our<br> <span style="color:#fff;">discount & special offers</span></p>
              <div class="imageinnerbtm">
                <span><img src="{{asset('assets/images/save-ribbon.png')}}"></span>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!----------------Start our category -------------------->
<section class="categorySectionwrap">
  <div class="homecontainer">
    <div class="row">
    <div class="col-md-12">
      <div class="section-title frontHead">
          <h1><a class="ourcategoryhead" href="{{url('view-category')}}">Our Categories</a></h1>
      </div>
      <div class="">
        <!-- clients logo slider -->
        <div class="active-exclusive-product-slider-front">
          @foreach($categories as $category)
          <!-- single exclusive carousel -->
            <div class="single-exclusive-slider">
              <a class="single-img" href="{{url('view-category')}}">
                <div class="overlay"></div>
                <img class="img-fluid d-block mx-auto" src="{{url('assets/images/categories')}}/{{$category['image']}}" alt="">
                <div class="deal-details">
                  <h6 class="deal-title">{{!empty($category['name'])?$category['name']:''}}</h6>
                </div>
                <!-- <div class="deal-detailsshow">
                  <h6 class="deal-titleshow">{{str_limit($category['name'],19)}}</h6>
              </div> -->
              </a>
              
            </div>
          @endforeach
        </div>
      </div> 
    </div>
  </div>
</section>
<!----------------End our category -------------------->
<!-- start product Area -->
<section class="section_gap_front" id="products1">
  <div class="homecontainer">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12 margin-front">
        <div class="single-product-slider singleProductSlider">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="section-title sectionTitle sliderDiv">
                <h1>Latest Products</h1>
                <p>Here the Latest products detail be shown.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="active-product activeSlider" id="activeArea">
              @foreach($latest_product as $latest_products)
                <div class="single-product">
                  <div class="product_img">
                    <a href="{{url('product')}}/{{___encrypt($latest_products['id'])}}"><img class="img-fluid" src="{{url('assets/images/products')}}/{{$latest_products['feature_image']}}" alt=""></a>
                  </div>
                  <div class="product-details">
                    <h6>{{!empty($latest_products['title'])?$latest_products['title']:''}}</h6>
                    <!-- <div class="price">
                      <h6>${{!empty($latest_products['price'])?$latest_products['price']:''}}</h6>
                      <h6 class="l-through">${{!empty($latest_products['previous_price'])?$latest_products['previous_price']:''}}</h6>
                    </div> -->
                  </div>
                </div>
              @endforeach
              </div>
              <div class="view-more-wrap">
                <a href="{{url('latest-product')}}"><span>View More</span></a>
              </div>
            </div>

          </div>
        </div>
        
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="section_gap_bottom singleProductSlider">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="section-title sectionTitle sliderDiv">
                <h1>Featured Products</h1>
                <p>Here the Featured products detail be shown.</p>
              </div>
            </div>
          </div>
          <div class="mostpopularWrap">

          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                @if(\App\Models\Products::where('status','active')->count() >0)
                  @php
                    $popular_product = \App\Models\Products::take(9)->orderBy('id','DESC')->where('featured','1')->where('status','active')->get();
                  @endphp
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-20">
                      <div class="single-related-product active-product activeSlider">
                    @foreach($popular_product as $popular_products)
                    <div class="single-product">
                      <div class="product_img">
                        <a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}">
                          <img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" alt="">
                        </a>
                      </div>
                      <div class="product-details">
                        <a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}">{{!empty($popular_products->title)?($popular_products->title):''}}</a>
                        <!-- <div class="price">
                          <h6>${{!empty($popular_products->price)?($popular_products->price):''}}</h6>
                          <h6 class="l-through">${{!empty($popular_products->previous_price)?($popular_products->previous_price):''}}</h6>
                        </div> -->
                      </div>
                    </div>
                   
                    @endforeach
                  @endif
              </div>
              <div class="view-more-wrap">
                <a href="{{url('most-popular')}}"><span>View More</span></a>
              </div>
            </div>
           
          </div>
        
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
</div>
<!-- end product Area -->


<!-- End related-product Area -->



@section('requirejs')
<!-- <script>
  
  $('document').ready(function(){ 

  $('#vieww').click(function(){ 
  $('#gallery,  section.owl-carousel.active-product-area.section_gap.owl-theme.owl-loaded, section#popular').toggle(); 

  $('#vieww').hide(); 
});
});
 
</script> -->
@endsection