<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php  echo link_tag( 'css/lib/jquery.timepicker.css');?>
<script src="<?php echo base_url();?>js/lib/jquery.timepicker.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Nuevo <small>Evento</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<form id="form_mensaje" method="post" action="<?php echo base_url();?>index.php/eventos/nuevoevento">
				<div class="form-group">
					<label for="nombre-evento" class="control-label">Nombre del Evento:</label><br>
					<input class="form-control" type="text" id="nombre-evento" name="nombre-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Nombre del evento." value="" required>
				</div>
				<div class="form-group">
					<label for="descripcion-evento" class="control-label">Descripción del Evento:</label><br>
					<textarea class="form-control" rows="3" id="descripcion-evento" name="descripcion-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Descripción del evento"  value="" required></textarea>
				</div>
				<div class="form-group">
					<label for="lugar-evento" class="control-label">Lugar del Evento:</label><br>
					<input class="form-control" type="text" id="lugar-evento" name="lugar-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Lugar del evento." value="" required>
				</div>
				<div class="form-group">
					<label for="hora-inicio-evento" class="control-label">Hora inicio del Evento:</label><br>
					<input class="form-control" type="text" id="hora-inicio-evento" name="hora-inicio-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Hora inicio del evento." value="" required>
				</div>
				<div class="form-group">
					<label for="hora-fin-evento" class="control-label">Hora fin del Evento:</label><br>
					<input class="form-control" type="text" id="hora-fin-evento" name="hora-fin-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Hora fin del evento." value="" required>
				</div>
				<div class="form-group">
					<label for="fecha-inicio-evento" class="control-label">Fecha inicio del Evento:</label><br>
					<input class="form-control" type="text" id="fecha-inicio-evento" name="fecha-inicio-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Fecha inicio del evento." value="" required>
				</div>
				<div class="form-group">
					<label for="fecha-fin-evento" class="control-label">Fecha fin del Evento:</label><br>
					<input class="form-control" type="text" id="fecha-fin-evento" name="fecha-fin-evento" data-container="body" data-toggle="popover" data-placement="left" data-content="Fecha fin del evento." value="" required>
				</div>
				<div class=" form-group">
					<button type="submit" class="btn btn-primary">Crear</button>
						<p><?php echo anchor ('eventos/lista','Regresar a lista') ?></p>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$(function() {
	$( "#fecha-inicio-evento" ).datepicker();
	$( "#fecha-fin-evento" ).datepicker();
	$('#hora-inicio-evento').timepicker({ 'timeFormat': 'H:i:s' });
	$('#hora-fin-evento').timepicker({ 'timeFormat': 'H:i:s' });
});
</script>
