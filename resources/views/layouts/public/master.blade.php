<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EstateAgency Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    
    <!-- Bootstrap CSS File -->
    <link href="{{asset('public/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('public/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    @yield('styles')
    <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    @include('layouts.public.snippets.search')
    <!--/ Form Search End /-->

    <!--/ Nav Star /-->
    @include('layouts.public.snippets.navbar')
    <!--/ Nav End /-->

    <!-- Page Content Start -->

    @yield('content')

    <!-- Page Content End -->
    <!--/ footer Star /-->
    @include('layouts.public.snippets.footer')
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="{{asset('public/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('public/lib/popper/popper.min.js')}}"></script>
    <script src="{{asset('public/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/lib/scrollreveal/scrollreveal.min.js')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('public/js/main.js')}}"></script>
    @yield('scripts')

</body>

</html>