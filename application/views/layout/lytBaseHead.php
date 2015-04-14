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
		<?php echo link_tag('css/lib/bootstrap.min.css');?>
        <?php echo link_tag('css/lib/jquery.dataTables.min.css');?>
       

        <!-- scripts -->
        <script src="<?php echo base_url();?>js/lib/jquery-1.11.2.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>js/lib/jquery.dataTables.min.js"></script>

<?php
if (isset($scripts)):
foreach ($scripts as $js):?>
            <script src="<?php echo base_url()."js/{$js}.js";?>" type="text/javascript"></script>
<?php
endforeach;
endif;?>

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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="<?php echo base_url();?>index.php/registroindex/index"><span class="icon-info-sign icon-white"></span>Solicitudes</a></li>                         
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <section id="mainContent">