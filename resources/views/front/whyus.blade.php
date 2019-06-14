<!-- Start Banner Area -->
  <section class="banner-area clearfix categoryWrapper organic-breadcrumb staticpageswrap">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
        <div class="col-first colwhyus">
          <h1>Why Us</h1>
          <!-- <nav class="d-flex align-items-center">
            <a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
            <a href="javascript:void(0);">Shop<span class="lnr lnr-arrow-right"></span></a>
            <a href="">Why Us</a>
          </nav>-->
        </div>
      </div>
    </div>
  </section>
<!-- End Banner Area -->

<!-- start features Area -->
<section id="whyus" class="features-area section_gap">
    <div class="container">
     
      <div class="section-title  text-center">
        <h1>Why Us</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.</p>
      </div>

      <div class="row features-inner">
        <!-- single features -->
        @foreach($whyus as $whyusimages)
        <div class="col-lg-4 col-md-6 col-sm-6 line-right">
          <div class="single-features">
            <div class="f-icon">
              <img src="{{url('assets/images/whyus')}}/{{$whyusimages['image']}}" alt="">
            </div>
            <h6>{{!empty($whyusimages['title'])?$whyusimages['title']:''}}</h6>
            <p>{{strip_tags(!empty($whyusimages['description'])?($whyusimages['description']):'')}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
<!-- end features Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap" id="our-clientss">
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
      	<div class="col-md-12">
        <!-- clients logo slider -->
	        <div class="active-exclusive-product-slider">
	          @foreach($client as $clients)
	          <!-- single exclusive carousel -->
	            <div class="single-exclusive-slider">
	              <a class="col single-img">
	                <img class="img-fluid d-block mx-auto" src="{{url('assets/images/clients')}}/{{$clients['image']}}" alt="">
	              </a>
	            </div>
	          @endforeach
	          </div>
	        </div>
        </div>
      </div>
    </div>
</section>
<!-- End brand Area -->