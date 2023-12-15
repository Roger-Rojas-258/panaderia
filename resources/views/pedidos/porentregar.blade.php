@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Pedidos pendientes</h3>
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
              <th scope="col">Asignar repartidor</th>
              <th scope="col">forma de pago</th>
              <th scope="col">Detalle</th>
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
                  <span class="badge badge-dot mr-4" style="color: #f63909; font-weight: bold;">{{$pedido->estado_entrega}}</span>
                </td>
                @foreach ($ubicaciones as $ubicacion)
                    @if ($ubicacion->id_ubicacion == $pedido->id_ubicacion)
                      <td>
                        <span class="badge badge-dot mr-4">{{$ubicacion->descripcion}}</span>
                      </td>                        
                    @endif
                @endforeach

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary nota" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id_pedido="{{$pedido->id_pedido}}" style="background-color:#5E72E4">
                    <i class="fa-solid fa-truck" style="color:red"></i>
                  </button>
                </td>

                @foreach ($pagos as $pago)
                    @if ($pago->id_pago == $pedido->id_pago)
                        <td>
                            <span class="badge badge-dot mr-4">{{$pago->nombre}}</span>
                        </td>
                    @endif
                @endforeach
                <td>
                  <a href="{{route('pedido.detalle', ['id' => $pedido->id_pedido]) }}" class="badge badge-dot mr-4 detalle" style="font-size: 20px"><i class="fa-solid fa-table"></i></a>
                </td>

                <td>
                  <a target="_blank" href="{{route('pedido.pdf', ['id' => $pedido->id_pedido]) }}" class="badge badge-dot mr-4 detalle" style="font-size: 20px"><i class="fa-solid fa-file-pdf"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Clientes -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Lista Repartidor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff; border:none;"> <i class="fa-solid fa-x"></i></button>
      </div>
      <div class="modal-body">
        <table id="datatablesSimple" class=" border-dark">
        <thead>
          <tr>
            <th class="p-1">Nombre</th>
            <th class="p-1">Paterno</th>
            <th class="p-1">Materno</th>
            <th class="p-1">Telefono</th>
            <th width="1%" class="p-2"></th>
          </tr>
        </thead>
          <tbody>
            @foreach ($repartidores as $repartidor)
                <tr>
                  <td class="align-middle p-1 nombre">{{$repartidor->nombre}}</td>
                  <td class="align-middle p-1 apellidos">{{$repartidor->paterno}}</td>
                  <td class="align-middle p-1">{{$repartidor->materno}}</td>
                  <td class="align-middle p-1">{{$repartidor->telefono}}</td>
                  <td>
                    <a id="repartidor" class="badge bg-success select-option asignarRepartidor" id="agregarCliente"
                    rel="tooltip" data-placement="top" title="Seleccionar" data-id="{{$repartidor->id_repartidor}}" data-nombre="{{$repartidor->nombre}}" style="padding: 10px" data-bs-dismiss="modal"> <i class="fa-solid fa-plus" style="font-size: 15px"></i></a>
                  </td>
                </tr>
            @endforeach
          </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('assets/carrito/asignarRepartidor.js')}}"></script>
<script src="{{asset('assets/carrito/detallePedido.js')}}"></script>
@endsection