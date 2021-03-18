<?php 

  $base = "SELECT `nombre_producto`, `precio_producto`, `categoria_producto`, `descri_producto`, `img_producto`, `icono_categoria` FROM `productos` INNER JOIN `categoria` ON productos.categoria_producto = categoria.id_categoria";

  if($_GET['tipo'] == 'todo'){
    $sql = $base;
  }elseif($_GET['tipo'] == 'fragancia'){
    $sql = $base." WHERE `categoria_producto` LIKE '5'";
  }elseif($_GET['tipo'] == 'reloj'){
    $sql = $base." WHERE `categoria_producto` LIKE '1'";
  }elseif($_GET['tipo'] == 'set'){
    $sql = $base." WHERE `categoria_producto` LIKE '4'";
  }elseif($_GET['tipo'] == 'perfume'){
    $sql = $base." WHERE `categoria_producto` LIKE '3'";
  }else if($_GET['tipo'] == 'bs'){
    $sql = $base." WHERE `nombre_producto` LIKE "."'%".$_GET['bs']."%'";
    if(!$_GET['catego'] == '0'){
      $sql = $sql." AND `categoria_producto` LIKE '".$_GET['catego']."'";
    }
  }

  try {
    include_once('db_conexion.php');
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
  
?>

<div id="contenido-muestra" class="contenido-muestra clearfix">

  <ul class="lista-productos productos">

    <?php while($producto = $resultado->fetch_assoc()){ ?>

      <li>
        <img class="img-producto" src="<?php echo $producto['img_producto'] ?>" alt="producto">
        <p class="nombre-p"><?php echo $producto['nombre_producto'] ?></p>
        <p class="precio-p"><img class="icono-categoria" src="<?php echo $producto['icono_categoria'] ?>" alt=""><span>$</span><?php echo $producto['precio_producto'] ?></p>
        <a href="#" class="boton">+<i class="fas fa-shopping-cart"></i></a>
      </li>

    <?php } 
    
      $conn->close();

    ?>

  </ul>

</div><!-- contenido-muestra clearfix -->