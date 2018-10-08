<?php
function validacionRegistro($datos){
	$errores=[];
	if (strlen(trim($datos["nombre"]))<2){
		$errores["nombre"]="*El nombre es muy corto.";
	}else {
		if (strlen(trim($datos["nombre"]))>20){
			$errores["nombre"]="*El nombre es muy Largo.";
		}
	}

	if (strlen(trim($datos["apellido"]))<2){
		$errores["apellido"]="*El apellido es muy corto.";
	}else {
		if (strlen(trim($datos["apellido"]))>40){
			$errores["apellido"]="*El apellido es muy Largo.";
		}
	}
	if (!filter_var($datos["mail"],FILTER_VALIDATE_EMAIL)){
		$errores["mail"]="*El mail es Invalido";
	}

	if ($datos["username"]===""){
		$errores["username"]="*No ingreso un nombre de usuario valido";
	} else {
		if (file_exists("usuarios/json.txt")){
			$actuales=file_get_contents("usuarios/json.txt");
			$actuales=json_decode($actuales,true);
			for ($i=0; $i <count($actuales["usuario"]) ; $i++) {
				if ($datos["username"]===$actuales["usuario"][$i]["username"]){
					$errores["username"]="El nombre de Usuario ya existe";
				}
			}
		}
	}

	if (strlen(trim($datos["contra"])<8)) {
		$errores["contra"]="*La contraseña es muy corta";
	} if ($datos["conficontra"]!==$datos["contra"]){
		$errores["conficontra"]="*No replico bien la Contraseña";
	}

	if(!isset($datos["terminos"])){
		$errores["terminos"]="*Debe aceptar los terminos y condiciones";
	}

	return $errores;
}


//TODO cuando hago el validar imagen me da que convierto un array en string
function validacionImagen($imagen){
	$errores=[];
	if ($imagen["avatar"]["size"]>(5000*1024)){
		$errores["size"]="La Imagen es muy grande";
	}
	return $errores;
}

function registrarUsuario($datos,$imagenes){
	/*TODO Primer Paso a realizar Guardar Info general, guardar Imagen y Guardar direccion de imagen*/

	/* Hasheo la contraseña*/
	$datos["contra"]=password_hash($datos["contra"],PASSWORD_DEFAULT);

	/*Saco Confirmar Contraseña*/
	unset($datos["conficontra"]);

	/*Busco archivo*/
	/*Existe la direccion*/
	if (!is_dir("usuarios/")){
		mkdir("usuarios/");
	}
	/*Existe el archivo json*/
	if (!file_exists("usuarios/json.txt")){
		/*no Existe entonces lo creo*/
	$archivo=fopen("usuarios/json.txt","w+");
	fclose($archivo);
	}

	/*Busco info*/
	$actuales=file_get_contents("usuarios/json.txt");
	$i=0;
	/*Si actuales esta parte no la hago esta vacio $i existe y es igual a 0*/
	if ($actuales!==""){
		$actuales=json_decode($actuales,true);
		for (; $i <count($actuales["usuario"]) ; $i++) {
			if ($datos["username"]===$actuales["usuario"][$i]["username"]){
				$target_dir="usuarios/uploads/$i/";
			}
		}
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
	}
	/**/
	$target_file=$target_dir.basename($imagenes["avatar"]["name"]);
	move_uploaded_file($imagenes["avatar"]["tmp_name"],$target_file);
	/*Copio la info en datos*/
	$datos["avatar"]=$target_file;

	/*Creo el usuario*/
	$json["usuario"][] =$datos;

	/*Transformo el usuario en string*/
	$json=json_encode($json);

	/*Guardo la info en el archivo correspondiente*/
	$archivo="usuarios/json.txt";
	file_put_contents($archivo,$json);
}

function validacionLogin($datos){
	/*Consigo el contenido*/
	$actuales=file_get_contents("usuarios/json.txt");
	/*Transformo el json en un array*/
	$actuales=json_decode($actuales);
	/*Comienzo una variable booleana para decidir que sucede luego
	si retorna falsa no puede comezar la sessión de lo contrario se inicia sessión */
	$inicia="No puso bien su contraseña o su nombre de usuario";
	/*Para pasarpor todos los usuarios que hay y comparar con el usuario puesto*/
	for ($i=0; $i < count($actuales["usuario"]); $i++) {
		if ($actuales["usuario"][$i]["username"]===$datos["username"]){
			/*Para verificar si la contraseña se puso bien*/
			if (password_verify($datos["contra"],$actuales["usuario"][$i]["contra"]){
				$inicia=true;
				return $inicia;
			}
		}
	}
	return $inicia;
}
?>
