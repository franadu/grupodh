<?php
	class Mysql extends Db
	{

		protected function guardarUsuario($usuario, $image="",$dsn="",$user="",$pass="")
		{
			$name=[];
			$last_name=[];
			$mail=[];
			$username=[];
			$phone=[];
			$password=[];
			$image=[];
			$cont=0;
			if (is_object($usuario)){
				$name[]=$usuario->getName();
				$last_name[]=$usuario->getLast_Name();
				$mail[]=$usuario->getMail();
				$username[]=$usuario->getUsername();
				if (!empty($usuario->getPhone())) {
					$phone[]=$usuario->getPhone();
				} else {
					$phone[]="null";
				}
				$password[]=$usuario->getPassword();
				$image[]=$usuario->getAvatar();
				$cont++;
			} else {
				for ($i=0; $i <count($usuario["usuario"]) ; $i++) {
					$name[]=$usuario["usuario"][$i]["nombre"];
					$last_name[]=$usuario["usuario"][$i]["apellido"];
					$mail[]=$usuario["usuario"][$i]["mail"];
					$username[]=$usuario["usuario"][$i]["username"];
					if (!empty($usuario["usuario"][$i]["tel"])){
						$phone[]=$usuario["usuario"][$i]["tel"];
					} else {
						$phone[]="null";
					}
					$password[]=$usuario["usuario"][$i]["contra"];
					$image[]=$usuario["usuario"][$i]["avatar"];
					$cont++;
				}
			}
			$instancia=[];
			for ($i=0; $i <$cont ; $i++) {
				if ($i===0){
					$instancia[$i]="('".$name[$i]."','".$last_name[$i]."','".$mail[$i]."','".$username[$i]."',".$phone[$i].",'".$password[$i]."','".$image[$i]."')";
				} else {
					$instancia[$i]=",('".$name[$i]."','".$last_name[$i]."','".$mail[$i]."','".$username[$i]."',".$phone[$i].",'".$password[$i]."','".$image[$i]."')";
				}
			}

			$un_string_para_hacer_un_unico_insert="";
			foreach ($instancia as $key => $value) {
				$un_string_para_hacer_un_unico_insert.=$value;
			}

	    $opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	    $db=new PDO ($dsn,$user, $pass, $opt);
			try
			{
	      $query = $db->query("insert into user  (name,last_name,mail,username,phone,password,image) values $un_string_para_hacer_un_unico_insert");
				$results=$query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $a)
			{
				echo $a->getMessage();
			}
		}

		static public function migracionUsuariosDeJsonAMysql($dsn,$user,$pass)
		{
			$archivo=Json::connector();
			$archivo=json_decode($archivo, true);
			self::guardarUsuario($archivo,$image="",$dsn,$user,$pass);
		}

		static public function createTables($dsn,$user,$pass)
		{
			$opt=[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$db=new PDO ($dsn,$user, $pass, $opt);
			try
		 	{
				$query = $db->query(" create table product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(50) not null, price float unsigned not null, image varchar(100) default null, descriptionp varchar(500) default null, brand varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table category (id tinyint unsigned primary key unique auto_increment , created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updatede_at timestamp Null Default Null, name varchar(20) not null, descriptionc varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table user (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(30) not null, last_name varchar (30) not null, username varchar(30) not null unique, image varchar (100) default null, mail varchar(50) not null, phone varchar(35) default null, password varchar (100) not null, isset tinyint unsigned default 1, terms tinyint unsigned not null default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table cart (id int unsigned primary key auto_increment unique,created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, total float unsigned not null) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table user_cart( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_username int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_username) references user(id), FOREIGN KEY (id_cart) references cart(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table cart_product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_cart) references cart(id) ) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table product_category ( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_category tinyint unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_category) references category(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
				$results = $query->fetchAll(PDO::FETCH_ASSOC);

			}
			catch (PDOException $a)
			{
				echo $a->getMessage();
			}
		}

		static public function connectionMysql($dsn,$user,$pass)
		{
			$connected=false;
			try	{
				$opt=[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
				$Connection = new PDO($dsn,$user,$pass,$opt);
				$connected = true;
			}
			catch (PDOException $b) {
				$connected=false;
				//$b;
			}
			return $connected;
		}
	}

 ?>
