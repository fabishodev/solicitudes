<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/swift_mailer/lib/swift_required.php';

class Felicitar {

  public function EnviarCorreoFelicitacion($email, $nombre)
   {
    //echo "Enviando Correos";
    //ini_set('max_execution_time', 28800); //240 segundos = 4 minutos
     //Enviar correo electr�nico
          $url = base_url();
          $transport = Swift_SmtpTransport::newInstance()
                ->setHost('smtp.gmail.com')
                ->setPort(465)
                ->setEncryption('ssl')
                ->setUsername('siaspaaug@gmail.com')
                ->setPassword('s14sp44ug');

                //Create the Mailer using your created Transport
                $mailer = Swift_Mailer::newInstance($transport);
                //$this->load->model("Solicitud_model", "solicitud");
                //$query = $this->solicitud->getAlumnosCorreo();

                //Pass it as a parameter when you create the message
                $message = Swift_Message::newInstance();
                //Give the message a subject
                //Or set it after like this

                $message->setSubject('Muchas felicidades');
                //no_reply@ugto.mx
                $message->setFrom(array('siaspaaug@gmail.com' => 'SISASPAAUG '));
                $message->addTo('fabishodev@gmail.com');
                //$message->addTo('mgsnikips@gmail.com');

                //$message->addBcc('fabishodev@gmail.com');

                //Add alternative parts with addPart()
                $message->addPart("<h2>Felicidades </h2>".$nombre."
                <h3>Prueba de felicitación via correo electrónico:</h3>
                ---<br>
                <h4>Sinceramente ASPAAUG.</h4>", 'text/html');
                $result = $mailer->send($message);
    }

     public function EnviarCorreoCartaFelicitacion($email, $nombre, $path)
   {
    //echo "Enviando Correos";
    //ini_set('max_execution_time', 28800); //240 segundos = 4 minutos
     //Enviar correo electr�nico
          $url = base_url();
          $transport = Swift_SmtpTransport::newInstance()
                ->setHost('smtp.gmail.com')
                ->setPort(465)
                ->setEncryption('ssl')
                ->setUsername('siaspaaug@gmail.com')
                ->setPassword('s14sp44ug');

                //Create the Mailer using your created Transport
                $mailer = Swift_Mailer::newInstance($transport);
                //$this->load->model("Solicitud_model", "solicitud");
                //$query = $this->solicitud->getAlumnosCorreo();

                //Pass it as a parameter when you create the message
                $message = Swift_Message::newInstance();
                //Give the message a subject
                //Or set it after like this

                $message->setSubject('Muchas felicidades');
                //no_reply@ugto.mx
                $message->setFrom(array('siaspaaug@gmail.com' => 'SISASPAAUG '));
                $message->addTo('fabishodev@gmail.com');
                //$message->addTo('mgsnikips@gmail.com');

                //$message->addBcc('fabishodev@gmail.com');

                //Add alternative parts with addPart()
                $message->addPart("<h2>Felicidades </h2>".$nombre."
                <h3>Prueba de felicitación via correo electrónico:</h3>
                ---<br>
                <h4>Sinceramente ASPAAUG.</h4>", 'text/html');
                $message->attach(Swift_Attachment::fromPath('my-document.pdf'));
                $result = $mailer->send($message);
    }
}
