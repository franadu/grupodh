<?php

	class Producto
	{
		/*TODO como se hace para incluir objetos adentro de objetos*/
		private $name;
		//protected new Precio $price;
		protected $description;
		//protected new Categoria $categoria;
		protected $image;

		function __construct($name, $price, $description, $categoria, $image)
		{
			$this->name=$name;
			$this->description=$description;
			$this->image=$image;
			/*TODO Obtener el precio y la categorias*/
		}

		/*Arrancan los setters*/
		public function setName($name)
		{
			$this->name=$name;
		}

		public function setDescription($description)
		{
			$this->description=$description;
		}

		public function setImage($image)
		{
			$this->image=$image;
		}

		/*Arrancan getters*/
		public function getName()
		{
			return $this->name;
		}

		public function getDescription()
		{
			return $this->description;
		}

		public function getImage()
		{
			return $this->image;
		}

	}

?>
