<!--ubicacio-->
<!-- Maps -->
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVIXqy33ZmOtGAUY8b5gnC0exNaFB_9l4&libraries=places,directions,geometry&callback=initMap"
      type="text/javascript"></script>


<!-- Navbar -->
<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
      <a class="navbar-brand" href="{{route('carrito.index')}}">
        <img src="{{asset('/assets/assets/img/brand/angelesLogo.jpeg')}}" class=" rounded-circle m-0 logo" style="width: 100%; height:4rem"/>
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
                <img src="{{asset('/assets/assets/img/brand/angelesLogo.jpeg')}}" class=" rounded-circle m-0" style="width: 15rem; height:100%">
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
              <i class="fas fa-home"></i>
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

          

          @if (Auth::check())

            <li class="nav-item">

              {{-- --}}
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-top">
                    <span class="avatar avatar-sm rounded-circle" style="margin-top: -4px;">
                      <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-4.jpg') }}">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                      <span  class="mb-5 text-sm font-weight-bold mb-2">{{Auth()->user()['usuario']}}</span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-center ">
                  <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">¡Bienvenido!</h6>
                  </div>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>Mi perfil</span>
                  </a>
                  {{-- <a href="#!" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                  </a> --}}
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                    <i class="ni ni-user-run"></i>
                                    <span>{{ __('Cerrar sesión') }}</span>                     
                  </a>
              
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  
                </div>
              </li>
            </ul>
            
            </li>

            @php
              session_start();
            @endphp
            
            @if ( $_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Cajero')
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{route('productosoferta.index')}}">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Administración</span>
              </a>
            </li>
            @endif
          @php
               session_write_close();
          @endphp
            
          @else

          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{route('login')}}">
              <i class="ni ni-key-25"></i>
              <span class="nav-link-inner--text">Iniciar Sesión</span>
            </a>
          </li>
          @endif
            
          

          

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
            <button type="button" class="btn btn-primary" id="confirmarUbicacion" data-dismiss="modal" >Confirmar Ubicación</button>
          </div>
        </div>
      <!--</form>-->
    
  </div>
</div>
