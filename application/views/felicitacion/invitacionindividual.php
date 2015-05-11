<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Agregar <small>Invitacion Individual</small></h1>
			</div>
		</div>
	</div>
</div>
<?php if ($error !== '') { ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<!-- <div class="alert alert-danger" role="alert"><p><?php echo $error ?></p></div> -->
		</div>
	</div>
</div>
<?php } ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="div-datos"></div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form id="form-seleccionar" method="post" action="<?php echo base_url();?>index.php/felicitacion/agregarinvitacionindividual">
				<div class="form-group">
					<label for="id-entero" class="control-label">Evento</label><br>
					<select class="form-control" id="id-evento" name="id-evento" required>
						<?php foreach ($eventos as $e) {	?>
						<option value="<?php echo $e->id;?>"><?php echo $e->nombre_evento;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="id-empleado" class="control-label">No Empleado</label><br>
					<input class="form-control" type="text" id="id-empleado" name="id-empleado" data-container="body" data-toggle="popover" data-placement="left" data-content="No. del empleado." value="" required>
				</div>
				<div class="form-group">
					<label for="id-variable" class="control-label">Variable</label><br>
					<select class="form-control" id="id-variable" name="id-variable" required>
						<?php foreach ($variables as $v) {	?>
						<option value="<?php echo $v->id;?>"><?php echo $v->nombre_variable;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="valor-entero" class="control-label">Valor Entero</label><br>
					<input class="form-control" type="text" id="valor-entero" name="valor-entero" data-container="body" data-toggle="popover" data-placement="left" data-content="Valor Entero" value="" required>
				</div>
				<div class=" form-group">
					<button id="btn-submit" type="submit" class="btn btn-primary">Seleccionar</button>
				</div>
			</form>
		</div>
	</div>
</div>