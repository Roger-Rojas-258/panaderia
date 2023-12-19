<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{
      font-family: 'Courier New', Courier, monospace
    }
    .contenido{
      display: flex;
    justify-content: center;
    }
    .entrecortado {
    background: repeating-linear-gradient(45deg, transparent, transparent 10px, black 10px, black 20px);
    height: 2px; /* Ajusta el grosor de la línea */
    margin: 20px 0; /* Ajusta el espacio alrededor de la línea */
  }
  </style>
</head>
<body>

  <div class="contenido" style="margin-top: 20px">
    <div>
      <img src="{{asset('assets/assets/img/brand/angelesLogo.jpeg')}}" alt="" style="border-radius: 50%; border:2px solid blue; box-shadow: 10px 10px 10px #525f7f;" width="150px">
    </div>
    <div>
      <br><br><br>
      <strong style="font-size: 30px; font-family:'Courier New', Courier, monospace; margin-left:40px">Panaderia Los Angeles</strong>
    </div>
    <div>
      <br>
      <br>
      <br>

      <i class="fa-solid fa-mug-saucer" style="font-size: 20px;margin-top:8px; margin-left:10px; color:red" ></i></div>
  </div>
  <br>
  <hr class="entrecortado">
  <div style="display: flex; padding:10px">
    <span style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace"><strong>Direccion</strong></span>
    <p style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace">Montero-JuanXX</p>
  </div>

  @foreach ($pedidos as $pedido)
      @if ($pedido->id_pedido == $id)
        <div style="display: flex; padding:10px">
          <span style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace"><strong>Fecha</strong></span>
          <p style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace">{{$pedido->fecha}}</p>
        </div>          
      @endif
  @endforeach
  <hr class="entrecortado">
  <!--Tabla-->
  <div style="display: flex; justify-content: space-around;padding:10px">
    <span style="font-size: 20px;margin:10px"><b>Cantidad</b></span>
    <span style="font-size: 20px;margin:10px"><b>Nombre</b></span>
    <span style="font-size: 20px;margin:10px"><b>Tipo producto</b></span>
    <span style="font-size: 20px;margin:10px"><b>Precio</b></span>
    <span style="font-size: 20px;margin:10px"><b>Subtotal</b></span>
  </div>
  <hr class="entrecortado">
    @foreach ($detallepedidos as $detalle)
      <div style="display: flex; justify-content: space-around;">
              @if ($detalle->id_pedido==$id)
                  <sapn style="font-size: 20px;margin:10px">{{$detalle->cantidad}}</sapn>
                    @foreach ($productoofertas as $productooferta)
                      @if ($productooferta->id_productooferta == $detalle->id_productooferta)
                          @foreach ($productos as $producto) {{-- Corregir el nombre de la variable aquí --}}
                              @if ($producto->id_producto == $productooferta->id_producto)
                                  <span style="font-size: 20px;margin:10px">{{$producto->nombre}}</span>
                                  @foreach ($tipos as $tipo)
                                      @if ($tipo->id_tipo == $producto->id_tipo)
                                          <span style="font-size: 20px;margin:10px">{{$tipo->nombre}}</span>
                                      @endif
                                  @endforeach
                                  <span style="font-size: 20px;margin:10px">{{$producto->precio}}</span>
                              @endif
                          @endforeach
                      @endif
                  @endforeach
                  <span style="font-size: 20px;margin:10px">{{$detalle->sub_total}}</span>
              @endif
      </div>
      @endforeach

  <!--hasta asui-->
  <hr class="entrecortado">
  @foreach ($pedidos as $pedido)
      @if ($pedido->id_pedido == $id)
      <div style="display: flex; justify-content: space-between;">
        <div></div>
        <div style="display: flex;justify-content:space-between">
          <span style="margin-left: 20px; font-size:20px"><b>Total :{{$pedido->total_precio}}</b></span>
          <span style="margin-right: 20px; font-size:20px">.</span>
        </div>
      </div>
        
      @endif
  @endforeach

  <script src="https://kit.fontawesome.com/e2c73ec39d.js" crossorigin="anonymous"></script>
</body>
</html>