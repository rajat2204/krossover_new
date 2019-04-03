<!-- Start category Area -->
<section class="brand-area section_gap showCategories" id="second-sec1">
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
    <div class="">
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
            <!-- <div class="deal-detailsshow">
                <h6 class="deal-titleshow">{{str_limit($category['name'],19)}}</h6>
            </div> -->
          </a>
        </div>
      @endforeach
      </div>
    </div> 
    <div class="clearfix"></div>
  </div>
</section>
<!-- End category Area -->