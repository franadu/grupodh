<?php

	class Precio
	{
		protected $precio;

		function __construct(integer $precio)
		{
			$this->precio=$precio;
		}

		/*Arrancan Setters*/
		protected function setPrecio($precio)
		{
			$this->precio=$precio;
		}

		/*Arrancan Getters*/
		protected function getPrecio($precio)
		{
			return $this->precio;
		}

	}

?>
