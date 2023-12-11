@extends('layouts.argon')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container mt-4">
    
        <div class="row">{{--class="row row-cols-1 row-cols-sm-2 row-cols-md-2"> --}}
            <div class="col ">
                {{-- <div class="col">
                    <h3 class="mt-4">Seleccionar</h3>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" onclick="marcar(this);"> <label class="form-check-label">Seleccionar todos</label>
                    </div>
                </div> --}}

                <div class="card mb-3 d-flex">
                    <div class="card-header text-center">SACAR PRODUCTOS A LA VENTA</div>
                    <div class="rounded shadow p-3  text-light d-flex flex-wrap justify-content-around">
                        @foreach ($productosAyer as $productoAyer)
                            <div class="card py-4 px-5 alert alert-primary" id="{{$productoAyer->id_producto}}">

                                <input class="form-check-input checkbox" type="checkbox" checked>
                                <label class="form-check-label">{{$productoAyer->nombre}}</label>
                                <input type="number" class="form-control stock" value="{{$productoAyer->pivot->stock}}">

                            </div>
                        @endforeach
                        
                        @foreach ($productos as $producto)
                            @php
                                $existe = false;
                            @endphp
                            @foreach ($productosAyer as $productoAyer)
                                @if ($producto->id_producto == $productoAyer->id_producto)
                                    @php
                                        $existe = true;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($existe == false)
                                <div class="card py-4 px-5 alert alert-primary" id="{{$producto->id_producto}}">
                                    <input class="form-check-input checkbox" type="checkbox">
                                    <label class="form-check-label">{{$producto->nombre}}</label>
                                    <input type="number" class="form-control stock">
                                </div>               
                            @endif

                                
                        @endforeach
                    </div>
                    <div class="card-header border-0">
                        <a href="{{route('productosoferta.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                        <button type="button" class="btn btn-primary btn-sm p-2" name="accion" id="enviar">Sacar a la venta</button>
                    </div>
                    <div id="mensage">

                    </div>
                </div>

            </div>
        </div>
    
</div>

@endsection

@section('scripts')
    <script>
        var storeRoute = "{{ route('productosoferta.store') }}";
    </script>

    <script src="{{asset('/js/productosofertas/create.js')}}">
        
    </script>

@endsection