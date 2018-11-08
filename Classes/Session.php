<?php

class Session
{
	public static function recopilaInfoEnSesionJson($datos)
	{
		$actuales=Json::connector();
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

	public static function recopilaInfoEnSesionMysql($usuario,$db)
	{
		$resultado=Mysql::buscarUsuario($usuario,$db);
		foreach ($resultado[0] as $key => $value) {
			if ($key!=="password"){
				if ($key=="image"){
					$_SESSION["avatar"]=$value;
				} else {
					if ($key!=="phone") {
						$_SESSION["$key"]=$value;
					}
				}
			}
		}
	}

}

 ?>
