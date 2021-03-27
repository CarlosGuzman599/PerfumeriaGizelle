<!doctype html>
<html class="no-js" lang="">


<?php include_once 'includes/templates/head.php';?>
<?php session_start(); ?>

<body>

  <header class="sitio-header">
    <?php include_once 'includes/templates/barra.php' ?>
  </header>

  <div class="productos">

    <div class="barra-buscar clearfix">
      <div class="f-buscar">

        <select name="categoria" id="sl-categoria">
          <option value="0" selected>TODO</option>
          <?php include_once 'includes/templates/categorias.php' ?>
        </select>

        <input id="txt-buscar" type="text" class="buscar" placeholder="Buscar" >

        <button type="button" id="btn-buscar" class="bt-buscar"><i class="fas fa-search"></i></button>
        <script src="js/buscar.js" ></script>

        <a href="carrito.php" class="carrito">

          <span id="total_items"> 
            <?php
              if(isset($_SESSION['total_items'])){
                echo $_SESSION['total_items'];
              }else{
                echo "0";
              }
            ?> 
          </span>
          <i class="fas fa-shopping-cart"></i>

        </a>

      </div>

    </div>

    <h2>Productos</h2>

    <div id="productos-mostrar">

      <?php include_once 'includes/templates/funciones/listado_productos.php' ?>

    </div><!-- div id="productos-mostrar" -->

  </div>

  <?php include_once 'includes/templates/footer.php' ?>
  <?php include_once 'includes/templates/librerias.php' ?>

</body>

</html>
