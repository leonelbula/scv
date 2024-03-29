<?php

require_once '../../../config/DataBase.php';

class ListaFactura {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	
public function MostrarInformacionEmpresa() {
$sql = "SELECT * FROM datos_empresa ";
$resul = $this->db->query($sql);
return $resul;
}
public function VerVentaCodigo($codigo) {
$sql = "SELECT * FROM venta WHERE codigo = $codigo";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarClienteId($id) {
$sql = "SELECT * FROM cliente WHERE id = $id";
$resul = $this->db->query($sql);
return $resul;
}
	
}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){
$codigo = $this->codigo;
$factura = new ListaFactura();
$detalles = $factura->VerVentaCodigo($codigo);

$datosEmpresa = $factura->MostrarInformacionEmpresa();

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}

while ($row = $detalles-> fetch_object()) {
$id_cliente = $row->id_cliente;
$tipoventa = $row->tipo;
$plazo = $row->id_plazo;
$fecha = $row->fecha;
$fechavencimiento = $row->fecha_vencimiento;
$productos = json_decode($row->detalle_venta, true);
$subtotal = number_format($row->sub_total);
$impuesto = number_format($row->iva);
$total = number_format($row->total);
}

$datosCliente = $factura->MostrarClienteId($id_cliente);
while ($row1 = $datosCliente->fetch_object()) {
$nombreC = $row1->nombre;
$nitC = $row1->nit;
$direccionC = $row1->direccion;
$departamentoC = $row1->departamento;
$ciudadC = $row1->ciudad;
$emailC = $row1->email;
$telC = $row1->telefono;
}

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo-negro-bloque.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: 1.069.487.850

					<br>
					Dirección: Carrera 11 N 21-20

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 300 741 27 21
					
					<br>
					ventas@sacv.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$codigo</td>

		</tr>

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				<strong>Cliente:</strong> $nombreC
				<br>
				<strong>CC o NIT:</strong> $nitC
				<br>
				<strong>Direccion:</strong> $direccionC 
				<br>
				<strong>Departamento:</strong> $departamentoC  <strong>Ciudad:</strong> $ciudadC

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				<strong>Fecha factura:</strong> $fecha
				<br>
				<strong>Fecha Vencimiento:</strong> $fechavencimiento

			</td>

		</tr>
		

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:55px; text-align:center; font-weight: bold">Cod.</th>
		<th style="border: 1px solid #666; background-color:white; width:215px; text-align:center; font-weight: bold">Producto detalle</th>
		<th style="border: 1px solid #666; background-color:white; width:45px; text-align:center; font-weight: bold">Cant.</th>		
		<th style="border: 1px solid #666; background-color:white; width:60px; text-align:center; font-weight: bold">Precio</th>							
		<th style="border: 1px solid #666; background-color:white; width:45px; text-align:center; font-weight: bold">Desc</th>
		<th style="border: 1px solid #666; background-color:white; width:40px; text-align:center; font-weight: bold">Iva</th>
		<th style="border: 1px solid #666; background-color:white; width:80px; text-align:center; font-weight: bold">Valor Total</th>		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
foreach ($productos as $key => $item) {
$precio =  number_format($item['precio']);
$subtotalP = number_format($item['subtotal']);
$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:55px; text-align:left">
			$item[codigo]
			</td>
		
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:215px; text-align:left">
			$item[descripcion]	
			</td>
		
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:45px; text-align:center">
			$item[cantidad]
			</td>
		
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:60px; text-align:center">
			$precio
			</td>
		
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:45px; text-align:center">
			$item[descuento]
			</td>
		
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:40px; text-align:center">
			$item[impuesto]	
			</td>

			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:80px; text-align:center"> 
				$subtotalP
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>
			
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:left">
				CODIGO CURE
			</td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right; font-weight: bold">
				SubTotal:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				 $subtotal
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:right; font-weight: bold">
				Impuesto:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				 $impuesto
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:right; font-weight: bold">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				 $total
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
// ---------------------------------------------------------

// ---------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:540px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center; font-weight: bold">
			Resolucion DIAN
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque6, false, false, false, false, '');
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf');
}

}
$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>