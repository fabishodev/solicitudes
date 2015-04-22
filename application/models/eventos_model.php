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
	function getEventoAfiliado($id_evento, $id_afiliado) {
		$where = "id = ".$id_evento." AND id_afiliado =".$id_afiliado."";
		$this->db->select('*');
		if($where != NULL){
							$this->db->where($where,NULL,FALSE);
			}
		$query = $this->db->get('vw_evento_afiliado');
		return $query->row();
	}
	function actualizarValor($serv = array(), $id_afiliado, $id_evento) {
		$this->db->trans_begin();
		$this->db->where('id_afiliado', $id_afiliado);
		$this->db->where('id', $id_evento);
		$this->db->update('tram_eventos_afiliados', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}
	}
	 function addNuevoEvento($serv = array()){
    $this->db->trans_begin();
    $this->db->insert('tram_eventos', $serv);

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return FALSE;
      } else {
        $this->db->trans_commit();

        return TRUE;
      }
  }
}