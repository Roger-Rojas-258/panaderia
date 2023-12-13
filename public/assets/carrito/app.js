let carrito = [];
//importar los datos del vector
import { vector } from "./guardarDatosMapas.js";
//Variable que mantiene el estado visible del carrito
var carritoVisible = false;

//Espermos que todos los elementos de la pàgina cargen para ejecutar el script
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

function ready() {
    //Agregremos funcionalidad a los botones eliminar del carrito
    var botonesEliminarItem = document.getElementsByClassName("btn-eliminar");
    for (var i = 0; i < botonesEliminarItem.length; i++) {
        var button = botonesEliminarItem[i];
        button.addEventListener("click", eliminarItemCarrito);
    }

    //Agrego funcionalidad al boton sumar cantidad
    var botonesSumarCantidad =
        document.getElementsByClassName("sumar-cantidad");
    for (var i = 0; i < botonesSumarCantidad.length; i++) {
        var button = botonesSumarCantidad[i];
        button.addEventListener("click", sumarCantidad);
    }

    //Agrego funcionalidad al buton restar cantidad
    var botonesRestarCantidad =
        document.getElementsByClassName("restar-cantidad");
    for (var i = 0; i < botonesRestarCantidad.length; i++) {
        var button = botonesRestarCantidad[i];
        button.addEventListener("click", restarCantidad);
    }

    //Agregamos funcionalidad al boton Agregar al carrito
    var botonesAgregarAlCarrito = document.getElementsByClassName("boton-item");
    for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener("click", agregarAlCarritoClicked);
    }

    //Agregamos funcionalidad al botón comprar
    document
        .getElementsByClassName("btn-pagar")[0]
        .addEventListener("click", pagarClicked);
}

//Funciòn que controla el boton clickeado de agregar al carrito
function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName("titulo-item")[0].innerText;
    var precio = item.getElementsByClassName("precio-item")[0].innerText;
    var imagenSrc = item.getElementsByClassName("img-item")[0].src;
    console.log(imagenSrc);
    //----------------------------------oBJETO DEL PRODUCTO
    let cantidad = 1;
    const producto = {
        id: this.getAttribute("data-id_producto"),
        precio: this.getAttribute("data-precio"),
        nombre: this.getAttribute("data-producto"),
        cantidad: 1,
        subtotal: cantidad * precio,
        productooferta: this.getAttribute("data-idproductooferta"),
    };
    carrito.push(producto);

    agregarItemAlCarrito(titulo, precio, imagenSrc);

    hacerVisibleCarrito();
}

//Funcion que hace visible el carrito
function hacerVisibleCarrito() {
    carritoVisible = true;
    var carrito = document.getElementsByClassName("carrito")[0];
    carrito.style.marginRight = "0";
    carrito.style.opacity = "1";

    var items = document.getElementsByClassName("contenedor-items")[0];
    items.style.width = "60%";
}

