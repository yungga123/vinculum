<?php
defined('BASEPATH') or die('Access Denied');

class DeliveryReceiptModel extends CI_Model
{

public function getVtCustomer($customer_id)
	{
		$this->db->where('CustomerID', $customer_id);
		return $this->db->get('customer_vt')->result();
	}


		var $cpullouts = "confirmed_pullouts as a";
		var $item_table = "items as b";

		var $cpullouts_select = array(
		"a.item_code"
		);
		var $items_select = array(
		"b.itemType"
		);


	public function getSpecificDeliveryReceiptItem($dr_start_date,$dr_end_date,$customer_id) {
		//SELECT DATE_FORMAT(confirm_date,'%b %d, %Y') as confirm_date,DATE_FORMAT(date_of_pullout,'%b %d, %Y %h:%i %p') as date_of_pullout,item_code,itemName,itemPrice,stocks_pulled_out,(itemPrice*stocks_pulled_out) AS total_price FROM confirmed_pullouts INNER JOIN items ON confirmed_pullouts.item_code=items.itemCode

		date_default_timezone_set("Asia/Manila");
		$where = "date(confirm_date) BETWEEN '".$dr_start_date."' AND '".$dr_end_date."'";
		$itemType = 'Direct';
		$stocks_pulled_out = "stocks_pulled_out != 0";
		$this->db->select('
			a.id,
			a.item_code,
			a.itemName,
			a.stocks_pulled_out
		');

		$this->db->from('confirmed_pullouts as a');
		$this->db->join('items as b','a.item_code=b.itemCode','right');
		$this->db->where('a.pullout_to',$customer_id);
		$this->db->where('b.itemType', $itemType);
		$this->db->where($where);
		$this->db->where($stocks_pulled_out);

		if ($customer_id != 0) {
			$this->db->where('pullout_to',$customer_id);
		}
		return $this->db->get()->result();	
	}
	public function GetItemType($customer_id){



		date_default_timezone_set("Asia/Manila");
		$where = "date(confirm_date) BETWEEN '".$dr_start_date."' AND '".$dr_end_date."'";
		$this->db->select("
				item_code,
				itemName,
				stocks_pulled_out
			");
		$this->db->from('confirmed_pullouts');
		$this->db->where($where);
		
		if ($customer_id != 0) {
			$this->db->where('pullout_to',$customer_id);
		}

		return $this->db->get()->result();	

	}

}