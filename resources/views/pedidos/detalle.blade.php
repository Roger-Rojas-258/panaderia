@extends('layouts.argon')

@section('content')
  <div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Detalle pedido</h3>
      </div>
        <a href="#" class="btn btn-warning btn-sm p-2">Detalle pedido</a>
      </div>
      @foreach ($pedidos as $pedido)
            @if ($pedido->id_pedido==$id)
                @foreach ($clientes as $cliente)
                    @if ($pedido->id_cliente == $cliente->id_cliente)
                        <div class="card bg-secondary shadow">
            <div class="card-body">
              <h6 class="heading-small text-muted mb-4"><b>Informacion del cliente</b></h6>
                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nombre</label>
                        <span class="form-control form-control-alternative">{{$cliente->nombre}}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Paterno</label>
                        <span class="form-control form-control-alternative">{{$cliente->paterno}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Materno</label>
                        <span class="form-control form-control-alternative">{{$cliente->materno}}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Fecha nacimiento</label>
                        <span class="form-control form-control-alternative">{{$cliente->fecha_nacimiento}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                    @endif
                @endforeach
            @endif
        @endforeach
            </div>
          </div>

      <div class="table-responsive">
        @foreach ($pedidos as $pedido)
            @if ($pedido->id_pedido==$id)
                <div style=" padding:15px">
                  <span style="font-size: 20px">Detalle de pedido fecha: <b>{{$pedido->fecha}}</b></span>
                </div>
                <div style=" padding:15px">
                  <span style="font-size: 20px">ID PEDIDO: <b>{{$pedido->id_pedido}}</b></span>
                </div>
            @endif
        @endforeach
        
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Cantidad</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio Unidad</th>
              <th scope="col">Sub total</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($detallepedidos as $detalle)
              @if ($detalle->id_pedido==$id)
                <tr>
                  <td>{{$detalle->cantidad}}</td>
                    @foreach ($productoofertas as $productooferta)
                      @if ($productooferta->id_productooferta == $detalle->id_productooferta)
                          @foreach ($productos as $producto) {{-- Corregir el nombre de la variable aquí --}}
                              @if ($producto->id_producto == $productooferta->id_producto)
                                  <td>{{$producto->nombre}}</td>
                                  <td>{{$producto->precio}}</td>
                              @endif
                          @endforeach
                      @endif
                  @endforeach
                  <td>{{$detalle->sub_total}}</td>
                </tr>
              @endif
              @endforeach
          </tbody>
        </table>
        @foreach ($pedidos as $pedido)
            @if ($pedido->id_pedido==$id)
                <div style="display: flex; justify-content: space-around;">
                  <span></span>
                  <span style="font-size: 30px">TOTAL : <b style="color: green">{{$pedido->total_precio}}</b></span>
                </div>
            @endif
        @endforeach
      </div>

      <div class="card bg-secondary shadow">
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4"><b>Informacion del pedido</b></h6>

            @foreach ($pedidos as $pedido)
            @if ($pedido->id_pedido==$id)
              @foreach ($ubicaciones as $ubicacion)
                  @if ($ubicacion->id_ubicacion==$pedido->id_ubicacion)
                      <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-last-name">Ubicacion</label>
                        <span class="form-control form-control-alternative">{{$ubicacion->descripcion}}</span>
                    </div>
                  @endif
              @endforeach
              @foreach ($pagos as $pago)
                  @if ($pago->id_pago==$pedido->id_pago)
                      <div class="col-lg-6">
                      <label class="form-control-label" for="input-last-name">Metodo de pago</label>
                        <span class="form-control form-control-alternative" >{{$pago->nombre}}</span>
                    </div>
                  </div>
                </div>
                  @endif
              @endforeach
            @endif
        @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

