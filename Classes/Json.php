<?php
  require 'Db.php';

    class Json extends Db{

    public function guardarUsuario($usuario, $imagen)
    {
        self::JsonCreate();
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
      	$target_file=$target_dir.basename($imagen["avatar"]["name"]);
      	move_uploaded_file($imagen["avatar"]["tmp_name"],$target_file);
      	/*Copio la info en datos*/
      	$usuario->setAvatar($target_file);
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

    public static function connector(){
       return file_get_contents("usuarios/json.json");
    }

    public static function JsonCreate(){
      if (!file_exists("usuarios/json.json")){
        /*no Existe entonces lo creo*/
      $archivo=fopen("usuarios/json.json","w+");
      fclose($archivo);
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
