
<!-- Start brand Area -->
<section class="banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 categoryFront">
          <div class="row">
            <div class="col-md-12">
              {{-- <div class="col-lg-6 text-center"> --}}
                <div class="section-title frontHead">
                  <h1>Our Categories</h1>
                </div>
              {{-- </div> --}}
            {{-- </div>  --}}
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
                      </a>
                    </div>
                  @endforeach
                </div>
              </div> 
              <!--  <div class="view-more-wrap text-center" style="padding-top: 0;">
                <a href="{{url('view-category')}}">View More</a>
              </div> -->
            </div>
           <!--  <div class="col-md-12">
              <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                  <div class="section-title frontHead inspirationHead">
                    <h1>Our Inspirational Gallery</h1>
                   {{--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua.</p> --}}
                  </div>
                </div>
                 <div class="row justify-content-center">
                  <div class="col-md-12">
                    <div class="single-deal singleDeal">
                    <div class="overlay"></div>
                    <img class="img-responsive" src="{{url('assets/images/gallery')}}/{{$gallery[0]['image']}}" alt="">
                    <a href="{{url('assets/images/gallery')}}/{{$gallery[0]['image']}}" class="img-pop-up" target="_blank">
                      <div class="deal-details">
                        <h6 class="deal-title">{{!empty($gallery[0]['name'])?$gallery[0]['name']:''}}</h6>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="view-more-wrap text-center">
              <a href="{{url('gallery')}}">View More</a>
            </div>
          </div> -->

        </div>
      </div>
    
    {{-- <div class="fullscreen align-items-center justify-content-start"> --}}
      <div class="col-lg-8 col-md-12 col-sm-12 bannerFront">
        <div class="active-banner-slider owl-carousel">
        @foreach($slider as $sliders)
          <!-- single-slide -->
          <div class="row single-slide align-items-center d-flex">
            <div class="col-lg-5 col-md-4 col-sm-4">
              <div class="banner-content"><a href="{{url('product')}}/{{___encrypt($sliders['product_id'])}}"><h1>{{!empty($sliders['title'])?$sliders['title']:''}}</h1></a>
                <a href="{{url('product')}}/{{___encrypt($sliders['product_id'])}}"><p>{{!empty($sliders['text'])?$sliders['text']:''}}</p></a>
              </div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-8">
              <div class="banner-img">
                @if(!empty($sliders['product_id']))
                  <a href="{{url('product')}}/{{___encrypt($sliders['product_id'])}}"><img class="img-fluid" src="{{url('/')}}/assets/images/products/{{$sliders['image']}}" alt=""></a>
                @else
                  <img class="img-fluid" src="{{url('/')}}/assets/images/sliders/{{$sliders['image']}}" alt="">
                @endif
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->




{{-- 
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
          
        </div>
      </div>
    </div>
  </section>

<section class="brand-area section_gap" id="second-sec1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h1>OUR CATEGORIES</h1>
          </div>
        </div>
      </div> 
      <div class="row">
        <!-- clients logo slider -->
        <div class="active-exclusive-product-slider">
          @foreach($categories as $category)
          <!-- single exclusive carousel -->
            <div class="single-exclusive-slider">
              <a class="single-img" href="{{url('/category/main')}}/{{$category['slug']}}">
                <div class="overlay"></div>
                <img class="img-fluid d-block mx-auto" src="{{url('assets/images/categories')}}/{{$category['image']}}" alt="">
                <div class="deal-details">
                  <h6 class="deal-title">{{!empty($category['name'])?$category['name']:''}}</h6>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div> 
      <div class="clearfix"></div>
      <div class="text-center" id="viewww">
        <br/>
        <a class="btn btn-info" id="vieww">Click for more information..<i class="fa fa-arrow-down"></i></a>
      </div>
    </div>
</section>
 
<!-- End brand Area -->

<!-- Start category Area -->
<section id="gallery" class="category-area section_gap white_bg">
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h1>Our Inspirational Gallery</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
 --}}
<!-- start product Area -->
<section class="section_gap_front" id="products1">
  <div class="container">
  <!-- single product slide -->
    <div class="row">
      <div class="col-lg-8 col-md-12 margin-front">
        <div class="single-product-slider singleProductSlider">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="section-title leftDiv">
                <h1>Latest Products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore
                  magna aliqua.</p>
                  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="active-product" id="activeArea">
              <!-- single product -->
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
              <!-- single product end -->
              </div>
              <div class="view-more-wrap">
                <a href="{{url('latest-product')}}">View More</a>
            </div>
            </div>

          </div>
        </div>
        {{-- <div class="single-product-slider owl-carousel active-product-area">
          <!-- single product slide -->
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="section-title">
                <h1>Latest Products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore
                  magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single product -->
            @foreach($latest_product1 as $latest_products1)
            <div class="col-lg-4 col-md-4">
              <div class="single-product">
                <a href="{{url('product')}}/{{___encrypt($latest_products1['id'])}}"><img class="img-fluid" src="{{url('assets/images/products')}}/{{$latest_products1['feature_image']}}" alt=""></a>
                <div class="product-details">
                  <h6>{{!empty($latest_products['title'])?$latest_products['title']:''}}</h6>
                  <!-- <div class="price">
                    <h6>${{!empty($latest_products['price'])?$latest_products['price']:''}}</h6>
                    <h6 class="l-through">${{!empty($latest_products['previous_price'])?$latest_products['previous_price']:''}}</h6>
                  </div> -->
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div> --}}
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="related-product-area-right section_gap_bottom">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
              <div class="section-title sectionTitle">
                <h1>Featured Products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.</p>
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
                    @foreach($popular_product as $popular_products)
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-20">
                      <div class="single-related-product d-flex">
                        <a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}"><img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" alt=""></a>
                        <div class="desc">
                          <a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}">{{!empty($popular_products->title)?($popular_products->title):''}}</a>
                          <!-- <div class="price">
                            <h6>${{!empty($popular_products->price)?($popular_products->price):''}}</h6>
                            <h6 class="l-through">${{!empty($popular_products->previous_price)?($popular_products->previous_price):''}}</h6>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    @endforeach
                  @endif
              </div>
               
            </div>
           
          </div>
        {{-- <div class="col-lg-2">
          <div class="ctg-right">
            <a href="#" target="_blank">
              @if(!empty($offer[1]['image']))
                <img class="img-fluid d-block mx-auto" src="{{url('assets/images/offers')}}/{{$offer[1]['image']}}" alt="">
              @else
              <div class="offer_text">
                <h1>{{!empty($offer[1]['text'])?$offer[1]['text']:''}}</h1>
              </div>
              @endif
            </a>
          </div>
        </div> --}}
          </div>
          <div class="view-more-wrap">
            <a href="{{url('most-popular')}}">View More</a>
          </div>
        </div>
        
      </div>
    </div>
</div>
</section>
<!-- end product Area -->


<!-- End related-product Area -->



@section('requirejs')
<script>
  
  $('document').ready(function(){ 

  $('#vieww').click(function(){ 
  $('#gallery,  section.owl-carousel.active-product-area.section_gap.owl-theme.owl-loaded, section#popular').toggle(); 

  $('#vieww').hide(); 
});
});
 
</script>
@endsection