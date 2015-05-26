<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function GenerarCartaFelicitacion($nombre,$id_empleado) {

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ASPAAUG');
		$pdf->SetTitle('Carta de Felicitacion');
		$pdf->SetSubject('Carta de Felicitacion');
		//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
		$pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

		// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// se pueden modificar en el archivo tcpdf_config.php de libraries/config
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//relación utilizada para ajustar la conversión de los píxeles
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------
		// establecer el modo de fuente por defecto
		$pdf->setFontSubsetting(true);

		// Establecer el tipo de letra

		//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
		// Helvetica para reducir el tamaño del archivo.
		$pdf->SetFont('helvetica', '', 10, '', true);

		// Añadir una página
		// Este método tiene varias opciones, consulta la documentación para más información.
		$pdf->AddPage();

		//fijar efecto de sombra en el texto
		$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

		// Establecemos el contenido para imprimir


		//preparamos y maquetamos el contenido a crear
		$html = '';

		$html .= "<p>Maria del Carmen Cano Canchola</p>";
		$html .= "<p>Secretaria General</p>";
		$html .= "<p>Comite Ejecutivo</p>";
		$html .= "</br>";
		$html .= "</br>";
		$html .= "</br>";
		$html .= "</br>";
		$html .= "<p>" . $nombre . "</p>";




		//die(print_r($html));

		// Imprimimos el texto con writeHTMLCell()
		$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

		// ---------------------------------------------------------
		// Cerrar el documento PDF y preparamos la salida
		// Este método tiene varias opciones, consulte la documentación para más información.
		$anio_felicitacion = date('Y');
		$nombre_archivo = utf8_decode("carta_felicitacion_".$id_empleado."_".$anio_felicitacion.".pdf");

		//$pdf->Output('C://xampp/htdocs/solicitudes/files/cartas/'.$nombre_archivo.'', 'F');
    //$pdf->Output('files/cartas/'.$nombre_archivo.'', 'F');
		$pdf->Output($nombre_archivo, 'I');

		return $nombre_archivo;


	}
    
      public function ImprimeInformeFinal() {
       
                             
                              $TCPDF = new TCPDF('P', 'mm', 'letter', true, 'UTF-8', false);
                              $TCPDF->SetCreator(PDF_CREATOR);
                              // remove default header/footer
                              $TCPDF->setPrintHeader(true);
                              $TCPDF->setPrintFooter(false);
                              $TCPDF->SetAuthor('CSIIA');
                              $TCPDF->SetTitle('Universidad de Guanajuato');
                              $TCPDF->SetSubject('Reporte de la experiencia del servicio social profesional');        
                      // se pueden modificar en el archivo tcpdf_config.php de libraries/config
                              //$TCPDF->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                       
                      //relación utilizada para ajustar la conversión de los píxeles
                              $TCPDF->setImageScale(PDF_IMAGE_SCALE_RATIO);
                      // Añadir una página
                      // Este método tiene varias opciones, consulta la documentación para más información.
                              $TCPDF->AddPage();        
                              

                          // set default monospaced font
                      $TCPDF->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                      // set font
                      $TCPDF->SetFont('dejavusans', '', 10);

                              //$TCPDF->Image('images/image_demo.jpg', $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
                   
                      $html ='<table width="100%" border="1" style = "border-collapse: collapse; ">
                        <tr>
                          <td width="138px"><img src="http://www.software.ugto.mx/portal/media/logoUg.jpeg" width="80px"></td>
                          <td colspan="4" style="border: 1px solid white; text-align: center; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);border-right: 1px solid black;border-top: 1px solid black;" >UNIVERSIDAD DE GUANAJUATO<br>DIRECCIÓN DE VINCULACIÓN<br>COORDINACIÓN DE ACCIÓN SOCIAL Y PRÁCTICAS PROFESIONALES</td>    
                        </tr>
                        <tr style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                          <td style="border: 1px solid white;border-left: 1px solid black;">FOLIO:</td>   
                          <td colspan="3" style=" vertical-align: center;text-align: center;border: 1px solid white;">Reporte de la experiencia del Servicio Social Profesional</td>
                          <td style="text-align: right; border: 1px solid white;border-right: 1px solid black;">FO-DIV-02<br>Rev. 00<br>Fecha: </td>
                        </tr>
                        <tr style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                          <td style="border:1px solid white;border-left: 1px solid black;border-right: 1px solid black;" colspan="5">Datos del alumno:</td>   
                        </tr>
                        <tr>
                          <td colspan="5">NUA Y Nombre:<br></td>
                        </tr> 
                        <tr style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                          <td colspan="5">Datos del Servicio Social Profesional</td>    
                        </tr>
                        <tr>
                          <td colspan="5">Título del Proyecto:</td>   
                        </tr>
                        <tr>
                          <td colspan="5">Institución:</td>   
                        </tr>
                        <tr>
                          <td  colspan="5">Dependencia:</td>    
                        </tr> 
                        <tr style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                          <td colspan="5">Datos del Asesor Académico</td>   
                        </tr>
                        <tr>
                          <td colspan="5">Nombre:</td>    
                        </tr>
                        <tr>    
                          <td colspan="5">Actividades Realizadas:<br></td>   
                        </tr> 
                        <tr>    
                          <td colspan="5"><b>Instrucciones: de la siguiente lista selecciona la opción más adecuada según su experiencia</b></td>   
                        </tr>
                        
                        <tr style="background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);">
                          <td width="40%" colspan="1"  style="border: 1px solid white;border-left: 1px solid black;">Preguntas/Ponderación</td>
                          <td width="15%" colspan="1"  style="border: 1px solid white">Excelente</td>
                          <td width="15%" colspan="1"  style="border: 1px solid white">Bueno</td>
                          <td width="15%" colspan="1"  style="border: 1px solid white">Regular</td>
                          <td width="15%" colspan="1"  style="border: 1px solid white;border-right: 1px solid black;">No se observó</td>    
                        </tr>
                         <tr>    
                          <td colspan="5">Nombre y firma del alumno:<br></td>   
                        </tr>
                        <tr>    
                          <td colspan="5">Fecha de recepción:</td>    
                        </tr>   
                      </table>';
                       // Imprimimos el texto con writeHTMLCell()
                              $TCPDF->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                       
                      // ---------------------------------------------------------
                      // Cerrar el documento PDF y preparamos la salida
                      // Este método tiene varias opciones, consulte la documentación para más información.
                              $nombre_archivo = utf8_decode("ServicioSocialProfesional.pdf");
                              $TCPDF->Output($nombre_archivo, 'I');
                    
          
  }
}
/* application/libraries/Pdf.php */
