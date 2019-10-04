<?php

require_once 'models/Gasto.php'; 

class Gastosontroller{
	public function index() {
		require_once 'views/layout/menu.php';			
		require_once 'views/gastos/listaGastos.php';
		require_once 'views/layout/copy.php';
	}
	public function NuevoGastos() {
		require_once 'views/layout/menu.php';
		require_once 'views/gastos/registarGastos.php';		
		require_once 'views/layout/copy.php';
		
	}
}