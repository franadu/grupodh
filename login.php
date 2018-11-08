
<?php
  session_start();
  require "funciones/funciones.php";
  if (isset($_SESSION["username"])){
    if ($_SESSION["username"]!==""){
      header("location:home.php");
      exit;
    }
  }
  $db=new Mysql();
  if (get_class($db)!=="Json"){
    obligacionMysql();
  }

  if (!empty($_POST)){
    $inicia=Validate::loginValidate($_POST,$db);
    if ($inicia===true){
    //  session_start();
      if (get_class($db)==="Json"){
        Session::recopilaInfoEnSesionJson($_POST);
      } else {
        $username=$_POST["username"];
        obligacionMysql();
        $file = buscarVariablesMysql();
        require "$file";
        $conn=Mysql::connector($dsn,$user,$pass);
        Session::recopilaInfoEnSesionMysql($username,$conn);
      }
      Cookie::cookieCreate($_POST, $_SESSION);
      header("location:home.php");
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require "html/head.php"; ?>
    <title>Login</title>
  </head>
  <body class = login_body>
    <!-- CABEZERA -->
    <?php require "html/header.php"; ?>
    <!-- CABEZERA -->
    <main class="main_login">
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
          </div>

          <div class="dato_interno">
            <i class="fas fa-key"></i>
            <input type="password" name="contra" password="" placeholder="Contraseña">
            <p> <span> <?php echo  (isset($inicia))? $inicia: ""; ?></span> </p>
          </div>
          <div class="boton">
            <button type="submit">Iniciar Sesión</button>

            <a href="registro.php">¿Desea registrarse?</a>
            <input type="checkbox" name="recordarme" <?php echo (isset($recordarme))? "selected":"";?>><a>Recordarme</a>
            <!--<a href=""-->
          </div>
        </div>
      </form>
    </main>
    <?php require "html/footer.php"; ?>
  </body>
</html>
