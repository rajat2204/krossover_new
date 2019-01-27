
<!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
          <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                @for ($i = 0; $i < count($sliders); $i++)
                @if($i == 0)
              <div class="active-banner-slider owl-carousel">
                <!-- single-slide -->
                <div class="row single-slide align-items-center d-flex">
                  <div class="col-lg-5 col-md-6">
                    <div class="banner-content">
                      <a href="{{url('/')}}"><h1>{{$sliders[$i]->title}}</h1></a>
                      <p>{{$sliders[$i]->text}}</p>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="banner-img">
                      <img class="img-fluid" src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="">
                    </div>
                  </div>
                </div>
                @else
                <!-- single-slide -->
                <div class="row single-slide">
                  <div class="col-lg-5">
                    <div class="banner-content">
                      <a href="{{url('/')}}"><h1>{{$sliders[$i]->title}}</h1></a>
                      <p>{{$sliders[$i]->text}}</p>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="banner-img">
                      <img class="img-fluid" src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="">
                    </div>
                  </div>
                </div>
              @endif
            @endfor
              </div>
            </div>
          </div>
        </div>
    </section>
<!-- End banner Area -->

<!-- start features Area -->
    <section id="whyus" class="features-area section_gap white_bg">
        <div class="container">
         
          <div class="section-title  text-center">
            <h1>Why Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.</p>
          </div>

          <div class="row features-inner">
            <!-- single features -->
            @foreach($whyus as $whyusimages)
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon">
                  <img src="{{url('assets/images/whyus')}}/{{$whyusimages['image']}}" alt="">
                </div>
                <h6>{{$whyusimages['title']}}</h6>
                <p>{{strip_tags($whyusimages['description'])}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    </section>
<!-- end features Area -->


<!-- what we do -->
  <!-- <section id="program">
    <div class="popular page_section">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h1>What we do</h1>
            </div>
          </div>
        </div>

        <div class="row course_boxes"> -->
          
          <!-- Popular Course Item -->
          <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 course_box">
            <div class="card">
              <img class="card-img-top" src="img/course_1.jpg" alt="">
              <div class="overlay_blue">
                <div class="program-title">Events</div>
                <ul class="program-list">
                  <li>Product Launch</li>
                  <li>Conference</li>
                  <li>Press & Media Event</li>
                  <li>Gala Dinner</li>
                  <li>Award Ceremony</li>
                  <li>Themed Event </li>
                  <li>Team Building and Corporate hospitality</li>
                </ul>
              </div>
              <div class="card-body">
                <div class="card-title">Events</div> -->
                <!-- <div class="card-text"></div> -->
              <!-- </div>
              
            </div>
            
          </div> -->

          <!-- Popular Course Item -->
<!--           <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 course_box">
            <div class="card">
              <img class="card-img-top" src="img/course_2.jpg" alt="">
              <div class="overlay_blue">
                <div class="program-title">Field Marketing</div>
                <ul class="program-list">
                  <li>Road Shows</li>
                  <li>Promotional Staffing</li>
                  <li>Creative Design</li>
                  <li>Stand Fabrication and Mystery Shopping</li>
                </ul>
              </div>
              <div class="card-body">
                <div class="card-title">Field Marketing</div> -->
                <!-- <div class="card-text"></div> -->
              <!-- </div>
              
            </div>
          </div> -->

          <!-- Popular Course Item -->
          <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 course_box">
            <div class="card">
              <img class="card-img-top" src="img/course_3.jpg" alt="">
              <div class="overlay_blue">
                <div class="program-title">Gifts & Premium</div>
                <ul class="program-list">
                  <li>Corporate Gifts</li>
                  <li>Promotional Giveaways and Awards</li>
                </ul>
              </div>
              <div class="card-body">
                <div class="card-title">Gifts & Premium</div> -->
                <!-- <div class="card-text"></div> -->
              <!-- </div>
              
            </div>
          </div>
        </div>
      </div>    
    </div>
  </section> -->
<!-- what we do ends-->

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
                <a href="javascript:void(0);" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{$gallery[0]['name']}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[1]['image']}}" alt="">
                <a href="javascript:void(0);" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{$gallery[1]['name']}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[2]['image']}}" alt="">
                <a href="javascript:void(0);" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{$gallery[2]['name']}}</h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-8 col-md-8">
              <div class="single-deal">
                <div class="overlay"></div>
                <img class="img-fluid w-100" src="{{url('assets/images/gallery')}}/{{$gallery[3]['image']}}" alt="">
                <a href="javascript:void(0);" class="img-pop-up" target="_blank">
                  <div class="deal-details">
                    <h6 class="deal-title">{{$gallery[3]['name']}}</h6>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" src="{{url('assets/images/offers')}}/{{$offer[0]['image']}}" alt="">
            <a href="{{url('img/category/c5.jpg')}}" class="img-pop-up" target="_blank">
              <div class="deal-details">
                <h6 class="deal-title">{{$offer[0]['name']}}</h6>
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
                <img class="img-fluid" src="{{url('assets/images/products')}}/{{$latest_products['feature_image']}}" alt="">
              </div>
              <div class="product-details">
                <h6>{{$latest_products['title']}}</h6>
                <div class="price">
                  <h6>${{$latest_products['price']}}</h6>
                  <h6 class="l-through">${{$latest_products['previous_price']}}</h6>
                </div>
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
              <img class="img-fluid" src="{{url('assets/images/products')}}/{{$latest_products1['feature_image']}}" alt="">
              <div class="product-details">
                <h6>{{$latest_products['title']}}</h6>
                <div class="price">
                  <h6>${{$latest_products['price']}}</h6>
                  <h6 class="l-through">${{$latest_products['previous_price']}}</h6>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- end product Area -->

