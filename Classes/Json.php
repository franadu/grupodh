<?php
  require 'Db.php';

    class Json extends Db{

    public function guardarUsuario($usuario, $imagen)
    {
        $archivo= self::connector();
        $usuario->setContra(password_hash($usuario->getContra(),PASSWORD_DEFAULT));
        $archivo = json_decode($archivo, True);

        $ultimoID=(count($archivo["usuario"]));
        $target_dir = "assets/uploads/usuarios/$ultimoID/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
            $archivo["usuario"][] = $usuario;
        }
      	/*Si sube imagen ya se setea la foto en el avatar*/
        $array = $imagen["avatar"];
        if($array["name"] != ""){
        	$target_file=$target_dir.basename($imagen["avatar"]["name"]);
        	move_uploaded_file($imagen["avatar"]["tmp_name"],$target_file);
        	/*Copio la info en datos*/
        	$usuario->setAvatar($target_file);
        }else {
          $usuario->setAvatar("images/if_user_309035.png");
        }


      	$json=$archivo;
    // Convierto el Objeto en Array Asociativo
        $usu = self::objectToArray($usuario);
  	/*Creo el nuevo usuario*/
      	$json["usuario"][] = $usu;
      	/*Transformo el usuario en string*/
      	$subir=json_encode($json,true);
      	/*Guardo la info en el archivo correspondiente*/
      	$archivo="usuarios/json.json";
        file_put_contents($archivo,$subir);
    }

    public static function JsonCreate(){
      if (!file_exists("usuarios/json.json")){
        /*no Existe entonces lo creo*/
      $archivo=fopen("usuarios/json.json","w+");
      fclose($archivo);
      }
    }

    public static function connector(){
      $archivo = "usuarios/json.json";
      if(is_dir($archivo)){
        return file_get_contents($archivo);
      }else{
        self::JsonCreate();
        return file_get_contents($archivo);
      }
    }

    public static function objectToArray($usuario){
      $usu = [
        "nombre" => $usuario->getNombre(),
        "apellido" => $usuario->getApellido(),
        "mail" => $usuario->getMail(),
        "username" => $usuario->getUsername(),
        "tel" => $usuario->getTel(),
        "contra" => $usuario->getContra(),
        "avatar" => $usuario->getAvatar(),
      ];
      return $usu;
    }

  }


 ?>
