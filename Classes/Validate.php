  <?php

  class Validate{

    public static function PasswordConfirm(User $user, $data){
      $pass1 = $user->getPassword();
      $pass2 = $data['conficontra'];

      return $pass1 == $pass2;
    }

    public static function ValidarSiExiste($db, $username, $email)
    {
      if(get_class($db)==="Json"){
        $datos = json_decode($db::connector(), True);
        if(file_exists("usuarios/json.json") && $datos["usuario"]){
          for ($i=0; $i < count($datos["usuario"]); $i++) {
          //Me fijo si el usuario ingresado ya existe
            if ($datos["usuario"][$i]["username"] == $username || $datos["usuario"][$i]["mail"] == $email) {
              return true;
            }
          }
        }
        return false;
      } else {
        $file=buscarVariablesMysql();
        require "$file";
        $conn=Mysql::connector($dsn,$user,$pass);
        $results=Mysql::buscarUsuarioEnFormaDeVariable($username,$mail,$conn);
        if (!empty($results)){
          return true;
        } else {
          return false;
        }
      }
    }

    public static function RegisterValidate($db, $user, $data, $imagen){
      $error = [];
      if(strlen($user->getName()) < 2){
        $error['nombre'] = "Introdujo un nombre muy corto.";
      }

      if(strlen($user->getLast_Name()) < 2){
        $error['apellido'] = "Introdujo un apellido muy corto.";
      }

      if(strlen($user->getUsername()) < 2){
        $error['username'] = "Debe introducir un usuario correcto";
      }

      if (self::validarSiExiste($db, $user->getUsername(), $user->getMail())) {
          $error["username"] ="Ya existe este usuario o mail";

      }

      if(strlen($user->getPassword())<7){
        $error['contra'] = "Contraseña muy corta.";
      }
      if(!self::PasswordConfirm($user, $data)){
        $error['conficontra'] = "Las contraseñas no coinciden.";
      }
      if(!filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)){
        $error['mail'] = "Debe ingresar un correo electronico valido.";
      }
      if (!isset($data['terminos'])) {
        $error["terminos"]="Tenes que aceptar terminos y condiciones";
      }

      if (!empty($user->getPhone())){
        if (strlen($user->getPhone()) !== 10 || !is_numeric($user->getPhone())){
          $error["tel"] = "Debe ingresar un numero de telefono correcto";
        }
      }

      if ($imagen["avatar"]["size"] > (5000*1024)){
      	$error["size"]="La Imagen es muy grande";
      }
      if($imagen["avatar"]["type"] != 'image/png' && $imagen["avatar"]["type"] != 'image/jpeg' && $imagen["avatar"]["type"] != 'image/jpg' && $imagen["avatar"]["type"] != 'image/webp' && $imagen["avatar"]["type"] != ""){
        $error["size"]="Solo puede subir imagenes.";
      }
      return $error;
    }

    public static function loginValidate($datos,$db){
    	/*Consigo el contenido*/
    	$inicia="El usuario no Existe";
    	if (file_exists("usuarios/json.json")){
    		$actuales=file_get_contents("usuarios/json.json");
    		/*Transformo el json en un array*/

    		if ($actuales===""){
    			return $inicia;
    		}
    		/*Sino*/
    		$actuales=json_decode($actuales,true);
    		/*Comienzo una variable booleana para decidir que sucede luego
    		si retorna falsa no puede comezar la sessión de lo contrario se inicia sessión */

    		$inicia="No puso bien su contraseña o su nombre de usuario";
    		/*Para pasarpor todos los usuarios que hay y comparar con el usuario puesto*/

    		for ($i=0; $i < count($actuales["usuario"]); $i++) {
    			if ($actuales["usuario"][$i]["username"]===$datos["username"]){
    				/*Para verificar si la contraseña se puso bien*/
    				if (password_verify($datos["contra"],$actuales["usuario"][$i]["contra"])){
    					$inicia=true;
    					return $inicia;
    				}
    			}
    		}
    	}
    	return $inicia;
    }

  }
 ?>
