<?php
defined('BASEPATH') or die('Access Denied');

class SalesRepModel extends CI_Model {

	public function getSales() {
		return $this->db->get('sales_representatives')->result();
	}

	public function getSalesreps(){

		$this->db->select("id,concat(first_name,' ',substring(middle_name,1,1),' ',last_name) as name");
		$this->db->from('sales_representatives');
		return $this->db->get()->result();
	}

	public function getSpecificSalesRep($sales_id) {
		$this->db->where('id', $sales_id);
		return $this->db->get('sales_representatives')->result();

	}

	public function addSalesRep($data){

		return $this->db->insert('sales_representatives', $data);

	}

	public function updateSalesRep($sales_id,$data) {

		$this->db->where('id', $sales_id);
		return $this->db->update('sales_representatives', $data);
	}

	public function deleteSalesRep($sales_id){

		$this->db->where('id', $sales_id);
		return $this->db->delete('sales_representatives');
	}
}