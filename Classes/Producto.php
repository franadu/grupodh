<?php

	class Product extends Category
	{
		private $name;
		private $price;
		private $image;
		private $descriptionp;
		private $brand;
		private $isset;


		function __construct($name, $price, $descriptionp, $brand, $image)
		{
			$this->name=$name;
			$this->descriptionp=$descriptionp;
			$this->image=$image;
			$this->brand=$brand;
			$this->price=$price;
			$this->isset=1;
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

		public function setBrand($brand)
		{
			$this->brand=$brand;
		}

		public function setPrice($price)
		{
			$this->price=$price;
		}

		public function setIsset($isset)
		{
			$this->isset=$isset;
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

		public function getBrand()
		{
			return $this->brand;
		}

		public function getPrice()
		{
			return $this->Price;
		}

		public function getIsset()
		{
			return $this->isset;
		}

	}

?>
