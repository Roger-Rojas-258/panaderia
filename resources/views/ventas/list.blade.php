@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Nota de Venta</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('venta.index')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Realizar venta</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Id venta</th>
              <th scope="col">Fecha</th>
              <th scope="col">Precio total</th>
              <th scope="col">Cliente</th>
              <th scope="col">empleado</th>
              <th scope="col">Forma de pago</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notaventas as $venta)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$venta->id_venta}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$venta->fecha}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$venta->total_precio}}</span>
                </td>

                @foreach ($clientes as $cliente)
                    @if ($venta->id_cliente==$cliente->id_cliente)
                        <td>
                          <span class="badge badge-dot mr-4">{{$cliente->nombre}}</span>
                        </td>
                    @endif
                @endforeach

                @foreach ($empleados as $empleado)
                    @if ($venta->id_empleado==$empleado->id_empleado)
                        <td>
                          <span class="badge badge-dot mr-4">{{$empleado->nombre}}</span>
                        </td>
                    @endif
                @endforeach

                @foreach ($tipos as $tipo)
                    @if ($venta->id_pago==$tipo->id_pago)
                        <td>
                          <span class="badge badge-dot mr-4">{{$tipo->nombre}}</span>
                        </td>
                    @endif
                @endforeach
                <!--formulario-->
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection