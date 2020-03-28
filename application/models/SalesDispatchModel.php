<?php
defined('BASEPATH') or die('Access Denied');


class SalesDispatchModel extends CI_Model {


	public function insert($data) {
		$this->db->insert('sales_dispatch',$data);
	}

	public function update($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('sales_dispatch',$data);

	}

	public function getSalesDispatchBy1() {
		$this->db->select("*");
		$this->db->from('sales_dispatch');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function select_specific($id) {
		$this->db->select('*');
		$this->db->from('sales_dispatch');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	// *****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "sales_dispatch";
	var $select_column = array(
			"id",
			"assigned_sales",
			"dispatch_date",
			"dispatch_time",
			"address",
			"customer_1",
			"contact_1",
			"purpose_1",
			"time_in_1",
			"time_out_1",
			"customer_2",
			"contact_2",
			"purpose_2",
			"time_in_2",
			"time_out_2",
			"customer_3",
			"contact_3",
			"purpose_3",
			"time_in_3",
			"time_out_3",
			"customer_4",
			"contact_4",
			"purpose_4",
			"time_in_4",
			"time_out_4"
		);
	var $order_column = array(
			"id",
			"dispatch_date",
			null,
			"assigned_sales",
			"address",
			"customer_1",
			"contact_1",
			null,
			null,
			null,
			"customer_2",
			"contact_2",
			null,
			null,
			null,
			"customer_3",
			"contact_3",
			null,
			null,
			null,
			"customer_4",
			"contact_4",
			null,
			null,
			null
		);

	public function salesdispatch_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);

		if(isset($_POST["search"]["value"])){
			$this->db->like("id", $_POST["search"]["value"]);
			$this->db->or_like("dispatch_time", $_POST["search"]["value"]);
			$this->db->or_like("assigned_sales", $_POST["search"]["value"]);
			$this->db->or_like("dispatch_date", $_POST["search"]["value"]);
			$this->db->or_like("address", $_POST["search"]["value"]);
			$this->db->or_like("customer_1", $_POST["search"]["value"]);
			$this->db->or_like("contact_1", $_POST["search"]["value"]);
			$this->db->or_like("purpose_1", $_POST["search"]["value"]);
			$this->db->or_like("time_in_1", $_POST["search"]["value"]);
			$this->db->or_like("time_out_1", $_POST["search"]["value"]);
			$this->db->or_like("customer_2", $_POST["search"]["value"]);
			$this->db->or_like("contact_2", $_POST["search"]["value"]);
			$this->db->or_like("purpose_2", $_POST["search"]["value"]);
			$this->db->or_like("time_in_2", $_POST["search"]["value"]);
			$this->db->or_like("time_out_2", $_POST["search"]["value"]);
			$this->db->or_like("customer_3", $_POST["search"]["value"]);
			$this->db->or_like("contact_3", $_POST["search"]["value"]);
			$this->db->or_like("purpose_3", $_POST["search"]["value"]);
			$this->db->or_like("time_in_3", $_POST["search"]["value"]);
			$this->db->or_like("time_out_3", $_POST["search"]["value"]);
			$this->db->or_like("customer_4", $_POST["search"]["value"]);
			$this->db->or_like("contact_4", $_POST["search"]["value"]);
			$this->db->or_like("purpose_4", $_POST["search"]["value"]);
			$this->db->or_like("time_in_4", $_POST["search"]["value"]);
			$this->db->or_like("time_out_4", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("id","DESC");
		}

	}

	public function salesdispatch_datatable() {

		$this->salesdispatch_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_salesdispatch_data() {
		$this->salesdispatch_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_salesdispatch_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//*****************end*********************
}

?>