<footer class="footer-area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-6  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>About Us</h6>
          <p>{!!str_limit($staticpage['description'],200)!!}</p><span><a href="{{url('pages/aboutus')}}">Read More....</a></span>
        </div>
      </div>
      <!-- <div class="col-lg-4  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Newsletter</h6>
          <p>Stay update with our latest</p>
          <div class="" id="mc_embed_signup">

            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
             method="get" class="form-inline">

              <div class="d-flex flex-row">

                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                 required="" type="email">


                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div> -->

                <!-- <div class="col-lg-4 col-md-4">
                      <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                    </div>  -->
              <!-- </div>
              <div class="info"></div>
            </form>
          </div>
        </div>
      </div> -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget mail-chimp">
          <h6 class="mb-20">More Links</h6>

          <ul class="instafeed static_links">
            <li><a href="{{url('pages/aboutus')}}" >About Us</a></li>
            <li><a href="{{url('/contactus')}}" >Contact Us</a></li>
            <li><a href="{{url('pages/termsandconditions')}}" >Terms and condition</a></li>
            <li><a href="{{url('pages/privacypolicy')}}" >Privacy policy</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Follow Us</h6>
          <p>Let us be social</p>
          <div class="footer-social d-flex align-items-center">
            <a href="{{$social[0]['url']}}" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="{{$social[1]['url']}}" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="{{$social[2]['url']}}" target="_blank"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By <a href="https://www.igniterpro.com/" target="_blank">Igniterpro</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>
</footer>