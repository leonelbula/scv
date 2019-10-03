<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor Proveedor
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Proveedor</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		  <a href="<?=URL_BASE?>proveedor/registrar">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

            Nuevo proveedor

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
              <th>Razon Social</th>
			  <th>Nit</th> 
			  <th>Direccion</th>
			  <th>Ciudad</th>
			  <th>Departamento</th> 
			  <th>Telefono</th>
			  <th>Correo</th>
			  <th>Vendedor</th>
			  <th>Tel-Vendedor</th>
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
				while ($row = $listaproveedor -> fetch_object()):
				 ?>
                <tr>
                  <td><?=$row->id?></td>
                  <td><a href="<?=URL_BASE?>proveedor/ver&id=<?=$row->id?>"><?=$row->nombre?></a></td>
				  <td><?=$row->nit?></td>
				  <td><?=$row->direccion?></td>
				  <td><?=$row->ciudad?></td>
				  <td><?=$row->departamento?></td>
				  <td><?=$row->telefono?></td>
				  <td><?=$row->email?></td>
				  <td><?=$row->vendedor?></td>
				  <td><?=$row->tel_vendedor?></td>
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>proveedor/editar&id=<?=$row->id?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-pencil"></i>
							  </button>
						  </a>
						  <a href="<?=URL_BASE?>proveedor/eliminar&id=<?=$row->id?>">
							<button class="btn btn-danger">
								<i class="fa fa-times"></i>
							</button>
						  </a>
					  </div>
				  </td>
                </tr>
				<?php endwhile; ?>
		   </tbody>

        </table> 

      </div>
		
        
    </div>
	  <div class="box-footer">
          Proveedores
        </div>

  </section>

</div>
