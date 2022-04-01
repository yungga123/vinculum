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

	public function getMasterItems($itemType){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from("items");
		$this->db->where("itemType",$itemType);
		$this->db->order_by("itemName","asc");
		return $this->db->get()->result();
	}

	public function getMasterItemsArray($itemType){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,item_brand,item_size,itemType,itemSupplierPrice,itemPrice,project_price,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from("items");
		$this->db->where("itemType",$itemType);
		$this->db->where_not_in("stocks","0");
		$this->db->order_by("itemName","asc");
		return $this->db->get()->result_array();
	}

	public function getMasterItemsByStocks($itemType){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,location,supplier,encoder");
		$this->db->from("items");
		$this->db->where("stocks <>","0");
		$this->db->where("itemType",$itemType);
		$this->db->order_by("itemName","asc");
		return $this->db->get()->result();
	}
	

	public function getSpecificMasterItems($item_code){
		// return $this->db->get('items')->result();
		//SELECT itemCode,itemName,itemType,itemSupplierPrice,itemPrice,stocks,DATE_FORMAT(date_of_purchase, '%b %d, %Y') as date_of_purchase,serial_number,supplier,encoder from items
		$this->db->select("itemCode,itemName,item_brand,item_size,itemType,itemSupplierPrice,itemPrice,project_price,stocks,date_of_purchase,location,supplier,encoder");
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



	// *****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "items as a";
	//var $join_table = "customer_vt as b";
	var $select_column = array(
			"a.itemCode",
			"a.itemName",
			"a.item_brand",
			"a.item_size",
			"a.itemType",
			"a.itemSupplierPrice",
			"a.itemPrice",
			"a.project_price",
			"a.stocks",
			"a.date_of_purchase",
			"a.location",
			"a.supplier",
			"a.encoder"
		);

	var $order_column = array(
			"itemCode",
			"itemName",
			"a.item_brand",
			"a.item_size",
			"itemType",
			"itemSupplierPrice",
			"itemPrice",
			"a.project_price",
			"stocks",
			"date_of_purchase",
			"location",
			"supplier",
			"encoder"
		);

	public function itemMasterlist_query($category){

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		//$this->db->join($this->join_table,'a.CustomerName = b.CustomerID','left');

		if(isset($_POST["search"]["value"])){

			$this->db->like("itemCode", $_POST["search"]["value"]);
			$this->db->or_like("itemName", $_POST["search"]["value"]);
			$this->db->or_like("item_brand", $_POST["search"]["value"]);
			$this->db->or_like("item_size", $_POST["search"]["value"]);
			$this->db->or_like("itemType", $_POST["search"]["value"]);
			$this->db->or_like("itemSupplierPrice", $_POST["search"]["value"]);
			$this->db->or_like("itemPrice", $_POST["search"]["value"]);
			$this->db->or_like("project_price", $_POST["search"]["value"]);
			$this->db->or_like("stocks", $_POST["search"]["value"]);
			$this->db->or_like("date_of_purchase", $_POST["search"]["value"]);
			$this->db->or_like("location", $_POST["search"]["value"]);
			$this->db->or_like("supplier", $_POST["search"]["value"]);
			$this->db->or_like("encoder", $_POST["search"]["value"]);
			$this->db->having('itemType', $category);
			
		}	

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("itemName","ASC");
		}

	}

	public function itemMasterlist_datatable($category) {

		$this->itemMasterlist_query($category);
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_itemMasterlist_data($category) {
		$this->itemMasterlist_query($category);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_itemMasterlist_data($category) {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('itemType',$category);
		return $this->db->count_all_results();
	}

	public function ItemsGetByName($itemCode) {
		$this->db->where('itemCode', $itemCode);
		return $this->db->get('items')->result();
	}

	public function ItemsGet($itemCode) {
		$this->db->where('itemCode', $itemCode);
		return $this->db->get('items')->result();
	}
	
	public function decreasedByPullout($stocks,$item_code) {
		//UPDATE items SET stocks = stocks - $value WHERE itemCode = $itemCode
		
		return $this->db->query("UPDATE items SET stocks = (stocks - ".$stocks.") WHERE itemCode = '".$item_code."'");
	}

	//*****************end*********************

	public function getItemsBySearchLike($search_word) {
		$this->db->like('itemCode',$search_word);
		$this->db->or_like('itemName',$search_word);
		return $this->db->get('items')->result();
	}

	public function select_direct_items() {
		$this->db->where('itemType','Direct');
		return $this->db->get('items')->result();
	}

	public function select_indirect_items() {
		$this->db->where('itemType','Indirect');
		return $this->db->get('items')->result();
	}
}
