<?php

require_once 'config/DataBase.php';

class Compra{
	
	public $db;
	
	private $id;	
	private $codigo;
	private $fecha;
	private $hora;
	private $tipo;
	private $id_plazo;
	private $fecha_vencimiento;
	private $id_proveedor;
	private $detalle_compra;
	private $sub_total;
	private $iva;
	private $total;
	private $saldo;
	
	function getId() {
		return $this->id;
	}

	function getCodigo() {
		return $this->codigo;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function getTipo() {
		return $this->tipo;
	}

	function getId_plazo() {
		return $this->id_plazo;
	}

	function getFecha_vencimiento() {
		return $this->fecha_vencimiento;
	}

	function getId_proveedor() {
		return $this->id_proveedor;
	}

	function getDetalle_compra() {
		return $this->detalle_compra;
	}

	function getSub_total() {
		return $this->sub_total;
	}

	function getIva() {
		return $this->iva;
	}

	function getTotal() {
		return $this->total;
	}
	
	function getSaldo() {
		return $this->saldo;
	}
	
	function setId($id) {
		$this->id = $id;
	}

	function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setHora($hora) {
		$this->hora = $hora;
	}

	function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	function setId_plazo($id_plazo) {
		$this->id_plazo = $id_plazo;
	}

	function setFecha_vencimiento($fecha_vencimiento) {
		$this->fecha_vencimiento = $fecha_vencimiento;
	}

	function setId_proveedor($id_proveedor) {
		$this->id_proveedor = $id_proveedor;
	}

	function setDetalle_compra($detalle_compra) {
		$this->detalle_compra = $detalle_compra;
	}

	function setSub_total($sub_total) {
		$this->sub_total = $sub_total;
	}

	function setIva($iva) {
		$this->iva = $iva;
	}

	function setTotal($total) {
		$this->total = $total;
	}
	function setSaldo($saldo) {
		$this->saldo = $saldo;
	}
			
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarCompras() {
		$sql = "SELECT * FROM compra ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarComprasProv() {
		$sql = "SELECT id_proveedor, SUM(total) AS total,SUM(saldo) AS saldo FROM compra GROUP BY id_proveedor";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarComprasProveedor() {
		$sql = "SELECT * FROM compra WHERE id_proveedor = {$this->getId_proveedor()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarComprasId() {
		$sql = "SELECT * FROM compra WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function GuardarCompra() {
		$sql = "INSERT INTO compra VALUES (NULL,{$this->getCodigo()},'{$this->getFecha()}','{$this->getHora()}',{$this->getTipo()},"
		. "{$this->getId_plazo()},'{$this->getFecha_vencimiento()}',{$this->getId_proveedor()},'{$this->getDetalle_compra()}',"
		. "{$this->getSub_total()},{$this->getIva()},{$this->getTotal()},{$this->getSaldo()})";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerUltimaCompra() {
		$sql = "SELECT * FROM compra ORDER BY id DESC LIMIT 1";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerCompra() {
		$sql = "SELECT * FROM compra WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE compra SET fecha='{$this->getFecha()}',hora='{$this->getHora()}',tipo={$this->getTipo()},plazo={$this->getId_plazo()},"
		. "fecha_vencimiento='{$this->getFecha_vencimiento()}',detalle_compra='{$this->getDetalle_compra()}',"
		. "sub_total={$this->getSub_total()},iva={$this->getIva()},total={$this->getTotal()},{$this->getSaldo()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarCompra() {
		$sql = "DELETE FROM compra WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerCompraCodigo() {
		$sql = "SELECT * FROM compra WHERE codigo = {$this->getCodigo()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
	public function ReportesCompras($fechaInicial,$fechaFinal){

		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT * FROM compra WHERE fecha like '%$fechaFinal%'";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT * FROM compra WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'";
			} else {

				$sql = "SELECT * FROM compra WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
			}
		}		
		
		$resul = $this->db->query($sql);
		return $resul;

	}
	public function Abonar() {
		$sql = "UPDATE compra SET saldo = {$this->getSaldo()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	
}

