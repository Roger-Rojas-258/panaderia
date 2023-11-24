@extends('layouts.argon')

@section('content')
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Registrar Producto</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('producto.store')}}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Precio: </label>
                        <input type="text" id="precio" name="precio" class="form-control form-control-alternative" placeholder="precio">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tipo producto: </label>
                        <select name="id_tipo" id="id_tipo" class="form-control form-control-alternative">
                          <option selected>Abrir este menú de selección</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->id_tipo}}"> {{$tipo->nombre}} </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="pl-lg-4">
                  <a href="{{route('producto.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                  <button class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
</div>
@endsection