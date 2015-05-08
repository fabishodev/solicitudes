<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Lista <small>Felicitados</small></h1>
			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<form id="form-seleccionar" method="post" action="<?php echo base_url();?>index.php/eventos/felicitados">
			<div class="form-group">
				<label for="anio" class="control-label">Año</label><br>
					<select class="form-control" id="anio" name="anio" required>
						<?php foreach ($anios as $a) {	?>
						<option value="<?php echo $a->anio_felicitacion;?>"><?php echo $a->anio_felicitacion;?></option>
						<?php } ?>
					</select>
				</div>
				<div class=" form-group">
					<button id="btn-submit" type="submit" class="btn btn-primary">Seleccionar</button>
				</div>
			</form>
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
						<th>Nombre</th>
						<th>Año Felicitado</th>
						<th>Estatus</th>
						<th>Fecha Nacimiento</th>	
						<th>Carta</th>					
					</tr>
				</thead>
				<tbody>
					<?php
					if ($felicitados !== FALSE) {
					foreach ($felicitados as $fila) {
					?>
					<tr>
						<td>
							<?php echo  $fila->id_empleado ?>
						</td>
						<td>
							<?php echo  $fila->nombre ." " . $fila->primer_apellido ." " . $fila->segundo_apellido  ?>
						</td>
						<td>
							<?php  echo   $fila->anio_felicitacion	?>
						</td>
						<td>
							<?php  echo   $fila->felicitado	?>
						</td>
						<td>
							<?php echo date('Y-m-d', strtotime($fila->fecha_nacimiento)) ?>
						</td>						
						<td>
							<?php  echo   $fila->ruta_carta	?>
						</td>
					</tr>
					<?php
					}
					}
					?>
				</tbody>
				<tfoot>
						<th>Id</th>
						<th>Nombre</th>
						<th>Año Felicitado</th>
						<th>Estatus</th>
						<th>Fecha Nacimiento</th>
						<th>Carta</th>	
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