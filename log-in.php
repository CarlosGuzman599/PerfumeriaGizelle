<!doctype html>
<html class="no-js" lang="">

<?php include_once 'includes/templates/head.php' ?>

<body>

    <header class="sitio-header">
        <?php include_once 'includes/templates/barra.php' ?>
    </header>

    <div class="hero clearfix">

        <div class="contenedor-formulario" id="contenedor-formulario">

            <button class="tipo-sesion" id="btn-inicio">Iniciar sesion</button>
            <button class="tipo-sesion" id="btn-registro">registrarse</button>

            <div class="formulario">
                <div class="frame">
                    <form method="POST" id="form-inicio" >
                        <p class="icono"><i class="fas fa-users"></i></p>
                        <input type="numer" name="tel" id="tel" class="no-letras" placeholder="Número telefonico" required>
                        <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
                        <a href="#">Olvidé mi contraseña</a>
                        <input type="submit" class="btn-login" id="log-in" value="Entrar">
                    </form>

                    <form method="POST" class="form-registro ocultar" id="form-registro">
                        <p class="icono"><i class="fas fa-user-plus"></i></p>

                        <div class="parte">
                            <input type="text" name="nombre" id="nombre" class="no-numeros" placeholder="Nombre" required>
                            <input type="text" name="apellido" id="apellido" class="no-numeros" placeholder="Apellido" required>
                            <input type="tel" name="nw-tel" id="nw-tel" class="no-letras" placeholder="Número telefonico" required>
                            <input type="email" name="email" id="email" placeholder="Correo electronico" required>
                            <input type="date" name="fecha" id="fechaNa" placeholder="Fecha de nacimiento" required>
                        </div>
                        <div class="parte">
                            <input type="password" name="nw-pass" id="nw-pass" placeholder="Contraseña" required>
                            <input type="password" name="cf-pass" id="cf-pass" placeholder="Confirmar Contraseña" required>
                            <p>Notificar ofertas</p><input type="checkbox" name="newsletter" id="newsletter">
                        </div>

                        <input type="submit" id="sing-in" class="btn-login" value="Registrarse">
                    </form>
                </div>
            </div>

        </div>

    </div>

  <?php include_once 'includes/templates/footer.php' ?>
  <?php include_once 'includes/templates/librerias.php'?>

</body>

</html>
