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
		$this->load->model('Solicitud_model','sol');
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
		$cartera  		= $this->sol->getCartera($id_cartera);
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

		$this->_renderView($data);
	}

	public function nuevo_tramite(){
		$id_empleado 	= 15272;	
		$datos = array(
	      'contenido'       	=> $this->input->post('contenido'),
	      'id_servicio_fk'     	=> $this->session->userdata('id_servicio'),
	      'id_estatus_fk'      	=> 1,
	      'fecha_solicitud' 	=> date('Y-m-d H:i:s'),
	      'id_afiliado_fk'     	=> $id_empleado,
	      'id_cartera'      	=> $this->session->userdata('id_cartera'),
	    );
	    
	    $id = $this->sol->agregaTramite($datos);

	    if ($id) {
        	$directorio   = 'files/solicitudes/'.$id;

           		if(!file_exists($directorio)){
           			$dirmake = mkdir($directorio, 0777);
        		}
        	  	
        	  	$config['upload_path'] = $directorio;
			    $config['allowed_types'] = 'gif|jpg|png|pdf';
			    $config['max_size'] = '100';
			    $this->load->library('upload', $config);

			 	if ( ! $this->upload->do_upload()){
			      
			    	$error = array('error' => $this->upload->display_errors());
			      	die(print_r($error));
			    }else{
			      	$data = array('upload_data' => $this->upload->data());
				    die(print_r($data));
			       	$datos_archivo    = array(
			                'id_solicitud'        => $id,
			                'nombre_archivo'      => $name,
			                'extension'           => $extension,
			                'ruta'                => $directorio.'/'.$name,
			                'fecha_creado'        => date('Y-m-d H:i:s')
			              );
			     
			         $valor = $this->sol->agregaArchivoSolicitud($datos_archivo);
			    } 

        }
		redirect('/solicitud/lista');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */