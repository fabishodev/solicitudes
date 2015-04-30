<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Editar <small>Variable</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<form id="form_mensaje" method="post" action="<?php echo base_url();?>index.php/eventos/editarvar/<?php echo $variable->id ?>">
				<div class="form-group">
					<label for="id-variable" class="control-label">Id Variable:</label><br>
					<input class="form-control" type="text" id="id-variable" name="id-variable" data-container="body" data-toggle="popover" data-placement="left" data-content="Id variable." value="<?php echo $variable->id ?>" readonly>
				</div>
				<div class="form-group">
					<label for="nombre-variable" class="control-label">Nombre de la Variable:</label><br>
					<input class="form-control" type="text" id="nombre-variable" name="nombre-variable" data-container="body" data-toggle="popover" data-placement="left" data-content="Nombre de la variable." value="<?php echo $variable->nombre_variable ?>" required>
				</div>
				<div class="form-group">
					<label for="descripcion-variable" class="control-label">Descripción de la Variable:</label><br>
					<textarea class="form-control" rows="3" id="descripcion-variable" name="descripcion-variable" data-container="body" data-toggle="popover" data-placement="left" data-content="Descripción de la variable"  value="" required><?php echo $variable->descripcion ?></textarea>
				</div>			
				<div class="form-group">
					<label for="estatus-variable" class="control-label">Estatus:</label><br>
					<select class="form-control" id="estatus-variable" name="estatus-variable">
						<option value="1">Activa</option>
						<option value="0">No activa</option>
						
					</select>
				</div>
				<div class=" form-group">
					<button type="submit" class="btn btn-primary">Editar</button>
					<p><?php echo anchor ('eventos/variables','Regresar a lista') ?></p>
				</div>
			</form>
		</div>
	</div>
</div>