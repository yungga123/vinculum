<?php
defined('BASEPATH') or exit('No direct script access allowed.');



class ItemsModel extends CI_Model {

	public function insertItems($data){
		$this->db->insert('items',$data);
	}

	public function updateItems($item_code,$data){
		$this->db->where('itemCode',$item_code);
		$this->db->update('items',$data);
	}

	public function getMasterItems(){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from("items");
		$this->db->order_by("itemName","asc");
		return $this->db->get()->result();
	}

	

	public function getSpecificMasterItems($item_code){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,date_of_purchase,location,supplier,encoder");
		$this->db->from("items");
		$this->db->where("itemCode",$item_code);
		$this->db->order_by("itemName","asc");
		return $this->db->get()->result();
	}

	public function deleteItems($itemCode) {
		$this->db->where('itemCode', $itemCode);
		$this->db->delete('items');
	}

	public function updateExistingItem($itemCode,$stocks) {
		return $this->db->query("UPDATE items SET stocks = stocks + ".$stocks." WHERE itemCode = '".$itemCode."'");
	}

	public function addStock($itemCode,$stocksToAdd) {

		return $this->db->query("UPDATE items SET stocks = stocks + ".$stocksToAdd." WHERE itemCode = '".$itemCode."'");
	}


	public function count_items() {
		fdsnklsdfkl;
	}
	// *****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "items as a";
	//var $join_table = "customer_vt as b";
	var $select_column = array(
			"a.itemCode",
			"a.itemName",
			"a.itemType",
			"a.itemSupplierPrice",
			"a.itemPrice",
			"a.location",
			"a.supplier",
			"a.encoder"
		);
	var $order_column = array(
			"itemCode",
			"itemName",
			"itemType",
			"itemSupplierPrice",
			"itemPrice",
			"location",
			"supplier",
			"encoder"
		);

	public function itemMasterlist_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		//$this->db->join($this->join_table,'a.CustomerName = b.CustomerID','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("itemCode", $_POST["search"]["value"]);
			$this->db->or_like("itemName", $_POST["search"]["value"]);
			$this->db->or_like("itemType", $_POST["search"]["value"]);
			$this->db->or_like("itemSupplierPrice", $_POST["search"]["value"]);
			$this->db->or_like("itemPrice", $_POST["search"]["value"]);
			$this->db->or_like("location", $_POST["search"]["value"]);
			$this->db->or_like("supplier", $_POST["search"]["value"]);
			$this->db->or_like("encoder", $_POST["search"]["value"]);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("itemName","ASC");
		}

	}

	public function itemMasterlist_datatable() {

		$this->itemMasterlist_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_itemMasterlist_data() {
		$this->itemMasterlist_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_itemMasterlist_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//*****************end*********************

	// public function getItems(){
	// 	// return $this->db->get('items')->result();
	// 	//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
	// 	$this->db->select("itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder");
	// 	$this->db->from("items");
	// 	return $this->db->get()->result();
	// }

	// *****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table2 = "items as a";
	//var $join_table = "customer_vt as b";
	var $select_column2 = array(
			"a.itemCode",
			"a.itemName",
			"a.itemType",
			"a.itemSupplierPrice",
			"a.itemPrice",
			"a.stocks",
			"a.date_of_purchase",
			"a.location",
			"a.supplier",
			"a.encoder"
		);
	var $order_column2 = array(
			"itemCode",
			"itemName",
			"itemType",
			"itemSupplierPrice",
			"itemPrice",
			"location",
			"supplier",
			"date_of_purchase",
			"encoder"
		);

	public function itemActualStocks_query(){

		$this->db->select($this->select_column2);
		$this->db->from($this->table2);
		//$this->db->join($this->join_table,'a.CustomerName = b.CustomerID','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("itemCode", $_POST["search"]["value"]);
			$this->db->or_like("itemName", $_POST["search"]["value"]);
			$this->db->or_like("itemType", $_POST["search"]["value"]);
			$this->db->or_like("itemSupplierPrice", $_POST["search"]["value"]);
			$this->db->or_like("itemPrice", $_POST["search"]["value"]);
			$this->db->or_like("location", $_POST["search"]["value"]);
			$this->db->or_like("date_of_purchase", $_POST["search"]["value"]);
			$this->db->or_like("supplier", $_POST["search"]["value"]);
			$this->db->or_like("encoder", $_POST["search"]["value"]);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("itemName","ASC");
		}

	}

	public function itemActualStocks_datatable() {

		$this->itemActualStocks_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_itemActualStocks_data() {
		$this->itemActualStocks_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_itemActualStocks_data() {
		$this->db->select("*");
		$this->db->from($this->table2);
		return $this->db->count_all_results();
	}
	//*****************end*********************
	
}
