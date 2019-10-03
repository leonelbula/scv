<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Pedido de Ventas

		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Pincipal</a></li>
			<li><a>Pedidos</a></li>

		</ol>
    </section>
	
    <!-- Main content -->
    <section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">lista de Pedidos</h3>

			</div>
			<div class="box-body">
				<div class="box-header with-border">
					<a href="<?= URL_BASE ?>pedido/nuevopedido">
						<button class="btn btn-primary">

							Nuevo pedido

						</button>
					</a>
				</div>
			</div>
			<div class="box-body">
				<table class=" table table-bordered table-striped dt-responsive tablas" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>mesa</th>							
							<th>Estado</th>						
												
							<th>acciones</th>							
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						while ($row = $listaPedido->fetch_object()) {
							echo '<tr>

							 <td>' . ($i++) . '</td>

							 ';
							$id = $row->id_cliente;
							$detallesCliente = ClienteController::MostrarClienteId($id);
							while ($row1 = $detallesCliente->fetch_object()) {
								$Nomclientes = $row1->nombre;
							}
							echo '<td>' . $Nomclientes . '</td>';
							
							if ($row->tipo == 1) {

								$tipo = "<button class='btn btn-danger btn-xs'>Empreparacion</button>";
							} else {

								$tipo = "<button class='btn btn-warning btn-xs'>Contado</button>";
							}
							echo'<td>' . $tipo . '</td>                              
                 
					 <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$row->codigo.'">

                        <i class="fa fa-print"></i>

                      </button>';

							if ($_SESSION["identity"]->tipo == "admin") {

								echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$row->id.'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$row->id.'"><i class="fa fa-times"></i></button>';
							}

							echo '</div>  
						
                  </td>
				  <td>				 
				  </td>

                </tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				lista Pedidos
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

    </section>
    <!-- /.content -->
</div>