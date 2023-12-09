@extends('layouts.argon')

@section('content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 py-4">
      <form action="">
        <div class="row">
           <div class="col-12 col-sm-4">
              <div class="row">
                <label class="form-label" style="margin-left: 20px">Buscar Cliente?</label>
              </div>
              <div class="input-group mb-3">

                <input class="form-control" id="nombre" name="nombre" type="text"
                  placeholder="Ingrese el nombre del cliente" autofocus> 

                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background-color:#1f3a68">
                    <i class="fa-solid fa-list"></i>
                  </button>
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="row">
                <label class="form-label" style="margin-left: 20px">Buscar Producto?</label>
              </div>
              <div class="input-group mb-3">
                <input class="form-control" id="producto" name="producto" type="text"
                  placeholder="Ingrese el nombre del producto" autofocus>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color:#1f3a68">
                    <i class="fa-solid fa-list"></i>
                  </button>
              </div>
            </div>
            <!--fecha
            <div class="col-lg-3">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control form-control-alternative" value="date_default_timezone_set('America/La_Paz'); echo date('Y-m-d');">
              </div>
            </div>-->
            <!--TIPO DE PAGO-->
            <div class="col-lg-4">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Forma de pago</label>
                <select name="id_tipo" id="id_tipo" class="form-control form-control-alternative">
                  <option selected>Selecciones una forma de pago</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id_tipo}}"> {{$tipo->nombre}} </option>
                    @endforeach
                </select>
              </div>
            </div>

        </div>
        
        <div class="row">
          <div class="form-group">
          <div class="row">
            <div style="display: none">
              <input class="form-control" id="id" name="id" type="text">
            </div>

             <div class="col-12 col-sm-4">
              <label style="margin-left: 30px">Cantidad</label>
              <div class="container-fluid px-0 py-2">
                <input class="form-control" id="cantidad" name="cantidad" type="number">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <label style="margin-left: 30px">Categoria</label>
              <div class="container-fluid px-0 py-2">
                <input class="form-control" id="categoria" name="categoria" type="text" disabled>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <label style="margin-left: 30px">Precio</label>
              <div class="container-fluid px-0 py-2">
                <input class="form-control" id="precio" name="precio" type="text" disabled="" step="0.01">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <label style="margin-left: 30px">Subtotal</label>
              <div class="container-fluid px-0 py-2">
                <input class="form-control" id="subtotal" name="subtotal" type="text" disabled="" step="0.01">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <label><br></label>
              <div class="container-fluid px-0 py-2">
                <button class="btn btn-primary" id="agregar_producto" name="agregar_producto" type="button">Agregar
                  producto</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        <br><br>
        <div class="table-responsive">
          <table id="tablaProductos" class="table table-bordered">
            <thead class="table-dark ">
              <th>#</th>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th width="1%"></th>
              <th width="1%"></th>
              <!--<th class="d-none">idProducto</th>
              <th class="d-none">idCliente</th>
              <!--<th width="1%"></th> boton para aumentar-->
            </thead>
            <tbody id="tabla">

            </tbody>
          </table>
        </div>
        <br>
        <div class="d-grid gap-3 d-md-flex justify-content-md-end  mb-3">
          <label style="font-weight: bold; font-size: 30px; text-align: center;">Total Bs.</label>
          <input type="text" id="total" name="total" size="7" readonly="true" value="0.00"
            style="font-weight: bold; font-size: 30px; text-align: center;" />
          <button class="btn btn-success" type="button" id="completa_venta" >VENDER</button>
        </div>
      </form>
    </div>
  </main>

<!-- Modal Producto -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Lista de productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff; border:none;"> <i class="fa-solid fa-x"></i></button>
      </div>
      <div class="modal-body">
        <table id="datatablesSimple" class=" border-dark">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>stock</th>
            <th>Categoria</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productoVentas as $oferta)
            @foreach ($productos as $producto)
              @if ($oferta->id_producto==$producto->id_producto)
              <tr>
                <td class="align-middle p-1 nombre">{{$producto->nombre}}</td>
                <td class="align-middle p-1 nombre">{{$producto->precio}}</td>
                <td class="align-middle p-1 nombre">{{$oferta->stock}}</td>
                @foreach ($categorias as $categoria)
                    @if ($categoria->id_categoria == $producto->id_categoria)
                        <td class="align-middle p-1 nombre">{{$categoria->nombre}}</td>
                        <td>
                          <a class="badge bg-success agregar"rel="tooltip" data-placement="top" data_id_producto="{{$producto->id_producto}}"
                  data_precio="{{$producto->precio}}" data_categoria="{{$categoria->nombre}}", data_producto="{{$producto->nombre}}" title="Seleccionar" style="padding: 10px" data-bs-dismiss="modal"><i class="fa-solid fa-plus" style="font-size: 15px"></i></a>
                      </td>
                    @endif
                @endforeach
              </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Clientes -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Lista de Clientes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff; border:none;"> <i class="fa-solid fa-x"></i></button>
      </div>
      <div class="modal-body">
        <table id="datatablesSimple" class=" border-dark">
        <thead>
          <tr>
            <th class="p-1">Nombre</th>
            <th class="p-1">Paterno</th>
            <th class="p-1">Materno</th>
            <th class="p-1">Telefono</th>
            <th width="1%" class="p-2"></th>
          </tr>
        </thead>
          <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                  <td class="align-middle p-1 nombre">{{$cliente->nombre}}</td>
                  <td class="align-middle p-1 apellidos">{{$cliente->paterno}}</td>
                  <td class="align-middle p-1">{{$cliente->materno}}</td>
                  <td class="align-middle p-1">{{$cliente->telefono}}</td>
                  <td>
                    <a class="badge bg-success select-option"
                    rel="tooltip" data-placement="top" title="Seleccionar" data-id="{{$cliente->id_cliente}}" style="padding: 10px"> <i class="fa-solid fa-plus" style="font-size: 15px"></i></a>
                  </td>
                </tr>
            @endforeach
          </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!--Template carrito-->
