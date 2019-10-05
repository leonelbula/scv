<?php

require_once 'config/DataBase.php';

class Gastos{
	
	public $db;
	private $id;
	private $fecha;
	private $descripcion;
	private $valor;
	
	function getId() {
		return $this->id;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getValor() {
		return $this->valor;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarGastos() {
		$sql = "SELECT * FROM gastos ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
}

