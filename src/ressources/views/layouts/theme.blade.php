<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- DataTables -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
  
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/details-control.css') }}">
{{-- <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}
  <!-- Bootstrap 3.3.6 -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Font Awesome -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}}">

<!-- Ionicons -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">

<!-- Theme style -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

<!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

<!-- iCheck -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">

<!-- Morris chart -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

<!-- jvectormap -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

<!-- Date Picker -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">

<!-- Daterange picker -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">

<!-- bootstrap wysihtml5 - text editor -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}}">

<!-- DataTables -->
  
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">

  {{--Ajoutée--}}
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/details-control.css') }}">


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]> -->
  <script type="text/javascript" src=" {{ asset("dist/js/html5shiv.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("dist/js/respond.min.js") }}"></script>

  <![endif]-->

  @stack('css')
</head>
<body class="hold-transition ">
@yield('content')

<!-- /.login-box -->
<!-- jQuery 2.2.3 -->

  <script type="text/javascript" src="{{ asset("plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- jQuery UI 1.11.4 -->

  <script type="text/javascript" src="{{ asset("plugins/jQueryUI/jquery-ui.min.js") }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <script type="text/javascript" src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->

  <script type="text/javascript" src="{{ asset("bootstrap/js/bootstrap.min.js") }}"></script>

<script>
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
</script>
<!-- Morris.js charts -->

  <script type="text/javascript" src="{{ asset("dist/js/raphael-min.js") }}"></script>


  <script type="text/javascript" src="{{ asset("plugins/morris/morris.min.js") }}"></script>

<!-- Sparkline -->

  <script type="text/javascript" src="{{ asset("plugins/sparkline/jquery.sparkline.min.js") }}"></script>

<!-- jvectormap -->

  <script type="text/javascript" src="{{ asset("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>


  <script type="text/javascript" src="{{ asset("plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>

<!-- jQuery Knob Chart -->

  <script type="text/javascript" src="{{ asset("plugins/knob/jquery.knob.js") }}"></script>

<!-- daterangepicker -->

  <script type="text/javascript" src="{{ asset("dist/js/moment.min.js") }}"></script>


<!-- InputMask -->

<script type="text/javascript" src="{{ asset("plugins/input-mask/jquery.inputmask.js") }}"></script>
<script type="text/javascript" src="{{ asset("plugins/input-mask/jquery.inputmask.date.extensions.js") }}"></script>
<script type="text/javascript" src="{{ asset("plugins/input-mask/jquery.inputmask.extensions.js") }}"></script>
<script type="text/javascript" src="{{ asset("plugins/daterangepicker/daterangepicker.js") }}"></script>

<!-- datepicker -->
<script type="text/javascript" src="{{ asset("plugins/datepicker/bootstrap-datepicker.js") }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script type="text/javascript" src="{{ asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>

<!-- Slimscroll -->
<script type="text/javascript" src="{{ asset("plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>

<!-- FastClick -->
<script type="text/javascript" src="{{ asset("plugins/fastclick/fastclick.js") }}"></script>

<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset("dist/js/app.min.js") }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--{{ asset("dist/js/pages/dashboard.js") }}--}}
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ asset("dist/js/demo.js") }}"></script>
<!-- DataTables -->
<script type="text/javascript" src="{{ asset("plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/handlebars.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/fonctions.js") }}"></script>

<!-- iCheck -->
<script type="text/javascript" src="{{ asset("plugins/iCheck/icheck.min.js") }}"></script>

@stack('script')
</body>
</html>
