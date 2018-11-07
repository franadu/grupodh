
<?php

 require "funciones/funciones.php";
 obligacionMysql();
 	session_start();
  if(!empty($_COOKIE["username"])){
    cookieComprobate($_COOKIE);
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php require "html/head.php"; ?>
		<title>Tu Nueva Empresa</title>
	</head>
	<body class="cuerpohome">
			<!-- CABEZERA -->
		<?php require "html/header.php"; ?>
    <!-- CABEZERA -->

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
				<?php require "html/categorias.php"; ?>

			</div>
		</main>
		<?php require "html/footer.php"; ?>
	</body>
</html>
