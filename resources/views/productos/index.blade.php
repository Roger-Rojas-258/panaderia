@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Productos</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('productos.create')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Agregar</a>
        <a href="{{ route('producto.eliminados')}}" class="btn btn-warning btn-sm p-2">Eliminados</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Tipo</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$producto->id_producto}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$producto->nombre}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$producto->precio}}</span>
                </td>
                @foreach ($tipos as $tipo)
                    @if ($producto->id_tipo==$tipo->id_tipo)
                        <td>
                          <span class="badge badge-dot mr-4">{{$tipo->nombre}}</span>
                        </td>
                    @endif
                @endforeach
                

                <form action="{{route('producto.destroy',$producto->id_producto)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                      <a href="{{route('producto.edit', $producto->id_producto)}}">
                        <i class="fa-solid fa-pen-to-square" style="color: #e5e90c; font-size:20px;"></i>
                      </a>
                    </td>
                    <td><button type="submit" style="border:none; background-color:#fff"><i class="fa-solid fa-trash-can" style="color: #f20707;font-size:20px;"></i></button></td>
                  </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection