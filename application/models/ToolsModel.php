<?php
defined('BASEPATH') or die('Access Denied');

class ToolsModel extends CI_Model {

	public function insert($data) {
		$this->db->insert('tools',$data);
	}

	public function select_all() {
		return $this->db->get('tools')->result();
	}

	public function select_where_id($id) {
		$this->db->where('code',$id);
		return $this->db->get('tools')->result();
	}

	public function update($id,$data) {
		$this->db->where('code',$id);
		$this->db->update('tools',$data);
	}

	public function delete($id) {
		$this->db->where('code',$id);
		$this->db->delete('tools');
	}

	public function count_tools() {
		return $this->db->count_all('tools');
	}

	public function insert_toolpullout($data) {
		$this->db->insert('tools_pullout',$data);
	}

	public function tools_pullout_select() {
		$this->db->select('
			a.toolpullout_id,
			a.tool_code,
			b.model as tool_model,
			b.description as tool_description,
			CONCAT(d.firstname," ",d.lastname) as assigned_to,
			c.CompanyName as customer,
			a.quantity,
			a.date_of_pullout,
			a.time_of_pullout
		');
		$this->db->from('tools_pullout as a');
		$this->db->join('tools as b','a.tool_code=b.code','left');
		$this->db->join('customer_vt as c','a.customer=c.CustomerID','left');
		$this->db->join('technicians as d','a.assigned_personnel=d.id','left');
		$this->db->where('a.is_deleted',0);
		return $this->db->get()->result();
	}

	public function tools_pullout_select_id($id) {
		$this->db->select('
			a.toolpullout_id,
			a.tool_code,
			b.model as tool_model,
			b.description as tool_description,
			d.id as assigned_to_id,
			CONCAT(d.firstname," ",d.lastname) as assigned_to,
			c.CustomerID as customer_id,
			c.CompanyName as customer,
			a.quantity,
			a.date_of_pullout,
			a.time_of_pullout
		');
		$this->db->from('tools_pullout as a');
		$this->db->join('tools as b','a.tool_code=b.code','left');
		$this->db->join('customer_vt as c','a.customer=c.CustomerID','left');
		$this->db->join('technicians as d','a.assigned_personnel=d.id','left');
		$this->db->where('a.is_deleted',0);
		return $this->db->get()->result();
	}

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "tools";
	var $select_column = array(
		"code",
		"model",
		"description",
		"type",
		"quantity",
		"price"
	);
	var $order_column = array(
		"code",
		"model",
		"description",
		"type",
		"quantity",
		"price"
	);

	public function tools_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);

		if(isset($_POST["search"]["value"])){
			$this->db->like("code", $_POST["search"]["value"]);
			$this->db->or_like("model", $_POST["search"]["value"]);
			$this->db->or_like("description", $_POST["search"]["value"]);
			$this->db->or_like("type", $_POST["search"]["value"]);
			$this->db->or_like("quantity", $_POST["search"]["value"]);
			$this->db->or_like("price", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("code","ASC");
		}

	}

	public function tools_datatable() {

		$this->tools_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_tools_data() {
		$this->tools_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_tools_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}
	//*****************end*********************
	
}