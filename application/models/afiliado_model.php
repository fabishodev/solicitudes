<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}
class afiliado_model extends CI_Model {

	function getAfiliado($id_empleado) {
		$where = "id_empleado = ".$id_empleado."";
		$this->db->select('*');
		$this->db->from('vw_afiliados');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}
		$query = $this->db->get();
		return $query->row();
	}
	function getCumpleanerosMes($mes) {		
		$where = "MONTH(fecha_nacimiento) = ".$mes."";
		$this->db->select('*');
		$this->db->from('vw_afiliados_felicitados');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}

		$query = $this->db->get();

		return $query->result();
	}
	function getCumpleanerosHoy() {		
		$today = strtotime('today UTC');
		$today = date("d-m", $today);
		$today = date('d-m');
		$day = date('d');
		$month = date('m');
		$where = "MONTH(fecha_nacimiento)= ".$month." AND DAY(fecha_nacimiento) = ".$day."";
		$this->db->select('*');
		$this->db->from('vw_afiliados_felicitados');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}

		$query = $this->db->get();

		return $query->result();
	}

	function getFelicitadosAnio($anio) {				
		$where = "anio_felicitacion ='".$anio."'";
		$this->db->select('*');
		$this->db->from('vw_felicitados');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function getAniosFelicitacion() {				
		$where = "";
		$this->db->select('anio_felicitacion');
		$this->db->distinct();
		$this->db->from('vw_felicitados');
		$this->db->order_by('anio_felicitacion', 'desc');
		if ($where != NULL) {
			$this->db->where($where, NULL, FALSE);
		}
		$query = $this->db->get();
		return $query->result();
	}

}