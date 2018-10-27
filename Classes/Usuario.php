<?php

	class Usuario
	{
		private $nombre;
		private $apellido;
		private $username;
		private $mail;
		private $tel;
		private $contra;
		private $avatar;

		function __construct($nombre, $apellido, $username, $mail, $tel, $contra)
		{
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->username=$username;
			$this->mail=$mail;
			$this->tel=$tel;
			$this->contra=$contra;

		}

		/*Arrancan Setters*/
		public function setName($nombre)
		{
			$this->nombre=$nombre;
		}

		public function setApellido($apellido)
		{
			$this->apellido=$apellido;
		}

		public function setUsername($username)
		{
			$this->username=$username;
		}

		public function setMail($mail)
		{
			$this->mail=$mail;
		}

		public function setTel($tel)
		{
			$this->tel=$tel;
		}

		public function setContra($contra)
		{
			$this->contra=$contra;
		}
		public function setAvatar($avatar)
		{
			$this->avatar=$avatar;
		}

		/*Arrancan Getters*/
		public function getnombre()
		{
			return $this->nombre;
		}

		public function getApellido()
		{
			return $this->apellido;
		}

		public function getUsername()
		{
			return $this->username;
		}

		public function getMail()
		{
			return $this->mail;
		}

		public function getTel(){
			return $this->tel;
		}

		public function getContra()
		{
			return $this->contra;
		}
		public function getAvatar()
		{
			return $this->avatar;
		}
	}

?>
