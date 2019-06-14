<!-- Start Banner Area -->
<section class="banner-area clearfix categoryWrapper organic-breadcrumb">
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
        <h1>{{!empty($staticpage['title'])?$staticpage['title']:''}}</h1>
        <nav class="d-flex align-items-center">
          <a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
          <!-- <a href="javascript:void(0);">Shop<span class="lnr lnr-arrow-right"></span></a> -->
          <a href="">{{!empty($staticpage['title'])?$staticpage['title']:''}}</a>
        </nav>
        @endif
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->

<!-- Start Static Area -->
<section class="static-area section_gap">
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="section-title static_head">
            @if(empty($staticpage['description']))
            <h3>Catalogue</h3>
            @else
            <h3>{{!empty($staticpage['title'])?$staticpage['title']:''}}</h3>
            @endif
          </div>
        </div>
        @if(!empty($staticpage['image']))
        <div class="col-lg-12 col-md-12 col-sm-12"> 
          <div class="static_img">
            <img src="{{url('assets/images/staticpage')}}/{{$staticpage['image']}}">
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="static-description">
              <p>{!!($staticpage['description'])!!}</p>
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
            <div class="static-description">
              <p>{!!($staticpage['description'])!!}</p>
            </div>
        </div>
        @endif
      </div>
    </div>
</section>
<!-- End Static Area -->