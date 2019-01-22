<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

      
        <meta charset="utf-8"/>
        <title>Kross-Over</title>
        
        
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/logo.ico')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nouislider.min.css')}}">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/rangeSlider/css/ion.rangeSlider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/rangeSlider/css/ion.rangeSlider.min.css')}}"> -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/availability-calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquerysctipttop.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/global/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
  <link href="{{asset('assets/css/sweetalert2.css') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/> -->
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
    </head>
    <body class="page-md login">
        <div class="preloader">
        <div class="loader theme_background_color">
        <span></span>

        </div>
        </div>
        <div class="wrapper">

                @yield('content')
        </div>
        
  <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
   crossorigin="anonymous"></script>
    <!-- [ PLUGIN SCRIPT ] -->
  <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/countdown.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/popper.js')}}"></script>
  <script src="{{asset('assets/js/parallax.min.js')}}"></script>
  <script src="{{asset('assets/js/script.js')}}"></script>
  <script src="{{asset('assets/js/sweetalert2.min.js') }}"></script>
  <script src="{{asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
  <script src="{{asset('assets/js/select2.full.min.js')}}"></script>
  <!-- <script src="{{asset('assets/rangeSlider/js/ion.rangeSlider.js')}}"></script>
  <script src="{{asset('assets/rangeSlider/js/ion.rangeSlider.min.js')}}"></script> -->
        <!-- [ TYPING SCRIPT ] -->
         <!-- [ COUNT SCRIPT ] -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- [ SLIDER SCRIPT ] -->
    </body>
</html>
