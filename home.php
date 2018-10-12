
<?php

require "funciones/funciones.php";
if (isset($_COOKIE["username"])){
	session_start();
} else {
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="shortcut icon" href="./images/Android_O_Preview_Logo.png">
		<link rel="stylesheet" href="./css/master.css">
		<title>Tu Nueva Empresa</title>
	</head>
	<body class="cuerpohome">
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
						echo '<a class="log_in" href="registro.php"> Registrarse |</a> <a href="login.php" class="log_in">Login<a> <a href="login.php">	<i class="fas fa-sign-in-alt"></i> </a>'; } else {
						echo '<a class="log_in" href="destroysession.php">'.'<p>'.$_SESSION["username"].'</p> <p><img src=" '.$_SESSION["avatar"].'" style="border-radius: 50%; width:30px; height:30px;"></p> <p><i class="fas fa-sign-out-alt"></i> </p></a>';
						}
						?>
					</div>
				</div>
			</nav><!-- MENU DE NAVEGACION -->
		</header><!-- CABEZERA -->

		<!-- .............ESTE ES EL BANNER................ -->
		<img class="principal_image" src="images/Intel-Core-X-i5-i7-i9.jpg" alt="banner_principal">

		<main>
			<h1 class="h1_home">Ofertas Para ti</h1>
			<!-- ......CONTAINER DEL HOME......... -->
			<div	 class="container_home">
				<!-- .......CONTAINER DE LOS PRODUCTOS.... -->
				<div class="containerHomeProducts">

					<section class="home_products">

						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>
					</section>

					<h2 class="home_titles">Lo mas destacado</h2>

					<section class="home_products">
						<article class="home_offers">

							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

						<article class="home_offers">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

						<article class="home_offers">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>

					</section>

					<h2 class="home_titles">Placas de Videos</h2>

					<section class="home_products">
						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>
						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>
						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>
						<article class="home_article">
							<img src="images/placaVideo/msi-radeon-rx-580-armor8gb.webp" alt="">
							<div class="home_product_inside">
	              <h3>$10.999</h3>
	              <h4>Notebook Asus Vivobook</h4>
	            </div>
						</article>
					</section>

				</div>

				<!-- .......CATEGORIAS........ -->
				<nav class="home_categories">
						<ul>
	            <li><a href="home.php">Home</a></li>
	            <li><a href="notebooks.php">Notebooks</a></li>
	            <li><a href="procesadores.php">Procesadores</a></li>
	            <li><a href="#">Placas de Video</a></li>
							<li><a href="#">Placas Madre</a></li>
	          </ul>
				</nav>

			</div>
		</main>



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
