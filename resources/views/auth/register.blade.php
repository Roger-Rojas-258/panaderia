@extends('layouts.plantillaCliente')

  @section('titulo')
    Registrarse
  @endsection

  @section('contenido')
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">¡Bienvenido!!</h1>
              <p class="text-lead text-light">Registrate para poner iniciar sesión</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">

            {{-- <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Registrarte con</small></div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mr-4">
                  <span class="btn-inner--icon"><img src="{{asset('/assets/assets/img/icons/common/github.svg')}}"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('/assets/assets/img/icons/common/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> --}}
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small class="">Regístrate con credenciales</small>
              </div>

              <form role="form" action="{{route('register')}}" method="post">
                @csrf

                {{-- <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input class="form-control" placeholder="Carnet identidad" type="number" name="ci">
                </div>
                </div> --}}

                    <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nombre" type="text" name="nombre" required>
                    </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-users"></i></span>
                          </div>
                          <input class="form-control" placeholder="Apellido paterno" type="text" name="paterno" required>
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                            </div>
                            <input class="form-control" placeholder="Apellido materno" type="text" name="materno">
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                              </div>
                              <input class="form-control" placeholder="Celular" type="number" name="telefono">
                      </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control" placeholder="Fecha de nacimiento" type="date" name="fechaNacimiento">
                        </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-mars"></i></span>
                              </div>
                              <select name="sexo" id="" class="form-control form-control-alternative">
                                
                                <option value="N" class="form-control" selected>Sexo</option>
                                <option value="M" class="form-control">Masculino</option>
                                <option value="F" class="form-control">Femenino</option>
                                <option value="N" class="form-control">Otro</option>
                              </select>
                        </div>
                        </div>

                    <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control" placeholder="Usuario" type="text" name="usuario" required>
                    </div>
                    </div>
                    
                    {{-- <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Correo" type="email" name="email">
                    </div>
                    </div> --}}

                    <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" type="password">
                        </div>
                    </div>

                    <div class="text-muted font-italic"><small>seguridad de la contraseña: <span class="text-success font-weight-700">HASH</span></small></div>
                    <div class="row my-4">
                    <div class="col-12">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                        <label class="custom-control-label" for="customCheckRegister">
                            <span class="text-muted">Estoy de acuerdo con el <a href="#!">política de privacidad</a></span>
                        </label>
                        </div>
                    </div>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Crear cuenta</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection
  