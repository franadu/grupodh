<?php

	class User
	{
		private $id;
		private $created_at;
		private $updated_at;
		private $name;
		private $last_name;
		private $username;
		private $mail;
		private $phone;
		private $password;
		private $image;
		private $isset;

		public function __construct($name, $last_name, $username, $mail, $phone, $image="", $password)
		{
			$this->name=$name;
			$this->last_name=$last_name;
			$this->username=$username;
			$this->mail=$mail;
			$this->phone=$phone;
			$this->password=$password;
			$this->image=$image;
		}

		public function guardarUsuario(User $user,$dsn,$root,$pass)
		{

			$opt=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	    $db=new PDO ($dsn,$user, $pass, $opt);
			if (empty($user->getPhone()==="")){
				$i="null";
				$user->setPhone($i);
			}
			$instancia="('".$user->getName()."','".$user->getLast_Name()."','".$user->getMail()"','".$user->getUsername()."','".$user->getPhone()."','".$user->getPassword()."','".$user->getAvatar()."')";
			try
			{
	      $query = $db->query("insert into user  (name,last_name,mail,username,phone,password,image) values $instacia");
				$results=$query->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $a)
			{
				echo $a->getMessage();
			}

		}

		/*Arrancan Setters*/
		public function setId($id)
		{
			$this->id=$id;
		}

		public function setCreated_At($a)
		{
			$this->created_at=$a;
		}

		public function setUpdated_At($a)
		{
			$this->updated_at=$a;
		}


		public function setName($name)
		{
			$this->name=$name;
		}

		public function setLast_Name($last_name)
		{
			$this->last_name=$last_name;
		}

		public function setUsername($username)
		{
			$this->username=$username;
		}

		public function setMail($mail)
		{
			$this->mail=$mail;
		}

		public function setPhone($phone)
		{
			$this->phone=$phone;
		}

		public function setPassword($password)
		{
			$this->password=$password;
		}

		public function setAvatar($image)
		{
			$this->image=$image;
		}
		public function setIsset($isset)
		{
			$this->isset=$isset;
		}

		/*Arrancan Getters*/
		public function getId()
		{
			return $this->id;
		}

		public function getCreated_At()
		{
			return $this->created_at;
		}

		public function getUpdated_At()
		{
			return $this->updated_at;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getLast_Name()
		{
			return $this->last_name;
		}

		public function getUsername()
		{
			return $this->username;
		}

		public function getMail()
		{
			return $this->mail;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function getAvatar()
		{
			return $this->image;
		}

		public function getIsset()
		{
			return $this->isset;
		}



	}

?>
