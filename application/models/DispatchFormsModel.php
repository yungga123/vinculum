<?php
defined('BASEPATH') or die('Access Denied');

class DispatchFormsModel extends CI_Model {
	
	public function deleteDispatch($id) {

		$this->db->where('Dispatch_ID', $id);
		return $this->db->delete('dispatch_forms');
	}

	public function getDispatchform() {
		$this->db->select("*");
		$this->db->from("dispatch_forms");
		return $this->db->count_all_results();
	}

	public function insertDispatch($data){

		return $this->db->insert('dispatch_forms', $data);

	}

	public function getDispatchBy1() {

		$this->db->select("*");
		$this->db->from('dispatch_forms');
		$this->db->order_by('Dispatch_ID','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();

	}
	
	public function getSpecificDispatch($id) {
		$select = array(
			"a.Dispatch_ID",
			"b.CompanyName",
			"a.CustomerName",
			"b.ContactPerson",
			"b.ContactNumber",
			"a.DispatchDate",
			"b.Address",
			"TimeIn",
			"TimeOut",
			"a.Remarks",
			"a.AssignedTechnicians1",
			"a.AssignedTechnicians2",
			"a.AssignedTechnicians3",
			"a.AssignedTechnicians4",
			"a.AssignedTechnicians5",
			"a.WithPermit",
			"a.Installation",
			"a.RepairOrService",
			"a.Warranty"
		);

		$table = "dispatch_forms as a";
		$join = "customer_vt as b";

		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($join,'a.CustomerName = b.CustomerID','left');
		$this->db->where("Dispatch_ID",$id);

		return $this->db->get()->result();
	}
	

	public function printDispatch($id) {

		$select = array(
			"a.Dispatch_ID",
			"b.CompanyName",
			"a.CustomerName",
			"b.ContactPerson",
			"b.ContactNumber",
			"a.DispatchDate",
			"b.Address",
			"TimeIn",
			"TimeOut",
			"a.Remarks",
			"a.AssignedTechnicians1",
			"a.AssignedTechnicians2",
			"a.AssignedTechnicians3",
			"a.AssignedTechnicians4",
			"a.AssignedTechnicians5",
			"a.WithPermit",
			"a.Installation",
			"a.RepairOrService",
			"a.Warranty"
		);

		$table = "dispatch_forms as a";
		$join = "customer_vt as b";

		$this->db->select($select);
		$this->db->from($table);
		$this->db->join($join,'a.CustomerName = b.CustomerID','left');
		$this->db->where("Dispatch_ID",$id);
		
	}

	public function countDispatch() {
		return $this->db->count_all('dispatch_forms');
	}

// *****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "dispatch_forms as a";
	var $join_table = "customer_vt as b";
	var $select_column = array(
			"a.Dispatch_ID",
			"b.CompanyName",
			"b.ContactPerson",
			"b.ContactNumber",
			"a.DispatchDate",
			"b.Address",
			"TimeIn",
			"TimeOut",
			"a.Remarks",
			"a.AssignedTechnicians1",
			"a.AssignedTechnicians2",
			"a.AssignedTechnicians3",
			"a.AssignedTechnicians4",
			"a.AssignedTechnicians5",
			"a.WithPermit",
			"a.Installation",
			"a.RepairOrService",
			"a.Warranty"
		);
	var $order_column = array(
			"Dispatch_ID",
			"CompanyName",
			"ContactPerson",
			"ContactNumber",
			"Address",
			null,
			null,
			null,
			"Remarks",
			"AssignedTechnicians1",
			"AssignedTechnicians2",
			"AssignedTechnicians3",
			"AssignedTechnicians4",
			"AssignedTechnicians5",
			"WithPermit",
			null,
			null,
			null
		);

	public function dispatchform_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join($this->join_table,'a.CustomerName = b.CustomerID','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("Dispatch_ID", $_POST["search"]["value"]);
			$this->db->or_like("CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("ContactPerson", $_POST["search"]["value"]);
			$this->db->or_like("ContactNumber", $_POST["search"]["value"]);
			$this->db->or_like("DispatchDate", $_POST["search"]["value"]);
			$this->db->or_like("Address", $_POST["search"]["value"]);
			$this->db->or_like("Remarks", $_POST["search"]["value"]);
			$this->db->or_like("AssignedTechnicians1", $_POST["search"]["value"]);
			$this->db->or_like("AssignedTechnicians2", $_POST["search"]["value"]);
			$this->db->or_like("AssignedTechnicians3", $_POST["search"]["value"]);
			$this->db->or_like("AssignedTechnicians4", $_POST["search"]["value"]);
			$this->db->or_like("AssignedTechnicians5", $_POST["search"]["value"]);
			$this->db->or_like("WithPermit", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("Dispatch_ID","DESC");
		}

	}

	public function dispatchform_datatable() {

		$this->dispatchform_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_dispatchform_data() {
		$this->dispatchform_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_dispatchform_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
//*****************end*********************
	public function updateDispatch($id, $data) {
		$this->db->where('Dispatch_ID', $id);
		return $this->db->update('dispatch_forms', $data);
	}
	
}