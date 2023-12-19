@extends('layouts.plantillaCliente')


    @section('titulo')
    Tienda de pan
    @endsection
    
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{asset('/assets/carrito/estilo.css')}}"> --}}
    @endsection

    {{-- <header>
        <h1>Tienda de pan</h1>
    </header> --}}

    @section('contenido')
    <!--background-->
    <div class="wave-header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#273036" fill-opacity="1" d="M0,288L48,277.3C96,267,192,245,288,234.7C384,224,480,224,576,197.3C672,171,768,117,864,106.7C960,96,1056,128,1152,144C1248,160,1344,160,1392,160L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </div>
    <section class="contenedor " style="margin-top: -420px">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            @foreach ( $productos as $producto)
                @foreach ($productoofertas as $dato)
                    @if ($producto->id_producto == $dato->id_producto)
                        <div class="item">
                            <span class="titulo-item" style="color: #fff; font-weight: 900;">{{$producto->nombre}}</span>
                            <img src="{{asset($producto->imagen)}}" alt="" class="img-item">
                            <span class="precio-item" style="color: #fff">Precio: <strong style="font-size:20px">{{$producto->precio}} </strong></span>
                            <span class="" style="color: #fff">Stock: <strong class="stock-item" style="font-size:20px">{{$dato->stock}}</strong></span>
                            <button class="boton-item agregar" data-id_producto="{{$producto->id_producto}}" data-precio="{{$producto->precio}}" data-stock="{{$dato->stock}}" data-producto="{{$producto->nombre}}" data-idproductooferta="{{$dato->id_productooferta}}">Agregar al Carrito</button>
                        </div>
                    @endif
                    
                @endforeach
                   

            @endforeach
            
        </div>

        <!-- Carrito de Compras -->
            <div class="carrito" id="carrito" style="background-color: #273036">
            <div class="header-carrito">
                <h2 style="color: #fff">Tu Carrito</h2>
                <hr style="height: 1px; color: #000; border: none; background-color: #fff; margin: 0; box-shadow: 5px 5px 5px #fff;">
            </div>

            <div class="carrito-items">
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
    <script type="module" src="{{asset('/assets/carrito/app.js')}}" async></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--Mapa-->
    <script src="{{asset('/assets/carrito/mapas.js')}}"></script>
    <!--Datos dwl mapa guardar-->
    <script type="module" src="{{asset('assets/carrito/guardarDatosMapas.js')}}"></script>
    <!--Libreria Para los alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
