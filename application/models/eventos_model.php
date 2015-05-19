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
			$this->db->order_by('fecha_inicio', 'desc');
			}
		$query = $this->db->get('vw_evento_afiliado');
		return $query->result();
	}
	function getAllEventosAfiliado($id_afiliado) {
		$where = "id_afiliado = ".$id_afiliado."";
		$this->db->select('*');
		if($where != NULL){
			$this->db->where($where,NULL,FALSE);
			$this->db->order_by('fecha_inicio', 'asc');
			}
		$query = $this->db->get('vw_evento_afiliado');
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
	function getEventoAfiliado($id_variable, $id_afiliado) {
		$where = "id_variable = ".$id_variable." AND id_afiliado =".$id_afiliado."";
		$this->db->select('*');
		if($where != NULL){
							$this->db->where($where,NULL,FALSE);
			}
		$query = $this->db->get('vw_evento_afiliado');
		return $query->row();
	}
	function actualizarValor($serv = array(), $id_afiliado, $id_variable) {
		//die(print_r($serv));
		$this->db->trans_begin();
		$this->db->where('id_afiliado', $id_afiliado);
		$this->db->where('id_variable', $id_variable);
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
		$where = "";
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
	function getVariable($id_variable) {
		$where = "id = ".$id_variable."";
		$this->db->select('*');
		if($where != NULL){
				$this->db->where($where,NULL,FALSE);
			}
		$query = $this->db->get('tram_eventos_variables');
		return $query->row();
	}
	function editarVariable($serv = array(),$id_evento) {
		//die(print_r($serv));
			$this->db->trans_begin();
		$this->db->where('id', $id_evento);
		$this->db->update('tram_eventos_variables', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}
	}
	function getAllFelicitados() {
		$where = "";
		$this->db->select('*');
		if($where != NULL){
			$this->db->where($where,NULL,FALSE);
			$this->db->order_by('fecha_creado', 'desc');
			}
		$query = $this->db->get('tram_felicitaciones');
		return $query->result();
	}
	function addNuevaFelicitacion($serv = array()){
		$this->db->trans_begin();
		$this->db->insert('tram_felicitaciones', $serv);
		if ($this->db->trans_status() === FALSE) {
		$this->db->trans_rollback();
		return FALSE;
		} else {
		$this->db->trans_commit();
		return TRUE;
		}
	}

}
