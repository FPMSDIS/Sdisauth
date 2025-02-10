<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ asset('plugins-bracket/images/favicon.png')}}" type="image/png">

  {{-- <title>Bracket Responsive Bootstrap3 Admin</title> --}}
  <title>{{ config('app.name') }} - @stack('headTitle')</title>

  <link href="{{ asset('plugins-bracket/css/style.default.css')}}" rel="stylesheet">
  {{-- <link href="{{ asset('plugins-bracket/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('plugins-bracket/css/jquery.datatables.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/299943a710.js" crossorigin="anonymous"></script>

    
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  @include('layouts.left-nav')
  
  <div class="mainpanel">
    
    @include('layouts.top-nav')
        
    
    @yield('content')
  </div><!-- mainpanel -->
  
  {{-- @include('layouts.right-nav') --}}
  
</section>

    <script src="{{ asset('plugins-bracket/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/modernizr.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/toggles.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/retina.min.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/jquery.cookies.js')}}"></script>
    <script src="{{ asset('plugins-bracket/js/custom.js')}}"></script>
    {{-- <script src="{{ asset('plugins-bracket/js/jquery.datatables.min.js')}}"></script> --}}
    <script src="{{ asset('plugins-bracket/js/chosen.jquery.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    @stack('scripts')
</body>
</html>

    

