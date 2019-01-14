<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  
  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datepicker3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/dataTables.bootstrap4.min.css')}}">

  <link href="{{asset('assets/css/sweetalert2.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
  </head>
    <body class="page-md login">
        <div class="wrapper">
                @yield('content')
        </div>

  
  <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('assets/js/chart.min.js')}}"></script>
  <script src="{{asset('assets/js/chart-data.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('assets/js/easypiechart-data.js')}}"></script>
  <script src="{{asset('assets/js/easypiechart.js')}}"></script>
 
  <script src="{{ asset('assets/js/plugin/nicEdit.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('assets/js/sweetalert2.min.js') }}"></script>
  <script src="{{asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },isLocal: false
    });
});  
</script>

@yield('requirejs')
    <!-- [ SLIDER SCRIPT ] -->
    </body>
</html>
