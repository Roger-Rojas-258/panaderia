@extends('layouts.argon')

@section('content')
<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Editar Oferta del dia</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('productosoferta.update', [$producto[0]->pivot->id_producto, $id_oferta])}}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Nombre: </label>
                                <select name="nombre" id="" class="form-control form-control-alternative">
                                  @foreach ($productos as $prod)
                                    <option value="{{$prod->id_producto}}" 
                                      @if ($prod->id_producto==$producto[0]->pivot->id_producto) selected @endif>
                                      {{$prod->nombre}}
                                    </option>  
                                  @endforeach
                                </select>
                            </div>

                            <div class="form-group focused">
                                <label class="form-control-label" for="stock">stock: </label>
                                <input type="number" id="stock" name="stock" class="form-control form-control-alternative" placeholder="stock" value="{{$producto[0]->pivot->stock}}">
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="pl-lg-4">
                    <a href="{{route('productosoferta.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection