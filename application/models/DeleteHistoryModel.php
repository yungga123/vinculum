<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeleteHistoryModel extends CI_Model {

	public function addDeleteHistory($itemCode) {
		date_default_timezone_set('Asia/Manila');

		$query = $this->db->query("
			INSERT INTO delete_history (
				date_time,
				item_code,
				item_name,
				item_type,
				itemSupplierPrice,
				itemPrice
			) SELECT ('".
				date('Y-m-d H:i:s')."'),
				itemCode,
				itemName,
				itemType,
				itemSupplierPrice,
				itemPrice 
			FROM items 
			WHERE itemCode = '".$itemCode."'"
			);
		return $query;
	}

	public function getDeleteHistory() {
		date_default_timezone_set('Asia/Manila');
		$currentDate = date('Y-m-d');
		$this->db->select("
				id,
				DATE_FORMAT(date_time,'%b %d, %Y') AS dateLog,
				DATE_FORMAT(date_time,'%l:%i %p') as timeLog,
				item_code,
				item_name,
				item_type,
				itemSupplierPrice,
				itemPrice
			");

		$this->db->from('delete_history');
		$this->db->where('date(date_time)', $currentDate);
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();
	}


	public function getSpecificDeleteHistory($dateFrom,$dateTo) {

		//SELECT id,DATE_FORMAT(date_time,'%b %d, %Y - %l:%i %p') AS date_time,itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocksRegistered FROM register_history

		date_default_timezone_set('Asia/Manila');

		$where = "date(date_time) BETWEEN '".$dateFrom."' AND '".$dateTo."'";
		$this->db->select("
				id,
				DATE_FORMAT(date_time,'%b %d, %Y') AS dateLog,
				DATE_FORMAT(date_time,'%l:%i %p') as timeLog,
				item_code,
				item_name,
				item_type,
				itemSupplierPrice,
				itemPrice
			");
		$this->db->from('delete_history');
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();

	}
}