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
						<p><?php echo  $fila->descripcion ?></p>			
						<p><?php echo  $fila->lugar ?></p>	
						<p>	<?php echo date('Y-m-d', strtotime($fila->fecha_inicio));?></p>			
						<?php if ($this->session->userdata('id_tipo_usuario')===3){ ?>
						<p><?php echo anchor('eventos/informacion/'.$fila->id_variable,'Ir',array('class' => 'btn btn-default')) ?></p>
						<?php } ?>
					</div>
					<?php
					}
					}
					?>
				</div>
			</div>
		</div>
		<script>aspaaug.eventos.ejemplo_click();</script>
		
		