<?php

	class Usuario
	{
		private $name;
		private $username;
		private $mail;
		private $contra;

		function __construct($name, $username, $mail, $contra)
		{
			$this->name=$name;
			$this->username=$username;
			$this->mail=$mail;
			$this->contra=$contra;
		}

		/*Arrancan Setters*/
		public function setName($name)
		{
			$this->name=$name;
		}

		public function setUsername($username)
		{
			$this->username=$username;
		}

		public function setMail($mail)
		{
			$this->mail=$mail;
		}

		public function setContra($contra)
		{
			$this->contra=$contra;
		}

		/*Arrancan Getters*/
		public function getName()
		{
			return $this->name;
		}

		public function getUsername()
		{
			return $this->username;
		}

		public function getMail()
		{
			return $this->mail;
		}

		public function getContra()
		{
			return $this->contra;
		}
	}

?>
