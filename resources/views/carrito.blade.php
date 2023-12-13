@extends('layouts.plantillaCliente')


    @section('titulo')
    Tienda de pan
    @endsection
    
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/assets/carrito/estilo.css')}}">
    @endsection

    {{-- <header>
        <h1>Tienda de pan</h1>
    </header> --}}

    @section('contenido')

    <br><br><br><br>
    <section class="contenedor ">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            @foreach ( $productos as $producto)
                @foreach ($productoofertas as $dato)
                    @if ($producto->id_producto == $dato->id_producto)
                        <div class="item">
                            <span class="titulo-item">{{$producto->nombre}}</span>
                            <img src="{{asset('/assets/carrito/img/boxengasse.png')}}" alt="" class="img-item">
                            <span class="precio-item">{{$producto->precio}}</span>
                            <span class="precio-item">{{$dato->stock}}</span>
                            <button class="boton-item">Agregar al Carrito</button>
                        </div>
                    @endif
                    
                @endforeach
                   

            @endforeach
            
        </div>

        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.000,00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$18.000,00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $120.000,00
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
    @endsection

    @section('js')
    <script src="{{asset('/assets/carrito/app.js')}}" async></script>
    @endsection