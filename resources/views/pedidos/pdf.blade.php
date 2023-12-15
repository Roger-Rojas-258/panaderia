<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{
      font-family: 'Courier New', Courier, monospace
    }
    .contenido{
      display: flex;
    justify-content: center;
    }
    .entrecortado {
    background: repeating-linear-gradient(45deg, transparent, transparent 10px, black 10px, black 20px);
    height: 2px; /* Ajusta el grosor de la línea */
    margin: 20px 0; /* Ajusta el espacio alrededor de la línea */
  }
  </style>
</head>
<body>

  <div class="contenido" style="margin-top: 40px">
    <div>
      <img src="{{asset('assets/assets/img/brand/angelesLogo.jpeg')}}" alt="" style="border-radius: 50%; border:2px solid blue; box-shadow: 10px 10px 10px #525f7f;" width="150px">
    </div>
    <div>
      <br><br><br>
      <strong style="font-size: 30px; font-family:'Courier New', Courier, monospace; margin-left:40px">Panaderia Los Angeles</strong>
    </div>
    <div>
      <br>
      <br>
      <br>

      <i class="fa-solid fa-mug-saucer" style="font-size: 20px;margin-top:8px; margin-left:10px; color:red" ></i></div>
  </div>
  <br>
  <hr class="entrecortado">
  <div style="display: flex; padding:10px">
    <span style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace"><strong>Direccion</strong></span>
    <p style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace">Montero-JuanXX</p>
  </div>

  <div style="display: flex; padding:10px">
    <span style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace"><strong>Fecha</strong></span>
    <p style="margin: 10px; font-size:20px; font-family:'Courier New', Courier, monospace">falta colocar</p>
  </div>
  <hr class="entrecortado">
  <!--Tabla-->
  <div style="display: flex; justify-content: space-around;padding:10px">
    <span style="font-size: 20px;margin:10px"><b>Cantidad</b></span>
    <span style="font-size: 20px;margin:10px"><b>Nombre</b></span>
    <span style="font-size: 20px;margin:10px"><b>Descripcion</b></span>
    <span style="font-size: 20px;margin:10px"><b>Precio</b></span>
    <span style="font-size: 20px;margin:10px"><b>Subtotal</b></span>
  </div>
  <hr class="entrecortado">
  <div>



  </div>
  <!--hasta asui-->
  <hr class="entrecortado">
  <div style="display: flex;justify-content:space-between">
    <span style="margin-left: 20px; font-size:20px"><b>Total :</b></span>
    <span style="margin-right: 20px; font-size:20px">.</span>
  </div>

  <script src="https://kit.fontawesome.com/e2c73ec39d.js" crossorigin="anonymous"></script>
</body>
</html>