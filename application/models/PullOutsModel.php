<?php
defined('BASEPATH') or die('Access Denied');

class PullOutsModel extends CI_Model {

	public function addPullout($data) {
		return $this->db->insert('pulled_out', $data);
	}

	public function viewPullout() {
		// SELECT id,pulled_out.item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks FROM items INNER JOIN pulled_out ON pulled_out.item_code=items.itemCode

		$this->db->select("pulled_out.id as id,pulled_out.item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_punch,'%b %d, %Y %h:%i %p') as date_of_punch,stocks_to_pullout,CompanyName,discount,(stocks_to_pullout*itemPrice) as total_price,((stocks_to_pullout*itemPrice)-discount) as final_price");
		$this->db->from('items');
		$this->db->join('pulled_out','pulled_out.item_code=items.itemCode','inner');
		$this->db->join('customer_vt','customer_vt.CustomerID=pulled_out.pullout_to','inner');
		return $this->db->get()->result();

	}

	public function deletePullout($id) {
		$this->db->where('id', $id);
		return $this->db->delete('pulled_out');
	}

	public function sum_of_pullouts() {
		// SELECT SUM(itemPrice*stocks) as total_pullout_price FROM items INNER JOIN pulled_out ON pulled_out.item_code=items.itemCode
		$this->db->select('SUM(itemPrice*stocks_to_pullout)-(itemPrice*stocks_to_pullout*discount) as total_pullout_price')
				->from('items')
				->join('pulled_out','pulled_out.item_code=items.itemCode','inner');
		return $this->db->get()->result();

	}

	public function deletePullouts() {
		return $this->db->empty_table('pulled_out');
	}

	public function getPulledOutName($itemCode) {
		$this->db->select("a.id,a.item_code,b.itemCode")
				 ->from("pulled_out as a")
				 ->join("items as b","a.item_code=b.itemCode","left")
				 ->where("b.itemCode", $itemCode);

		return $this->db->get()->num_rows();

	}

}