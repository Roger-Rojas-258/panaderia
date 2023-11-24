@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header border-0">
        <h3 class="mb-0">Tipo productos</h3>
      </div>
      <div class="card-header border-0">
        <a href="{{route('tipoproducto.create')}}" class="btn btn-primary me-md-1 btn-sm p-2"><i class="fas fa-plus"></i> Agregar</a>
        <a href="" class="btn btn-warning btn-sm p-2">Eliminados</a>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tipos as $tipo)
              <tr>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->id_tipo}}</span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">{{$tipo->nombre}}</span>
                </td>
                  <form action="{{route('tipoproducto.destroy',$tipo->id_tipo)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td>
                      <a href="{{route('tipoproducto.edit', $tipo->id_tipo)}}">
                        <i class="fa-solid fa-pen-to-square" style="color: #e5e90c; font-size:20px;"></i>
                      </a>
                    </td>
                    <td><button type="submit" style="border:none; background-color:#fff"><i class="fa-solid fa-trash-can" style="color: #f20707;font-size:20px;"></i></button></td>
                  </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection