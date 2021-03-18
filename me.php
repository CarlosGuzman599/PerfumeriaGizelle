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
            <a href="log-in.php?cerrar_sesion=true" class="cerrar_sesion bt-ref">Cerrar Sesion</a>
        </div>
    </div>

    <?php
        try{
            include_once 'includes/templates/funciones/db_conexion.php';
            $sql = "SELECT * FROM clientes WHERE id_cliente = ".$_SESSION['id_cliente'].";";
            $datos = $conn->query($sql);
            $cliente= $datos->fetch_assoc();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    ?>

    <div id="formularios-me">

        <div class="contenedor contenedor-formulario"><!-- PERSONAL -->
            <h2>información</h2>

            <div class="formulario">
                <form method="post" class="form-registro" id="form-modificar-cliente">
                    <input type="hidden" name="accion" value="modifica-cliente">

                    <div class="parte">
                        <input type="text" name="nombre" id="nombre" class="no-numeros" placeholder="Nombre" value="<?php echo $cliente['nombre_cliente']; ?>" required>
                        <input type="text" name="apellido" id="apellido" class="no-numeros" placeholder="Apellido" value="<?php echo $cliente['apellido_cliente']; ?>" required>
                        <input type="tel" name="nw-tel" id="nw-tel" class="no-letras" placeholder="Número telefonico" value="<?php echo $cliente['tel_cliente']; ?>"required>
                        <input type="email" name="email" id="email" placeholder="Correo electronico" value="<?php echo $cliente['email_cliente']; ?>"required>
                        <input type="date" name="fecha" id="fechaNa" placeholder="Fecha de nacimiento" value="<?php echo $cliente['fecha_cliente']; ?>"required>
                    </div>
                    <div class="parte">
                        <input type="password" name="old-pass" id="old-pass" placeholder="Contraseña Anterior">
                        <input type="password" name="nw-pass" id="nw-pass" placeholder="Nueva Contraseña">
                        <input type="password" name="cf-pass" id="cf-pass" placeholder="Confirmar Contraseña">
                        <?php
                            if($cliente['notifica_cliente'] === "on"){
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
            <h2>información de envio</h2>

            <div class="formulario">
                <form method="post" class="form-registro" id="form-envio">
                    <input type="hidden" name="accion" value="modificar-direccion">

                    <div class="parte">
                        <input type="text" name="pais" id="pais" class="no-numeros" placeholder="Pais" value="México" value="<?php echo $cliente['dir_pais_cliente']; ?>" required>
                        <input type="text" name="entidad-f" id="entidad-f" class="no-numeros" placeholder="Estado" value="<?php echo $cliente['dir_estado_cliente']; ?>" required>
                        <input type="text" name="ciudad" id="ciudad" class="no-numeros" placeholder="Ciudad/municipio/población" value="<?php echo $cliente['dir_municipio_cliente']; ?>" required>
                        <input type="number" name="cp" id="cp" class="no-letras" placeholder="CP" value="<?php echo $cliente['dir_cp_cliente']; ?>" required>
                    </div>
                    <div class="parte">
                        <input type="text" name="calle" id="calle" placeholder="Calle" value="<?php echo $cliente['dir_calle_cliente']; ?>" required>
                        <input type="text" name="numero-ext" id="numero-ext" placeholder="Numer ext" value="<?php echo $cliente['dir_numext_cliente']; ?>" required>
                        <input type="text" name="numero-int" id="numero-int" placeholder="Numer int*" value="<?php echo $cliente['dir_numint_cliente']; ?>">
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
