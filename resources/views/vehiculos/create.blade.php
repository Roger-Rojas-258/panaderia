@extends('layouts.argon')

@section('content')
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Registrar Vehiculo</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('vehiculo.store')}}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Placa: </label>
                        <input type="text" id="nombre" name="placa" class="form-control form-control-alternative" placeholder="placa">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Modelo: </label>
                        <input type="text" id="nombre" name="modelo" class="form-control form-control-alternative" placeholder="modelo">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Marca: </label>
                        <input type="text" id="nombre" name="marca" class="form-control form-control-alternative" placeholder="marca">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Color: </label>
                        <input type="text" id="nombre" name="color" class="form-control form-control-alternative" placeholder="color">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Estado: </label>
                        <input type="text" id="estado_uso" name="estado_uso" class="form-control form-control-alternative" placeholder="estado">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tipo Vehiculo: </label>
                        <select name="id_tipoVehiculo" id="id_tipoVehiculo" class="form-control form-control-alternative">
                          <option selected>Abrir este menú de selección</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->id_tipoVehiculo}}"> {{$tipo->descripcion}} </option>
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