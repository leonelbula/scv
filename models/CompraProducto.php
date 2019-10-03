<?php

require_once 'config/DataBase.php';

class CompraProduto {
	
	public $db;
	
	private $id;
	private $id_producto;
	private $cantidad;
	private $num_factura;
	private $fecha;
	
	function getDb() {
		return $this->db;
	}

	function getId() {
		return $this->id;
	}

	function getId_producto() {
		return $this->id_producto;
	}
	function getNum_factura() {
		return $this->num_factura;
	}
	function getCantidad() {
		return $this->cantidad;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setDb($db) {
		$this->db = $db;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_producto($id_producto) {
		$this->id_producto = $id_producto;
	}

	function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}
	function setNum_factura($num_factura) {
		$this->num_factura = $num_factura;
	}
	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function CompraProductoRealizada() {
		$sql = "INSERT INTO compra_producto VALUES(NULL,{$this->getId_producto()}, {$this->getCantidad()},{$this->getNum_factura()}, '{$this->getFecha()}')";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarC() {
		$sql = "DELETE FROM compra_producto WHERE num_factura = {$this->getNum_factura()}";
		$result = $this->db->query($sql);
		return $result;
	}
}