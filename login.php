<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/web.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title></title>
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
						<a class="log_in" href="registro.php"> Registrarse|</a>
						<a href="login.php" class="log_in">Login<a>
						<a href="login.php">	<i class="fas fa-sign-in-alt"></i> </a>
					</div>
				</div>
			</nav><!-- MENU DE NAVEGACION -->
    </header><!-- CABEZERA -->
    <main>
      <form class="caja_formulario" action="index.php" method="post">

        <div class="datos">
          <nav class="iniciar">
            <a>Iniciar Seción</a>
          </nav>
          <div class="dato_interno">
            <i class="fas fa-address-card"></i>
            <input type="text" name="" value="" placeholder="Nombre">
          </div>
          <div class="dato_interno">
            <i class="fas fa-at"></i>
            <input type="mail" name="" mail="" placeholder="Email">
          </div>
          <div class="dato_interno">
            <i class="fas fa-key"></i>
            <input type="password" name="" password="" placeholder="Password">
          </div>
          <div class="boton">
            <button type="button" name="button">Iniciar Seción</button>
            <button type="reset" name="button">Borrar todo</button>
            <a href="registro.php">¿Desea registrarse?</a>
          </div>
        </div>
      </form>
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
