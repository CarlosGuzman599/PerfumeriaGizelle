<?php 
    try {
      require_once('includes\templates\funciones\db_conexion.php');
      $sql = "SELECT `nombre_producto`, `precio_producto`, `categoria_producto`, `descri_producto`, `img_producto`, `icono_categoria` FROM `productos` INNER JOIN `categoria` ON productos.categoria_producto = categoria.id_categoria;";
      $resultado = $conn->query($sql);
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
?>

<div class="contenido-muestra clearfix">

    <ul class="lista-productos productos">

    <?php while($producto = $resultado->fetch_assoc() ){ ?>

      <li>
        <img src="<?php echo $producto['img_producto'] ?>" alt="producto">
        <p class="nombre-p"><?php echo $producto['nombre_producto'] ?></p>
        <p class="precio-p"><img class="icono-categoria" src="<?php echo $producto['icono_categoria'] ?>" alt=""><span>$</span><?php echo $producto['precio_producto'] ?></p>
        <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
      </li>

    <?php } ?>

    </ul>

</div><!-- contenido-muestra clearfix -->