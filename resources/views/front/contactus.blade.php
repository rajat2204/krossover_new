<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
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

<!-- Start About-Us Area -->
<section class="aboutus-area section_gap white_bg">
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="row contact-form-area wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">          
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
                        <button class="btn btn-common" type="button" data-request="ajax-submit" data-target='[role="contactus"]'>Send Message</button>
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
                    <p>Dubai Office:
                      Suite #107, Mandarin Building 
                      Near Lamcy Plaza 
                      Oud Metha P.O. Box 242172
                    </p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <p><a href="mailto:info@kross-over.net">info@kross-over.net</a></p>
                  </div>
                  <div class="single-contact">
                    <div class="contact-icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <p><a href="tel:04 2979798">04 2979798</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
               <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4165.321812020541!2d77.38378970022572!3d28.61164902546254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5aa32ba7abd%3A0x348f1dd49387e0a7!2sMainee+Steel+Works+Private+Limited!5e0!3m2!1sen!2sin!4v1543673481681" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34015.943594576835!2d-106.43242624069771!3d31.677719472407432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75d90e99d597b%3A0x6cd3eb9a9fcd23f1!2sCourtyard+by+Marriott+Ciudad+Juarez!5e0!3m2!1sen!2sbd!4v1533791187584"></object> -->
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- End About-Us Area -->