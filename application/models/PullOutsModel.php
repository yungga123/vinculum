<?php
defined('BASEPATH') or die('Access Denied');

class PullOutsModel extends CI_Model {

	public function addPullout($data) {
		return $this->db->insert('pulled_out', $data);
	}

	public function viewPullout() {
		// SELECT id,pulled_out.item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks FROM items INNER JOIN pulled_out ON pulled_out.item_code=items.itemCode

		$this->db->select("pulled_out.id as id,pulled_out.item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_punch,'%b %d, %Y %h:%i %p') as date_of_punch,stocks_to_pullout,customer_name,discount,(stocks_to_pullout*itemPrice) as total_price,(stocks_to_pullout*itemPrice) - (itemPrice*stocks_to_pullout*discount) as discount_price");
		$this->db->from('items');
		$this->db->join('pulled_out','pulled_out.item_code=items.itemCode','inner');
		$this->db->join('customers','customers.id=pulled_out.pullout_to','inner');
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

	public function getPulledOutName($itemName) {
		$this->db->select("a.id,a.item_code,b.itemName")
				 ->from("pulled_out as a")
				 ->join("items as b","a.item_code=b.itemCode","left")
				 ->where("b.itemName", $itemName);

		return $this->db->get()->num_rows();

	}

}