<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1>Lista <small>Variables</small></h1>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url();?>index.php/eventos/nuevavariable" class="btn btn-success btn-sm pull-right" href=""> <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Variable</a>
		</div>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    	<table class="table" id="tbl-sol">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre Evento</th>
						<th>Descripcion</th>
						<th>Variable</th>
						<th>Descripcion</th>
						<th>Estatus</th>				
						<th>Fecha Creado</th>						
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
		              if ($variables !== FALSE) {
		                foreach ($variables as $fila) {
		                  ?>
		                  <tr>
		                  	 <td>
		                      <?php echo  $fila->id ?>
		                    </td>
		                    <td>
		                      <?php echo  $fila->nombre_evento ?>
		                    </td>
		                    <td>
		                      <?php echo  $fila->des_evento ?>
		                    </td>
		                     <td>
		                      <?php echo  $fila->nombre_variable ?>
		                    </td>
		                      <td>
		                      <?php echo  $fila->descripcion ?>
		                    </td>
		                     <td>
		                     <?php if ( $fila->estatus == 1){ ?>
		                       <span class="label label-success"> Activa </span>
		                   		<?php }elseif ($fila->estatus == 0) { ?>                   		
		                   	
		                      <span class="label label-danger"> No Activa</span>
		                     <?php }?>
		                    </td>		                 
		                    <td>
		                      <?php echo date('Y-m-d', strtotime($fila->fecha_creado));?>	
		                    </td>                 
		                                 
		                    <td>		                    	
		                    	<?php echo anchor('eventos/editarvariable/'.$fila->id,'Editar',array('class' => 'btn btn-warning btn-xs')) ?>
		                    </td>	                    
		                  </tr>

		                  <?php
		                }
		              }
            		?>
				</tbody>
				<tfoot>
						<th>Id</th>
						<th>Nombre Evento</th>
						<th>Descripcion</th>
						<th>Variable</th>
						<th>Descripcion</th>
						<th>Estatus</th>				
						<th>Fecha Creado</th>						
						<th>Opciones</th>
				</tfoot>
			</table>
    	</div>
    </div>
</div>
<script>
	 $(document).ready(function () {
	 	$('#tbl-sol').DataTable({
	 		order: [[0, "asc"]],
	 		language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }

        });
	 });
</script>
