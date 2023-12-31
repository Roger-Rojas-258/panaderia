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
              <form action="{{route('producto.update', $vehiculos->placa)}}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Placa: </label>
                        <input type="text" id="nombre" name="placa" class="form-control form-control-alternative" placeholder="nombre" value="{{$vehiculos->placa}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Modelo: </label>
                        <input type="text" id="precio" name="modelo" class="form-control form-control-alternative" placeholder="precio" value="{{$vehiculos->modelo}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Marca: </label>
                        <input type="text" id="precio" name="marca" class="form-control form-control-alternative" placeholder="precio" value="{{$vehiculos->marca}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Color: </label>
                        <input type="text" id="precio" name="color" class="form-control form-control-alternative" placeholder="precio" value="{{$vehiculos->color}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Estado uso: </label>
                        <input type="text" id="precio" name="estado_uso" class="form-control form-control-alternative" placeholder="precio" value="{{$vehiculos->estado_uso}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tipo: </label>
                        <select name="id_tipo" id="" class="form-control form-control-alternative">
                          @foreach ($tipos as $tipo)
                            <option value="{{$vehiculos->id_tipoVehiculo}}" 
                              @if ($tipo->id_tipoVehiculo==$vehiculos->id_tipoVehiculo) selected @endif>
                              {{$tipo->descripcion}}
                            </option>  
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="pl-lg-4">
                  <a href="{{route('vehiculo.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                  <button class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
</div>
@endsection