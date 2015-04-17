
   <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1>Your file was successfully uploaded!<small></small></h1>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">		

			<ul>
			<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; ?>
			</ul>

			<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
			<p><?php echo anchor('solicitud/lista', 'Regresar a Lista'); ?></p>
			
		</div>
	</div>
</div>
