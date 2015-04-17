<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class solicitud_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

	}	
	function getAllData($id_empleado) {	
			$where = "id_empleado ='".$id_empleado."'";
			$this->db->select('*');		 
		    if($where != NULL){
		    	$this->db->where($where,NULL,FALSE);	
		    	$this->db->order_by('fecha_solicitud', 'desc');
		    }	 
		    $query = $this->db->get('vw_solicitudes');
		    return $query->result();

	}
	function getTotalFilas($where) {
		$this->db->select('*');
		$this->db->from('vw_solicitudes');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}
		$query = $this->db->count_all_results();
		return $query;
	}
	function getCarteras()
  {
  	$where = "";
    $this->db->select('*');
    $this->db->from('tram_carteras');
    if($where != NULL)
          $this->db->where($where,NULL,FALSE);
    $query = $this->db->get();
    return $query->result();

  }
  function getCartera($id_cartera)
  {
  	$where = "id_cartera = ".$id_cartera."";
    $this->db->select('nombre_cartera');
    $this->db->from('tram_carteras');
    if($where != NULL)
          $this->db->where($where,NULL,FALSE);
    $query = $this->db->get();
    return $query->row();

  }
  function getServicios()
  {
  	$where = "";
    $this->db->select('*');
    $this->db->from('tram_servicios');
    if($where != NULL)
          $this->db->where($where,NULL,FALSE);
    $query = $this->db->get();
    return $query->result();

  }
  function getFolio(){
  	$this->db->select('*');
    $this->db->from('tram_servicios');
    $query = $this->db->get();
  	return   1;
  }
  function agregaTramite($serv = array()){
  	     $this->db->trans_start();
         $this->db->insert('tram_solicitudes', $serv);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            }
            else {
                $insert_id = $this->db->insert_id();
   				$this->db->trans_complete();        
                return $insert_id;
                //return true;
            }

  }
}