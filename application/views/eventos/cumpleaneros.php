<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Lista <small>Cumplañeros</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/00" class="btn btn-success btn-sm" href="">&nbsp;Hoy</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/01" class="btn btn-success btn-sm" href="">&nbsp;Enero</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/02" class="btn btn-success btn-sm" href="">&nbsp;Febrero</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/03" class="btn btn-success btn-sm" href="">&nbsp;Marzo</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/04" class="btn btn-success btn-sm" href="">&nbsp;Abril</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/05" class="btn btn-success btn-sm" href="">&nbsp;Mayo</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/06" class="btn btn-success btn-sm" href="">&nbsp;Junio</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/07" class="btn btn-success btn-sm" href="">&nbsp;Julio</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/08" class="btn btn-success btn-sm" href="">&nbsp;Agosto</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/09" class="btn btn-success btn-sm" href="">&nbsp;Septiembre</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/10" class="btn btn-success btn-sm" href="">&nbsp;Octubre</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/11" class="btn btn-success btn-sm" href="">&nbsp;Noviembre</a>
			<a href="<?php echo base_url();?>index.php/eventos/cumpleaneros/12" class="btn btn-success btn-sm" href="">&nbsp;Diciembre</a>
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
						<th>Cumpleañero</th>
						<th>Fecha Nacimiento</th>
						<th>Edad</th>	
						<th>Email</th>								
						<th>Opciones</th>

					</tr>
				</thead>
				<tbody>
					<?php
					if ($cumpleaneros !== FALSE) {
					foreach ($cumpleaneros as $fila) {
					?>
					<tr>
						<td>
							<?php echo  $fila->id_empleado ?>
						</td>
						<td>
							<?php echo  $fila->nombre ." " . $fila->primer_apellido ." " . $fila->segundo_apellido  ?>
						</td>
						<td>
							<?php echo date('Y-m-d', strtotime($fila->fecha_nacimiento)) ?>
						</td>
						<td>								
  						 <?php  echo   $fila->edad	?>									   
						</td>	
						<td>								
  						 <?php  echo   $fila->correo_electronico	?>									   
						</td>							
						<td>
							<?php echo anchor('eventos/felicitar/'.$fila->id_empleado,'Felicitar',array('class' => 'btn btn-default btn-xs')) ?>
							<?php echo anchor('eventos/editar/'.$fila->id_empleado,'Enviar Carta',array('class' => 'btn btn-info btn-xs')) ?>
							<?php echo anchor('eventos/editar/'.$fila->id_empleado,'Imprimir Carta',array('class' => 'btn btn-primary btn-xs')) ?>
						</td>
					</tr>
					<?php
					}
					}
					?>
				</tbody>
				<tfoot>
				<th>Id</th>
						<th>Cumpleañero</th>
						<th>Fecha Nacimiento</th>
						<th>Edad</th>
						<th>Eamil</th>									
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