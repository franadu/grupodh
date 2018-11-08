<?php
  require 'Db.php';

    class Json extends Db{

    public function guardarUsuario($usuario)
    {
        $archivo= self::connector();
        $usuario->setPassword(password_hash($usuario->getPassword(),PASSWORD_DEFAULT));
        $archivo = json_decode($archivo, True);
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
