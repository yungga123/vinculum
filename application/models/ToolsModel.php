<?php
defined('BASEPATH') or die('Access Denied');

class ToolsModel extends CI_Model {

	public function insert($data) {
		$this->db->insert('tools',$data);
	}

	public function select_all() {
		$this->db->where('is_deleted', 0);
		return $this->db->get('tools')->result();
	}

	public function print_select_all() {

		$this->db->select([
			'code',
			'model',
			'description',
			'type',
			'quantity',
			'price'
		]);
		$this->db->from('tools');
		$this->db->where('is_deleted', 0);
		$this->db->where_not_in('quantity','0');
		return $this->db->get();
	}

	public function export_all_items() {

		$this->db->select([
			'a.code',
			'a.model',
			'a.description',
			'a.type',
			'a.quantity',
			'a.price'
		]);
		$this->db->from('tools as a');
		return $this->db->get()->result();
	}

	public function fetch_items_data_zero_stock($item_code) {

		$this->db->select('*');
		$this->db->from('tools_pullout as a');
		$this->db->where('a.tool_code',$item_code);
		$this->db->order_by('a.toolpullout_id','desc');
		$this->db->limit(1);
		$this->db->join('customer_vt as b','a.customer=b.CustomerID','left');

		return $this->db->get()->result();
	}

	public function export_pullout_tools() {

		$this->db->select([
			'a.tool_code',
			'd.model',
			'd.description',
			'a.quantity',
			'b.lastname',
			'b.firstname',
			'b.middlename',
			'c.CompanyName'
		]);
		$this->db->from('tools_pullout as a');
		$this->db->join('technicians as b','a.assigned_personnel=b.id','left');
		$this->db->join('customer_vt as c','a.customer=c.CustomerID','left');
		$this->db->join('tools as d','a.tool_code=d.code','left');
		$this->db->where('a.is_deleted', 0);
		return $this->db->get();
	}

	public function select_where_id($id) {
		$this->db->where('code',$id);
		return $this->db->get('tools')->result();
	}

	public function update($id,$data) {
		$this->db->where('code',$id);
		$this->db->update('tools',$data);
	}

	public function update_quantity($id,$data) {
		$this->db->set('quantity',$data,FALSE);
		$this->db->where('code',$id);
		$this->db->update('tools');
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
		$this->db->where('a.toolpullout_id',$id);
		$this->db->where('a.is_deleted',0);
		return $this->db->get()->result();
	}

	public function tools_pullout_update($id,$data) {
		$this->db->where('toolpullout_id', $id);
		$this->db->update('tools_pullout',$data);
	}

	public function get_tools_history_by_namedate($client,$assigned_to,$start_date,$end_date) {
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
		if ($client != '') {
			$this->db->where('c.CustomerID',$client);
		}
		if ($assigned_to != '') {
			$this->db->where('d.id',$assigned_to);
		}
		$this->db->where("a.date_of_pullout BETWEEN '".$start_date."' AND '".$end_date."'");
		$this->db->where('a.is_deleted',0);
		return $this->db->get()->result();
	}


	//*****************SERVER SIDE VALIDATION FOR DATATABLE (TOOLS TABLE)*********************
	var $table = "tools";
	var $select_column = array(
		"code",
		"model",
		"description",
		"type",
		"quantity",
		"price",
		"is_deleted"
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
			$this->db->having('is_deleted',0);

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

	//*****************SERVER SIDE VALIDATION FOR DATATABLE (TOOLS PULLOUT)*********************
	var $table2 = "tools_pullout as a";
	var $select_column2 = array(
		'a.toolpullout_id',
		'a.tool_code',
		'b.model as tool_model',
		'b.description as tool_description',
		'CONCAT(d.firstname," ",d.lastname) as assigned_to',
		'c.CompanyName as customer',
		'a.quantity',
		'a.date_of_pullout',
		'a.time_of_pullout',
		'a.is_deleted as is_deleted'
	);
	var $order_column2 = array(
		"toolpullout_id",
		"tool_code",
		"tool_model",
		"tool_description",
		"assigned_to",
		"customer",
		"quantity",
		"date_of_pullout",
		"time_of_pullout",
		"is_deleted"
	);


	public function toolspullout_query(){

		$this->db->select($this->select_column2);
		$this->db->from($this->table2);
		$this->db->join('tools as b','a.tool_code=b.code','left');
		$this->db->join('customer_vt as c','a.customer=c.CustomerID','left');
		$this->db->join('technicians as d','a.assigned_personnel=d.id','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("a.toolpullout_id", $_POST["search"]["value"]);
			$this->db->or_like("a.tool_code", $_POST["search"]["value"]);
			$this->db->or_like("b.model", $_POST["search"]["value"]);
			$this->db->or_like("b.description", $_POST["search"]["value"]);
			$this->db->or_like('d.firstname', $_POST["search"]["value"]);
			$this->db->or_like('d.middlename', $_POST["search"]["value"]);
			$this->db->or_like('d.lastname', $_POST["search"]["value"]);
			$this->db->or_like("c.CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("a.quantity", $_POST["search"]["value"]);
			$this->db->or_like("a.date_of_pullout", $_POST["search"]["value"]);
			$this->db->or_like("'a.time_of_pullout'", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted',1);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.toolpullout_id","ASC");
		}

	}

	public function toolspullout_datatable() {

		$this->toolspullout_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_toolspullout_data() {
		$this->toolspullout_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_toolspullout_data() {
		$this->db->select("*");
		$this->db->from($this->table2);
		$this->db->where('is_deleted',1);
		return $this->db->count_all_results();
	}
	//*****************end*********************
	
}