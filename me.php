<?php include_once 'includes/templates/funciones/sesion.php' ?>
<!doctype html>
<html class="no-js" lang="">

<?php include_once 'includes/templates/head.php' ?>

<body>

    <header class="sitio-header">
        <?php include_once 'includes/templates/barra.php' ?>
    </header>

    <div class="contenedor">
        <div class="barra-me">
            <p><?php echo $_SESSION['nombre_cliente'] ?></p>
            <a href="log-in.php?cerrar_sesion=true" class="cerrar_sesion bt-ref">Cerrar Sesion</a>
        </div>
    </div>

    <?php
        try{
            include_once 'includes/templates/funciones/db_conexion.php';
            $sql = "SELECT * FROM clientes WHERE id_cliente = ".$_SESSION['id_cliente'].";";
            $datos = $conn->query($sql);
            $usuario= $datos->fetch_assoc();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    ?>

    <div id="formularios-me">

        <div class="contenedor contenedor-formulario"><!-- PERSONAL -->
            <h2>informacion</h2>

            <div class="formulario">
                <form method="post" class="form-registro" id="form-modificar">
                    <input type="hidden" name="accion" value="modificar">

                    <div class="parte">
                        <input type="text" name="nombre" id="nombre" class="no-numeros" placeholder="Nombre" value="<?php echo $usuario['nombre_cliente']; ?>" required>
                        <input type="text" name="apellido" id="apellido" class="no-numeros" placeholder="Apellido" value="<?php echo $usuario['apellido_cliente']; ?>" required>
                        <input type="tel" name="nw-tel" id="nw-tel" class="no-letras" placeholder="Número telefonico" value="<?php echo $usuario['tel_cliente']; ?>"required>
                        <input type="email" name="email" id="email" placeholder="Correo electronico" value="<?php echo $usuario['email_cliente']; ?>"required>
                        <input type="date" name="fecha" id="fechaNa" placeholder="Fecha de nacimiento" value="<?php echo $usuario['fecha_cliente']; ?>"required>
                    </div>
                    <div class="parte">
                        <input type="password" name="nw-pass" id="nw-pass" placeholder="Contraseña">
                        <input type="password" name="cf-pass" id="cf-pass" placeholder="Confirmar Contraseña">
                        <?php
                            if($usuario['notifica_cliente'] === "on"){
                                ?><p>Notificar ofertas</p><input type="checkbox" name="newsletter" id="newsletter" checked><?php
                            }else{
                                ?><p>Notificar ofertas</p><input type="checkbox" name="newsletter" id="newsletter"><?php
                            }
                        ?>
                    </div>

                    <input type="submit" class="btn-login" value="Guardar Cambios">
                </form>
            </div>
        </div><!-- FIN PERSONAL -->

        <div class="contenedor contenedor-formulario"><!-- DATOS ENVIO -->
            <h2>informacion de envio</h2>

            <div class="formulario">
                <form method="post" class="form-registro" id="form-envio">
                    <input type="hidden" name="accion" value="modificar">

                    <div class="parte">
                        <input type="text" name="pais" id="pais" class="no-numeros" placeholder="Pais" value="México">
                        <input type="text" name="entidad-f" id="entidad-f" class="no-numeros" placeholder="Estado" required>
                        <input type="text" name="ciudad" id="ciudad" class="no-numeros" placeholder="Ciudad/municipio/población" required>
                        <input type="number" name="cp" id="cp" class="no-letras" placeholder="CP">
                    </div>
                    <div class="parte">
                        <input type="text" name="calle" id="calle" class="no-numeros" placeholder="Calle" required>
                        <input type="text" name="numero-ext" id="numero-ext" placeholder="Numer ext" required>
                        <input type="text" name="numero-int" id="numero-int" placeholder="Numer int*" required>
                    </div>
                    <input type="submit" class="btn-login" value="Guardar Cambios">
                </form>
            </div>
        </div><!-- FIN DATOS ENVIO -->

        <div class="compras contenedor contenedor-formulario"><!-- COMPRAS -->
            <h2>compras</h2>

            <div class="bnts-compras">
                <button class="tipo-sesion" id="btn-inicio"  style="color: white;">Carrito</button>
                <button class="tipo-sesion" id="btn-registro">Este mes</button>
                <button class="tipo-sesion" id="btn-registro">Todas</button>
            </div>

            <div class="formulario">

            </div>
            
        </div><!-- COMPRAS -->

    </div>

    <?php include_once 'includes/templates/footer.php' ?>
    <?php include_once 'includes/templates/librerias.php' ?>

</body>

</html>
