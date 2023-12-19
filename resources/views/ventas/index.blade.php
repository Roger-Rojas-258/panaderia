@extends('layouts.argon')

@section('content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 py-4">
      <form>
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
            <!--TIPO DE PAGO-->
            <div class="col-lg-4">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Forma de pago</label>
                <select name="id_pago" id="id_pago" class="form-control form-control-alternative">
                  <option selected>Selecciones una forma de pago</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id_pago}}"> {{$tipo->nombre}} </option>
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
                  data_precio="{{$producto->precio}}" data_categoria="{{$categoria->nombre}}", data_producto="{{$producto->nombre}}" data_productooferta="{{$oferta->id_productooferta}}" data_oferta="{{$oferta->id_oferta}}" title="Seleccionar" style="padding: 10px" data-bs-dismiss="modal"><i class="fa-solid fa-plus" style="font-size: 15px"></i></a>
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
                    <a class="badge bg-success select-option agregarCliente"
                    rel="tooltip" data-placement="top" title="Seleccionar" data-id="{{$cliente->id_cliente}}" data-nombre="{{$cliente->nombre}}" style="padding: 10px" data-bs-dismiss="modal"> <i class="fa-solid fa-plus" style="font-size: 15px"></i></a>
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
      <button class="btn btn-info btn-sm" style="background-color: #fff; border:none"><i class="fa-solid fa-trash-can" style="color:red; font-size:15px"></i></button>
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
let productoOferta;

//cliente
const nombreProducto = document.getElementById('nombre');
let id_cliente;
const agregarCliente = document.querySelectorAll('.agregarCliente');

agregarCliente.forEach(element => {
  element.addEventListener('click', function(){
    nombreProducto.value = this.getAttribute('data-nombre');
    id_cliente = this.getAttribute('data-id');
    console.log(id_cliente);
  })
});


//---------------------------------------------------------------------
cantidad.addEventListener('keyup',function(e){
  const precio2 = parseFloat($("#precio").val());
  const cantidad = parseFloat($("#cantidad").val());
  const subtotal = cantidad * precio2;
  $("#subtotal").val(subtotal);
});


document.addEventListener("DOMContentLoaded", function () {
  const id_pago = document.getElementById('id_pago');
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
      productoOferta = this.getAttribute('data_productooferta');
    })
  });
}

let agregar_producto = document.getElementById('agregar_producto');
agregar_producto.addEventListener('click', function () {
  // Crear un objeto
  if(id.value !== "" && nombre.value !== "" && categoria.value !== "" && precio.value !== "" && subtotal.value !== "" && cantidad.value !== 0) {
    //verificar si el dato ya existe el dato en el carrito
    if(existeElDato(carrito,id.value)==false){
      const producto = {
      id_producto: id.value,
      nombre: nombre.value,
      categoria: categoria.value,
      precio: precio.value,
      subtotal: subtotal.value,
      cantidad: cantidad.value,
      productoOferta: productoOferta,
      }
      // Agregar el producto al carrito
      carrito.push(producto);
      
    } else{
      carrito = incrementarCantidad(carrito,id.value,cantidad.value,subtotal.value);
    }
    
  //actualizar el total
  total.value = parseFloat(total.value)+ parseFloat(subtotal.value);
  // Vaciar los campos después de agregar el producto
  id.value = "";
  categoria.value = "";
  cantidad.value = "";
  nombre.value ="";
  precio.value = "";
  subtotal.value = "";


  //console.log(carrito);
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

    const clone = template.cloneNode(true);
    fragment.appendChild(clone);
  });

  tabla.appendChild(fragment);
}

//verificar si el dato ingresando ya existe
function existeElDato(carrito,id){
  let existe=false;
  carrito.forEach(element => {
    if(element.id_producto==id){
      existe=true;
    }
  });
  return existe;
}

//incrementar la cantidad si es que ya existe el datos
function incrementarCantidad(carrito, id, cantidad,subtotal){
  carrito.forEach(element => {
    if(element.id_producto==id){
      element.cantidad=parseFloat(element.cantidad)+parseFloat(cantidad);
      element.subtotal = parseFloat(element.subtotal)+parseFloat(subtotal);
    }
  });
  return carrito;
}

completarVenta.addEventListener('click', function () {
  const extra = {
    id_cliente: id_cliente,
    total: total.value,
    id_pago:id_pago.value,
    productos : carrito,
  };
  console.log(extra);
  const url = 'http://www.los-angeles.com/panaderia/public/api/venta/guardar';
  const data = JSON.stringify(extra);

  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
            title: "Se realizo correctamente el pedido!",
            text: "Guardado correctamente!",
            icon: "success",
        });
      } else {
        Swal.fire({
            title: "Se realizo correctamente el pedido!",
            text: "Guardado correctamente!",
            icon: "success",
        });
      }
    },
    error: function (data, textStatus, jqXHR, error) {
      Swal.fire({
        icon: "error",
        title: "Se produjo un error",
        text: "Vuelve a intentarlo!",
        footer: '<a href="#">Why do I have this issue?</a>',
      });
      console.log(data);
      console.log(textStatus);
      console.log(jqXHR);
      console.log(error);
    }
  });
  //limpiar la tabla y el total
  tabla.innerHTML = "";
  total.value=0.00;
});

</script>


@endsection
