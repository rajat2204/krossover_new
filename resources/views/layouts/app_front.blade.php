<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" mozdisallowselectionprint moznomarginboxes>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

      
        <meta charset="utf-8"/>
        <title>Kross-Over</title>
        
        
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/logo.ico')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css') }}">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nouislider.min.css')}}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css') }}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/availability-calendar.css')}}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquerysctipttop.css')}}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css') }}"> -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css') }}" rel="stylesheet">
  {{-- for zoom images --}}
  <link href="{{asset('assets/magiczoomplus/magiczoomplus.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<!-- ====================================[ DEFAULT STYLESHEET ]==================================== -->
 @yield('css')
    </head>
    <body class="page-md login loadingInProgress" tabindex="1" > 
        <div id="cover"></div>
        <div class="wrapper homewrapper">
                @yield('content')
        </div>
        
  <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
   crossorigin="anonymous"></script>
    <!-- [ PLUGIN SCRIPT ] -->
  <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
  <!-- <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script> -->
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
  <!-- <script src="{{asset('assets/js/nouislider.min.js')}}"></script> -->
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <!-- <script src="{{asset('assets/js/vendor/popper.js')}}"></script> -->
  <!-- <script src="{{asset('assets/js/parallax.min.js')}}"></script> -->
  <script src="{{asset('assets/js/script.js')}}"></script>
  <!-- Pdf flipbook jss -->
  <script src="{{asset('assets/js/pdff/html2canvas.min.js')}}"></script>
  <script src="{{asset('assets/js/pdff/three.min.js')}}"></script>
  <script src="{{asset('assets/js/pdff/pdf.min.js')}}"></script>
  <script src="{{asset('assets/js/pdff/3dflipbook.min.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <!-- Pdf flipbook jss ends-->

  <script src="{{asset('assets/js/sweetalert2.min.js') }}"></script>
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <!-- [ TYPING SCRIPT ] -->
         <!-- [ COUNT SCRIPT ] -->
  {{-- zoom images  --}}
  <script src="{{asset('assets/magiczoomplus/magiczoomplus.js')}}" type="text/javascript"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- [ SLIDER SCRIPT ] -->
  <script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },isLocal: false
    });
}); 

$(window).load(function(){
  setTimeout(function(){
      $('#cover').fadeOut(500);
  },500)
});
$(document).ready(function(){
  $(".submenu").click(function(){
    $(".dropdown-menu").toggle();
  });
});
</script>
    @yield('requirejs')
    </body>
</html>
