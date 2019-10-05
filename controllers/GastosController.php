<?php

require_once 'models/Gastos.php'; 

class gastosController{
	public function index() {
		require_once 'views/layout/menu.php';
		$gastos = new Gastos();
		$listaGastos = $gastos->MostrarGastos();
		require_once 'views/gastos/listaGastos.php';
		require_once 'views/layout/copy.php';
	}
	public function nuevogastos() {
		require_once 'views/layout/menu.php';
		require_once 'views/gastos/registarGastos.php';		
		require_once 'views/layout/copy.php';
		
	}
	public function guardargasto() {
		if($_POST['valor']){
			$fecha = isset($_POST['fecha']) ? $_POST['fecha']:FALSE;
		}
	}
}