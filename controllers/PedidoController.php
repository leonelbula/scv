<?php

require_once 'models/Pedido.php'; 

class PedidoController{
	public function index() {
		require_once 'views/layout/menu.php';
		$pedido = new Pedido();
		$listaPedido = $pedido->MostrarPedido();		
		require_once 'views/pedido/listapedido.php';
		require_once 'views/layout/copy.php';
	}
	public function NuevoPedido() {
		require_once 'views/layout/menu.php';
		require_once 'views/pedido/nuevoPedido.php';		
		require_once 'views/layout/copy.php';
		
	}
}