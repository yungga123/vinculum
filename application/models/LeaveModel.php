<?php
defined('BASEPATH') or die('Access Denied');

class LeaveModel extends CI_Model
{

	var $order_column = array(
		//"b.lastname",
		"a.date_of_application",
		"a.start_date",
		"a.end_date",
		"a.reason"
	);

	public function insert_leave($data)
	{
		$this->db->insert('filed_leave', $data);
	}

	public function filedleave_datatable($status)
	{

		$this->filed_query($status);

		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filed_query($status)
	{
		$this->db->select("a.*, b.firstname, b.lastname, b.middlename");
		$this->db->from('filed_leave as a');
		$this->db->join('technicians as b', 'a.emp_id=b.id', 'left');


		if (isset($_POST["search"]["value"])) {

			$this->db->like("b.lastname", $_POST["search"]["value"]);
			$this->db->or_like("b.firstname", $_POST["search"]["value"]);
			$this->db->or_like("a.status", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted', 0);
			$this->db->having('a.status', $status);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.id", "DESC");
		}
	}

	public function filter_filed_leave_data($status)
	{
		$this->filed_query($status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_filed_leave_data()
	{
		$this->db->select("*");
		$this->db->from('filed_leave');
		$this->db->where('is_deleted', 0);
		return $this->db->count_all_results();
	}

	public function update_leave($leave_id, $data)
	{
		$this->db->where('id', $leave_id);
		$this->db->update('filed_leave', $data);
	}

	public function getleavedata($leave_id)
	{
		$this->db->select("*");
		$this->db->from("filed_leave");
		$this->db->where("id", $leave_id);
		return $this->db->get()->result();
	}

	public function fetchVacationLeave($techID)
	{
		$this->db->select('*');
		$this->db->from('filed_leave');
		$this->db->where('emp_id', $techID);
		$this->db->where('type_of_leave', 'Vacation leave');
		$this->db->where('status', 'approved');
		$this->db->where('is_deleted', 0);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function fetchSickLeave($techID)
	{
		$this->db->select('*');
		$this->db->from('filed_leave');
		$this->db->where('emp_id', $techID);
		$this->db->where('type_of_leave', 'Sick leave');
		$this->db->where('status', 'approved');
		$this->db->where('is_deleted', 0);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function gettechdata($employee_id)
	{
		$this->db->select('vl_credit, sl_credit');
		$this->db->from('technicians');
		$this->db->where('id', $employee_id);
		return $this->db->get()->result();
	}


	public function check_empty_database(){
		$this->db->select('*');
		$this->db->from('filed_leave');
		return $this->db->get()->result();
	}

	public function leave_status($id){
		$this->db->select('sl_credit, vl_credit, status');
		$this->db->from('technicians');
		$this->db->where('id', $id);

		return $this->db->get()->result();

	}

	public function fetch_leave_data($leave_id){
		$this->db->select('*');
		$this->db->from('filed_leave');
		$this->db->where('id', $leave_id);

		return $this->db->get()->result();
	}

	public function fetch_employee_data($emp_id){

		$this->db->select('lastname, firstname, middlename');
		$this->db->from('technicians');
		$this->db->where('id', $emp_id);

		return $this->db->get()->result();
	}
}
