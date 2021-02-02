<!doctype html>
<html class="no-js" lang="">

<?php include_once 'includes/templates/head.php' ?>

<body>

  <header class="sitio-header">
    <?php include_once 'includes/templates/barra.php' ?>
  </header>

  <div class="productos">

    <div class="barra-buscar clearfix">
      <form action="" class="f-buscar">

        <select name="categoria">
          <option value="value0" selected>Todos</option>
          <option value="value1">Perfume</option>
          <option value="value2">Reloj</option>
          <option value="value3">Fragancia</option>
          <option value="value4">Estuches</option>
        </select>

        <input name="nombre" type="text" class="buscar" placeholder="Buscar" >

        <button type="submit" class="bt-buscar"><i class="fas fa-search"></i></button>

        <p class="carrito">4<i class="fas fa-shopping-cart"></i></p>

      </form>

    </div>

    <h2>Productos</h2>

    <?php include_once 'includes/templates/listado_productos.php' ?>

  </div>

  <?php include_once 'includes/templates/footer.php' ?>
  <?php include_once 'includes/templates/librerias.php' ?>

</body>

</html>
