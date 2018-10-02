<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css
		/bootstrap.min.css" rel="stylesheet">
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
						<a class="log_in" href="registro.php"> Registrarse|</a>
						<a href="login.php" class="log_in">Login<a>
						<a href="login.php">	<i class="fas fa-sign-in-alt"></i> </a>
					</div>
				</div>
			</nav><!-- MENU DE NAVEGACION -->
		</header><!-- CABEZERA -->
		<main class="Home">
			<h1>Mis Productos</h1>
			<div class="propaganda-categorias">
				<section class="Propaganda"><!--Carretel para propagandas propias o Externas-->
					<h3>Descuentos Rebajas!!!</h3>
					<article class="p1">
						<h4>Descuento</h4>
						<img src="./images/conjunto_electrodomesticos.jpg" alt="">
						<p>Nombre propaganda</p>
					</article>
					<article class="p2">
						<h4>Descuento</h4>
						<img src="./images/notebook4.webp" alt="">
						<p>nombre propaganda</p>

					</article>
					<article class="p3">
						<h4>Descuento</h4>
						<img src="./images/Cubiertas.jpg" alt="">
						<p>Nombre propaganda</p>
					</article>
				</section>
				<section class="Categorias"><!--Todos los articulos disponibles del comercio-->
					<h3> <a href="notebooks.php"> Notebooks</a></h3>
					<article class="Cat1" id="Cat1">
						<div class="Articulo">
							<img src="./images/notebook4.webp" alt="">
							<p>Articulo 1</p>
						</div>
						<div class="Articulo">
							<img src="./images/notebook4.webp" alt="">
							<p>Articulo 2</p>
						</div>
					</article>
					<h3> <a href="#"> Parlantes, Equipos de Audio</a></h3>
					<article class="Cat2" id="Cat2">
						<div class="Articulo">
							<img src="./images/Parlantes.jpeg" alt="">
							<p>Articulo 1</p>
						</div>
						<div class="Articulo">
							<img src="./images/equipos-de-sonido.jpeg" alt="">
							<p>Articulo 2</p>
						</div>
					</article>
					<h3> <a href="#"> Otra Categoria</a></h3>
					<article class="Cat3" id="Cat3">

						<p>Articulo 3</p>
					</article>
				</section>
			</div>
			<section class="navcategorias"><!--Navegador por categorias de Productos-->
				<h3>Categorias</h3>
				<ul>
					<li> <a href="#Propaganda">Propagandas</a> </li>
					<li> <a href="#Cat1">Notebooks</a> </li>
					<li> <a href="#Cat2">Parlantes, Equipos de Audio</a> </li>
					<li> <a href="#Cat3">Categoria de Productos 3</a> </li>
				</ul>
			</section>
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
