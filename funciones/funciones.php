<?php
require 'Classes/Json.php';
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
?>
