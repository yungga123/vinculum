<?php
defined('BASEPATH') or die('Access Denied');

class PRFModel extends CI_Model {
	var $table = "prf_info as a";
	var $join_table1 = "customer_vt as b";
	var $join_table2 = "customers_branch as c";
	var $join_table3 = "customers_project as d";
	var $join_table4 = "prf_items_direct as e";
	var $join_table5 = "prf_items_indirect as f";
	var $join_table6 = "prf_items_tools as g";

        var $select_column = array(
            'a.prf_id',
			'b.CompanyName',
			'c.branch_name',
			'd.project_type',
            'a.client_id',
            'a.branch_id',
			'a.project_id',
			'a.requested_by',
			'a.is_deleted'
        );

        var $order_column = array(
            'a.prf_id',
			'b.CompanyName',
			'c.branch_name',
			'd.project_type',
			'a.requested_by',
			'a.prf_id'
        );


	public function fetchclientlist() {
		$this->db->select('*');
        $this->db->from('customer_vt');
        $this->db->where('is_deleted', '0');
        $this->db->order_by('CustomerID', 'desc');
		return $this->db->get()->result();
	}

    public function fetchbranchlist($customerid) {
		return $this->db->get_where('customers_branch',['customer_id' => $customerid])->result();
	}

	public function fetchdirectitemlist() {
		$this->db->order_by('itemName', 'asc');
		return $this->db->get_where('items',['itemType' => 'Direct'])->result();
	}

	public function fetchindirectitemlist() {
		$this->db->order_by('itemName', 'asc');
		return $this->db->get_where('items',['itemType' => 'Indirect'])->result();
	}

	// public function fetchdirectqty($id) {
	// 	return $this->db->get_where('items',['itemCode' => $id])->result();
	// }

	public function fetchtoollist() {
		$this->db->order_by('model', 'asc');
		return $this->db->get_where('tools',['is_deleted' => '0'])->result();
	}

	public function fetchprojectlist($branch_id) {
		$this->db->select('*');
        $this->db->from('customers_project');
        $this->db->where('archive', '0');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('project_status', '100%');
        $this->db->order_by('project_id', 'desc');
		return $this->db->get()->result();
	}

	public function add_prf($data)
    {
        $this->db->insert('prf_info', $data);
    }

	public function add_prf_direct($data1)
    {
        $this->db->insert('prf_items_direct', $data1);
    }

	public function add_prf_indirect($data2)
    {
        $this->db->insert('prf_items_indirect', $data2);
    }

	public function add_prf_tools($data3)
    {
        $this->db->insert('prf_items_tools', $data3);
    }

	public function fetchaddedprfid($client_id, $branch_id)
    {
        $this->db->select('prf_id');
		$this->db->from('prf_info');
		$this->db->where('client_id', $client_id);
		$this->db->where('branch_id', $branch_id);
		$this->db->order_by('prf_id', 'desc');
		$this->db->limit(1);

		return $this->db->get()->result();
    }
	
	public function prf_datatable() {

		$this->prf_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function prf_query(){

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join($this->join_table1,'a.client_id=b.CustomerID','left');
		$this->db->join($this->join_table2,'a.branch_id=c.branch_id','left');
		$this->db->join($this->join_table3,'a.project_id=d.project_id','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("a.prf_id", $_POST["search"]["value"]);
			$this->db->or_like("b.CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("c.branch_name", $_POST["search"]["value"]);
			$this->db->or_like("d.project_type", $_POST["search"]["value"]);
			$this->db->or_like("a.requested_by", $_POST["search"]["value"]);
			$this->db->having("a.is_deleted",0);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.prf_id","DESC");
		}

	}

	public function get_all_prf_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('a.is_deleted',0);
		return $this->db->count_all_results();
	}

	public function filter_prf_data() {
		$this->prf_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

}