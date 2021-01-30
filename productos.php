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

        <input name="nombre" type="text" class="buscar">

        <button type="submit" class="bt-buscar"><i class="fas fa-search"></i></button>

        <p class="carrito">4<i class="fas fa-shopping-cart"></i></p>

      </form>

    </div>

    <h2>Productos</h2>

    <div class="contenido-muestra clearfix">

      <ul class="lista-productos">

        <li>
          <img src="img/productos/min/1.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/2.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/3.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/4.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/5.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/6.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/7.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/8.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

        <li>
          <img src="img/productos/min/9.jpg" alt="producto">
          <p class="nombre-p">Nombre Largo 100ml</p>
          <p class="precio-p"><span>$</span>100.00</p>
          <a href="#" class="boton">+ <i class="fas fa-shopping-cart"></i></a>
        </li>

      </ul>

    </div><!-- contenido-muestra clearfix -->

  </div>

  <?php include_once 'includes/templates/footer.php' ?>
  <?php include_once 'includes/templates/librerias.php' ?>

</body>

</html>
