@extends('layouts.argon')

@section('content')
<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar Producto</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('producto.update', $productos->id_producto)}}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">Rellene los siguientes campos :</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="nombre" value="{{$productos->nombre}}">
                      </div>

                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Precio: </label>
                        <input type="text" id="precio" name="precio" class="form-control form-control-alternative" placeholder="precio" value="{{$productos->precio}}">
                      </div>

                      <div class="form-group focused">
                          <label for="imagen-edit" class="col-sm-4 col-form-label">Imagen:</label>
                          <input type="file" class="custom-file-input" id="imagen-edit" accept="image/*" name="imagen" onchange="mostrarVistaPreviaEdit()">                       </div>
                        <!-- Muestra la imagen actual -->                       @if ($productos->imagen)
                         <img src="{{ asset($productos->imagen) }}" alt="Imagen actual" style="max-width: 100%; height: auto;">
@endif

                      <!--<div class="form-group focused">
                          <label for="imagen-edit" class="col-sm-4 col-form-label">Imagen:</label>
                          <input type="file" class="custom-file-input" id="imagen-edit" accept="image/*"                      name="imagen" onchange="mostrarVistaPreviaEdit()">
                      </div>-->

                      <!-- Muestra la imagen actual -->
                      @if(isset($urlImagenActual))
                          <img src="{{ $urlImagenActual }}" alt="Imagen actual" style="max-width: 100%; height: auto;">
                      @endif


                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tipo: </label>
                        <select name="id_tipo" id="" class="form-control form-control-alternative">
                          @foreach ($tipos as $tipo)
                            <option value="{{$productos->id_tipo}}" 
                              @if ($tipo->id_tipo==$productos->id_tipo) selected @endif>
                              {{$tipo->nombre}}
                            </option>  
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

