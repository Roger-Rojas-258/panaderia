@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Empleados</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('empleado.create')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Agregar</a>
        @if (session('Rol') == 'Administrador')
        <a href="{{route('empleado.eliminados')}}" class="btn btn-warning btn-sm p-2">Eliminados</a>
        @endif
    
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">CI</th>
              <th scope="col">Nombre</th>
              <th scope="col">Paterno</th>
              <th scope="col">Materno</th>
              <th scope="col">fecha nacimiento</th>
              <th scope="col">Sueldo</th>
              <th scope="col">Sexo</th>
              <th scope="col">Telefono</th>
              <th scope="col"></th>
              @if (session('Rol') == 'Administrador')
              <th scope="col"></th>
              @endif
              

            </tr>
          </thead>
          <tbody>
            @foreach ($tipos as $tipo)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->id_empleado}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->ci}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->nombre}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->paterno}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->materno}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->fecha_nacimiento}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->sueldo}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->sexo}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->telefono}}</span>
                </td>
                  <form id="formEliminar{{$tipo->id_empleado}}" action="{{route('empleado.destroy',$tipo->id_empleado)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                      <a href="{{route('empleado.edit', $tipo->id_empleado)}}">
                        <i class="fa-solid fa-pen-to-square" style="color: #e5e90c; font-size:20px;"></i>
                      </a>
                    </td>
                      @if (session('Rol') == 'Administrador')
                      <td>
                        <button type="button" onclick="mostrarModal('formEliminar{{$tipo->id_empleado}}');" style="border:none; background-color:#fff">
                          <i class="fa-solid fa-trash-can" style="color: #f20707;font-size:20px;"></i>
                        </button>
                      </td>
                      @endif
                      
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