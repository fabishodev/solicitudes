<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Felicitacion extends CI_Controller {
	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
							* 		http://example.com/index.php/welcome
				*	- or -
							* 		http://example.com/index.php/welcome/index
				*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see http://codeigniter.com/user_guide/general/urls.html
	*/
	function __construct(){
		parent::__construct();
		$this->load->model('eventos_model','even');
		$this->load->model('afiliado_model','afi');
		$this->load->library('felicitar');
		$this->load->library('pdf');
		$this->session->set_userdata('id_tipo_usuario', 3 );
	}
	private $defaultData = array(
			'title'			=> 'Felicitacion',
			'layout' 		=> 'layout/lytDefault',
			'contentView' 	=> 'vUndefined',
			'stylecss'		=> '',
			'scripts'		=>  array('eventos'),
	);
	private function _renderView($data = array())
	{
		$data = array_merge($this->defaultData, $data);
		$this->load->view($data['layout'], $data);
	}
	public function index(){
			redirect('/felicitacion/cumpleaneros');
	}
	public function cumpleaneros($mes = ''){

		$fecha  = $this->input->post('fecha');
		$data = array();
		$data['cumpleaneros'] = FALSE;
		if ($mes !== '') {
			$data['cumpleaneros'] = $this->afi->getCumpleanerosMes($mes);
			//die(print_r($data));
		}else{
			$data['cumpleaneros'] = $this->afi->getCumpleanerosHoy();
		}
		if ($mes == '00') {
			$data['cumpleaneros'] = $this->afi->getCumpleanerosHoy();
		}
		if ($fecha) {
			$data['cumpleaneros'] = $this->afi->getCumpleanerosFecha($fecha);
		}
		$data['contentView'] = 'felicitacion/cumpleaneros';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function felicitar($id_empleado){
			$afiliado = $this->afi->getAfiliado($id_empleado);
			$nombre = $afiliado->nombre;
			$apellido_paterno = $afiliado->primer_apellido;
			$apellido_materno = $afiliado->segundo_apellido;
			$nombre_completo =	$nombre." ".$apellido_paterno." ".$apellido_materno;
			$email = $afiliado->correo_electronico;
			$nombre_archivo = $this->pdf->GenerarCartaFelicitacion($nombre_completo,$id_empleado);
			$this->felicitar->EnviarCorreoCartaFelicitacion($email, $nombre_completo, $nombre_archivo);//envía el correo electrónico
			$datos = array(
				'id_empleado' => $id_empleado,
				'felicitado' => 1,
				'anio_felicitacion' => date('Y'),
				'fecha_felicitado' => date('Y-m-d H:i:s'),
				'fecha_creado' => date('Y-m-d H:i:s'),
				'ruta_carta' => 'files/cartas/'.$nombre_archivo
			);
			if ($this->even->addNuevaFelicitacion($datos)) {
				redirect('/felicitacion/cumpleaneros');
			}
			$data = array();
			$data['cumpleaneros'] = FALSE;
			$data['contentView'] = 'felicitacion/cumpleaneros';
			$this->_renderView($data);
	}
	public function generarcarta($id_empleado){
		$afiliado = $this->afi->getAfiliado($id_empleado);
		$nombre = $afiliado->nombre;
		$apellido_paterno = $afiliado->primer_apellido;
		$apellido_materno = $afiliado->segundo_apellido;
		$nombre_completo =	$nombre." ".$apellido_paterno." ".$apellido_materno;
		$email = $afiliado->correo_electronico;
		$nombre_archivo = $this->pdf->GenerarCartaFelicitacion($nombre_completo,$id_empleado);
		$datos = array(
				'id_empleado' => $id_empleado,
				'felicitado' => 1,
				'anio_felicitacion' => date('Y'),
				'fecha_felicitado' => date('Y-m-d H:i:s'),
				'fecha_creado' => date('Y-m-d H:i:s'),
				'ruta_carta' => 'files/cartas/'.$nombre_archivo
			);
		if ($this->even->addNuevaFelicitacion($datos)) {
			redirect('/felicitacion/cumpleaneros');
		}

	}
	public function felicitados()
	{
		$anio                = $this->input->post('anio');
		$data = array();
		$data['anios'] = $this->afi->getAniosFelicitacion();
		$data['felicitados'] = $this->afi->getFelicitadosAnio($anio);
		$data['contentView'] = 'felicitacion/felicitados';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
}
/* End of file felicitacion.php */
/* Location: ./application/controllers/felicitacion.php */
