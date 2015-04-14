   <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1>Seleccion <small>tramite</small></h1>
      </div>
    </div>
  </div>
</div>
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
            <form id="nuevo_tram_form" method="post" enctype="multipart/form-data" action ="<?php echo base_url();?>index.php/solicitud/seleccion_tramite"  > 
              <div class="row">
                      <div class="col-md-6">
                 
                           <label for="cartera" class="control-label">Seleccionar Secretaría a donde va dirigido el trámite:</label>
                           <select class="form-control" name="cartera" id="cartera" required>
                          <option value="">Seleccione</option>
                          <?php foreach ($carteras as $cartera) {?>
                            <option value="<?php echo $cartera->id_cartera;?>"><?php echo $cartera->nombre_cartera;?></option>
                          <?php }?>
                        </select>                          
                    
                       
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                    
                            <label for="servicio" class="control-label">Seleccionar el servicio solicitado:</label><br>
                        <select class="form-control" name="servicio" id="servicio" required>
                          <option value="">Seleccione</option>
                          <?php foreach ($servicios as $serv) {?>
                            <option value="<?php echo $serv->id_servicio;?>"><?php echo $serv->dsc_servicio;?></option>
                          <?php }?>
                        </select>
                    
                      
                      </div>
                    </div>     
                    <br>             
             <button type="submit" class="btn btn-default">Submit</button>
            </form>
       </div>
     </div>
   </div>
  