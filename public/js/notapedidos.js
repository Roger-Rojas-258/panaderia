let carrito = [];
let cantidadPedido = 0;
// Obtén el elemento i después de .cart
const cartIcon = document.querySelector(".main_menu .cart i");

//varibales del carrito
// Leer todos los input que utilizamos
const id = document.getElementById("id");
const nombre = document.getElementById("producto");
const cantidad = document.getElementById("cantidad");
const categoria = document.getElementById("categoria");
const precio = document.getElementById("precio");
const subtotal = document.getElementById("subtotal");
const total = document.getElementById("total");
const completarVenta = document.getElementById("completa_venta");
let productoOferta;

document.addEventListener("DOMContentLoaded", function () {
    detectarBotones();
});

const detectarBotones = () => {
    let botones = document.querySelectorAll(".agregar");
    botones.forEach((btn) => {
        btn.addEventListener("click", function () {
            const producto = {
                id: this.getAttribute("data_id_producto"),
                precio: parseFloat(this.getAttribute("data_precio")),
                nombre: this.getAttribute("data_producto"),
                categoria: this.getAttribute("data_categoria"),
                cantidad: 1,
                subtotal: parseFloat(this.getAttribute("data_precio")) * 1,
                producto: this.getAttribute("data_productooferta"),
            };
            carrito.push(producto);
            console.log(carrito);
            //dibujar el carrito
            pintarCarrito();
            cantidadPedido++;

            // Actualiza el contenido del pseudoelemento :after
            cartIcon.style.setProperty(
                "--contenido-after",
                `"${cantidadPedido}"`
            );
        });
    });
};

const pintarCarrito = () => {
    // Limpiamos lo que tiene la tabla
    tabla.innerHTML = "";

    const template = document.getElementById("template-carrito").content;
    const fragment = document.createDocumentFragment();

    carrito.forEach((producto) => {
        template.querySelector("th").textContent = producto.id;
        template.querySelectorAll("td")[0].textContent = producto.nombre;
        template.querySelectorAll("td")[1].textContent = producto.categoria;
        template.querySelectorAll("td")[2].textContent = producto.precio;
        template.querySelectorAll("td")[3].textContent = producto.cantidad;
        template.querySelector("span").textContent =
            producto.precio * producto.cantidad;

        // Botones
        template.querySelector(".btn-info").dataset.id = producto.id;

        const clone = template.cloneNode(true);
        fragment.appendChild(clone);
    });

    tabla.appendChild(fragment);
};
