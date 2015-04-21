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
		$this->load->model('afiliado_model','afi');
		
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
		$this->session->set_userdata('id_empleado', '15272' );
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
		$no_empleado = $this->session->userdata('id_empleado');		
		$afiliado = $this->afi->getAfiliado($no_empleado);	
		$this->session->set_userdata('id_afiliado', $afiliado->id_afiliado );
		$this->session->set_userdata('id_evento', $id_evento );
		$data['id_empleado'] = $no_empleado;	
		$data['afiliado'] = $afiliado;
		$data['evento'] = $this->even->getEventoAfiliado($id_evento,$afiliado->id_afiliado);		
		$data['contentView'] = 'eventos/informacion';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function actualizar()
	{			
		$data = array();
		$id_afiliado = $this->session->userdata('id_afiliado');		
		$id_evento = $this->session->userdata('id_evento');		
		$valor          = $this->input->post('entradas');
		$datos       = array(    
			'valor_entero'	=>  $valor,
			'fecha_actualizado' => date('Y-m-d H:i:s')
      	);
      //die(print_r($datos));
		if ($this->even->actualizarValor($datos, $id_afiliado, $id_evento)) {
			redirect('/eventos/index');
		}
		
		redirect('/eventos/informacion/'.$id_evento);
	}

}
/* End of file eventos.php */
/* Location: ./application/controllers/eventos.php */