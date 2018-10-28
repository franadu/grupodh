<!DOCTYPE html>
<?php
  require "funciones/funciones.php";
  require "Classes/Validate.php";
  if (isset($_COOKIE["username"])){
    echo "hola";
    if ($_COOKIE["username"]!==""){
      var_dump($_COOKIE);
      var_dump($_SESSION);
      header("location:home.php");
      exit;
    }
  }

  if (!empty($_POST)){
    $inicia=Validate::loginValidate($_POST);
    if ($inicia===true){
      session_start();
      setcookie("username",$_POST["username"],time()+(60*60));
      recopilaInfoEnSesion($_POST);
      header("location:home.php");
      exit;
    }
  }
?>
<html lang="en" dir="ltr">
  <head>
    <?php require "head.php"; ?>
    <title>Login</title>
  </head>
  <body class = login_body>
    <!-- CABEZERA -->
    <?php require "header.php"; ?>
    <!-- CABEZERA -->
    <main>
      <form class="caja_formulario" action="" method="post">

        <div class="datos">
          <nav class="iniciar">
            <h1>Iniciar Seción</h1>
          </nav>
          <div class="dato_interno">
            <i class="fas fa-address-card"></i>
            <input type="text" name="username" value="<?php
              if (isset($_COOKIE["username"]) && $_COOKIE["username"] != ""){
                echo $_COOKIE["username"];
              }  ?>" placeholder="Nombre de Usuario">
            <p> <span> <?php echo  (isset($inicia))? $inicia: ""; ?></span> </p>
            <?php
            var_dump($_COOKIE); ?>
          </div>

          <div class="dato_interno">
            <i class="fas fa-key"></i>
            <input type="password" name="contra" password="" placeholder="Contraseña">
            <p> <span> <?php echo  (isset($inicia))? $inicia: ""; ?></span> </p>
          </div>
          <div class="boton">
            <button type="submit">Iniciar Seción</button>
            <a href="registro.php">¿Desea registrarse?</a>
            <!--<a href=""-->
          </div>
        </div>
      </form>
    </main>
    <?php require "footer.php"; ?>
  </body>
</html>
