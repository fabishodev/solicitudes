<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class eventos_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}	

	function getAllEventos() {	
			$where = "";
			$this->db->select('*');		 
		    if($where != NULL){
		    	$this->db->where($where,NULL,FALSE);	
		    	$this->db->order_by('fecha_solicitud', 'desc');
		    }	 
		    $query = $this->db->get('tram_eventos');
		    return $query->result();

	}

	function getEvento($id_evento) {	
			$where = "id = ".$id_evento."";
			$this->db->select('*');		 
		    if($where != NULL){
		    	$this->db->where($where,NULL,FALSE);			    	
		    }	 
		    $query = $this->db->get('tram_eventos');
		    return $query->row();

	}
}