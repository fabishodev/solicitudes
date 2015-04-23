<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Seleccionar <small>Eventos</small></h1>
			</div>
		</div>
	</div><?php if ($error !== '') { ?>
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-danger" role="alert"><p><?php echo $error ?></p></div>
		</div>
	</div>
	<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form id="form-seleccionar" method="post" action="<?php echo base_url();?>index.php/eventos/informacion/">
					<div class="form-group">
						<select class="form-control" id="id-evento" name="id-evento" required>						
							<?php foreach ($eventos as $e) {	?>
							<option value="<?php echo $e->id;?>"><?php echo $e->nombre_evento;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id-empleado" class="control-label">No Empleado</label><br>
						<input class="form-control" type="text" id="id-empleado" name="id-empleado" data-container="body" data-toggle="popover" data-placement="left" data-content="Fecha fin del evento." value="" required>
					</div>
					<div class=" form-group">
						<button type="submit" class="btn btn-primary">Seleccionar</button>
						
					</div>
				</form>
			</div>
		</div>