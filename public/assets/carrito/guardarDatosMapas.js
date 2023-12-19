//let vector = [];

export let vector = {};

let confirmarUbicacion = document.getElementById("confirmarUbicacion");
let longitudU, latitudU, direccion;

confirmarUbicacion.addEventListener("click", function () {
    longitudU = document.getElementById("longitud");
    latitudU = document.getElementById("latitud");
    direccion = document.getElementById("direccion");
    vector = {
        longitud: longitudU.value,
        latitud: latitudU.value,
        referencia: direccion.value,
        descripcion: direccion.value,
    };
    console.log(vector);
    //ajax
    /*const url = "http://localhost/panaderia/public/api/ubicacion/guardar";
    const data = JSON.stringify(vector);

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
    });*/
    //cerrar la ventana y mostrar un mensaje que se creo con exito
});
