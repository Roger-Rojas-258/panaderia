<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  @yield('meta')

  <title>Los Ángeles</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/logo.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
    type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  {{-- DataTables CSS --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('carrito/animacion.css')}}">
  <style>
    .logo {
    border: 6px solid #525f7f !important;
    box-shadow: 10px 5px 10px#525f7f !important;
    animation: flotante 4s linear infinite;
}

@keyframes flotante {
    0% {
        transform: translateY(15px);
    }
    50% {
        transform: translateY(0px);
    }
    100% {
        transform: translateY(15px);
    }
}
  </style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      {{-- <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="http://localhost/panaderia/public">
          <img src="{{asset('/assets/assets/img/brand/angelesLogo.jpeg')}}" class=" rounded-circle" style="">
        </a>
      </div> --}}
      <div class="  align-items-center">
        <a class="" href="{{route('inicio')}}">
          <img src="{{asset('/assets/assets/img/brand/angelesLogo.jpeg')}}" class=" rounded-circle mt-4 ml-4 mr-4 mb-0 logo" style="width:70%">
        </a>
      </div>

      <div class="navbar-inner">
        <!-- Collapse -->
        @include('include.menu')
      </div>

    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Search form -->
          @include('include.search')
          <!-- Navbar links -->
          @include('include.navbar')

        </div>
      </div>
    </nav>
    <div class="container-fluid mt-4">
    
      @include('include.content')
      <!-- Footer -->
      <footer class="footer pt-0">
        @include('include.footer')
      </footer>
    </div>
    
  </div>
  <!-- Argon Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- fontwasome -->
  <script src="{{asset('https://kit.fontawesome.com/e2c73ec39d.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
  {{-- DataTables JS --}}
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  @yield('scripts')
</body>

</html>