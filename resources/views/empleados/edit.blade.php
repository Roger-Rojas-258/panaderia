@extends('layouts.argon')

@section('content')
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar Empleado</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('empleado.update', $tipo->id_empleado)}}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">CI: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->ci}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->nombre}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Paterno: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->paterno}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Materno: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->materno}}">

                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Fecha de nacimiento: </label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-alternative" placeholder="fecha nacimeinto" value="{{$tipo->fecha_nacimiento}}">
                      </div>
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Sueldo: </label>
                        <input type="text" id="sueldo" name="sueldo" class="form-control form-control-alternative" placeholder="fecha nacimeinto" value="{{$tipo->sueldo}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Telefono: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->sexo}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Sexo: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$tipo->telefono}}">
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="pl-lg-4">
                  <a href="{{route('empleado.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                  <button class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
          </div>
</div>
@endsection