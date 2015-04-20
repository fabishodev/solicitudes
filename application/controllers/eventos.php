<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller {
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
		
	}

	private $defaultData = array(
		'title'			=> 'Solicitudes',
		'layout' 		=> 'layout/lytDefault',
		'contentView' 	=> 'vUndefined',
		'stylecss'		=> '',
	);

	private function _renderView($data = array())
	{
		$data = array_merge($this->defaultData, $data);
		$this->load->view($data['layout'], $data);
	}

	public function index($id_empleado = ''){
		$this->session->set_userdata('id_empleado', $id_empleado );
		$data = array();
		//die(print($id_empleado."->"));
		$data['eventos'] = $this->even->getAllEventos();
		$data['id_empleado'] = $this->session->userdata('id_empleado');
		$data['contentView'] = 'eventos/index';
		$this->_renderView($data);
	}

	public function lista()
	{			
		$data = array();
		//die(print($id_empleado."->"));
		$data['eventos'] = $this->even->getAllEventos();
		$data['id_empleado'] = $this->session->userdata('id_empleado');
		$data['contentView'] = 'eventos/lista';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}

	public function informacion($id_evento)
	{			
		$data = array();
		//die(print($id_empleado."->"));
		$data['evento'] = $this->even->getEvento($id_evento);
		$data['id_empleado'] = $this->session->userdata('id_empleado');
		$data['contentView'] = 'eventos/informacion';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
}
/* End of file eventos.php */
/* Location: ./application/controllers/eventos.php */