<?php
defined('BASEPATH') or die('Access Denied');

class TechniciansModel extends CI_Model {

	public function fetchTechnicians($techID) {
		return $this->db->get_where('technicians',['id' => $techID])->result();
	}

	public function getTechnicians() {
		
		//select id,concat(firstname,' ',substring(middlename,1,1),'. ',lastname) as name from technicians

		$this->db->select("id,concat(firstname,' ',substring(middlename,1,1),' ',lastname) as name");
		$this->db->from('technicians');
		return $this->db->get()->result();
	}

	public function addTechnicians($data) {
		return $this->db->insert('technicians', $data);
	}

	public function countTechnicians() {
		return $this->db->count_all('technicians');
	}

	public function deleteTechnicians($techID) {
		$this->db->where('id', $techID);
		return $this->db->delete('technicians');
	}

	public function editTechnicians($techID,$data) {
		$this->db->where('id', $techID);
		return $this->db->update('technicians', $data);
	}

	public function getTechniciansByName() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('technicians')->result();
	}
	
}