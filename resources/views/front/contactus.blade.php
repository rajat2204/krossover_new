<!-- Start Banner Area -->
	<section class="banner-area clearfix categoryWrapper organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>{{($title)}}</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<!-- <a href="javascript:void(0);">Shop<span class="lnr lnr-arrow-right"></span></a> -->
						<a href="">{{$title}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
<!-- End Banner Area -->

<section class="contactus-area section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="row contact-form-area" data-wow-delay="0.4s">          
            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="contact-block">
                <h2>Contact Form</h2>
                <form role="contactus" action="{{url('contactussubmission')}}" method="POST">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                      </div>                                 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="email" placeholder="Email" id="email" class="form-control" name="email">
                      </div> 
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="subject">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <textarea class="form-control" id="message" placeholder="Your Message" name="message" rows="5"></textarea>
                      </div>
                      <div class="submit-button">
                        <button class="btn primary-btn" type="button" data-request="ajax-submit" data-target='[role="contactus"]'>Send Message</button>
                      </div>
                    </div>
                  </div>            
                </form>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
              <div class="footer-right-area wow fadeIn animated" style="visibility: visible;">
                <h2>Contact Address</h2>
                <div class="footer-right-contact">
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <p>{{!empty($contact[0]['address'])?$contact[0]['address']:''}}</p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <p><a href="mailto:{{!empty($contact[0]['email'])?$contact[0]['email']:''}}">{{!empty($contact[0]['email'])?$contact[0]['email']:''}}</a></p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <p><a href="tel:{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}">{{!empty($contact[0]['mobile'])?$contact[0]['mobile']:''}}</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center padding-none">
          <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.9967633979286!2d55.30596296514794!3d25.237033985978776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f42d1ccff259f%3A0x65fd957a931ee01c!2sGolden+Dragon+Restaurant!5e0!3m2!1sen!2sin!4v1548920493327" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
</section>

@section('requirejs')
@endsection