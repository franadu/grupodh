<?php
$dir=buscarDirClasses();
require "$dir/Json.php";
require "$dir/Mysql.php";
require "$dir/Precio.php";
require "$dir/Usuario.php";
require "$dir/Validate.php";

function logout(){
	session_start();
	session_destroy();
}

/*Para crear las tablas de mysql en su propia Mysql*/
function comprobarExistenciaMysql(){
  $file = buscarVariablesMysql();
	require "$file";
	$db=Mysql::connector($dsn,$user,$pass);
	$a=Mysql::createTables($db);
	 /*verdadero si paso la prueba de la creacion de la base de datos*/
}

function migracionUsuariosDeJsonAMysql($db){
	/*Saco la info del Json*/
	$archivo=Json::connector();
	/*Lo transformo en un array*/
	$usuario=json_decode($archivo, true);
	/*Recorro todos los usuarios instanciandolos en un array*/
	if (isset($usuario["usuario"][0]["nombre"])){
		for ($i=0; $i <count($usuario["usuario"]) ; $i++) {
			/*Me fijo si phone esta vacio para nullearlo*/
			if (empty($usuario["usuario"][$i]["tel"])){
				$usuario["usuario"][$i]["tel"]="null";
			}
			/*Escribo el insert*/
			$instancias[$i]="('".$usuario["usuario"][$i]["nombre"]."','".$usuario["usuario"][$i]["apellido"]."','".$usuario["usuario"][$i]["mail"]."','".$usuario["usuario"][$i]["username"]."','".$usuario["usuario"][$i]["tel"]."','".$usuario["usuario"][$i]["contra"]."','".$usuario["usuario"][$i]["avatar"]."')";
		}
		for ($i=0;$i<count($usuario["usuario"]);$i++){
			try
			{
				$query = $db->query("insert into user  (name,last_name,mail,username,phone,password,image) values ".$instancias[$i]);
				$results=$query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $a)
			{
				$a = $a->getMessage();
				if (strpos($a,"General error")){
					$a="Se han migrado a mysql con exito todos los Usuarios";
				} else {
					if (strpos($a,"Integrity constraint violation")){
						$a="Se han migrado a mysql con exito todos los Usuarios";
					} else {
						$db=null;
						$results=null;
						$query=null;
						header("location:reparaciones.php?error=$a");
						exit;
					}
				}
			}
		}
	} else {
		$a = true;
	}
	$a=true;
	$db=null;
	$results=null;
	$query=null;
	return $a;
}

function buscarVariablesMysql(){
	$file = "variablesmysql.php";
	if (!file_exists($file)){
		$file = "funciones/variablesmysql.php";
		if (!file_exists($file)){
			$file = "../funciones/variablesmysql.php";
			if (!file_exists($file)){
				$file = "../../funciones/variablesmysql.php";
				if (!file_exists($file)){
					$file="No se encontro el archivo";
					header("location:reparaciones.php?eror=$file");
					exit;
				}
			}
		}
	}
	return $file;
}

function obligacionMysql(){
	comprobarExistenciaMysql();
	$file = buscarVariablesMysql();
	require "$file";
	$db=Mysql::connector($dsn,$user,$pass);
	$a=migracionUsuariosDeJsonAMysql($db);
}

function buscarDirClasses(){
	$dir="Classes/";
	if (!file_exists($dir)){
		$dir="../Classes/";
		if (!file_exists($dir)){
			$dir="../../Classes/";
			if (!file_exists($dir)){
				header("location:../reparaciones.php?error=$error");
				exit;
			}
		}
	}
	return $dir;
}

function guardarImagenEnServidor($db,$imagen,User $usuario){
	if (get_class($db)==="Json"){
		$archivo= Json::connector();
		$archivo = json_decode($archivo, True);
		$ultimoID=(count($archivo["usuario"]));
	} else {
		$file=buscarVariablesMysql();
		require "$file";
		$conn=Mysql::connector($dsn,$user,$pass);
		$ultimoID=Mysql::countUsers($conn);
	}
	$target_dir = "assets/uploads/usuarios/$ultimoID/";
	if (!is_dir($target_dir)) {
			mkdir($target_dir, 0777, true);
			/*Que es esto????*/
			//$archivo["usuario"][] = $usuario;
	}
	/*Si sube imagen ya se setea la foto en el avatar*/
	$array = $imagen["avatar"];
	if($array["name"] != ""){
		$target_file=$target_dir.basename($imagen["avatar"]["name"]);
		move_uploaded_file($imagen["avatar"]["tmp_name"],$target_file);
		/*Copio la info en datos*/
		$usuario->setAvatar($target_file);
	} else {
		$usuario->setAvatar("images/if_user_309035.png");
	}
	return $usuario;
}


?>
