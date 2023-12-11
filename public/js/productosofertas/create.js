
let enviar = document.getElementById('enviar');

enviar.addEventListener('click', function (){
    
    let checkboxes = document.querySelectorAll('.checkbox');
    let datos = [];
    checkboxes.forEach(element => {
        if (element.checked){
            let padre = element.parentNode;
            let stock = padre.querySelector('input.stock');
            datos.push({ "id_producto": padre.id, "stock": parseInt(stock.value) });
            
        }
        
    });

    let token = $('meta[name="csrf-token"]').attr('content');
    // Realizar una solicitud AJAX para enviar los datos al controlador Laravel
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: storeRoute, // Reemplaza '/ruta-del-controlador' con la ruta correcta de tu controlador
        type: 'POST',
        data: { datos: datos}, // Enviar datos como parte del cuerpo de la solicitud POST
        success: function (response) {
            // Manejar la respuesta del controlador si es necesario
            console.log(response);
            let mensage = document.getElementById('mensage');
            mensage.classList.add('alert');
            mensage.classList.add('alert-success');
            
            mensage.innerHTML = '¡Bien hecho! Has insertado correctamente los productos del día.';

        },
        error: function (error) {
            console.error(error);
        }
    });

});


