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
        
        {{-- <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" rel="stylesheet">  --}}

    <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/assets/global/plugins/datatables/media/images/favicon.ico')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nouislider.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ion.rangeSlider.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ion.rangeSlider.skinFlat.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/availability-calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquerysctipttop.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/global/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datepicker3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
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
  <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
  <script src="{{asset('assets/js/countdown.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('assets/js/easypiechart-data.js')}}"></script>
  <script src="{{asset('assets/js/easypiechart.js')}}"></script>
  <script src="{{asset('assets/js/chart-data.js')}}"></script>
  <script src="{{asset('assets/js/chart.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/popper.js')}}"></script>
  <script src="{{asset('assets/js/parallax.min.js')}}"></script>
  <script src="{{asset('assets/js/script.js')}}"></script>
  <script src="{{asset('assets/js/select2.full.min.js')}}"></script>
        <!-- [ TYPING SCRIPT ] -->
         <!-- [ COUNT SCRIPT ] -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- [ SLIDER SCRIPT ] -->
    </body>
</html>
