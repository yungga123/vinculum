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

	public function getPettyCash($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_pettycash')->result();
	}

	public function getTranspo($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_transpo')->result();
	}

	public function getIndirectItems($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_indirect_item')->result();
	}

	public function getToolsRqstd($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_tools_rqstd')->result();
	}

	public function getAssignedIT($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_assigned_it')->result();
	}

	public function getAssignedTech($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_assigned_tech')->result();
	}

	public function getDirectItems($id) {
		$this->db->where('pr_id',$id);
		return $this->db->get('project_report_direct_item')->result();
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

	public function updateProjectReport($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report',$data);
	}

	//for update petty cash
	public function updatePettyCash($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_pettycash',$data);
	}

	public function removePettyCash($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_pettycash');
	}

	public function getNewAddedPettyCash($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_pettycash');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end


	//for update transpo
	public function updateTranspo($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_transpo',$data);
	}

	public function removeTranspo($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_transpo');
	}

	public function getNewAddedTranspo($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_transpo');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end

	//for update indirect item
	public function updateIndirectItem($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_indirect_item',$data);
	}

	public function removeIndirectItem($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_indirect_item');
	}

	public function getNewAddedIndirectItem($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_indirect_item');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end

	//for update direct item
	public function updateDirectItem($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_direct_item',$data);
	}

	public function removeDirectItem($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_direct_item');
	}

	public function getNewAddedDirectItem($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_direct_item');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end

	//for update tools requested
	public function updateToolsRqstd($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_tools_rqstd',$data);
	}

	public function removeToolsRqstd($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_tools_rqstd');
	}

	public function getNewAddedToolsRqstd($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_tools_rqstd');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end

	//for update assigned it
	public function updateAssignedIT($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_assigned_it',$data);
	}

	public function removeAssignedIT($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_assigned_it');
	}

	public function getNewAddedAssignedIT($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_assigned_it');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end


	//for update assigned tech
	public function updateAssignedTech($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('project_report_assigned_tech',$data);
	}

	public function removeAssignedTech($id,$pr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('pr_id',$pr_id);
		$this->db->delete('project_report_assigned_tech');
	}

	public function getNewAddedAssignedTech($pr_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('project_report_assigned_tech');
		$this->db->where('pr_id',$pr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}
	//end

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "project_report";
	var $select_column = array(
		"id",
		"name",
		"description",
		"date_requested",
		"date_implemented",
		"date_finished",
		"is_deleted"
	);
	var $order_column = array(
		"id",
		"name",
		"description",
		"date_requested",
		"date_implemented",
		"date_finished",
		"is_deleted"
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
			$this->db->having('is_deleted', 0);
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
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}
//*****************end*********************

}