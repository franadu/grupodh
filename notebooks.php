<?php
	require 'funciones/funciones.php';
	session_start();
	$db=new Mysql();
	if (get_class($db)!=="Json"){
		obligacionMysql();
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <?php require "html/head.php"; ?>
    <title>Notebooks</title>
  </head>
  <body>
		<!-- CABEZERA -->
	<?php require "html/header.php"; ?>
	<!-- CABEZERA -->

    <!-- AUQI EMPIENZA EL CUERPO PIRNCIPAL DE LA PAGINA -->
    <!-- CAJA PRINCIPAL CONTENEDOR -->
  <div class="principal">
      <!-- CAJA QUE CONTIENE LOS ARTICULOS -->
      <h1 id="notebooks">Notebooks</h1>
      <main class="articles">
        <!-- CAJA DE CADA PRODUCTO -->
        <article class="product">
            <img src="images/prueba_laptop.jpg" alt="">
            <!-- CAJA QUE CONTIENE LOS PRECIOS Y EL NOMBRE -->
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$30.000</h3>
              <h4>Laptop Siragon</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook2.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$10.849</h3>
              <h4>Notebook Gadnic 15,6 </h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook3.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$12.638</h3>
              <h4>Notebook Hp 240</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook4.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/prueba_laptop.jpg" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$30.000</h3>
              <h4>Laptop Siragon</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook2.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$10.849</h3>
              <h4>Notebook Gadnic 15,6 </h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook3.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$12.638</h3>
              <h4>Notebook Hp 240</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook4.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
              <h3>$10.999</h3>
              <h4>Notebook Asus Vivobook</h4>
            </div>
        </article>
        <article class="product">
            <img src="images/notebook4.webp" alt="">
            <div class="product-inside">
							<div class="fav-add">
								<i class="fas fa-heart"></i>
								<i class="fas fa-cart-plus"></i>
							</div>
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
    <?php require "html/footer.php"; ?>
  </body>
</html>
