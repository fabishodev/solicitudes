   <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1>Solicitar <small>Beca</small></h1>
      </div>
    </div>
  </div>
</div>
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
            <form id="nuevo_tram_form" method="post" enctype="multipart/form-data" action ="<?php echo base_url();?>index.php/solicitud/nuevo_tramite"  >            
              <div class="row">
                 <div class="col-md-6">
                        <label for="servicio" class="control-label">Servicio:</label><br>
                        <input class="form-control" type="text" id="servicio" name="servicio" value="<?php echo $servicio;?>" readonly="readonly" required>
                      </div>
                    </div>
                       <div class="row">
                      <div class="col-md-6">
                        <label for="primer_app_muestra" class="control-label">Cartera:</label><br>
                        <input class="form-control" type="text" id="cartera" name="cartera" value="<?php echo $cartera->nombre_cartera;?>" readonly="readonly" required>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <label for="contenido" class="control-label">Favor de escribir el contenido de la solicitud:</label>
                        <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="4" required></textarea>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="file1" class="control-label">Acta becario:</label>
                        <input type="file" name="file1"accept=".pdf" required>
                      </div>
                    </div>     
                      <div class="row">
                      <div class="col-md-6">
                        <label for="file2" class="control-label">Constancia:</label>
                        <input type="file" name="file2" accept=".pdf" required>
                      </div>
                    </div>    
                    <br>             
             <button type="submit" class="btn btn-default">Enviar</button>
             <a href="<?php echo base_url();?>index.php/solicitud/lista" class="btn btn-primary">Regresar a lista</a>
            </form>
       </div>
     </div>
   </div>