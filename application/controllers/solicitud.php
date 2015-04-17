<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Solicitud extends CI_Controller {
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
		$this->load->model('solicitud_model','sol');
		
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
	public function index()
	{
		
		$data = array();
		$data['contentView'] = 'solicitudes/index';
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function lista()
	{
		$id_empleado = '15272';
		
		$data = array();
		$data['contentView'] = 'solicitudes/lista';
		$data['solicitudes'] = $this->sol->getAllData($id_empleado);
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function seleccion()
	{
		$id_empleado = '15272';
	
		$data = array();
		$data['contentView'] = 'solicitudes/seleccion';
		$data['carteras'] = $this->sol->getCarteras();
		$data['servicios'] = $this->sol->getServicios();
		$this->_renderView($data);
		//$this->load->view('welcome_message');
	}
	public function seleccion_tramite()
	{
		$id_empleado 	= '15272';
		$folio 			= $this->sol->getFolio();
		$id_cartera 	= $this->input->post('cartera');
		$this->session->set_userdata('id_cartera', $id_cartera );
		if ($id_cartera <= 0) {
			redirect('/solicitud/lista');
		}
		
		$cartera 			= $this->sol->getCartera($id_cartera);
		$id_servicio  		= $this->input->post('servicio');
		$this->session->set_userdata('id_servicio', $id_servicio );
		$data 			= array();
		if ($id_servicio === '1') {
			$data['servicio'] = 'Beca';
			$data['contentView'] = 'solicitudes/beca';
		}else{
			redirect('/solicitud/lista');
		}
		$data['cartera'] = $cartera;
		$data['folio'] = $folio;
		$data['error'] = '';
		$this->_renderView($data);
	}
	public function nuevo_tramite(){
		$upload_path = './files/solicitudes/';
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'pdf|jpg|gif|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$data = array();
			$data['contentView'] = 'solicitudes/beca';
			$data['error'] = $this->upload->display_errors();
			$data['servicio'] = 'Beca';
			$id_cartera = $this->session->userdata('id_cartera');
			$cartera = $this->sol->getCartera($id_cartera);
			$data['cartera'] = $cartera;
			$this->_renderView($data);
		}
		else
		{
			 $upload_data = array('upload_data' => $this->upload->data());
			
			 $id_afiliado 	= 5930;
			 $id_empleado	= 15272;
			 $contenido = $this->input->post('contenido');
			 $id_servicio  = $this->session->userdata('id_servicio');
			 $id_cartera = $this->session->userdata('id_cartera');
			 $datos = array(
			 	'contenido'       		=> $contenido,
			 	'id_servicio_fk'     	=> $id_servicio,
			 	'id_estatus_fk'      	=> 1,
			 	'fecha_solicitud' 		=> date('Y-m-d H:i:s'),
			 	'id_afiliado_fk'     	=> $id_afiliado,
			 	'id_cartera'      		=> $id_cartera,
			 );
			//die(print_r($datos));
		
			 $id = $this->sol->agregaTramite($datos);
			
			// $directorio = $upload_path.'/'.$id;
			// if(!file_exists($directorio)){
			// 	$dirmake = mkdir($directorio, 0777);
			// }
				$data = array();
				$data['contentView'] = 'upload/upload_success';
				$data['upload_data'] = $this->upload->data();
				$this->_renderView($data);
			//$this->load->view('upload/upload_success', $data);
		}
		
		//redirect('/solicitud/lista');
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */