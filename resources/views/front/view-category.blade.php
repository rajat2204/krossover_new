<!-- Start category Area -->

<section class="brand-area section_gap showCategories" id="second-sec1">
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
            <img class="img-fluid d-block mx-auto" src="{{url('assets/images/categories')}}/{{$category['image']}}" alt="category">
            <div class="deal-details">
              <h6 class="deal-title">{{!empty($category['name'])?$category['name']:''}}</h6>
            </div>
          </a>
        </div>
      @endforeach
      </div>
    </div> 
    <div class="clearfix"></div>
  </div>
</section>
 
<!-- End category Area -->

<!-- Start gallery Area -->
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
<!-- End gallery Area -->


