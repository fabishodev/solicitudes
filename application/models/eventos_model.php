<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}
class eventos_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		}
		
	function getAllEventos() {
		$where = "estatus = 1";
		$this->db->select('*');
		if($where != NULL){
			$this->db->where($where,NULL,FALSE);
			$this->db->order_by('fecha_creado', 'desc');
			}
		$query = $this->db->get('tram_eventos');
		return $query->result();
	}
	function getAllEventosLista() {
		$where = "";
		$this->db->select('*');
		if($where != NULL){
			$this->db->where($where,NULL,FALSE);
			$this->db->order_by('fecha_creado', 'desc');
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
		//die(print_r($serv));
		$this->db->trans_begin();
		$this->db->where('id_afiliado', $id_afiliado);
		$this->db->where('id_evento', $id_evento);
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
	
	function editarEvento($serv = array(),$id_evento) {
		//die(print_r($serv));
			$this->db->trans_begin();
		$this->db->where('id', $id_evento);
		$this->db->update('tram_eventos', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}
	}
	function getAllVariables() {
		$where = "estatus = 1";
		$this->db->select('*');
		if($where != NULL){
			$this->db->where($where,NULL,FALSE);
			$this->db->order_by('fecha_creado', 'desc');
			}
		$query = $this->db->get('vw_eventos_variables');
		return $query->result();
	}
	function addNuevaVariable($serv = array()){
		$this->db->trans_begin();
		$this->db->insert('tram_eventos_variables', $serv);
		if ($this->db->trans_status() === FALSE) {
		$this->db->trans_rollback();
		return FALSE;
		} else {
		$this->db->trans_commit();
		return TRUE;
		}
	}
	
}