//Funciòn que agrega un item al carrito
function agregarItemAlCarrito(titulo, precio, imagenSrc) {
    var item = document.createElement("div");
    item.classList.add = "item";
    var itemsCarrito = document.getElementsByClassName("carrito-items")[0];

    //controlamos que el item que intenta ingresar no se encuentre en el carrito
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName(
        "carrito-item-titulo"
    );
    for (var i = 0; i < nombresItemsCarrito.length; i++) {
        if (nombresItemsCarrito[i].innerText == titulo) {
            alert("El item ya se encuentra en el carrito");
            return;
        }
    }

    var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `;
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    //Agregamos la funcionalidad eliminar al nuevo item
    item.getElementsByClassName("btn-eliminar")[0].addEventListener(
        "click",
        eliminarItemCarrito
    );

    //Agregmos al funcionalidad restar cantidad del nuevo item
    var botonRestarCantidad = item.getElementsByClassName("restar-cantidad")[0];
    botonRestarCantidad.addEventListener("click", restarCantidad);

    //Agregamos la funcionalidad sumar cantidad del nuevo item
    var botonSumarCantidad = item.getElementsByClassName("sumar-cantidad")[0];
    botonSumarCantidad.addEventListener("click", sumarCantidad);

    //Actualizamos total
    actualizarTotalCarrito();
}
//Aumento en uno la cantidad del elemento seleccionado
function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActualInput = selector.getElementsByClassName(
        "carrito-item-cantidad"
    )[0];
    var cantidadActual = parseInt(cantidadActualInput.value);

    cantidadActual++;
    //console.log(cantidadActual); esta funcionando bien
    cantidadActualInput.value = cantidadActual;

    // Obtén el título del producto actual
    var titulo = selector.parentElement.getElementsByClassName(
        "carrito-item-titulo"
    )[0].innerText;
    //console.log(cantidadActualInput); dudoso
    // Encuentra el producto en el carrito por el título
    var productoEnCarrito = carrito.find(
        (producto) => producto.nombre.toLowerCase() === titulo.toLowerCase()
    );
    // Actualiza la cantidad en el objeto del carrito
    if (productoEnCarrito) {
        productoEnCarrito.cantidad = cantidadActual;
        productoEnCarrito.subtotal =
            parseFloat(productoEnCarrito.precio) * cantidadActual;
    }

    console.log(carrito);
    actualizarTotalCarrito();
}

//Resto en uno la cantidad del elemento seleccionado
function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(
        selector.getElementsByClassName("carrito-item-cantidad")[0].value
    );
    var cantidadActual = selector.getElementsByClassName(
        "carrito-item-cantidad"
    )[0].value;
    cantidadActual--;
    if (cantidadActual >= 1) {
        selector.getElementsByClassName("carrito-item-cantidad")[0].value =
            cantidadActual;
        actualizarTotalCarrito();
    }
}

//Elimino el item seleccionado del carrito
function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //Actualizamos el total del carrito
    actualizarTotalCarrito();

    //la siguiente funciòn controla si hay elementos en el carrito
    //Si no hay elimino el carrito
    ocultarCarrito();
}
//Funciòn que controla si hay elementos en el carrito. Si no hay oculto el carrito.
function ocultarCarrito() {
    var carritoItems = document.getElementsByClassName("carrito-items")[0];
    if (carritoItems.childElementCount == 0) {
        var carrito = document.getElementsByClassName("carrito")[0];
        carrito.style.marginRight = "-100%";
        carrito.style.opacity = "0";
        carritoVisible = false;

        var items = document.getElementsByClassName("contenedor-items")[0];
        items.style.width = "100%";
    }
}
//Actualizamos el total de Carrito
function actualizarTotalCarrito() {
    //seleccionamos el contenedor carrito
    var carritoContenedor = document.getElementsByClassName("carrito")[0];
    var carritoItems = carritoContenedor.getElementsByClassName("carrito-item");
    var total = 0;

    //recorremos cada elemento del carrito para actualizar el total
    for (var i = 0; i < carritoItems.length; i++) {
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName(
            "carrito-item-precio"
        )[0];

        // Utilizamos expresiones regulares para extraer solo los dígitos y los decimales
        var precioMatch = precioElemento.innerText.match(/[\d,]+(\.\d{1,2})?/);

        if (precioMatch) {
            var precio = parseFloat(precioMatch[0].replace(",", ""));
            var cantidadItem = item.getElementsByClassName(
                "carrito-item-cantidad"
            )[0];
            var cantidad = cantidadItem.value;
            total += precio * cantidad;
        }
    }

    total = Math.round(total * 100) / 100;

    document.getElementsByClassName("carrito-precio-total")[0].innerText =
        total.toLocaleString("es") + ".00";
}

//vamos a preguntar si inicio session y si el vector ubicacion esta vacio si esta vacio pues un mensaje para que ponga su ubicacion

//completar compra
//Eliminamos todos los elementos del carrito y lo ocultamos
function pagarClicked() {
    console.log(vector);
    if (Object.keys(vector).length > 0) {
        const extra = {
            total_precio: document.getElementsByClassName(
                "carrito-precio-total"
            )[0].innerText,
            costo_envio: 5,
            tiempo_estimado: 30,
            estado_entrega: "PENDIENTE",
            id_cliente: 1,
            id_ubicacion: 1,
            id_repartidor: 1,
            id_pago: 1,
            productos: carrito,
            //ubicacion: vector,
        };
        console.log(extra); // esta enviando muy bien solo falta pasarlo al controlador y tambien corregir algunos bug

        //ajax
        const url = "http://localhost/panaderia/public/api/notapedido/guardar";
        const data = JSON.stringify(extra);

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    console.log("guardado");
                } else {
                    console.log("error Servidor");
                }
            },
            error: function (data, textStatus, jqXHR, error) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                console.log(error);
            },
        });

        //Elimino todos los elmentos del carrito
        var carritoItems = document.getElementsByClassName("carrito-items")[0];
        while (carritoItems.hasChildNodes()) {
            carritoItems.removeChild(carritoItems.firstChild);
        }
        actualizarTotalCarrito();
        ocultarCarrito();
    } else {
        console.log(vector);
        alert("Ingrese una ubicacion para el pedido");
    }
}
