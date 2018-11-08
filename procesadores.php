<?php
 	require 'funciones/funciones.php';
	session_start();$db=new Mysql();
  if (get_class($db)!=="Json"){
    obligacionMysql();
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <?php require "html/head.php"; ?>
    <title>Procesadores</title>
  </head>
  <body>
		<!-- CABEZERA -->
	<?php require "html/header.php"; ?>
	<!-- CABEZERA -->

    <!-- AUQI EMPIENZA EL CUERPO PIRNCIPAL DE LA PAGINA -->
    <!-- CAJA PRINCIPAL CONTENEDOR -->
  <div class="principal">
      <!-- CAJA QUE CONTIENE LOS ARTICULOS -->
      <h1 id="notebooks">Procesadores</h1>
      <main class="articles">
        <!-- CAJA DE CADA PRODUCTO -->
        <article class="product">
            <img src="images/procesadores/Corei57400.jpg" alt="">
            <!-- CAJA QUE CONTIENE LOS PRECIOS Y EL NOMBRE -->
            <div class="product-inside">
              <h3>$30.000</h3>
              <h4>Laptop Siragon</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/corei38100.jpg" alt="">
            <div class="product-inside">
              <h3>$10.849</h3>
              <h4>Notebook Gadnic 15,6 </h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzen1800x.jpg" alt="">
            <div class="product-inside">
              <h3>$12.638</h3>
              <h4>Notebook Hp 240</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzen52600.jpg" alt="">
            <div class="product-inside">
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/corei58500.jpg" alt="">
            <div class="product-inside">
              <h3>$30.000</h3>
              <h4>Laptop Siragon</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzen52600X.jpg" alt="">
            <div class="product-inside">
              <h3>$10.849</h3>
              <h4>Notebook Gadnic 15,6 </h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/corei58600K.jpg" alt="">
            <div class="product-inside">
              <h3>$12.638</h3>
              <h4>Notebook Hp 240</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzen72700.jpg" alt="">
            <div class="product-inside">
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/corei78700.jpg" alt="">
            <div class="product-inside">
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzen72700.jpg" alt="">
            <div class="product-inside">
              <h3>$12.638</h3>
              <h4>Notebook Hp 240</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/corei78700K.jpg" alt="">
            <div class="product-inside">
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/procesadores/ryzenthreadripper1950X.jpg" alt="">
            <div class="product-inside">
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
      </main>
      <!-- AUI TERMINA LA CAJA CONTENEDORA DE LOS ARTICULOS -->
      <!-- ESTE ES EL MENU LATERAL SOLO VISIBLE EN DESKTOP -->
      <?php require "html/categorias.php"; ?>
    </div>
    <!-- ESTE ES EL PIE DE PAGINA -->
    <footer>
      <?php require "html/footer.php"; ?>
    </footer>
  </body>
</html>
