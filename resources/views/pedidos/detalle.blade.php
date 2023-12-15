@extends('layouts.argon')

@section('content')
  <div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Detalle pedido</h3>
      </div>
        <a href="#" class="btn btn-warning btn-sm p-2">Detalle pedido</a>
      </div>

          <div class="card bg-secondary shadow">
            <div class="card-body">
              <h6 class="heading-small text-muted mb-4">Informacion del cliente</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nombre</label>
                        <span class="form-control form-control-alternative"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Paterno</label>
                        <span class="form-control form-control-alternative"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Materno</label>
                        <span class="form-control form-control-alternative"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Fecha nacimiento</label>
                        <span class="form-control form-control-alternative"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
            </div>
          </div>

      <div class="table-responsive">
        <span>Deatalle de pedido fecha: fecja</span>
        <span>ID PEDIDO: </span>
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Cantidad</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio Unidad</th>
              <th scope="col">Sub total</th>
            </tr>
          </thead>
          <tbody> 

          </tbody>
        </table>     
      </div>
      <div class="card bg-secondary shadow">
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Informacion del pedido</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-last-name">Ubicacion</label>
                        <span class="form-control form-control-alternative"></span>
                    </div>
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-last-name">Metodo de pago</label>
                        <span class="form-control form-control-alternative"></span>
                    </div>
                  </div>
                </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

