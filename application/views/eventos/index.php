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
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Brand</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Lista De Eventos</a></li>
									<li class="divider"></li>
									<li><a href="#">Evento 5</a></li>
								</ul>
							</li>
						</ul>
						</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
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
						<p><a id="btn-informacion" class="btn btn-primary btn-lg" href="#" role="button">Ir</a></p>
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