<!-- Start related-product Area -->
<section id="popular" class="related-product-area section_gap_bottom mostPopularWrap">
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
        <div class="col-lg-9 pad-rg">
          <div class="row">
                @if(\App\Models\Products::where('status','active')->count() >0)
                  @php
                    $popular_product = \App\Models\Products::take(9)->orderBy('id','DESC')->where('featured','1')->where('status','active')->get();
                  @endphp
                    @foreach($popular_product as $popular_products)
            <div class="col-lg-4 col-md-4 col-sm-6 mb-20 margin-rg">
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
        <div class="col-lg-3 pad-lg">
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