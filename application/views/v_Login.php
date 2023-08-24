<!doctype html>
<html lang="en">

<head>
  <title>Login-Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/Login/css/style.css'); ?>">
</head>

<body>
  <div id="stars"></div>
  <div id="stars2"></div>
  <div id="stars3"></div>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Ingresar </span><span>Registrarse</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <!--Seccion de Inicio de Sesion-->
                    <form action="<?php echo site_url('Login/login'); ?>" method="post">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Ingresar</h4>
                        <div class="form-group">
                          <input type="email" class="form-style" name="email" placeholder="Email">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" name="password" placeholder="Password">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4">Ingresar</button>
                        <?php if (isset($login_error)): ?>
                          <p class="error-message">
                            <?php echo $login_error; ?>
                          </p>
                        <?php endif; ?>
                    </form>
                    <p class="mb-0 mt-4 text-center"><a href="" class="link">Olvidaste tu contraseña?</a></p>
                  </div>
                </div>
              </div>
              <!--Fin de Inicio de Sesion-->
              <!-- Inicio de Registro de Usuarios -->
              <div class="card-back">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-3 pb-3">Registrarse</h4>
                    <form action="<?php echo site_url('login/newregistro'); ?>" method="post">
                      <div class="form-group">
                        <input type="text" class="form-style" name="nombre" id="nombre" required placeholder="Nombre">
                        <i class="input-icon uil uil-user"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="text" class="form-style" name="apellido" id="apellido" required
                          placeholder="Apellido">
                        <i class="input-icon uil uil-user"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="email" class="form-style" name="email" id="email" required autocomplete="email"
                          placeholder="Email">
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" class="form-style" onfocusout="cifrarpass();" name="password"
                          id="password" required placeholder="Contraseña">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <div class="form-group mt-2">
                        <select class="form-select" name="estado" id="estado" required>
                          <option value="">Seleccione estado</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                      <div class="form-group mt-2">
                        <select class="form-select" name="rol" id="rol" required>
                          <option value="0">Seleccione un rol</option>
                          <option value="1">Administrador</option>
                          <option value="2">Normal</option>
                          <option value="3">Editor</option>
                          <option value="4">Invitado</option>
                          <option value="5">Moderador</option>
                        </select>
                      </div>
                      <button class="btn btn-primary mt-2" type="submit" class="btn mt-4">Register</button>
                      <!-- Agrega un contenedor para mostrar mensajes de éxito -->
                      <div>
                        <?php if (isset($registration_success)): ?>
                          <?php echo $registration_success; ?>
                        <?php endif; ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    //cifrar la contraseña

    function cifrarpass() {
      var password = $("#password").val();
      var codificada = btoa(password);
      console.log(codificada);
      $("#password").val(codificada);
      console.log("Finalice");
    } 
  </script>
</body>

</html>