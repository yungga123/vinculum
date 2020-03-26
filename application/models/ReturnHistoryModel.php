<?php
defined('BASEPATH') or die('Access Denied');

class ReturnHistoryModel extends CI_Model {

	public function insert($data) {
		$this->db->insert('return_history',$data);
	}

	public function view_returns($startDate,$endDate) {
		$where = "date(a.date_time) BETWEEN '".$startDate."' AND '".$endDate."'";
		//a = return_history
		//b = confirmed_pullouts
		//c = items
		//d = customer_vt
		$this->db->select("
				a.id as return_id,
				a.date_time as date_processed,
				a.confirm_pullouts_id as confirm_id,
				b.item_code as item_code,
				c.itemName as item_name,
				c.itemType as itemType,
				b.stocks_pulled_out as stocks_pulled_out,
				a.no_of_stocks_returned as stocks_returned,
				d.CompanyName as pullout_to,
				c.itemPrice as itemPrice
			");

		$this->db->from('return_history as a');
		$this->db->join('confirmed_pullouts as b','a.confirm_pullouts_id=b.id','left');
		$this->db->join('items as c','b.item_code=c.itemCode','left');
		$this->db->join('customer_vt as d','d.CustomerID=b.pullout_to','left');
		$this->db->where($where);
		return $this->db->get()->result();	
	}

	public function total_price($startDate,$endDate) {
		$where = "date(a.date_time) BETWEEN '".$startDate."' AND '".$endDate."'";
		//a = return_history
		//b = confirmed_pullouts
		//c = items
		//d = customer_vt
		$this->db->select("
				SUM(c.itemPrice*b.stocks_pulled_out) as total_price
			");

		$this->db->from('return_history as a');
		$this->db->join('confirmed_pullouts as b','a.confirm_pullouts_id=b.id','left');
		$this->db->join('items as c','b.item_code=c.itemCode','left');
		$this->db->join('customer_vt as d','d.CustomerID=b.pullout_to','left');
		$this->db->where($where);
		return $this->db->get()->result();	
	}

	public function return_price($startDate,$endDate) {
		$where = "date(a.date_time) BETWEEN '".$startDate."' AND '".$endDate."'";
		//a = return_history
		//b = confirmed_pullouts
		//c = items
		//d = customer_vt
		$this->db->select("
				SUM(c.itemPrice*a.no_of_stocks_returned) as return_price
			");

		$this->db->from('return_history as a');
		$this->db->join('confirmed_pullouts as b','a.confirm_pullouts_id=b.id','left');
		$this->db->join('items as c','b.item_code=c.itemCode','left');
		$this->db->join('customer_vt as d','d.CustomerID=b.pullout_to','left');
		$this->db->where($where);
		return $this->db->get()->result();	
	}

}