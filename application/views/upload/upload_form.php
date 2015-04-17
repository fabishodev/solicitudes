   <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1>Upload <small>file</small></h1>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php echo $error; ?>

			<?php echo form_open_multipart('upload/do_upload');?>		

			<input type="file" name="userfile" size="20" />

			<br /><br />				

			<input type="submit" value="upload" />

			</form>
		</div>
	</div>
</div>


