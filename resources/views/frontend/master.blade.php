<!doctype html>
<html lang="en" class="light-theme">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSS files -->
  <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/plugins/slick/slick.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/plugins/slick/slick-theme.css') }}" />

  <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/css/dark-theme.css') }}" rel="stylesheet">

  <title>Shopingo - eCommerce HTML Template</title>
</head>

<body>

@include('frontend.partials.header')
  <!--start page content-->
  @yield('frontend.content')
  <!--end page content-->
  @include('frontend.partials.footer')
  <!--Start Back To Top Button-->
  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
  <!--End Back To Top Button-->
  <!-- JavaScript files -->
  <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/index.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/loader.js') }}"></script>

</body>



</html>