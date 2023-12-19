@extends('layouts.aranoz')

@section('content')
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Productos</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-3510px, 0px, 0px); transition: all 1s ease 0s; width: 7020px;">
                        <div class="owl-item cloned" style="width: 1140px; margin-right: 30px;">
                        <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($productoVentas as $oferta)
                                @foreach ($productos as $producto)
                                    @if ($oferta->id_producto==$producto->id_producto)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">
                                                <img src="{{asset('aranoz/img/product/product_1.png')}}" alt="">
                                                <div class="single_product_text">
                                                    <h4>{{$producto->nombre}}</h4>
                                                    <h3>{{$producto->precio}}</h3>
                                                        @foreach ($categorias as $categoria)
                                                            @if ($producto->id_categoria==$categoria->id_categoria)
                                                             <h3>Categoria: <strong>{{$categoria->nombre}}</strong></h3>   
                                                            @endif
                                                        @endforeach
                                                    <a id="agregarProducto" data_id_producto="{{$producto->id_producto}}"
                                                    data_precio="{{$producto->precio}}" data_categoria="{{$categoria->nombre}}", data_producto="{{$producto->nombre}}" data_productooferta="{{$oferta->id_productooferta}}" data_oferta="{{$oferta->id_oferta}}" class="add_cart agregar">+ Añadir al carrito</a>
                                                </div>
                                            </div>
                                        </div> 
                                    @endif
                                
                            @endforeach
                            @endforeach                           

                        </div>
                    </div>
                </div>
            </div><!--hasta aqui-->
        </div>
    </div>
</section>

<script src="js/notapedidos.js"></script>
@endsection