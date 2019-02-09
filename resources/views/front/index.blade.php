<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
      <div class="row fullscreen align-items-center justify-content-start">
        <div class="col-lg-12">
          <div class="active-banner-slider owl-carousel">
          @foreach($slider as $sliders)
            <!-- single-slide -->
            <div class="row single-slide align-items-center d-flex">
              <div class="col-lg-5 col-md-6">
                <div class="banner-content">
                  <a href="{{url('/')}}"><h1>{{!empty($sliders['title'])?$sliders['title']:''}}</h1></a>
                  <p>{{!empty($sliders['text'])?$sliders['text']:''}}</p>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="banner-img">
                  @if(!empty($sliders['product_id']))
                    <img class="img-fluid" src="{{url('/')}}/assets/images/products/{{$sliders['image']}}" alt="">
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

<!-- Start brand Area -->
<section class="brand-area section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h1>OUR CATEGORIES</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.</p>
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
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[0]['image']}}" alt="">
                <a href="{{url('assets/images/gallery')}}/{{$gallery[0]['image']}}" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{!empty($gallery[0]['name'])?$gallery[0]['name']:''}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[1]['image']}}" alt="">
                <a href="{{url('assets/images/gallery')}}/{{$gallery[1]['image']}}" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{!empty($gallery[1]['name'])?$gallery[1]['name']:''}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[2]['image']}}" alt="">
                <a href="{{url('assets/images/gallery')}}/{{$gallery[2]['image']}}" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{!empty($gallery[2]['name'])?$gallery[2]['name']:''}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-8 col-md-8">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[3]['image']}}" alt="">
                <a href="{{url('assets/images/gallery')}}/{{$gallery[3]['image']}}" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{!empty($gallery[3]['name'])?$gallery[3]['name']:''}}</h6>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="single-deal">
            <div class="overlay"></div>
            @if(!empty($offer[0]['image']))
              <img class="img-fluid w-100" src="{{url('assets/images/offers')}}/{{$offer[0]['image']}}" alt="">
              <a href="{{url('assets/images/offers')}}/{{$offer[0]['image']}}" class="img-pop-up" target="_blank">
            @else
              <h1>{{!empty($offer[0]['text'])?$offer[0]['text']:''}}</h1>
            @endif
              <div class="deal-details">
                <h6 class="deal-title">{{!empty($offer[0]['name'])?$offer[0]['name']:''}}</h6>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
  <!-- single product slide -->
  <div class="single-product-slider">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
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
        @foreach($latest_product as $latest_products)
        <div class="col-lg-3 col-md-6">
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
        </div>
        @endforeach
        <!-- single product end -->
      </div>
    </div>
  </div>
  <!-- single product slide -->
  <div class="single-product-slider">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
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
        <div class="col-lg-3 col-md-6">
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
    </div>
  </div>
</section>
<!-- end product Area -->

<!-- Start related-product Area -->
<section id="popular" class="related-product-area section_gap_bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h1>MOST POPULAR</h1>
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
                    $popular_product = \App\Models\Products::take(9)->orderBy('id','DESC')->where('featured','1')->where('status','active')->get();
                  @endphp
                    @foreach($popular_product as $popular_products)
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
              <div class="single-related-product d-flex">
                <a href="{{url('product')}}/{{___encrypt($popular_products['id'])}}"><img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" style="width: 70px; height:70px;" alt=""></a>
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
        <div class="col-lg-3">
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
        </div>
      </div>
    </div>
</section>
<!-- End related-product Area -->

  
 

