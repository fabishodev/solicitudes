<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Nueva <small>Variable</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<form id="form_mensaje" method="post" action="<?php echo base_url();?>index.php/eventos/agregarnuevavariable">
				<div class="form-group">
					<select class="form-control" id="id-evento" name="id-evento" required>
						<?php foreach ($eventos as $e) {	?>
						<option value="<?php echo $e->id;?>"><?php echo $e->nombre_evento;?></option>
						<?php } ?>
					</select>
				</div>				
				<div class="form-group">
					<label for="nombre-variable" class="control-label">Nombre Variable:</label><br>
					<input class="form-control" type="text" id="nombre-variable" name="nombre-variable" data-container="body" data-toggle="popover" data-placement="left" data-content="Nombre Variable." value="" required>
				</div>
				<div class="form-group">
					<label for="descripcion-variable" class="control-label">Descripción Variable:</label><br>
					<input class="form-control" type="text" id="descripcion-variable" name="descripcion-variable" data-container="body" data-toggle="popover" data-placement="left" data-content="Descripción Variable." value="" required>
				</div>
				<div class=" form-group">
					<button type="submit" class="btn btn-primary">Agregar</button>
						<p><?php echo anchor ('eventos/variables','Regresar a lista') ?></p>
				</div>
			</form>
		</div>
	</div>
</div>