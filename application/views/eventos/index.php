<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>Eventos <small></small></h1>
			</div>
		</div>
	</div>
</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
						if ($eventos !== FALSE) {
					foreach ($eventos as $fila) { ?>
					<div class="jumbotron">
						<h1>   <?php echo  $fila->nombre_evento ?></h1>
						<p><?php echo  $fila->des_evento ?></p>
						<p><?php echo anchor('eventos/informacion/'.$fila->id,'Ir',array('class' => 'btn btn-primary')) ?></p>
					</div>
					<?php
					}
					}
					?>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url();?>js/eventos.js"></script>
		<script>aspaaug.eventos.ejemplo_click();</script>