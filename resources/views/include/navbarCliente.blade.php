<!--ubicacio-->
<!-- Maps -->
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVIXqy33ZmOtGAUY8b5gnC0exNaFB_9l4&libraries=places,directions,geometry&callback=initMap"
      type="text/javascript"></script>


<!-- Navbar -->
<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
      <a class="navbar-brand" href="{{route('carrito.index')}}">
        <img src="{{asset('/assets/assets/img/brand/white.png')}}" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="{{asset('/assets/assets/img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navbar items -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{route('carrito.index')}}">
              <i class="ni ni-planet"></i>
              <span class="nav-link-inner--text">Inicio</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{route('register')}}">
              <i class="ni ni-circle-08"></i>
              <span class="nav-link-inner--text">Registrarse</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{route('login')}}">
              <i class="ni ni-key-25"></i>
              <span class="nav-link-inner--text">Iniciar Sesión</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="#">
              <i class="fa-solid fa-location-dot"></i>
              <span class="nav-link-inner--text"><!-- Button trigger modal -->
                <button type="button" data-toggle="modal" data-target="#exampleModal" style="background-color: #273036;color:#fff; border:none" >
                  Tu ubicacion
                </button>
                <i class="fa-solid fa-chevron-up"></i>
              </span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Ingresa tu direccion</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Direccion o punto de referencia">
        </form>
        <br>
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" data-dismiss="modal">
            <i class="fa-solid fa-location-crosshairs"></i> Mi ubicacion actual
          </button>             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--Mapa-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirma tu ubicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <!-- <form action="#" method="POST" style="margin-top: 8px">-->
        <div class="modal-body" style="margin-top: -30px">
          <div id="map" style="height: 400px; width: 100%"></div>
            <input type="text" id="direccion" class="form-control form-control-alternative" placeholder="Direccion o punto de referencia">
            <input type="text" id="longitud" style="display: none">
            <input type="text" id="latitud" style="display: none">
          </div>
          <div class="modal-footer" style="margin-top: -30px">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="confirmarUbicacion">Confirmar Ubicación</button>
          </div>
        </div>
      <!--</form>-->
    
  </div>
</div>
