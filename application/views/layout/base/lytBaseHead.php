<!DOCTYPE HTML>
<html>
  <head>
    <title>Solicitudes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <!-- <link href="css/lib/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/styles.css" rel="stylesheet" type="text/css">-->
    <!-- styles -->
    <?php echo link_tag( 'css/lib/bootstrap.min.css');?>
    <?php echo link_tag( 'css/lib/jquery.dataTables.min.css');?>
    <?php //echo link_tag( 'css/main.css'); ?>
    <?php // echo link_tag( 'css/styles.css');?>
    <!-- scripts -->
    <script src="<?php echo base_url();?>js/lib/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>js/lib/bootstrap.min.js"></script>
     <script src="<?php echo base_url();?>js/lib/jquery.dataTables.min.js"></script>
    <?php if (isset($scripts)): foreach ($scripts as $js):?>
    <script src="<?php echo base_url()."js/{$js}.js";?>" type="text/javascript"></script>
    <?php endforeach; endif;?>
  </head>
  <body>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </header>
    <nav id="mainMenu">
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
            <a class="navbar-brand" href="<?php anchor('eventos/') ?>">Eventos</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Eventos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo anchor('eventos/','Eventos') ?></li>
                    <li><?php echo anchor('eventos/seleccionar','Seleccionar') ?></li>
                  <li><?php echo anchor('eventos/lista','Lista De Eventos') ?></li>
                   <li><?php echo anchor('eventos/nuevo','Nuevo') ?></li>
                  <li class="divider"></li>
                  <li><a href="#">Evento 5</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Invitación <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo anchor('eventos/invitacionindividual','Individual') ?></li>                 
                  <li class="divider"></li>
                  <li><a href="#">Evento 5</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Variables <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo anchor('eventos/variables','Variables') ?></li>                 
                  <li class="divider"></li>
                  <li><a href="#">Evento 5</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cumpleaños <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo anchor('eventos/cumpleaneros','Cumpleañeros') ?></li>      
                
                </ul>
              </li>
            </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </nav>
        <section id="mainContent">