<div class="collapse navbar-collapse" id="sidenav-collapse-main">
  <!-- Nav items -->
  <ul class="navbar-nav">

    @if ( session('Rol') == 'Administrador')

      <li class="nav-item">
        <a class="nav-link" href="{{route('inicio')}}">
          <i class="ni ni-tv-2 text-primary"></i>
          <span class="nav-link-text">DASHBOARD</span>
        </a>
      </li>
    @endif

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
          aria-expanded="false">
          <i class="fas fa-archive text-primary"></i>
          <span class="nav-link-text">GESTIÓN DE PRODUCTOS</span>
        </a>
        <div class="dropdown-menu">
          <a href="{{route('tipoproducto.index')}}" class="nav-link">
            <i class="fas fa-tags text-yellow"></i>
            <span class="nav-link-text">Tipo productos</span>
          </a>
          <a href="{{route('producto.index')}}" class="nav-link">
            <i class="fas fa-shopping-basket text-yellow"></i>
            <span class="nav-link-text">Productos</span>
          </a>
        </div>
      </li>

    @if ( session('Rol') == 'Administrador' || session('Rol') == 'Cajero')
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-cash-register text-primary"></i>
        <span class="nav-link-text">CAJA</span>
      </a>
      <div class="dropdown-menu">
        <a class="nav-link" href="{{route('productosoferta.index')}}">
          <i class="fas fa-boxes text-yellow"></i>
          <span class="nav-link-text">Stock del día</span>
        </a>
        <a class="nav-link" href="{{route('venta.list')}}">
          <i class="fas fa-shopping-bag text-yellow"></i>
          <span class="nav-link-text">Venta</span>
        </a>
      </div>
    </li>
    @endif

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="nav-link-text">PEDIDOS</span>
      </a>
      <div class="dropdown-menu">
        <a class="nav-link" href="{{route('pedidos.pendiente')}}">
          <i class="fas fa-truck-loading text-yellow"></i>
          <span class="nav-link-text">Pendiente</span>
        </a>
        <a class="nav-link" href="{{route('pedidos.asignado')}}">
          <i class="fas fa-truck-loading text-yellow"></i>
          <span class="nav-link-text">Por entregar</span>
        </a>
        <a class="nav-link" href="{{route('pedidos.entregado')}}">
          <i class="fas fa-check-circle text-yellow"></i>
          <span class="nav-link-text">Entregados</span>
        </a>
      </div>
    </li>

   
    <li class="nav-item">
      <a href="{{ route('cliente.index')}}" class="nav-link ">
        <i class="fas fa-users text-primary"></i>
        <span class="nav-link-text">CLIENTES</span>
      </a>
    </li>

    @if ( session('Rol') == 'Administrador' || session('Rol') == 'Cajero')
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-user-tie text-primary"></i>
        <span class="nav-link-text">PERSONAL</span>
      </a>
      <div class="dropdown-menu">
        <a class="nav-link" href="{{route('empleado.index')}}">
          <i class="fas fa-user-tie text-yellow"></i>
          <span class="nav-link-text">Cajero</span>
        </a>
        <a class="nav-link" href="{{route('repartidor.index')}}">
          <i class="fas fa-truck text-yellow"></i>
          <span class="nav-link-text">Repartidor</span>
        </a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">GESTIÓN DE VEHÍCULOS</span>
      </a>
      <div class="dropdown-menu">
        <a href="{{route('tipovehiculo.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Tipo vehiculo</span>
        </a>
        <a href="{{route('vehiculo.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Vehiculo</span>
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('tipopago.index')}}">
        <i class="fas fa-credit-card text-primary"></i>
        <span class="nav-link-text">MÉTODO DE PAGO</span>
      </a>
    </li>
    @endif

    @if ( session('Rol') == 'Administrador')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
          aria-expanded="false">
          <i class="fas fa-user text-primary"></i>
          <span class="nav-link-text">GESTIÓN DE USUARIOS</span>
        </a>
        <div class="dropdown-menu">
        <a class="nav-link" href="{{route('usuario.index')}}">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Usuario</span>
        </a>
        <a class="nav-link" href="{{route('roles.index')}}">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Rol</span>
        </a>
        {{-- <a class="nav-link" href="{{route('privilegio.index')}}">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Privilegios</span>
        </a> --}}
        </div>
    </li>

    @endif

  </ul>
  
</div>