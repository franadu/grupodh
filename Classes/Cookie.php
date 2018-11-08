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
				if (password_verify($json["usuario"][$i]["mail"], $cookie["verify"])) {
						Session::recopilaInfoEnSesionJson($cookie);
				}
			}
		}
	}

	static public function cookieComprobateMysql($cookie,$db)
	{
		$username=$cookie["username"];
		try
		{
			$query=$db->query("select * from user where username= '$username'");
			$results=$query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $a)
		{
			$a=$a->getMessage();
			echo $a;
		}
		if (password_verify($results[0]["mail"], $cookie["verify"])){
			Session::recopilaInfoEnSesionMysql($username,$db);
		}
	}
}

 ?>