<template id="template-carrito">
  <tr>
    <th scope="row">id</th>
    <td>Café</td>
    <td>Bebida</td>
    <td>1</td>
    <td>2$ individual</td>
    <td>$ <span>500</span></td>
    <td>
      <button class="btn btn-info btn-sm">+</button>
    </td>
    <td>
      <button class="btn btn-danger btn-sm">-</button>
    </td>
  </tr>
</template>


<script>
let carrito = [];

// Leer todos los input que utilizamos
const id = document.getElementById('id');
const nombre = document.getElementById('producto');
const cantidad = document.getElementById('cantidad');
const categoria = document.getElementById('categoria');
const precio = document.getElementById('precio');
const subtotal = document.getElementById('subtotal');
const total = document.getElementById('total');
const completarVenta = document.getElementById('completa_venta');

document.addEventListener("DOMContentLoaded", function () {
  detectarBotones();
});

const detectarBotones = () => {
  let botones = document.querySelectorAll('.agregar');
  botones.forEach(btn => {
    btn.addEventListener('click', function () {
      id.value = this.getAttribute('data_id_producto');
      precio.value = this.getAttribute('data_precio');
      nombre.value = this.getAttribute('data_producto');
      categoria.value = this.getAttribute('data_categoria');
      cantidad.value = 1;
      subtotal.value = cantidad.value * precio.value;
    })
  });
}

let agregar_producto = document.getElementById('agregar_producto');
agregar_producto.addEventListener('click', function () {
  // Crear un objeto
  if(id.value !== "" && nombre.value !== "" && categoria.value !== "" && precio.value !== "" && subtotal.value !== "" && cantidad.value !== 0) {
    const producto = {
    id_producto: id.value,
    nombre: nombre.value,
    categoria: categoria.value,
    precio: precio.value,
    subtotal: subtotal.value,
    cantidad: cantidad.value,
  }
  //actualizar el total
  total.value = parseFloat(total.value)+ parseFloat(subtotal.value) * parseFloat(cantidad.value);
  // Vaciar los campos después de agregar el producto
  id.value = "";
  nombre.value = "";
  categoria.value = "";
  cantidad.value = "";
  precio.value = "";
  subtotal.value = "";

  // Agregar el producto al carrito
  carrito.push(producto);

  // Dibujar carrito
  pintarCarrito();
  } else{
    console.log("Por favor, complete todos los campos antes de agregar el producto al carrito.");
  }
  
});

// Función para dibujar el carrito
const tabla = document.getElementById("tabla");

const pintarCarrito = () => {
  // Limpiamos lo que tiene la tabla
  tabla.innerHTML = "";

  const template = document.getElementById("template-carrito").content;
  const fragment = document.createDocumentFragment();

  carrito.forEach((producto) => {
    template.querySelector("th").textContent = producto.id_producto;
    template.querySelectorAll("td")[0].textContent = producto.nombre;
    template.querySelectorAll("td")[1].textContent = producto.categoria;
    template.querySelectorAll("td")[2].textContent = producto.precio;
    template.querySelectorAll("td")[3].textContent = producto.cantidad;
    template.querySelector("span").textContent = producto.precio * producto.cantidad;

    // Botones
    template.querySelector(".btn-info").dataset.id = producto.id_producto;
    template.querySelector(".btn-danger").dataset.id = producto.id_producto;

    const clone = template.cloneNode(true);
    fragment.appendChild(clone);
  });

  tabla.appendChild(fragment);
}

/*completarVenta.addEventListener('click',function(){
  carrito.push(total.value);
  //console.log(carrito);
  const xhr = new XMLHttpRequest();
    //const url = 'http://localhost/panaderia/public/api/venta/guardarVenta';
    const url = 'http://localhost/panaderia/public/api/notaventa/guardar';
    const data = JSON.stringify(carrito);
    console.log(data);
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (response) {
            if (response.status == 200) {
                console.log('guardado');
            } else {
                console.log('error');
            }
        }, 
        error: function (data, textStatus, jqXHR, error) {
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
            console.log(error);
        }
    });
    tabla.innerHTML="";
})*/
completarVenta.addEventListener('click', function () {
  const xhr = new XMLHttpRequest();
  const url = 'http://localhost/panaderia/public/api/notaventa/guardar';
  const data = JSON.stringify(carrito);

  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (response) {
      if (response.status == 200) {
        console.log('guardado');
      } else {
        console.log('error');
      }
    },
    error: function (data, textStatus, jqXHR, error) {
      console.log(data);
      console.log(textStatus);
      console.log(jqXHR);
      console.log(error);
    }
  });
  
  // Limpiar el carrito después de completar la venta
  carrito = [];
  tabla.innerHTML = "";
});

</script>


@endsection