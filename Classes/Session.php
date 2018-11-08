<?php
require "Json.php";
require "Mysql.php";
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
		foreach ($resultado as $key => $value) {
			if ($key!=="password"){
				$_SESSION["$key"]=$value;
			}
		}
	}

}

 ?>
