<?php
	require 'Db.php';

	class Mysql extends Db
	{
		/*$dsn = "mysql:host=127.0.0.1;dbname=grupodh;charset=UTF8;port=3306";
		$user="root";
		$pass="";*/
		static public function createTables($dsn,$user,$pass)
		{
			$opt=[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$db=new PDO ($dsn,$user, $pass, $opt);
			try
		 	{
				$query = $db->query(" create table category (id tinyint unsigned primary key auto_increment unique, created_at timestamp, updatede_at timestamp Null Default Null, name varchar(20) not null unique, descriptionc varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table product (id int unsigned primary key auto_increment unique, created_at timestamp,	updated_at timestamp NULL DEFAULT NULL, name varchar(50) not null, price float unsigned not null, image varchar(100) default null, descriptionp varchar(500) default null,    brand varchar(30) default null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table user(id int unsigned primary key auto_increment unique, created_at timestamp,	updated_at timestamp NULL DEFAULT NULL, name varchar(30) not null, last_name varchar (30) not null, username varchar(30) not null unique, image varchar (100) default null, mail varchar(50) not null, phone varchar(35) default null, password varchar (100) not null, isset tinyint unsigned default 1) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table cart(id int unsigned primary key auto_increment unique,created_at timestamp, total float unsigned not null) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; create table user_cart( id int unsigned primary key auto_increment unique, created_at timestamp,    updated_at timestamp null default null, id_username int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_username) references user(id), FOREIGN KEY (id_cart) references cart(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table cart_product(id int unsigned primary key auto_increment unique, 	created_at timestamp, updated_at timestamp null default null, id_product int unsigned not null, id_cart int unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_cart) references cart(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				create table product_categotry (id int unsigned primary key auto_increment unique, created_at timestamp, updated_at timestamp null default null,	id_product int unsigned not null, id_category int unsigned not null, FOREIGN KEY (id_product) references product(id), FOREIGN KEY (id_category) references category(id)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;")
			}
			catch (PDOException $a)
			{
				echo $a->getMessage();
			}
		}

		static public function mysqlDB($dsn,$user,$pass)
		{

			$opt=[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			$db=new PDO ($dsn,$user, $pass, $opt);
			try{	}
			catch (PDOException $a) {
				$db="Hubo un error en la conexión";
			}
			return $db;
		}

		public function mysqlGuardarObjetos($dsn,$user,$pass,$object)
		{
			/*Consigo el nombre del objeto que va a ser instanciado(guardado en la tabla de su propio nombre)*/
			$nombre = get_class($object);
			/*Recorro el objeto para ver si tiene un array o más dentro suyo arranco un contador para ver la cantidad de arrays que hay dentro de ese objeto */
			/*asi seria ad eternum pero solo voy a tener un array dentro de un objeto por el momento*/
			$db = self::mysqlDB($dsn,$user,$pass);
			$query=$db->query("insert into $nombre ( ,  )")

		}
	}


 ?>
