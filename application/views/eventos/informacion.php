<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Informacion <small>Evento</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<p><?php echo $id_empleado ?></p>
			<p><?php echo $afiliado->nombre." ".$afiliado->primer_apellido." ".$afiliado->segundo_apellido ?></p>
			<p><?php echo $afiliado->curp ?></p>
			<p><?php echo $afiliado->correo_electronico ?></p>
		</div>
	</div>
</div>
<?php if ($evento != NULL) { ?>
<div class="container">
	<div class="row">
		<h2><?php echo $evento->nombre_evento ?></h2>
		<div class="col-lg-6">
			
			<p><?php echo $evento->des_evento ?></p>
			<p><?php echo $evento->lugar ?></p>
			<p><?php echo $evento->fecha_inicio ?></p>
			<p><?php echo $evento->hora_inicio ?></p>
			<p><?php echo $evento->hora_fin ?></p>
		</div>
		<div class="col-lg-6">
			<p><?php echo $evento->nombre_variable ?></p>
			<p><?php echo $evento->descripcion ?></p>
			
			<form action ="<?php echo base_url();?>index.php/eventos/actualizar" method="post" class="form-inline">
				<div class="form-group">
					<label for="<?php echo $evento->nombre_variable ?>"><?php echo $evento->nombre_variable ?></label>
					<input type="text" class="form-control" id="<?php echo $evento->nombre_variable ?>" name="<?php echo $evento->nombre_variable ?>" value="<?php echo $evento->valor_entero ?>">
				</div>
				<button type="submit" class="btn btn-info">Aplicar</button>
			</form>
		</div>
	</div>
</div>
<?php } ?>
