<?php
/**
 *
 */
class Cookie
{

	static public function cookieCreate($date, $session)
	{
		if ($date["recordarme"] == "on") {
			$verify = password_hash($session["mail"],PASSWORD_DEFAULT);
			setcookie("username",$session["username"],time()+(60*60));
			setcookie("verify",$verify,time()+(60*60));
		}
	}

	static public function cookieComprobateJson($cookie)
	{
		$archivo = Json::connector();
		$json = json_decode($archivo, True);

		for ($i=0; $i < count($json["usuario"]); $i++){
			if ($cookie["username"]===$json["usuario"][$i]["username"]){
				foreach ($json["usuario"][$i] as $key => $value) {
					if (password_verify($value, $cookie["verify"])) {
						Session::recopilaInfoEnSesionJson($cookie);
					}
				}
			}
		}
	}

	static public function cookieComprobateMysql($cookie,$db)
	{
		try
		{
			$query=$db->query("select username from user");
			$results=$query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $a)
		{
			$a=$a->getMessage();
			echo $a;
		}
		for ($i=0; $i <count($results) ; $i++) {
		}
		foreach ($results[$i] as $key => $value) {
			if ($cookie["username"]===$value){
				try {
					$query=$db->query("select * from user where username = '$value'");
					$results=$query->fetchAll(PDO::FETCH_ASSOC);
				} catch (PDOException $a) {
					$a=$a->getMessage();
					echo $a;
				}
				foreach ($results as $key => $value) {
					if (password_verify($value, $cookie["verify"])){
						$usuario=new User($results[0]["name"],$results[0]["last_name"],$results[0]["username"],$results[0]["mail"],$results[0]["phone"],$results[0]["image"],$results[0]["password"]);
						Session::recopilaInfoEnSesionMysql($usuario,$db);
					}
				}
			}
		}
	}
}

 ?>
