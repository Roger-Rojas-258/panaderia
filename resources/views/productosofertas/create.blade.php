@extends('layouts.argon')

@section('content')
<div class="container mt-4">
    <form>
         @csrf
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
            <div class="col">
                <div class="col">
                    <h3 class="mt-4">Seleccionar</h3>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" onclick="marcar(this);"> <label class="form-check-label">Seleccionar todos</label>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-center">PRODUCTOS</div>
                    <div class="card-body">
                        
                        @foreach ($productos as $producto)
                            <div class="form-check form-switch" style="display: flex; justify-content: space-between">
                                <div>
                                    <input class="form-check-input" type="checkbox" name=""id="{{$producto->id_producto}}">
                                    <label class="form-check-label">{{$producto->nombre}}</label>
                                </div>
                                <br>
                                <br>
                                <?php $bandera=false?>
                                <div style="display:flex;">
                                    <label for="">Stock:</label>
                                    @foreach ($productosofertas as $productosoferta)
                                        @if ($producto->id_producto==$productosoferta->id_producto)
                                            <input type="text" class="form-control form-control-alternative" style="margin-top: -10px; margin-bottom:30px; margin-left:10px" name="stock" value="{{$productosoferta->stock}}" id="stock{{$producto->id_producto}}" >
                                            <?php $bandera=true?>
                                        @endif
                                    @endforeach
                                    @if ($bandera==false)
                                        <input type="text" class="form-control form-control-alternative" style="margin-top: -10px; margin-bottom:30px; margin-left:10px" name="stock" id="stock{{$producto->id_producto}}" disabled >
                                    @endif     
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-header border-0">
                        <a href="{{route('productosoferta.index')}}" class="btn btn-secondary me-md-1">Regresar</a>
                        <button type="button" class="btn btn-primary btn-sm p-2" name="accion" id="enviar">Sacar a la venta</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
let vector = [];


document.addEventListener("DOMContentLoaded", function () {
    

    let checkboxes = document.querySelectorAll("input[type='checkbox']");
    checkboxes.forEach(element => {
        let stockInput = document.getElementById('stock' + element.id);

        if (stockInput) {
            element.addEventListener('change', function(){
                let producto = {
                    id_producto: element.id,
                    stock: stockInput.value,
                };

                if (element.checked) {
                    // Quitar el disable del input
                    stockInput.removeAttribute("disabled");
                } else {
                    // Poner el disable en el input
                    stockInput.setAttribute("disabled", "disabled");
                }

                // Agregar el objeto al array
                if (element.checked) {
                    vector.push(producto);
                } else {
                    // Remover el objeto del array si el checkbox está desmarcado
                    vector = vector.filter(obj => obj.id_producto !== element.id);
                }
                console.log(vector);
            });

            stockInput.addEventListener('input', function() {
                // Actualizar el valor de stock en el objeto si cambia el contenido del input
                let index = vector.findIndex(obj => obj.id_producto === element.id);
                if (index !== -1) {
                    vector[index].stock = stockInput.value;
                    console.log(vector);
                }
            });
        }
    });
});
//aqui vamos a colocar el boton enviar y recien vamos a capturar su stock 
const botonEnviar = document.getElementById('enviar');
botonEnviar.addEventListener('click', function(){
    // Realizar una solicitud AJAX para enviar los datos al servidor
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/panaderia/public/api/productosoferta/guardar';
    const data = JSON.stringify(vector);
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
});
</script>
@endsection