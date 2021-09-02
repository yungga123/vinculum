<?php
defined('BASEPATH') or die('Access Denied');

class CustomersModel extends CI_Model
{



	public function addCustomer($data)
	{

		return $this->db->insert('customers', $data);
	}

	public function getCustomers()
	{

		return $this->db->get('customers')->result();
	}

	public function fetchCustomers($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('customers')->result();
	}

	public function fetchCustomersByName($cName)
	{
		$this->db->where('customer_name', $cName);
		return $this->db->get('customers')->result();
	}


	public function editCustomers($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('customers', $data);
	}

	public function deleteCustomer($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('customers');
	}

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "customer_vt";
	var $select_column = array(
		"CustomerID",
		"CompanyName",
		"ContactPerson",
		"Address",
		"ContactNumber",
		"EmailAddress",
		"Website",
		"InstallationDate",
		"Interest",
		"Type",
		"Notes",
		"is_deleted"
	);
	var $order_column = array(
		"CustomerID",
		"CompanyName",
		"ContactPerson",
		"Address",
		"ContactNumber",
		"EmailAddress",
		"Website",
		"InstallationDate",
		"Interest",
		"Type",
		"Notes",
		"is_deleted"
	);

	public function customervt_query()
	{

		$this->db->select($this->select_column);
		$this->db->from($this->table);

		if (isset($_POST["search"]["value"])) {
			$this->db->like("CustomerID", $_POST["search"]["value"]);
			$this->db->or_like("CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("ContactPerson", $_POST["search"]["value"]);
			$this->db->or_like("Address", $_POST["search"]["value"]);
			$this->db->or_like("ContactNumber", $_POST["search"]["value"]);
			$this->db->or_like("EmailAddress", $_POST["search"]["value"]);
			$this->db->or_like("Website", $_POST["search"]["value"]);
			$this->db->or_like("InstallationDate", $_POST["search"]["value"]);
			$this->db->or_like("Interest", $_POST["search"]["value"]);
			$this->db->or_like("Type", $_POST["search"]["value"]);
			$this->db->or_like("Notes", $_POST["search"]["value"]);
			$this->db->having("is_deleted", 0);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("CustomerID", "DESC");
		}
	}

	public function customervt_datatable()
	{

		$this->customervt_query();
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_customervt_data()
	{
		$this->customervt_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_customervt_data()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('is_deleted', 0);
		return $this->db->count_all_results();
	}
	//*****************end*********************

	public function selectVtCustomer_latest()
	{
		$this->db->select('CustomerID');
		$this->db->from('customer_vt');
		$this->db->order_by('CustomerID', 'desc');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function getVtCustomers($id)
	{
		$this->db->where('CustomerID', $id);
		return $this->db->get('customer_vt')->result();
	}

	public function getVtCustomersByID()
	{
		$this->db->where('is_deleted', 0);
		$this->db->order_by('CustomerID', 'DESC');
		return $this->db->get('customer_vt')->result();
	}

	public function getVtCustomersByName()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('CompanyName', 'ASC');
		return $this->db->get('customer_vt')->result();
	}

	public function getVtCustomersByNameArray()
	{
		$this->db->select([
			"CustomerID",
			"CompanyName",
			"ContactPerson",
			"Address",
			"ContactNumber",
			"EmailAddress",
			"Website",
			"InstallationDate",
			"Interest",
			"Type",
			"Notes"
		]);
		$this->db->from('customer_vt');
		$this->db->where('is_deleted', '0');
		$this->db->order_by('CustomerID', 'DESC');
		return $this->db->get()->result_array();
	}

	public function add_vtCustomer($data)
	{

		$this->db->insert('customer_vt', $data);
	}

	public function update_vtCustomer($id, $data)
	{

		$this->db->where('CustomerID', $id);
		$this->db->update('customer_vt', $data);
	}

	public function delete_vtCustomer($id)
	{
		$this->db->where('CustomerID', $id);
		$this->db->delete('customer_vt');
	}

	public function count_vtCustomer()
	{
		return $this->db->get('customer_vt')->num_rows();
	}

	public function get_sales_list() {
		$salesposition = 'Pre-Technical Sales';
		
		$this->db->select("*");
		$this->db->from("technicians");
		return $this->db->get()->result();
	}
}
