<?php

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
?>
