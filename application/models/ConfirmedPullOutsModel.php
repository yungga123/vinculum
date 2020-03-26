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

	public function update($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('confirmed_pullouts',$data);
	}

	public function select_specific($id) {
		$this->db->where('id',$id);
		return $this->db->get('confirmed_pullouts')->result();
	}

	public function getSpecificConfirmedPullout($startDate,$endDate) {
		//SELECT DATE_FORMAT(confirm_date,'%b %d, %Y') as confirm_date,DATE_FORMAT(date_of_pullout,'%b %d, %Y %h:%i %p') as date_of_pullout,item_code,itemName,itemPrice,stocks_pulled_out,(itemPrice*stocks_pulled_out) AS total_price FROM confirmed_pullouts INNER JOIN items ON confirmed_pullouts.item_code=items.itemCode

		date_default_timezone_set("Asia/Manila");
		

		$where = "date(confirm_date) BETWEEN '".$startDate."' AND '".$endDate."'";

		$this->db->select("
				confirmed_pullouts.id as id,
				DATE_FORMAT(confirm_date,'%b %d, %Y') as confirm_date,
				DATE_FORMAT(date_of_pullout,'%b %d, %Y %h:%i %p') as date_of_pullout,
				item_code,
				itemName,
				itemPrice,
				stocks_pulled_out,
				CompanyName,
				discount
			");

		$this->db->from('confirmed_pullouts');
		$this->db->join('customer_vt','customer_vt.CustomerID=confirmed_pullouts.pullout_to','left');
		$this->db->where($where);
		return $this->db->get()->result();	
	}

	public function deleteConfirmedPullout($id) {
		$this->db->where('id',$id);
		$this->db->delete('confirmed_pullouts');
	}

	public function cpullouts_total_price($startDate,$endDate) {
		$where = "date(confirm_date) BETWEEN '".$startDate."' AND '".$endDate."'";
		$this->db->select('SUM(stocks_pulled_out*itemPrice) as total_price');
		$this->db->from('confirmed_pullouts');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function cpullouts_final_price($startDate,$endDate) {
		$where = "date(confirm_date) BETWEEN '".$startDate."' AND '".$endDate."'";
		$this->db->select('SUM((itemPrice*stocks_pulled_out)-discount) as final_price')
				 ->from('confirmed_pullouts')
				 ->where($where);
		return $this->db->get()->result();

	}

}