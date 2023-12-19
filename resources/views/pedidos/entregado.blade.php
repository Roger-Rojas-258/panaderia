@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Pedidos entregados</h3>
      </div>
        <a href="#" class="btn btn-warning btn-sm p-2">Eliminados</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Fecha</th>
              <th scope="col">Cliente</th>
              <th scope="col">Precio Total</th>
              <th scope="col">Costo envio</th>
              <th scope="col">Tiempo estimacion</th>
              <th scope="col">Estado de entrega</th>
              <th scope="col">Ubicacion</th>
              <th scope="col">Repartidor asignado</th>
              <th scope="col">forma de pago</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pedidos as $pedido)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$pedido->id_pedido}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$pedido->fecha}}</span>
                </td>
                @foreach ($clientes as $cliente)
                    @if ($cliente->id_cliente == $pedido->id_cliente)
                        <td>
                          <span class="badge badge-dot mr-4">{{$cliente->nombre}}</span>
                        </td>
                    @endif
                @endforeach
                <td>
                  <span class="badge badge-dot mr-4">{{$pedido->total_precio}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$pedido->costo_envio}}</span>
                <td>
                  <span class="badge badge-dot mr-4">{{$pedido->tiempo_estimado}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4" style="color: #056f19; font-weight: bold;">{{$pedido->estado_entrega}}</span>
                </td>
                @foreach ($ubicaciones as $ubicacion)
                    @if ($ubicacion->id_ubicacion == $pedido->id_ubicacion)
                      <td>
                        <span class="badge badge-dot mr-4">{{$ubicacion->descripcion}}</span>
                      </td>                        
                    @endif
                @endforeach

                @foreach ($repartidoresvehiculo as $repartidorvehiculo)
                    @if ($pedido->id_repartidorvehiculo== $repartidorvehiculo->id_repartidorvehiculo)
                        @foreach ($repartidores as $repartidor)
                            @if ($repartidorvehiculo->id_repartidor==$repartidor->id_repartidor)
                                <td>
                                  <span class="badge badge-dot mr-4">{{$repartidor->nombre}} {{$repartidor->paterno}}</span>
                                </td>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @foreach ($pagos as $pago)
                    @if ($pago->id_pago == $pedido->id_pago)
                        <td>
                            <span class="badge badge-dot mr-4">{{$pago->nombre}}</span>
                        </td>
                    @endif
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection