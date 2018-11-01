<?php

	class User
	{
		private $name;
		private $last_name;
		private $username;
		private $mail;
		private $phone;
		private $password;
		private $image;

		function __construct($name, $last_name, $username, $mail, $phone, $image="", $password)
		{
			$this->name=$name;
			$this->last_name=$last_name;
			$this->username=$username;
			$this->mail=$mail;
			$this->phone=$phone;
			$this->password=$password;
			$this->image=$image;

		}

		/*Arrancan Setters*/
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

		/*Arrancan Getters*/
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
	}

?>
