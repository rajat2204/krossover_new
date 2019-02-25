<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kross-Over | Login</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css') }}">
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
						<h3>Log in to enter</h3>
						<form role="login" class="row login_form" action="{{url('admin/login')}}" data-request="enable-enter" method="post">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
								<input type="hidden" name="not_exists">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="button" data-request="ajax-submit" data-target='[role="login"]' class="primary-btn login">Log In</button>
								<a href="javascript:void(0);">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript">
		setTimeout(function(){
        $('[data-request="enable-enter"]').on('keyup','input',function (e) {
        e.preventDefault();
        if (e.which == 13) {
        $('[data-request="enable-enter"]').find('.login').trigger('click');
        return false;   
        }
    }); 
},100);
	</script>

	<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert2.min.js') }}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
</body>
	
</html>