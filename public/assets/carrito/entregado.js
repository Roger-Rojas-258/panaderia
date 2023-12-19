const acepto = document.getElementById("aceptar");
const datos = document.querySelectorAll(".nota"); // Cambiado de 'getElementById' a 'getElementsByClassName'
let id_pedido = 0;

datos.forEach((element) => {
    element.addEventListener("click", function () {
        id_pedido = this.getAttribute("data-id_pedido");
        console.log(id_pedido);
    });
});

acepto.addEventListener("click", function () {
    const valor = {
        id_pedido: id_pedido,
        estado: "ENTREGADO",
    };
    console.log(valor);
    //ajax
    const url = "http://www.los-angeles.com/panaderia/public/api/notapedido/Entregado";
    const data = JSON.stringify(valor);

    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (response) {
            console.log("guardado con éxito!!");
        },
        error: function (data, textStatus, jqXHR, error) {
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
            console.log(error);
        },
    });
});
