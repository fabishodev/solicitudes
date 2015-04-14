 <?php echo link_tag('css/lib/jquery.dataTables.min.css');?>
  <script src="<?php echo base_url();?>js/lib/jquery.dataTables.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
  				<h1>Solicitudes <small>lista</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url();?>index.php/solicitud/seleccion" class="btn btn-success pull-right" href=""> <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar</a>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<table class="table" id="tbl-sol">
				<thead>
					<tr>
						<th>Id</th>
						<th>Contenido</th>
						<th>Servicio</th>
						<th>Fecha Solicitud</th>
						<th>Afiliado</th>
						<th>Cartera</th>
						<th>Estatus</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
		              if ($solicitudes !== FALSE) {
		                foreach ($solicitudes as $fila) {
		                  ?>
		                  <tr>
		                    <td>
		                      <?php echo  $fila->id_solicitud ?>
		                    </td>
		                    <td>
		                      <?php echo  $fila->contenido ?>
		                    </td>
		                     <td>
		                      <?php echo  $fila->dsc_servicio ?>
		                    </td>
		                   <td>
		                      <?php echo  $fila->fecha_solicitud ?>
		                    </td>
		                    <td>
		                      <?php echo  $fila->nombre_completo ?>
		                    </td>
		                    <td>
		                      <?php echo  $fila->nombre_cartera ?>
		                    </td>
		                    <td>
		                      <?php if ($fila->dsc_estatus == 'Nueva Solicitud') { ?>
		                      <span class="label label-info"> <?php echo  $fila->dsc_estatus ?> </span>
		                       <?php } else if ($fila->dsc_estatus == 'Finalizada' || $fila->dsc_estatus == 'Apoyo Generado' ){ ?>
		                         <span class="label label-success"> <?php echo  $fila->dsc_estatus ?> </span>
		                     <?php } else { ?>	
		                     	 <span class="label label-warning"> <?php echo  $fila->dsc_estatus ?> </span>
		                     <?php } ?>	                   
		                    </td>	
		                    <td>
		                    	<button class="btn btn-primary btn-xs">Detalle</button>
		                    </td>	                    
		                  </tr>

		                  <?php
		                }
		              }
            		?>
				</tbody>
				<tfoot>
						<th>Id</th>
						<th>Contenido</th>
						<th>Servicio</th>
						<th>Fecha Solicitud</th>
						<th>Afiliado</th>
						<th>Cartera</th>
						<th>Estatus</th>
						<th></th>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<script>
	 $(document).ready(function () {
	 	$('#tbl-sol').DataTable({
	 		order: [[0, "desc"]],
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