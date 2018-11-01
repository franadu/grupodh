<?php

	class Category
	{
		protected $name;//string charvar(50 caracteres)
		protected $descriptionc; //pequeño int
		protected $isset;

		function __construct($name, $description, $isset=1)
		{
			$this->name=$name;
			$this->descriptionc=$description;
			$this->isset=$isset;
		}

		/*Arrancan Setters*/
		public function setName($name)
		{
			$this->name=$name;
		}

		public function setDescription($value)
		{
			$this->descriptionc=$value;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getDescritpion()
		{
			return $this->descriptionc;
		}

	}

?>
