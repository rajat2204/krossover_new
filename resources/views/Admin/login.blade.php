<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kross-Over|Login</title>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('img/fav.png')}}">
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
	<link href="{{asset('assets/css/sweetalert2.css') }}" rel="stylesheet">
</head>

<body>

	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{url('img/login.jpg')}}" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="registration.html">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form role="login" class="row login_form" action="{{url('admin/login')}}" data-request="enable-enter" method="post">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="button" data-request="ajax-submit" data-target='[role="login"]' class="primary-btn">Log In</button>
								<a href="#">Forgot Password?</a>
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