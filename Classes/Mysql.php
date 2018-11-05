<?php

	class Mysql
	{
		static public function connector($dsn,$user,$pass)
		{
			$opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$db=new PDO ($dsn,$user,$pass,$opt);
			try {
				$query = $db->query("select a from product");
			}
			catch (PDOException $a){
				if(strpos($query,"could not find driver")){
				$db="Error en la conexion a la base de Datos.";
				}
			}
			return $db;
		}

		static public function createTables($dsn,$user,$pass)
		{
			$db=Self::connector($dsn,$user,$pass);
			if ($db==="Error en la conexion a la base de Datos."){
				$a="Error en la conexion a la base de Datos.";
			} else {
				$a=true;
				try {
					$query = $db->query("select * from product");
					$results=$query->fetch();
				}
				catch (PDOException $a){
					$a->getMessage();
				}
				if (strpos($results ,".product' doesn't exist")){
					try
					{
						$query = $db->query(" create table product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(50) not null, price float unsigned not null, image varchar(100) default null, descriptionp varchar(500) default null, brand varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table category (id tinyint unsigned primary key unique auto_increment , created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updatede_at timestamp Null Default Null, name varchar(20) not null, descriptionc varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table user (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, name varchar(30) not null, last_name varchar (30) not null, username varchar(30) not null unique, image varchar (100) default null, mail varchar(50) not null, phone varchar(35) default null, password varchar (100) not null, isset tinyint unsigned default 1, terms tinyint unsigned not null default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table cart (id int unsigned primary key auto_increment unique,created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,	updated_at timestamp NULL DEFAULT NULL, total float unsigned not null) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table user_cart( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_username int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_username) references user(id), FOREIGN KEY (id_cart) references cart(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table cart_product (id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_cart) references cart(id) ) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
						create table product_category ( id int unsigned primary key auto_increment unique, created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, updated_at timestamp null default null, id_product int unsigned not null, id_category tinyint unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_category) references category(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
						$results = $query->fetch();
					}
					catch (PDOException $a)/*Al hacer una insert genera una sql injection y el msj que te deja es General Error por la posibilidad de sql insjection entonces*/
					{
						$a->getMessage();
					}
					if (strpos($a,"General error")){
						$a=true;
					}
				}
			}
		return $a; /*Se creo la base de datos y esta funcionando*/
		}
	}
require '../funciones/variablesmysql.php';


$results=Mysql::createTables($dsn,$user,$pass);
echo $results;
 ?>
