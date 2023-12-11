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
              
              <th scope="col">Fecha</th>
              <th scope="col">Nombre</th>
              <th scope="col">Tipo</th>
              <th scope="col">Stock</th>
              <th scope="col">Opción</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$ofertaDia->fecha}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$producto->nombre}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    @foreach ($tiposProductos as $tipo)
                        @if ($producto->id_tipo == $tipo->id_tipo)
                            {{$tipo->nombre}}
                        @endif
                    @endforeach
                  </span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$producto->pivot->stock}}</span>
                </td>
                <td>
                  <a href="{{route('productosoferta.edit', [$producto->id_producto, $ofertaDia->id_oferta])}}">
                    <i class="fa-solid fa-pen-to-square" style="color: #e5e90c; font-size:20px;"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection