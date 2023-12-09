@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Productos a la venta</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('productosoferta.create')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Agregar producto a la venta</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fecha</th>
              <th scope="col">Nombre</th>
              <th scope="col">Tipo</th>
              <th scope="col">Stock</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productosofertas as $oferta)
              <tr>
                <th>{{$oferta->id_productooferta}}</th>
                @foreach ($ofertadias as $ofertadia)
                    @if ($oferta->id_oferta==$ofertadia->id_oferta)
                        <th>{{$ofertadia->fecha}}</th>
                    @endif
                @endforeach
                @foreach ($productos as $producto)
                    @if ($oferta->id_producto==$producto->id_producto)
                        <th>{{$producto->nombre}}</th>
                        @foreach ($tipos as $tipo)
                            @if ($tipo->id_tipo==$producto->id_tipo)
                                <th>{{$tipo->nombre}}</th>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <th>{{$oferta->stock}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection