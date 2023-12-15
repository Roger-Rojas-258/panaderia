const nota = document.querySelectorAll(".nota");
const repartidor = document.querySelectorAll(".asignarRepartidor");
let id_nota = 0;

nota.forEach(function (btn) {
    btn.addEventListener("click", function () {
        id_nota = this.getAttribute("data-id_pedido");
        console.log(id_nota);
    });
});

repartidor.forEach(function (btn) {
    btn.addEventListener("click", function () {
        const datos = {
            id_nota: id_nota,
            id_repartidor: this.getAttribute("data-id"),
            nombre: this.getAttribute("data-nombre"),
        };
        console.log(datos);
        //ajax
        const url =
            "http://localhost/panaderia/public/api/notapedido/asignarRepartidor";
        const data = JSON.stringify(datos);

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    if (response.redirect) {
                        const enlaceTemporal = document.createElement("a");
                        enlaceTemporal.href =
                            "http://localhost/panaderia/public/pedidos/pendiente";
                        enlaceTemporal.click();
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
/*
repartidor.addEventListener("click", function () {
    const datos = {
        id_nota: id_nota,
        id_repartidor: this.getAttribute("data-id"),
        nombre: this.getAttribute("data-nombre"),
    };
    console.log(datos);

    //ajax
    const url =
        "http://localhost/panaderia/public/api/notapedido/asignarRepartidor";
    const data = JSON.stringify(datos);

    $.ajax({
        url: url,
        type: "POST",
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
});*/
