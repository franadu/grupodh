<!DOCTYPE html>
<?php require "funciones/funciones.php";

 if (!empty($_POST)){
  $error=validacionRegistro($_POST);

  if (!empty($_FILES)){/*!Esta vacio Files => !True => False*/
    $error["size"]=validacionImagen($_FILES);
    if ($error["size"]==NULL){unset($error["size"]);}
  }
  $nombre=$_POST["nombre"];
  $apellido=$_POST["apellido"];
  $mail=$_POST["mail"];
  $user=$_POST["username"];
  $tel=$_POST["tel"];
  if (isset($_POST["recordarme"])){
    $recordarme=$_POST["recordarme"];
  }
  if (!$error){/*! es verdadero $error => !no => si*/
    registrarUsuario($_POST,$_FILES);
    header("location:login.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <!-- CABEZERA -->
    <header class="cabezera">
      <?php ?>
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
					<form class="buscador" action="" method="post">
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


    <main class="Registros">
      <form class="caja_formulario" action="" method="post" enctype="multipart/form-data">
        <div class="datos">
          <nav class="registrarse">
              <a>Registrarse</a>
          </nav>
          <div class="dato_interno">
            <i class="fas fa-address-card"></i>
            <input type="text" name="nombre" value="<?php echo (!empty($nombre))? $nombre : "" ;  ?>" placeholder="Nombre">
            <p> <span> <?php echo  (isset($error["nombre"]))? $error["nombre"]: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-address-card"></i>
            <input type="text" name="apellido" value="<?php echo (!empty($apellido))? $apellido : "" ;  ?>" placeholder="Apellido">
            <p> <span> <?php echo  (isset($error["apellido"]))? $error["apellido"]: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-at"></i>
            <input type="mail" name="mail" value="<?php echo (!empty($mail))? $mail : "" ;  ?>" placeholder="Email">
            <p> <span> <?php echo  (isset($error["mail"]))? $error["mail"]: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-user-alt"></i>
            <input type="text" name="username" value="<?php echo (!empty($user))? $user : "" ;  ?>" placeholder="Nombre de Usuario"><br>
            <p> <span> <?php echo  (isset($error["username"]))? $error["username"]: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-phone-square"></i>
            <input type="tel" name="tel" value="<?php echo (!empty($tel))? $tel : "" ;  ?>"  placeholder="Telefono">
          </div>
          <div class="dato_interno">
            <i class="fas fa-images"></i>
            <input type="file" name="avatar">
            <p> <span> <?php echo  (isset($error["size"]))? $error["size"]: ""; ?> </span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-lock"></i>
            <input type="password" name="contra" placeholder="Contraseña">
            <p> <span> <?php echo  (isset($error["contra"]))? $error["contra"]: ""; ?></span> </p>
          </div>
          <div class="dato_interno">
            <i class="fas fa-lock-open"></i>
            <input type="password" name="conficontra" placeholder="Confirmar contraseña">
            <p> <span> <?php echo (isset($error["conficontra"]))? $error["conficontra"]: ""; ?></span> </p>
          </div>
          <div class="dato_terminos">
            <div class="caja-subdivisoria">
              <input type="checkbox" name="terminos"><a>Accepta Terminos y Condiciones</a>
              <input type="checkbox" name="recordarme" <?php echo (isset($recordarme))? "selected":"";?>><a>Recordarme</a>
            </div>
            <p> <span> <?php echo (isset($error["terminos"]))? $error["terminos"]: ""; ?></span> </p>
          </div>

          <button type="submit" >Registrarse</button>
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
