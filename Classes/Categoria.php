<?php

	class Categoria
	{
		protected $name;//string charvar(50 caracteres)
		protected $value; //pequeño int

		function __construct($name, $value)
		{
			$this->name=$name;
			$this->value=$value;
		}

		public function setName($name)
		{
			$this->name=$name;
		}

		public function setValue($value)
		{
			$this->value=$value;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getValue()
		{
			return $this->value;
		}

	}

?>
