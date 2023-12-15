const detalle = document.querySelectorAll(".detalle");

detalle.forEach((element) => {
    element.addEventListener("click", function () {
        const objeto = {
            id_pedido: this.getAttribute("data-id_pedido"),
        };

        console.log(objeto);
        //ajax
        const url = "http://localhost/panaderia/public/api/pedidos/detalle";
        const data = objeto;

        $.ajax({
            url: url,
            type: "POST", // Cambiar a POST
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    if (response.redirect) {
                        console.log("guardado");
                    }
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
    });
});
