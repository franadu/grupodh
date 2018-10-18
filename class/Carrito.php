<?php

	class Carrito
	{
		protected $fecha;
		protected $nro_compra;
		protected $producto_precio;
		protected $total;

		/*Funcion Constructora*/
		function __construct($fecha,int $nro_compra,int $producto_precio,int $total)
		{
			$this->fecha=$fecha;
			$this->nro_compra=$nro_compra;
			$this->producto_precio=$producto_precio;
			$this->total=$total;
		}

		/*Arrancan seters*/
		public function setFecha($fecha)
		{
			$this->fecha=$fecha;
		}

		public function setNro_Compra($nro_compra)
		{
			$this->nro_compra=$nro_compra;
		}

		public function setProducto_Precio($producto_precio)
		{
			$this->producto_precio=$producto_precio;
		}

		public function setTotal($total)
		{
			$this->total=$total;
		}
		/*Arrancan getters*/
		public function getFecha()
		{
			return $this->fecha;
		}

		public function getNro_Compra()
		{
			return $this->nro_compra;
		}

		public function getProducto_Precio()
		{
			return $this->producto_precio;
		}

		public function getTotal()
		{
			return $this->total;
		}

	}

?>
