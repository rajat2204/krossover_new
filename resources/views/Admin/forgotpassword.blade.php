<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kross-Over | Forgot-Password</title>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('img/logo.ico')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/nouislider.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">

	<link href="{{asset('assets/css/sweetalert2.css') }}" rel="stylesheet">
</head>

<body>

	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{url('img/login.jpg')}}" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Forgot Password</h3>
						<form role="forgotpassword" class="row login_form" action="{{url('admin/login')}}"  method="post">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<button type="button" data-request="ajax-submit" data-target='[role="forgotpassword"]' class="primary-btn">Reset my password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('assets/js/nouislider.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert2.min.js') }}"></script>
	<script src="{{asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>
	
</html>