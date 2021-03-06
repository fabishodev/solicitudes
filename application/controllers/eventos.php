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
		$this->load->library('felicitar');
		$this->load->library('pdf');
		$this->session->set_userdata('id_tipo_usuario', 3);
	}
	private $defaultData = array(
			'title'			=> 'Solicitudes',
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
	public function index($no_empleado = ''){
			if ($no_empleado === '' && $this->session->userdata('id_tipo_usuario')==3) {
				redirect('/eventos/seleccionar');
			}
			$this->session->set_userdata('no_empleado', $no_empleado );
			$data = array();
			if ($no_empleado) {
				$afiliado = $this->afi->getAfiliado($no_empleado);
					$data['eventos'] = $this->even->getAllEventosAfiliado($afiliado->id_afiliado);
			}else{
				$data['eventos'] = $this->even->getAllEventos();
			}

			$data['no_empleado'] = $no_empleado;
			$data['contentView'] = 'eventos/index';
			$this->_renderView($data);
	}
	public function seleccionar(){
		if ($this->session->userdata('id_tipo_usuario')!==3){
			redirect('/eventos/index');
		}
		$data = array();
			$error	= $this->session->userdata('error');
		if ($error !== '') {
			$data['error'] =  $error;
			$this->session->set_userdata('error','');
		}
		else{
			$data['error'] =  '';
		}
		$this->session->set_userdata('no_empleado', '');
		$data['eventos'] = $this->even->getAllEventos();
		$data['contentView'] = 'eventos/seleccionar';
		//die(print_r($data));
		$this->_renderView($data);
	}
	public function lista()
	{
		$data = array();
		//die(print($no_empleado."->"));
		$data['eventos'] = $this->even->getAllEventosLista();
		$data['no_empleado'] = $this->session->userdata('no_empleado');
		$data['contentView'] = 'eventos/lista';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function informacion($id_variable = '')
	{
		$this->session->set_userdata('error','');
		$data = array();
		$no_empleado = $this->session->userdata('no_empleado');
		if ($no_empleado === NULL || $no_empleado === '' ) {
				$no_empleado = $this->input->post('id-empleado');
		}
		if ($id_variable === '') {
				$id_variable  = $this->input->post('id-variable');
		}
		//die(print($no_empleado));
		$afiliado = $this->afi->getAfiliado($no_empleado);
		if (!$afiliado) {
			$this->session->set_userdata('error', 'No se encontro afiliado' );
			redirect('/eventos/seleccionar');
		}
		$this->session->set_userdata('id_afiliado', $afiliado->id_afiliado );
		$this->session->set_userdata('id_variable', $id_variable );
		$data['no_empleado'] = $no_empleado;
		$data['afiliado'] = $afiliado;
		$data['evento'] = $this->even->getEventoAfiliado($id_variable,$afiliado->id_afiliado);
		$data['contentView'] = 'eventos/informacion';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function actualizar()
	{
		$data = array();
		$id_afiliado = $this->session->userdata('id_afiliado');
		$id_variable = $this->session->userdata('id_variable');
		$evento =  $this->even->getEventoAfiliado($id_variable, $id_afiliado);
		$nuevo         = $this->input->post($evento->nombre_variable);
		$anterior = $evento->valor;
		$valor = $anterior - $nuevo;
		$datos       = array(
				'valor'	=>  $valor,
			'fecha_actualizado' => date('Y-m-d H:i:s')
	);
	//die(print($id_afiliado));
		if ($this->even->actualizarValor($datos, $id_afiliado, $id_variable)) {
			redirect('/eventos/index');
		}
		redirect('/eventos/informacion/'.$id_evento);
	}
	public function nuevo()
	{
		$data = array();
		$no_empleado = $this->session->userdata('no_empleado');
		$data['no_empleado'] = $no_empleado;
		$data['contentView'] = 'eventos/nuevo';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function nuevoevento()
	{
		$nombre_evento		   	= $this->input->post('nombre-evento');
		$descripcion_evento     = $this->input->post('descripcion-evento');
		$lugar_evento       	= $this->input->post('lugar-evento');
		$hora_inicio_evento     = $this->input->post('hora-inicio-evento');
		$hora_fin_evento        = $this->input->post('hora-fin-evento');
		$fecha_inicio_evento    = $this->input->post('fecha-inicio-evento');
		$fecha_fin_evento       = $this->input->post('fecha-fin-evento');
		$datos       = array(
				'nombre_evento'	=>  $nombre_evento,
			'des_evento' => $descripcion_evento,
			'estatus' => 1,
			'lugar' => $lugar_evento,
			'hora_inicio' => $hora_inicio_evento,
			'hora_fin' => $hora_fin_evento,
			'fecha_inicio' => $fecha_inicio_evento,
			'fecha_fin' => $fecha_fin_evento,
			'id_usuario' => 1,
			'fecha_creado' => date('Y-m-d H:i:s')
		);
//die(print_r($datos));
		if ($this->even->addNuevoEvento($datos)) {
			redirect('/eventos/index');
		}
	}
	public function editar($id_evento)
	{
		$data = array();
		$no_empleado = $this->session->userdata('no_empleado');
		$data['no_empleado'] = $no_empleado;
		$data['evento'] = $this->even->getEvento($id_evento);
		$data['contentView'] = 'eventos/editar';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function editarevento($id_evento )
	{
			//$id_evento          	= $this->input->post('id-evento');
			$nombre_evento          	= $this->input->post('nombre-evento');
		$descripcion_evento      = $this->input->post('descripcion-evento');
			$lugar_evento         	 = $this->input->post('lugar-evento');
		$hora_inicio_evento         = $this->input->post('hora-inicio-evento');
		$hora_fin_evento         = $this->input->post('hora-fin-evento');
		$fecha_inicio_evento         = $this->input->post('fecha-inicio-evento');
		$fecha_fin_evento         = $this->input->post('fecha-fin-evento');
		$estatus_evento         = $this->input->post('estatus-evento');
		$datos       = array(
				'nombre_evento'	=>  $nombre_evento,
			'des_evento' => $descripcion_evento,
			'estatus' => $estatus_evento,
			'lugar' => $lugar_evento,
			'hora_inicio' => $hora_inicio_evento,
			'hora_fin' => $hora_fin_evento,
			'fecha_inicio' => $fecha_inicio_evento,
			'fecha_fin' => $fecha_fin_evento,
			'id_usuario' => 1,
			'fecha_actualizado' => date('Y-m-d H:i:s')
	);
//die(print_r($datos));
		if ($this->even->editarEvento($datos,$id_evento)) {
			redirect('/eventos/lista');
		}
	}
	public function verificaAfiliado($id_empleado)
	{
		$afiliado = $this->afi->getAfiliado($id_empleado);
		if (!$afiliado) {
		$data = array();
		$data['contentView'] = 'eventos/noexiste';
		die(print_r($data));
		$this->_renderView($data);
		}
		//$this->load->view('welcome_message');
	}
	public function invitacionindividual(){
		$data = array();
			$error	= $this->session->userdata('error');
		if ($error !== '') {
			$data['error'] =  $error;
			$this->session->set_userdata('error','');
		}
		else{
			$data['error'] =  '';
		}
		$this->session->set_userdata('no_empleado', '');
		$data['eventos'] = $this->even->getAllEventos();
		$data['variables'] = $this->even->getAllVariables();
		$data['contentView'] = 'eventos/invitacionindividual';
		//die(print_r($data));
		$this->_renderView($data);
	}
	public function variables(){
		$data = array();
		$data['variables'] = $this->even->getAllVariables();
		$data['contentView'] = 'eventos/variables';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function nuevavariable(){
		$data = array();
		$data['eventos'] = $this->even->getAllEventos();
		$data['contentView'] = 'eventos/nueva';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function agregarnuevavariable(){
		$id_evento                = $this->input->post('id-evento');
			$nombre_variable          	= $this->input->post('nombre-variable');
		$descripcion_variable      = $this->input->post('descripcion-variable');
		$datos       = array(
				'id_evento'	=>  $id_evento,
			'nombre_variable' => $nombre_variable,
			'descripcion' => $descripcion_variable ,
			'estatus' => 1,
			'fecha_creado' => date('Y-m-d H:i:s')
	);
//die(print_r($datos));
		if ($this->even->addNuevaVariable($datos)) {
			redirect('/eventos/variables');
		}
	}
	public function editarvariable($id_variable)
	{
		$data = array();
		$no_empleado = $this->session->userdata('no_empleado');
		$data['no_empleado'] = $no_empleado;
		$data['variable'] = $this->even->getVariable($id_variable);
		$data['contentView'] = 'eventos/editarvariable';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function editarvar($id_variable )
	{
			//$id_evento          	= $this->input->post('id-evento');
			$nombre_variable          	= $this->input->post('nombre-variable');
				$descripcion_variable     = $this->input->post('descripcion-variable');
		$estatus_variable         = $this->input->post('estatus-variable');
		$datos       = array(
				'nombre_variable'	=>  $nombre_variable,
			'descripcion' => $descripcion_variable,
					'estatus' => $estatus_variable,
			'fecha_actualizado' => date('Y-m-d H:i:s')
	);
//die(print_r($datos));
		if ($this->even->editarVariable($datos,$id_variable)) {
			redirect('/eventos/variables');
		}
	}


	public function fecha(){
		$fecha  = $this->input->post('fecha');
		die(print($fecha));
	}

}
/* End of file eventos.php */
/* Location: ./application/controllers/eventos.php */
