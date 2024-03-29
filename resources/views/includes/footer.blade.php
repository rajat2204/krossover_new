@php
  $staticpage = _arefy(App\Models\StaticPages::where('slug','aboutus')->first());
@endphp
<footer class="footer-area section_gap" id="jsnn-footer">
  <div class="homecontainer">
    <div class="row">
      <!-- <div class="col-lg-6  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>About Us</h6>
          @if(!empty($staticpage))
            <p>{!!str_limit($staticpage['description'],200)!!}</p><span><a href="{{url('pages/aboutus')}}">Read More....</a></span>
          @endif
        </div>
      </div> -->
      <div class="col-lg-4  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Newsletter</h6>
          <p>Stay update with our latest.</p>
          <div class="" id="mc_embed_signup">

            <form role="subscribe" action="{{url('subscribe')}}" method="POST" class="form-inline">
              {{csrf_field()}}
              <div class="btn-subscribe">
                <input class="form-control" name="EMAIL" placeholder="Enter Email" type="email">
                <button type="button" class="click-btn btn btn-default subscribebtn" data-request="ajax-submit" data-target='[role="subscribe"]'><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
              </div>
              <div>
                <p class="newsletter-content">Sign up and be the first to know about our special offers and latest updates.</p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="single-footer-widget mail-chimp">
          <h6 class="mb-20">More Links</h6>

          <ul class="instafeed static_links">
            <li><a href="{{url('pages/aboutus')}}" >About Us</a></li>
            <li><a href="{{url('/contactus')}}" >Contact Us</a></li>
            <li><a href="{{url('pages/termsandconditions')}}" >Terms and condition</a></li>
            <li><a href="{{url('pages/privacypolicy')}}" >Privacy policy</a></li>
            <li><a href="{{url('whyus')}}" >Why Us</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 paddingRight">
       <div class="single-footer-widget mail-chimp">
          <h6>Contact us</h6> 
          <ul class="instafeed static_links">
            <li style="color: #fff;"><i class="fa fa-map-marker"></i>{{!empty($contact[0]['address'])?$contact[0]['address']:''}}</li><li style="color: #fff;"><i class="fa fa-map-marker"></i>{{!empty($contact[1]['address'])?$contact[1]['address']:''}}</li>
            <li><a href="mailto:{{!empty($contact[0]['email'])?$contact[0]['email']:''}}"><i class="fa fa-envelope"></i>{{!empty($contact[0]['email'])?$contact[0]['email']:''}}</a></li> 
            <li><a href="tel:{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}"> <i class="fa fa-phone"></i>{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}</a></li>
          </ul>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 mobileviewsocial">
          <div class="footer-social">
            <h6>Follow us</h6>
            <a href="{{$social[0]['url']}}" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="{{$social[1]['url']}}" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="{{$social[2]['url']}}" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="{{$social[3]['url']}}" target="_blank"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      


    </div>
   
  </div>
   <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By <a href="https://www.igniterpro.com/" target="_blank">Igniterpro</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
</footer>