<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterHistoryModel extends CI_Model {

	public function addRegisterHistory($data) {
		return $this->db->insert('register_history',$data);
	}

	public function getRegisterHistory() {
		date_default_timezone_set('Asia/Manila');
		$currentDate = date('Y-m-d');
		$this->db->select("id,DATE_FORMAT(date_time,'%b %d, %Y') AS dateLog,DATE_FORMAT(date_time,'%l:%i %p') as timeLog,itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocksRegistered,DATE_FORMAT(date_of_purchase,'%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from('register_history');
		$this->db->where('date(date_time)', $currentDate);
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();
	}

	public function getSpecificRegisterHistory($dateFrom,$dateTo) {

		//SELECT id,DATE_FORMAT(date_time,'%b %d, %Y - %l:%i %p') AS date_time,itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocksRegistered FROM register_history

		date_default_timezone_set('Asia/Manila');

		$where = "date(date_time) BETWEEN '".$dateFrom."' AND '".$dateTo."'";
		$this->db->select("id,DATE_FORMAT(date_time,'%b %d, %Y') AS dateLog,DATE_FORMAT(date_time,'%l:%i %p') as timeLog,itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocksRegistered,DATE_FORMAT(date_of_purchase,'%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from('register_history');
		$this->db->where($where);
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();

	}

	public function existingRegisteredHistory($itemCode,$stocks) {
		//INSERT INTO confirmed_pullouts (confirm_date,date_of_pullout,item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks_pulled_out) SELECT (CURRENT_TIMESTAMP),date_of_punch,item_code,itemName,itemType,itemSupplierPrice,itemPrice,stocks_to_pullout FROM pulled_out INNER JOIN items ON pulled_out.item_code=items.itemCode

		date_default_timezone_set('Asia/Manila');

		$query = $this->db->query("INSERT INTO register_history (date_time,itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocksRegistered,date_of_purchase,location,supplier,encoder) SELECT ('".date('Y-m-d H:i:s')."'),itemCode,itemName,itemType,itemSupplierPrice,itemPrice,".$stocks.",date_of_purchase,location,supplier,encoder FROM items WHERE itemCode='".$itemCode."'");
		return $query;
	}

}