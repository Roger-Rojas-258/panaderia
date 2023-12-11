<div class="collapse navbar-collapse" id="sidenav-collapse-main">
  <!-- Nav items -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/panaderia/public">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Productos</span>
      </a>
      <div class="dropdown-menu">
        <a href="{{route('tipoproducto.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Tipo productos</span>
        </a>
        <a href="{{route('producto.index')}}" class="nav-link">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Productos</span>
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a href="{{ route('cliente.index')}}" class="nav-link ">
        <i class="ni ni-planet text-orange"></i>
        <span class="nav-link-text">Cliente</span>
      </a>
    </li>
    <!-- aqui lo que tengo que hacer es listar los productos y darle un checkbox para elegir los productos a la venta y un boton de sacar a la venta -->
    <li class="nav-item">
      <a href={{route('productosoferta.index')}} class="nav-link ">
        <i class="ni ni-planet text-orange"></i>
        <span class="nav-link-text">Productos a la venta</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('repartidor.index')}}">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Repartidor</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('venta.list')}}">
        <i class="ni ni-single-02 text-yellow"></i>
        <span class="nav-link-text">Caja venta</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('empleado.index')}}">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Empleado</span>
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Vehiculo</span>
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
        <i class="ni ni-single-02 text-yellow"></i>
        <span class="nav-link-text">Tipo pago</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('tipopago.index')}}">
        <i class="ni ni-single-02 text-yellow"></i>
        <span class="nav-link-text">Esta es mi rama Roger</span>
      </a>
    </li>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
        aria-expanded="false">
        <i class="ni ni-pin-3 text-primary"></i>
        <span class="nav-link-text">Administración</span>
      </a>
      <div class="dropdown-menu">
        <a class="nav-link" href="{{route('roles.index')}}">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Rol</span>
        </a>
        <a class="nav-link" href="{{route('privilegio.index')}}">
          <i class="ni ni-single-02 text-yellow"></i>
          <span class="nav-link-text">Privilegios</span>
        </a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('usuario.index')}}">
        <i class="ni ni-single-02 text-yellow"></i>
        <span class="nav-link-text">Usuario</span>
      </a>
    </li>

  </ul>
  
</div>