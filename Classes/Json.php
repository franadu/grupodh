<?php
  require 'Db.php';

    class Json extends Db{

    public static function connector(){
       return file_get_contents("usuarios/json.json");
    }


    public function guardarUsuario($usuario, $imagen)
    {
        $archivo= file_get_contents("usuarios/json.json");

        $usuario->setContra(password_hash($usuario->getContra(),PASSWORD_DEFAULT));


        if ($archivo!==""){
      		$guardados=json_decode($archivo,true);
      		for ( $i=0; $i <count($guardados["usuario"]) ; $i++) {
      			if ($usuario->getUsername()===$guardados["usuario"][$i]["username"]){
      				$target_dir="usuarios/uploads/$i/";
      			}
      		}
      	} else {
      		$i=0;
      	}

        /*Si no esta seteada direccion porque no hubo un usuario con el nombre*/
      	if (!isset($target_dir)){
      		/*Genero la direccion*/
      		$target_dir="usuarios/uploads/$i/";
      	}
      	/*Si la direccion no existe*/
      	if(!is_dir($target_dir)){
      		/*Hago la direccion*/
      		mkdir($target_dir,0777,true);
          $guardados["usuario"][] = $usuario;
      	}
      	/*Si sube imagen ya se setea la foto en el avatar*/
      	$target_file=$target_dir.basename($imagen["avatar"]["name"]);
      	move_uploaded_file($imagen["avatar"]["tmp_name"],$target_file);


      	/*Copio la info en datos*/
      	$usuario->setAvatar($target_file);


      	/**/
      	
      	$json=$guardados;

      	/*Creo el nuevo usuario*/
      	$json["usuario"][] = $usuario;
        echo "<pre>";
        var_dump($json);
        echo "</pre>";
        echo "<pre>";
        var_dump((array) $usuario );
        echo "</pre>";

      	/*Transformo el usuario en string*/
      	$subir=json_encode($json,true);

        echo "<pre>";
        var_dump($subir);
        echo "</pre>";
        exit;

      	/*Guardo la info en el archivo correspondiente*/
      	$archivo="usuarios/json.json";
        file_put_contents($archivo,$json);
    }

  }


 ?>