<!-- Start exclusive deal Area -->
    <!-- <section class="exclusive-deal-area section_gap">
      <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-title">
            <h1>NEW ARRIVALS</h1>
           
          </div>
        </div>
      </div> -->
        <!-- <div class="row justify-content-center align-items-center">
          <div class="col-lg-6 no-padding exclusive-left">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12">
                <h1>Exclusive Hot Deal Coming Soon!</h1>
                <p>Who are in extremely love with eco friendly system.</p>
              </div>
              <div class="col-lg-12">
                <div class="row clock-wrap">
                  <div class="col clockinner1 clockinner">
                    <h1 class="days">150</h1>
                    <span class="smalltext">Days</span>
                  </div>
                  <div class="col clockinner clockinner1">
                    <h1 class="hours">23</h1>
                    <span class="smalltext">Hours</span>
                  </div> -->
                  <!-- <div class="col clockinner clockinner1">
                    <h1 class="minutes">47</h1>
                    <span class="smalltext">Mins</span>
                  </div>
                  <div class="col clockinner clockinner1">
                    <h1 class="seconds">59</h1>
                    <span class="smalltext">Secs</span>
                  </div>
                </div>
              </div>
            </div> -->
            
          <!-- </div>
          <div class="col-lg-6 no-padding exclusive-right">
            <div class="active-exclusive-product-slider"> -->
              <!-- single exclusive carousel -->
              <!-- <div class="single-exclusive-slider">
                <img class="img-fluid" src="{{url('img/product/e-p1.png')}}" alt="">
                <div class="product-details">
                  <div class="price">
                    <h6>$150.00</h6>
                    <h6 class="l-through">$210.00</h6>
                  </div>
                  <h4>addidas New Hammer sole
                    for Sports person</h4> -->
                 {{--  <div class="add-bag d-flex align-items-center justify-content-center">
                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                    <span class="add-text text-uppercase">Add to Bag</span>
                  </div> --}}
                <!-- </div>
              </div> -->
              <!-- single exclusive carousel -->
              <!-- <div class="single-exclusive-slider">
                <img class="img-fluid" src="img/product/e-p1.png" alt="">
                <div class="product-details">
                  <div class="price">
                    <h6>$150.00</h6>
                    <h6 class="l-through">$210.00</h6>
                  </div>
                  <h4>addidas New Hammer sole
                    for Sports person</h4> -->
                  {{-- <div class="add-bag d-flex align-items-center justify-content-center">
                    <a class="add-btn" href=""><span class="ti-bag"></span></a>
                    <span class="add-text text-uppercase">Add to Bag</span>
                  </div> --}}
                <!-- </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
<!-- End exclusive deal Area -->

<!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>OUR CLIENTS</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- clients logo slider -->
            <div class="active-exclusive-product-slider">
              @for ($j = 0; $i < count($clients); $i++)
                @if($j == 0)
              <!-- single exclusive carousel -->
                <div class="single-exclusive-slider">
                  <a class="col single-img" href="javascript:void(0);">
                    <img class="img-fluid d-block mx-auto" src="{{url('assets/images/clients')}}/{{$clients[$i]->image}}" alt="">
                  </a>
                </div>
                @else
                <!-- single exclusive carousel -->
                <div class="single-exclusive-slider">
                  <a class="col single-img" href="javascript:void(0);">
                    <img class="img-fluid d-block mx-auto" src="{{url('assets/images/clients')}}/{{$clients[$i]->image}}" alt="">
                  </a>
                </div>
              </div>
              @endif
              @endfor
            </div>

            <!-- clients logo slider ends here -->
            <!-- <a class="col single-img" href="#">
              <img class="img-fluid d-block mx-auto" src="{{url('img/brand/1.png')}}" alt="">
            </a>
            <a class="col single-img" href="#">
              <img class="img-fluid d-block mx-auto" src="{{url('img/brand/2.png')}}" alt="">
            </a>
            <a class="col single-img" href="#">
              <img class="img-fluid d-block mx-auto" src="{{url('img/brand/3.png')}}" alt="">
            </a>
            <a class="col single-img" href="#">
              <img class="img-fluid d-block mx-auto" src="{{url('img/brand/4.png')}}" alt="">
            </a>
            <a class="col single-img" href="#">
              <img class="img-fluid d-block mx-auto" src="{{url('img/brand/5.png')}}" alt="">
            </a> -->
          </div>
        </div>
    </section>
<!-- End brand Area -->

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
                    $popular_product = \App\Models\Products::where('featured','1')->get();
                  @endphp
                    @foreach($popular_product as $popular_products)
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
              <div class="single-related-product d-flex">
                <a href="javascript:void(0);"><img src="{{url('assets/images/products')}}/{{$popular_products->feature_image}}" style="width: 80px" alt=""></a>
                <div class="desc">
                  <a href="javascript:void(0);" class="title">{{$popular_products->title}}</a>
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

  
 

