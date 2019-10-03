<?php

require_once 'models/Cliente.php';
require_once 'models/Venta.php';
require_once 'models/AbonosCliente.php';

class ClienteController {
	
	public function Index() {
		require_once 'views/layout/menu.php';
		$cliente = new Cliente();
		$listaCliente = $cliente->listarClientes();
		require_once 'views/cliente/listaclientes.php';
		require_once 'views/layout/copy.php';
	}
	static public function MostrarCliente() {
		$cliente = new Cliente();
		$listaCliente = $cliente->listarClientes();
		return $listaCliente;
	}
	static public function MostrarClienteId($id) {
		$cliente = new Cliente();
		$cliente->setId($id);
		$listaCliente = $cliente->listarClienteId();
		return $listaCliente;
	}
	public function registrar() {
		require_once 'views/layout/menu.php';
		require_once 'views/cliente/registrar.php';
		require_once 'views/layout/copy.php';
	}
	public function editar() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$cliente = new Cliente();
			$cliente->setId($id);
			$detallesCliente = $cliente->listarClienteId();
			require_once 'views/cliente/editar.php';
			require_once 'views/layout/copy.php';
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
	}
	public function Guardar() {
		if($_POST){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:FALSE;
			$precio_facturar = isset($_POST['precio_fact']) ? $_POST['precio_fact']:FALSE;
			$interes = isset($_POST['interes']) ? $_POST['interes']:FALSE;
			$cuenta_contable = isset($_POST['cuentacontable']) ? $_POST['cuentacontable']:FALSE;
			
			if($nombre && $nit && $direccion && $ciudad){
				$cliente = new Cliente();
				$cliente->setNombre(strtoupper($nombre));
				$cliente->setNit($nit);
				$cliente->setDireccion($direccion);
				$cliente->setDepartamento(strtoupper($departamento));
				$cliente->setCiudad(strtoupper($ciudad));
				$cliente->setTelefono($telefono);
				$cliente->setEmail($email);
				$cliente->setTipo($tipo);
				$cliente->setPrecio_facturar($precio_facturar);
				$cliente->setInteres($interes);				
				$cliente->setCuenta_contable($cuenta_contable);
				
				$resp = $cliente->Guargar();				
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Proveedor Guardado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function Actualizar() {
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:FALSE;
			$precio_facturar = isset($_POST['precio_fact']) ? $_POST['precio_fact']:FALSE;
			$interes = isset($_POST['interes']) ? $_POST['interes']:FALSE;
			$cuenta_contable = isset($_POST['cuentacontable']) ? $_POST['cuentacontable']:FALSE;
			
			if($id && $nombre && $nit){
				$cliente = new Cliente();
				$cliente->setId($id);
				$cliente->setNombre(strtoupper($nombre));
				$cliente->setNit($nit);
				$cliente->setDireccion($direccion);
				$cliente->setDepartamento(strtoupper($departamento));
				$cliente->setCiudad(strtoupper($ciudad));
				$cliente->setTelefono($telefono);
				$cliente->setEmail($email);
				$cliente->setTipo($tipo);
				$cliente->setPrecio_facturar($precio_facturar);
				$cliente->setInteres($interes);				
				$cliente->setCuenta_contable($cuenta_contable);
				$resp = $cliente->Actualizar();
				
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Guardada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
			}
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

		</script>';
		}
	}
	public function Eliminar() {
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$Cliente = new Cliente();
			$Cliente->setId($id);
			$resp = $Cliente->Eliminar();
			if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Proveedor Eliminado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

		</script>';
		}
	}
	public function ver() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$cliente = new Cliente;
			$cliente->setId($id);
			$detallesCliente = $cliente->listarClienteId();
			require_once 'views/cliente/ver.php';
			require_once 'views/layout/copy.php';
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
	}
	public function ComprasClientes(){
		require_once 'views/layout/menu.php';		
		require_once 'views/cliente/comprasclientes.php';
		require_once 'views/layout/copy.php';	
	}
	public function ReportesClientes(){
		require_once 'views/layout/menu.php';		
		require_once 'views/cliente/reportesClientes.php';
		require_once 'views/layout/copy.php';	
	}
	public function estadoCuenta(){
		require_once 'views/layout/menu.php';
		$cuenta = new Venta();
		$listaEstado = $cuenta->MostrarVentasCliente();			
		require_once 'views/cliente/estadoCuenta.php';
		require_once 'views/layout/copy.php';	
	}
	public function verestadocuentacliente() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id_cliente = $_GET['id'];
			$cuenta = new Venta();
			$cuenta->setId_cliente($id_cliente);
			$listaEstado = $cuenta->MostrarComprasCliente();
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
		
		require_once 'views/cliente/estadoCuentaCliente.php';		
		require_once 'views/layout/copy.php';
	}
	public function abonarfactura() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$cuenta = new Venta();
			$cuenta->setId($id);
			$listaEstado = $cuenta->MostrarVentasId();
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
		
		require_once 'views/cliente/abonarfactura.php';		
		require_once 'views/layout/copy.php';
	}
	public function guardarabono() {
		if (isset($_POST['id'])) {
			$id_factura = $_POST['id'];
			$abono = (int)$_POST['valor'];			
			$descripcion = $_POST['descripcion'];
			$fecha = $_POST['fecha'];
			
			$saldoVenta = new Venta();
			$saldoVenta->setId($id_factura);
			$valorSald = $saldoVenta->MostrarVentasId();
			
			while ($row = $valorSald->fetch_object()) {
				$saldoPendiente = (int)$row->saldo;
			}			
			if($saldoPendiente > $abono){
							
				$nuevoSaldo = $saldoPendiente - $abono;
				$ventaAbono = new Venta();
				$ventaAbono->setId($id_factura);
				$ventaAbono->setSaldo($nuevoSaldo);
				$reptA = $ventaAbono->Abonar();
				
				$abonoVenta = new AbonosCliente();
				$abonoVenta->setId_factura($id_factura);
				$abonoVenta->setValor($abono);
				$abonoVenta->setDescripcion($descripcion);
				$abonoVenta->setFecha($fecha);
				
				$reptB = $abonoVenta->RegistrarAbono();
				
				if($reptA && $reptB){
					echo'<script>

					swal({
						  type: "success",
						  title: "Abono registrado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonosfactura&id='.$_POST['id'].'";

							}
						})

					</script>';
				}
			}else{
				echo'<script>

					swal({
						  type: "warning",
						  title: "¡El abono es superior al saldo pendiente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonarfactura&id='.$_POST['id'].'";

							}
						})

			  	</script>';
			}
			
			
		}
	}
	public function abonosfactura() {
		require_once 'views/layout/menu.php';
		if (isset($_GET['id'])) {
			
			$id_factura = $_GET['id'];
			
			$abonos = new AbonosCliente();
			$abonos->setId_factura($id_factura);
			$listaAbono = $abonos->MostrarAbonosId();
			
			$saldoCompra = new Venta();
			$saldoCompra->setId($id_factura);
			$valorSald = $saldoCompra->MostrarVentasId();		
				
			
		}
		require_once 'views/cliente/abonosfactura.php';		
		require_once 'views/layout/copy.php';
	}
	public function editarAbono() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$abono = new AbonosCliente();
			$abono->setId($id);
			$DatosAbono = $abono->VerAbonoId();
		}
		require_once 'views/cliente/editarabonos.php';		
		require_once 'views/layout/copy.php';
	}
	public function ActualizarAbono() {
		if($_POST['id']){
			
			$id = $_POST['id'];
			$abonoValor = (int)$_POST['valor'];			
			$descripcion = $_POST['descripcion'];
			$fecha = $_POST['fecha'];
			
			$abono = new AbonosCliente();
			$abono->setId($id);
			$DatosAbono = $abono->VerAbonoId();
			
			while ($row =$DatosAbono-> fetch_object()) {
				$id_venta = $row->id_factura;
				$abonoanterior = (int)$row->valor;
			}
			
			$venta = new Venta();
			$venta->setId($id_venta);
			$datoVenta = $venta->MostrarVentasId();
			
			while ($row1 = $datoVenta->fetch_object()) {
				$saldo = (int)$row1->saldo;
			}
			$nuevosaldo = $saldo + $abonoanterior;
			
			$venta->setSaldo($nuevosaldo);
			$venta->Abonar();
			
			$abono->setId($id);
			$abono->setValor($abonoValor);
			$abono->setDescripcion($descripcion);
			$abono->setFecha($fecha);
			$respt = $abono->EditarAbono();
			
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Abono actualizado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonosfactura&id='.$id_venta.'";

							}
						})

					</script>';
			} else {
				
			}
			
			
			
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar pago relizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentaproveedor";

							}
						})

			  	</script>';
		}
	}
	public function EliminarAbono() {
		if($_GET['id']){
			
			$id = $_GET['id'];
			
			
			$abono = new AbonosCliente();
			$abono->setId($id);
			$DatosAbono = $abono->VerAbonoId();
			
			while ($row =$DatosAbono-> fetch_object()) {
				$id_venta = $row->id_factura;
				$abonoanterior = (int)$row->valor;
			}
			
			$venta = new Venta();
			$venta->setId($id_venta);
			$datoVenta = $venta->MostrarVentasId();
			
			while ($row1 = $datoVenta->fetch_object()) {
				$saldo = (int)$row1->saldo;
			}
			$nuevosaldo = $saldo + $abonoanterior;
			
			$venta->setSaldo($nuevosaldo);
			$venta->Abonar();
			
			$abono->setId($id);
			
			$respt = $abono->Eliminarbono();
			
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Abono Eliminado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonosfactura&id='.$id_venta.'";

							}
						})

					</script>';
			} else {
				
			}
			
			
			
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar pago relizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentaproveedor";

							}
						})

			  	</script>';
		}
	}
}
