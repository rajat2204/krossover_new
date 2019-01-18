<!-- Start Banner Area -->
  <section class="banner-area organic-breadcrumb">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
        <div class="col-first">
          @if(empty($staticpage['description']))
          <h1>Catalogue</h1>
          <nav class="d-flex align-items-center">
            <a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
            <!-- <a href="javascript:void(0);">Shop<span class="lnr lnr-arrow-right"></span></a> -->
            <a href="">Catalogue</a>
          </nav>
          @else
          <h1>{{$staticpage['title']}}</h1>
          <nav class="d-flex align-items-center">
            <a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
            <!-- <a href="javascript:void(0);">Shop<span class="lnr lnr-arrow-right"></span></a> -->
            <a href="">{{$staticpage['title']}}</a>
          </nav>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner Area -->

<!-- Start About-Us Area -->
<section class="aboutus-area section_gap white_bg">
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="section-title static_head">
            @if(empty($staticpage['description']))
            <h3>Catalogue</h3>
            @else
            <h3>{{$staticpage['title']}}</h3>
            @endif
          </div>
        </div>
        @if(!empty($staticpage['image']))
        <div class="col-lg-4 col-md-4 col-sm-12"> 
          <div class="about_img">
            <img src="{{url('assets/images/staticpage')}}/{{$staticpage['image']}}">
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12"> 
            <div class="static-description p-l-40">
              <p>{{strip_tags($staticpage['description'])}}</p>
            </div>
        </div>
        @elseif(empty($staticpage['description']))
        <div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="static-image">
              <img src="{{url('assets/images/staticpage/comingsoon.jpg')}}">
            </div>
        </div>
        @else
        <div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="static-descriptionss">
              <p>{{strip_tags($staticpage['description'])}}</p>
            </div>
        </div>
        @endif
      </div>
    </div>
</section>
<!-- End About-Us Area -->