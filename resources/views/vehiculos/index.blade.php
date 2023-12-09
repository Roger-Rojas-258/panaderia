@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Vehiculo</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('vehiculo.create')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Agregar</a>
        <a href="{{route('vehiculo.eliminados')}}" class="btn btn-warning btn-sm p-2">Eliminados</a>
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

                  <form id="formEliminar{{$vehiculo->placa}}" action="{{route('vehiculo.destroy',$vehiculo->placa)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                      <a href="{{route('vehiculo.edit', $vehiculo->placa)}}">
                        <i class="fa-solid fa-pen-to-square" style="color: #e5e90c; font-size:20px;"></i>
                      </a>
                    </td>
                      <td>
                        <button type="button" onclick="mostrarModal('formEliminar{{$vehiculo->placa}}');" style="border:none; background-color:#fff">
                          <i class="fa-solid fa-trash-can" style="color: #f20707;font-size:20px;"></i>
                        </button>
                      </td>
                  </form>
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
<<script>
  function mostrarModal(formId) {
    // Mostrar la ventana modal
    $('#modal-confirma').modal('show');

    // Manejar el clic en el botón "Confirmar"
    $('.btn-ok').on('click', function () {
      // Ocultar la ventana modal
      $('#modal-confirma').modal('hide');

      // Enviar el formulario
      var form = document.getElementById(formId);
      if (form) {
        form.submit();
      }
    });

    // Manejar el clic en el botón "Cancelar"
    $('.btn-secondary').on('click', function () {
      // Ocultar la ventana modal
      $('#modal-confirma').modal('hide');
    });
  }
</script>

@endsection