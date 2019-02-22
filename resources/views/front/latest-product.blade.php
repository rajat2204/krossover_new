<section class="owl-carousel active-product-area section_gap viewlatestProduct" id="products1">
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