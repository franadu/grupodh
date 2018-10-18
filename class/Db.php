<?php

	abstract class Db
	{
		protected $ubicacion;
		protected $name;
		protected $tipo;

		function __construct($name, $ubicacion, $tipo)
		{
			$this->name=$name;
			$this->ubicacion=$ubicacion;
			$this->tipo=$tipo;
		}

		/*Arrancan Setters*/
		protected function setName($name)
		{
		 $this->name=$name;
	 	}

		protected function setUbicacion($ubicacion)
		{
		 $this->ubicacion=$ubicacion;
	 	}

		protected function setTipo($tipo)
		{
		 $this->tipo=$tipo;
	 	}

		/*Arrancan Getters*/
		protected function getName()
		{
		return $this->name;
	 	}

		protected function getUbicacion()
		{
		 return $this->ubicacion;
	 	}

		protected function getTipo()
		{
		 return $this->tipo;
	 	}
	}

?>
