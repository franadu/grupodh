<?php
require 'Classes/Json.php';
require 'Classes/Mysql.php';
function recopilaInfoEnSesion($datos){
	$actuales=file_get_contents("usuarios/json.json");
	$actuales=json_decode($actuales,true);
	for ($i=0; $i < count($actuales["usuario"]); $i++){
		if ($datos["username"]===$actuales["usuario"][$i]["username"]){
			foreach ($actuales["usuario"][$i] as $key => $value) {
				if ($key!=="contra"){
					$_SESSION["$key"]=$value;
				}
			}
		}
	}
}

function logout(){
	session_start();
	session_destroy();
}

function cookieCreate($date, $session){
		if ($date["recordarme"] == "on") {

			$verify = password_hash($session["mail"],PASSWORD_DEFAULT);
			setcookie("username",$session["username"],time()+(60*60));
			setcookie("verify",$verify,time()+(60*60));

	}
}

function cookieComprobate($cookie){

	$archivo = Json::connector();
	$json = json_decode($archivo, True);

	for ($i=0; $i < count($json["usuario"]); $i++) {
	if ($json["usuario"][$i]["username"] == $cookie["username"]) {
			for ($j=0; $j < count($json["usuario"][$i]); $i++){
				if (password_verify($json["usuario"][$i][$j], $cookie["verify"])) {
					recopilaInfoEnSesion();
				}
			}
		}
	}

}

/*Para crear las tablas de mysql en su propia Mysql*/
require 'funciones/variablesmysql.php';

function comprobarExistenciaMysql($dsn,$user,$pass){
	$db=Mysql::createTables($dsn,$user,$pass);

	if (empty($resulst)){
		migracionUsuariosDeJsonAMysql($dsn,$user,$pass);
	}
}


function migracionUsuariosDeJsonAMysql($dsn,$user,$pass){
	/*Saco la info del Json*/
	$archivo=Json::connector();
	/*Lo transformo en un array*/
	$usuario=json_decode($archivo, true);
	/*Recorro todos los usuarios instanciandolos en un array*/
	for ($i=0; $i <count($usuario["usuario"]) ; $i++) {
		if (empty($usuario["usuario"][$i]["tel"])){
	 			$usuario["usuario"][$i]["tel"]="null";
	 		}
	 	$instancias[]="('".$usuario["usuario"][$i]["nombre"]."','".$usuario["usuario"][$i]["apellido"]."','".$usuario["usuario"][$i]["mail"]."','".$usuario["usuario"][$i]["username"]."','".$usuario["usuario"][$i]["tel"]."','".$usuario["usuario"][$i]["contra"]."','".$usuario["usuario"][$i]["avatar"].")";
 	}
	for ($i=0;$i<count($instacias);$i++){
		$opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	 	$db=new PDO ($dsn,$user, $pass, $opt);
	 	try
	 	{
	 		$query = $db->query("insert into user  (name,last_name,mail,username,phone,password,image) values ".$instacias[$i]);
	 		$results=$query->fetchAll(PDO::FETCH_ASSOC);
	 	}
	 	catch (PDOException $a)
	 	{
	 		echo $a->getMessage();
	 	}
	}
}


?>
