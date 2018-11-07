<?php
  require 'Db.php';

    class Json extends Db{

    public function guardarUsuario($usuario, $imagen)
    {
        $archivo= self::connector();
        $usuario->setPassword(password_hash($usuario->getPassword(),PASSWORD_DEFAULT));
        $archivo = json_decode($archivo, True);
        /*TODO la imagen se guarda en una carpeta especial para cada usuario... lo que uno necesita es la direccion de la imagen, por ende, el crear la o guardarla de aca y la llevaría a otro lugar (funcion) que si el usuario lleva una imagen la guarde sino le de una imagen por defecto.

        Esto genera poder sacar el parametro imagen del json por que el usuario ya va a tener esa direccion, asi se puede sacar el parametro imagen de todas las bases de datos (en mysql yo la paso vacía a la imagen)*/
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
      if (!is_dir("usuarios/")){
        mkdir("usuarios/",0777,true);
      }
      if (!file_exists("usuarios/json.json")){
        /*no Existe entonces lo creo*/

      $archivo=fopen("usuarios/json.json","w+");
      fclose($archivo);
      }
      $archivo="usuarios/json.json";
      return $archivo;
    }

    public static function connector(){
      $dir = "../usuarios/";
      if(is_dir($dir)){
        $archivo = "../usuarios/json.json";
       }else{
        $dir = "usuarios/";
        if (is_dir($dir)){
          $archivo = "usuarios/json.json";
        } else {
          $archivo=self::JsonCreate();
        }
      }
      return file_get_contents($archivo);
    }

    public static function objectToArray($usuario){
      $usu = [
        "nombre" => $usuario->getName(),
        "apellido" => $usuario->getLast_Name(),
        "mail" => $usuario->getMail(),
        "username" => $usuario->getUsername(),
        "tel" => $usuario->getPhone(),
        "contra" => $usuario->getPassword(),
        "avatar" => $usuario->getAvatar(),
      ];
      return $usu;
    }

  }


 ?>
