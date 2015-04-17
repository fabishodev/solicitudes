<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
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
		$data['contentView'] = 'upload/upload_form';
		$data['error'] = '';
		$this->_renderView($data);
		//$this->load->view('upload/upload_form', array('error' => ' ' ));
	}
	public function do_upload()
	{
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$data = array();
			$data['contentView'] = 'upload/upload_form';
			$data['error'] = $this->upload->display_errors();
			$this->_renderView($data);
		}
		else
		{
			$upload_data = array('upload_data' => $this->upload->data());
			$data = array();
			$data['contentView'] = 'upload/upload_success';
			$data['upload_data'] = $this->upload->data();
			$this->_renderView($data);
			//$this->load->view('upload/upload_success', $data);
		}
	}
}