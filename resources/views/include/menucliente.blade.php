<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{asset('aranoz/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" style="margin-top: 25px" data-toggle="modal" data-target="#exampleModal">
                                        Tu ubicacion 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2b1a46" viewBox="0 0 16 16"><path d="M80.927-238.385c0 50.863-42.919 92.243-95.679 92.243H-278.75l-119.21 385.144h-29.11l-.934-.292 128.044-413.648h285.208c36.891 0 66.905-28.465 66.905-63.447zm133.068 0c0 59.718-23.822 115.852-67.086 158.042-43.17 42.107-100.54 65.296-161.543 65.296H-184.85L-264.067 239h-30.193l88.197-282.844h191.429c53.435 0 103.648-20.282 141.403-57.103 37.657-36.732 58.4-85.543 58.4-137.44zM147.99-238c.01.247.01.499.01.756 0 42.601-16.96 82.644-47.768 112.731-30.705 30.008-71.51 46.53-114.894 46.53H-232.76L-330.893 239H-361l107.044-345.757h239.294c73.836 0 133.908-58.54 133.908-130.487 0-.257-.005-.509-.01-.756z"></path><path d="M8 9.916L3.542 5.458a.625.625 0 00-.884.884l4.9 4.9c.244.244.64.244.884 0l4.9-4.9a.625.625 0 00-.884-.884L8 9.916z"></path></svg>
                                    </button>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> shop category</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a>
                                        
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <div class="dropdown cart">
                                <!-- Large modal -->
                                <button type="button" class="btn " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-cart-plus"></i></button>   
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box" style="display: none;">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>

    

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:40px">
      <div class="table-responsive">
          <table id="tablaProductos" class="table table-bordered">
            <thead class="table-dark ">
              <tr><th>#</th>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th width="1%"></th>
              <th width="1%"></th>
              <!--<th class="d-none">idProducto</th>
              <th class="d-none">idCliente</th>
              <!--<th width="1%"></th> boton para aumentar-->
            </tr></thead>
            <tbody id="tabla">

            </tbody>
          </table>
        </div>
        <div class="d-grid gap-3 d-md-flex justify-content-md-end  mb-3">
          <label style="font-weight: bold; font-size: 30px; text-align: center;">Total Bs.</label>
          <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;">
          <button class="btn btn-success" type="button" id="completa_venta">Completar compra</button>
        </div>
    </div>
  </div>
</div>
<!--Tu ubicacion-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingrese su ubicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


<!--Template carrito-->
<template id="template-carrito">
  <tr>
    <th scope="row">id</th>
    <td>Café</td>
    <td>Bebida</td>
    <td>1</td>
    <td>2$ individual</td>
    <td>$ <span>500</span></td>
    <td>
      <button class="btn btn-info btn-sm" style="background-color: #fff; border:none"><i class="fa-solid fa-trash-can" style="color:red; font-size:15px"></i></button>
    </td>
    <td>
      <button class="btn btn-info btn-sm" style="background-color: #38b83e; border:none"><i class="fa-solid fa-plus"></i></button>
    </td>
  </tr>
</template>




<script src="https://kit.fontawesome.com/e2c73ec39d.js" crossorigin="anonymous"></script>
<script src="notapedidos.js"></script>