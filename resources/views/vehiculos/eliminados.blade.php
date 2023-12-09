@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Eliminados Vehiculo</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('vehiculo.index')}}" class="btn btn-warning me-md-1 btn-sm p-2"> Regresar</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Placa</th>
              <th scope="col">Modelo</th>
              <th scope="col">Marca</th>
              <th scope="col">Color</th>
              <th scope="col">Estado</th>
              <th scope="col">Tipo</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vehiculos as $vehiculo)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$vehiculo->placa}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$vehiculo->modelo}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$vehiculo->marca}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$vehiculo->color}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$vehiculo->estado}}</span>
                </td>

                @foreach ($tipos as $tipo)
                    @if ($vehiculo->id_tipoVehiculo==$tipo->id_tipoVehiculo)
                        <td>
                          <span class="badge badge-dot mr-4">{{$tipo->descripcion}}</span>
                        </td>
                    @endif
                @endforeach

                <td>
                  <a href="#" class="eliminar-tipo" data-id="{{$tipo->id_tipoVehiculo}}" data-bs-toggle="modal" data-bs-target="#modal-confirma" rel="tooltip" data-placement="top" title="Eliminar">
                    <i class="fa-solid fa-arrow-up" style="color: yellow; font-weight: bold; font-size:20px"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="modal-confirma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:none;  background-color:#fff">
            <i class="fa-solid fa-xmark"></i></button>
          </div>
          <div class="modal-body">
            <p>¿Desea Eliminar este registro?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Cancelar">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
          </div>
        </div>
      </div>
    </div>

<!--JS-->
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const elementosEliminar = document.querySelectorAll('.eliminar-tipo');

            elementosEliminar.forEach(function (elemento) {
                elemento.addEventListener('click', function (event) {
                    event.preventDefault();

                    const tipoId = this.getAttribute('data-id');
                    const url = "{{ route('tipovehiculo.restablecer', ['tipoId' => ':tipoId']) }}".replace(':tipoId', tipoId);

                    // Configuración para el Modal de Confirmación
                    const modalConfirmacion = new bootstrap.Modal(document.getElementById('modal-confirma'), {
                        backdrop: 'static',
                        keyboard: false
                    });

                    // Configuración para el botón de Confirmar dentro del Modal
                    const btnConfirmar = document.querySelector('.btn-ok');
                    btnConfirmar.setAttribute('href', url);

                    // Mostrar el Modal de Confirmación
                    modalConfirmacion.show();
                });
            });
        });
    </script>
@endsection