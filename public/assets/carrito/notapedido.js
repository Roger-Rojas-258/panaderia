//variables
let carrito = [];
let cantidad;
//funciones
document.addEventListener("DOMContentLoaded", function () {
    cantidad = document.getElementById("cantidadAjax");
    detectarBotones();
});

const detectarBotones = () => {
    let botones = document.querySelectorAll(".agregar");
    botones.forEach((btn) => {
        btn.addEventListener("click", function () {
            const id = this.getAttribute("data-id_producto");
            // Calcular el subtotal
            if (existeElDato(carrito, id) == false) {
                const producto = {
                    id_producto: id,
                    producto: this.getAttribute("data-producto"),
                    precio: this.getAttribute("data-precio"),
                    //cantidad: document.querySelector("carrito-item-cantidad"),
                    id_productooferta: this.getAttribute(
                        "data-idproductooferta"
                    ),
                    cantidad: 1,
                    subtotal: parseFloat(precio) * parseFloat(cantidad),
                };
                carrito.push(producto);
                console.log(carrito);
            } else {
                carrito = incrementarCantidad(
                    carrito,
                    id.value,
                    cantidad.value,
                    subtotal.value
                );
            }
        });
    });
};

//verificar si el dato ingresando ya existe
function existeElDato(carrito, id) {
    let existe = false;
    carrito.forEach((element) => {
        if (element.id_producto == id) {
            existe = true;
        }
    });
    return existe;
}

//incrementar la cantidad si es que ya existe el datos
function incrementarCantidad(carrito, id, cantidad, subtotal) {
    carrito.forEach((element) => {
        if (element.id_producto == id) {
            element.cantidad =
                parseFloat(element.cantidad) + parseFloat(cantidad);
            element.subtotal =
                parseFloat(element.subtotal) + parseFloat(subtotal);
        }
    });
    return carrito;
}
