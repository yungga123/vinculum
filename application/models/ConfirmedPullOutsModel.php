<?php
defined('BASEPATH') or die('Access Denied');

class ConfirmedPullOutsModel extends CI_Model {

	public function insert() {

		//INSERT INTO confirmed_pullouts (confirm_date,date_of_pullout,item_code,stocks_pulled_out) SELECT (CURRENT_TIMESTAMP),date_of_punch,item_code,stocks_to_pullout FROM pulled_out
		date_default_timezone_set('Asia/Manila');
		return $this->db->query('
			INSERT INTO 
				confirmed_pullouts (
					confirm_date,
					date_of_pullout,
					item_code,
					itemName,
					itemType,
					itemSupplierPrice,
					itemPrice,
					stocks_pulled_out,
					pullout_to,
					discount
				) 
			SELECT 
				('."'".date('Y-m-d H:i:s')."'".'),
				date_of_punch,
				item_code,
				itemName,
				itemType,
				itemSupplierPrice,
				itemPrice,
				stocks_to_pullout,
				pullout_to,
				discount 
			FROM 
				pulled_out 
			INNER JOIN 
				items 
			ON 
				pulled_out.item_code=items.itemCode');
	}

	public function deleteConfirmedPullout($id) {
		$this->db->where('id',$id);
		$this->db->delete('confirmed_pullouts');
	}

}