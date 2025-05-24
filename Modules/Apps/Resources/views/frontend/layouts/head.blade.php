<!doctype html>
<html lang="{{locale()}}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
  <!-- Meanmenu CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.css')}}">
  <!-- Boxicons CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/boxicons.min.css')}}">
  <!-- Flaticon CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon.css')}}">
  <!-- Odometer CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer.min.css')}}">
  <!-- Carousel CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
  <!-- Carousel Default CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
  <!-- Popup CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.min.css')}}">
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.min.css')}}">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.min.css')}}">
  <!-- Slick Theme CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/slick-theme.min.css')}}">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style-'.locale().'.css')}}">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive-'.locale().'.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/slider-'.locale().'.css')}}">
  <!-- Dark CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/dark.css')}}">

  <?php
  if(isset($styles) && count($styles)){
    foreach($styles as $style){
      echo "<link rel=\"stylesheet\" href=\"{{asset('frontend/assets/css/{$style}.css')}}\">";
    }
  }
  ?>

  <title>Speer || سبير</title>

  <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">
  @yield('styles')
{{--  <style>--}}
{{--    .slides-category-list-tab .tab_content .tabs_item form .form-group .nice-select .list{--}}
{{--      height: 150px;--}}
{{--    }--}}
{{--  </style>--}}
</head>

<body>

