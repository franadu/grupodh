<!DOCTYPE html>
<?php
  require "funciones/funciones.php";
  if (!empty($_POST)){
    $error=validacionLogin($_POST);
    if ($error===true){
      recopilaInfoDeCookies($_POST);
      session_start();
      header("location:home.php");
      exit;
    }
  }
?>
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
      <?php

    ?>
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
      <form class="caja_formulario" action="" method="post">

        <div class="datos">
          <nav class="iniciar">
            <a>Iniciar Seción</a>
          </nav>
          <div class="dato_interno">
            <i class="fas fa-address-card"></i>
            <input type="text" name="username" value="<?php if (isset($_POST["username"])){echo $_POST["username"];} ?>" placeholder="Nombre de Usuario">
            <p> <span> <?php echo  (isset($error))? $error: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-key"></i>
            <input type="password" name="contra" password="" placeholder="Contraseña">
            <p> <span> <?php echo  (isset($error))? $error: ""; ?></span> </p>
          </div>
          <div class="boton">
            <button type="submit">Iniciar Seción</button>
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
