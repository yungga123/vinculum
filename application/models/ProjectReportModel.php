<?php
defined('BASEPATH') or die('Access Denied');

class ProjectReportModel extends CI_Model {

	public function get_project_report() {
		$this->db->select('*');
		$this->db->from('project_report');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function getProjectReport($id) {
		$this->db->select('*');
		$this->db->from('project_report');
		$this->db->where('id',$id);
		return $this->db->get()->result();
	}

	public function insert_projectreport($data){
		$this->db->insert('project_report',$data);
	}

	public function insert_assigned_it($data){
		$this->db->insert('project_report_assigned_it',$data);
	}

	public function insert_assigned_tech($data){
		$this->db->insert('project_report_assigned_tech',$data);
	}

	public function insert_direct_item($data){
		$this->db->insert('project_report_direct_item',$data);
	}

	public function insert_indirect_item($data){
		$this->db->insert('project_report_indirect_item',$data);
	}

	public function insert_petty_cash($data){
		$this->db->insert('project_report_pettycash',$data);
	}

	public function insert_tools_rqstd($data){
		$this->db->insert('project_report_tools_rqstd',$data);
	}

	public function insert_transpo($data){
		$this->db->insert('project_report_transpo',$data);
	}

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "project_report";
	var $select_column = array(
		"id",
		"name",
		"description",
		"date_requested",
		"date_implemented",
		"date_finished"
	);
	var $order_column = array(
		"id",
		"name",
		"description",
		"date_requested",
		"date_implemented",
		"date_finished"
	);

	public function projectReport_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);

		if(isset($_POST["search"]["value"])){
			$this->db->like("id", $_POST["search"]["value"]);
			$this->db->or_like("name", $_POST["search"]["value"]);
			$this->db->or_like("date_requested", $_POST["search"]["value"]);
			$this->db->or_like("date_implemented", $_POST["search"]["value"]);
			$this->db->or_like("date_finished", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("id","DESC");
		}

	}

	public function projectReport_datatable() {

		$this->projectReport_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_projectReport_data() {
		$this->projectReport_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_projectReport_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
//*****************end*********************

}