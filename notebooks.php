<?php
if (!empty($_COOKIE)){
	session_start();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/master.css">
    <title>Notebooks</title>
  </head>
  <body>
		<!-- CABEZERA -->
	<header class="cabezera">
		<!-- LOGO --> <!--Agrego el anclaje para que lleve a home-->
		<div class="logo">
			<a href="home.php"><img src="images/Android_O_Preview_Logo.png" alt=""></a>
			<a><i class="fas fa-bars"></i></a>
		</div>
		<!-- MENU DE NAVEGACIO -->
		<nav class="menu">
			<!-- BARRAS DEL MOBILE -->
			<div class="menu_cont">
				<div class = "barras">
					<a href = "#"><i class="fas fa-shopping-cart"></i></a>
				</div>
				<!-- BARRA DE BUSQUEDA -->
				<form class="buscador" action="login.php" method="post">
					<input id="Buscador" type="text" name="buscador" value="" placeholder="¿Que buscas?">
					<a href="#Buscador"><i class="fas fa-search"></i></a>
				</form>
				<!-- Barra de Registro-->
				<div class="login_bar">
					<?php
					if (empty($_SESSION)){
					echo '<a class="log_in" href="registro.php"> Registrarse |</a> <a href="login.php" class="log_in">Login<a> <a href="login.php">	<i class="fas fa-sign-in-alt"></i> </a>'; }
					else {
						if (strlen($_SESSION["avatar"])<26){
							echo '<abbr title=Logout> <a class="log_in" href="destroysession.php">'.'<p>'.$_SESSION["username"].'</p> <p><img src="images/if_user_309035.png" style="border-radius: 50%; width:30px; height:30px;"></p> <p><i class="fas fa-sign-out-alt"></i> </p></a> </abbr>';
							} else {
						 echo '<abbr title=Logout><a class="log_in" href="destroysession.php">'.'<p>'.$_SESSION["username"].'</p> <p><img src=" '.$_SESSION["avatar"].'" style="border-radius: 50%; width:30px; height:30px;"></p> <p><i class="fas fa-sign-out-alt"></i> </p></a></abbr>';
						}
					}
					?>
				</div>
			</div>
		</nav><!-- MENU DE NAVEGACION -->
	</header><!-- CABEZERA -->

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
      <aside class="menu_lateral">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Notebooks</a></li>
            <li><a href="#">Smartphones</a></li>
            <li><a href="#">Componentes</a></li>
          </ul>
      </aside>
    </div>
    <!-- ESTE ES EL PIE DE PAGINA -->
    <footer>
      <div class="pie_pagina">
        <ul>
          <li><a href="#">Trabajá con nosotros</a></li>
          <li><a href="#">Términos y condiciones</a></li>
          <li><a href="#">Políticas de privacidad</a></li>
          <li><a href="preguntas.php">Preguntas frecuentes</a></li>
        </ul>
      </div>
    </footer>
  </body>
</html>
