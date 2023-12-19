@extends('layouts.argon')



@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Pedidos por entregar</h3>
      </div>
        <a href="#" class="btn btn-warning btn-sm p-2">Pedidos por entregar</a>
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
              <th scope="col">Producto entregado ?</th>
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
                  <span class="badge badge-dot mr-4" style="color: #c9d127; font-weight: bold;">{{$pedido->estado_entrega}}</span>
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
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary nota" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id_pedido="{{$pedido->id_pedido}}" style="background-color:#5E72E4">
                    <i class="fa-solid fa-check" style="color:red; font-size:20px; font-weight: bold;"></i>
                  </button>
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
        <h5 class="modal-title" id="staticBackdropLabel">Confirma si el producto fue entregado?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff; border:none;"> <i class="fa-solid fa-x"></i></button>
      </div>
      <div class="modal-body" style="display: flex">
        <div>
          <img src="{{asset('assets/assets/img/brand/angelesLogo.jpeg')}}" alt="Logo tipo de los angeles" width="100px" style="border-radius: 50%" class="logo">
        </div>
        <div style="margin-left: 20px">
          <p>Necesitamos que confirmes si el producto fue entregado satisfactoriamente.</p>
        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="aceptar" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<script src="{{asset('assets/carrito/entregado.js')}}"></script>
@endsection