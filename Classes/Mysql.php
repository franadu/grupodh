<?php

	class Mysql
	{

		static public function connector($dsn,$user,$pass)
		{
			$opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			try
			{
				$db=new PDO ($dsn,$user,$pass,$opt);
			}
			catch (PDOException $error){
				$error =$error->getMessage();
				if ($error==="could not find driver"){
					$error = "No se encontro la base de datos.";
					header("location:reparaciones.php?error=$error");
					exit;
				}
			}
			return $db;
		}

		static public function createTables($db)
		{
			$a=true;
			$tablas["product"]=" create table product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(50) not null, price float unsigned not null, image varchar(100) default null, descriptionp varchar(500) default null, brand varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["category"]="create table category (id tinyint unsigned primary key unique auto_increment , created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updatede_at timestamp Null Default Null, name varchar(20) not null, descriptionc varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["user"]="create table user (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(30) not null, last_name varchar (30) not null, username varchar(30) not null unique, image varchar (100) default null, mail varchar(50) not null, phone varchar(35) default null, password varchar (100) not null, isset tinyint unsigned default 1, terms tinyint unsigned not null default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["cart"]="create table cart (id int unsigned primary key auto_increment unique,created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, total float unsigned not null) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["user_cart"]="create table user_cart( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_username int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_username) references user(id), FOREIGN KEY (id_cart) references cart(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["cart_product"]="create table cart_product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_cart) references cart(id) ) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$tablas["product_category"]="create table product_category ( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_category tinyint unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_category) references category(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			/*Arriba tenemos todas las querys para crear las tablas esto lo hago porque si hay algun error (Lalguna de las tablas intermedias existe como por ejemplo) continuo creando el resto de las tablas*/
			foreach ($tablas as $key => $value) {
				try {
					$query = $db->query("select a from $key");
					$results=$query->fetch();
				}
				catch (PDOException $a){
					$a = $a->getMessage();
				}
				if (!strpos($a,"Unknown column")){
					try	{
						$query = $db->query($value);
					 	$results = $query->fetch();
					}
					/*Al hacer una insert genera una sql injection y el msj que te deja es General Error por la posibilidad de sql insjection entonces*/
					catch (PDOException $a)	{
					 	$a = $a->getMessage();
					}
					if (strpos($a,"General error")){
				 		$a=true;
					}
				} else {
					$a = true;
				}
				if ($a!==true){
					$a = "Se encontro un error desconocido por favor informenos.";
					$db=null;
					$results=null;
					$query=null;
					header("location:reparaciones.php?error=$error");
					exit;
				}
			}
			$db=null;
			$results=null;
			$query=null;
		 	return $a; /*Se creo la base de datos y esta funcionando me devuelve true o me devuelve el error*/
		}

		static public function guardarUsuario(User $usuario, $db)
		{
			$a=false;
			$name = $usuario->getName();
			$last_name = $usuario->getLast_Name();
			$username = $usuario->getUsername();
			$mail = $usuario->getMail();
			$phone = $usuario->getPhone();
			if ($phone===""){
				$phone = "null";
			}
			$password = $usuario->getPassword();
			$image = $usuario->getAvatar();
			$db->beginTransaction();
			try
			{
				$db->exec("insert into user (name,last_name,username,mail,phone,password,image) values
				('".$name."','".$last_name."','".$username."','".$mail."','".$phone."','".$password."','".$image."')");
				$db->commit();

			}
			catch (PDOException $a)
			{
				$db->rollBack();
				$a = $a->getMessage();
			}
			if ($a===false){
				$a=true;
			}
			$db=null;
			return $a;
		}

		/*True si existe el mail o el username False si no existen en la db*/
		static public function buscaMailUsername(User $usuario, $db)
		{
			$resultado=true;
			$mail=$usuario->getMail();
			$username=$usuario->getUsername();
			try {
				$query = $db->query("select mail,username from user where mail = '$mail' or username = '$username'");
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				if ($resultado[0]===null){
					$resultado=false;
				} else {
					$resultado=true;
				}
			} catch (PDOException $e) {
				$db->rollBack();
				$e = $e->getMessage();
				$resultado= $e;
			}
			return $resultado;
		}

		static public function guardarObjeto(Object $object,$db)
		{
			$nombredeclase = get_class($object);
			$array = get_class_methods($nombredeclase);
			/*PAra seguir haciendo*/
		}

		static public function buscarUsuario($usuario,$db)
		{
			if (is_object($usuario)){
				$username=$usuario->getUsername();
			} else {
				$username = $usuario[0]["username"];
			}

			try
			{
				$query=$db->query("select * from user where username = '$username';");
				$results=$query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $a)
			{
				$a->getMessage();
				echo "<br>".$a."<br>";
			}
			return $results;
		}

		static public function buscarUsuarioEnFormaDeVariable($username,$mail="",$db)
		{
			$espacio=";";
			if ($mail!==""){
				$espacio=" or mail like '$mail';";
			}
			try
			{
				$query=$db->query("select username,mail from user where username = '$username'$espacio");
				$results=$query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $a)
			{
				$a->getMessage();
				echo $a;
			}
			return $results;
		}
	}

	// require "Usuario.php";
	// require './funciones/variablesmysql.php';
	// $usuario=new User("Martin","Martinez","martmart","unmail@mail.co","","","asidnvbionbponioasbi498bi2asd/+9");
	// $db=Mysql::connector($dsn,$user,$pass);
	// $results=Mysql::buscarUsuario($usuario,$db);
	// echo "<br><pre>";
	// var_dump($results);
	// echo "<pre>";
	// if (empty($results)){
	// 	echo "estoy vacio";
	// } else {
	// 	echo "estoy lleno";
	// }
 ?>
