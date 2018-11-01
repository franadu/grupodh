<?php

	class Cart
	{
		private $created_at;
		private $id;
		private $total;

		/*Funcion Constructora*/
		function __construct(float $total)
		{
			$this->total=$total;
		}

		/*Arrancan seters*/
		public function setTotal($total)
		{
			$this->total=$total;
		}
		/*Arrancan getters*/
		public function getFecha()
		{
			return $this->created_at;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getTotal()
		{
			return $this->total;
		}

	}

?>
