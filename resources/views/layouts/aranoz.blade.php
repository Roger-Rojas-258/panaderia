<!DOCTYPE html>
<html>

<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Los ageles</title>
    <link rel="icon" href="{{asset('img/brand/logo.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('aranoz/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('aranoz/css/style.css')}}">

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
        <!-- Collapse -->
        @include('include.menucliente')
      </div>

    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="container-fluid mt-4">
    
      @include('include.content')
      <!-- Footer -->
      <footer class="footer pt-0">
        @include('include.footercliente')
      </footer>
    </div>
    
  </div>

  

   <!-- jquery plugins here-->
    <script src="{{asset('aranoz/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('aranoz/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('aranoz/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('aranoz/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('aranoz/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('aranoz/js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('aranoz/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('aranoz/js/jquery.nice-select.min.js"')}}></script>
    <!-- slick js -->
    <script src="{{asset('aranoz/js/slick.min.js')}}"></script>

    <script src="{{asset('aranoz/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('aranoz/js/jquery.form.js')}}"></script>
    <script src="{{asset('aranoz/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('aranoz/js/mail-script.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('aranoz/js/custom.js')}}"></script>
</body>

</html>