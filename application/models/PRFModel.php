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
	var $join_table7 = "technicians as i";

        var $select_column = array(
            'a.prf_id',
			'a.pic',
			'b.CompanyName',
			'c.branch_name',
			'd.project_type',
            'a.client_id',
            'a.branch_id',
			'a.project_id',
			'a.requested_by',
			'a.prepared_by',
			'a.date_requested',
			'a.returned_by',
			'a.date_return',
			'a.time_return',
			'i.lastname',
			'i.firstname',
			'i.middlename',
			'i.id',
			'a.is_deleted',
			'a.status'
        );

        var $order_column = array(
            'a.prf_id',
			'b.CompanyName',
			'c.branch_name',
			'd.project_type',
			'i.lastname',
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

	public function fetchrequestorlist() {
		$this->db->select('*');
		$this->db->from('technicians');

		return $this->db->get()->result();
	}

	public function fetchrequestordata($requestor_id) {
		$this->db->select('*');
		$this->db->from('technicians');
		$this->db->where('id', $requestor_id);
		return $this->db->get()->result();
	}

	public function fetchsaleslist() {
		$this->db->select('*');
		$this->db->from('technicians');

		return $this->db->get()->result();
	}

	public function fetchpersonnellist($id) {
		$this->db->select('*');
		$this->db->from('technicians');
		$this->db->where('id', $id);
		return $this->db->get()->result();
	}

	// public function fetchdirectqty($id) {
	// 	return $this->db->get_where('items',['itemCode' => $id])->result();
	// }

	public function fetchtoollist() {
		$this->db->select('*');
		$this->db->from('tools');
		$this->db->where('is_deleted', '0');
		$this->db->where('quantity', '1');

		return $this->db->get()->result();
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
	
	public function prf_datatable($status) {

		$this->prf_query($status);
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function prf_query($status){

		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join($this->join_table1,'a.client_id=b.CustomerID','left');
		$this->db->join($this->join_table2,'a.branch_id=c.branch_id','left');
		$this->db->join($this->join_table3,'a.project_id=d.project_id','left');
		$this->db->join($this->join_table7,'a.sales=i.id','left');
		

		if(isset($_POST["search"]["value"])){
			$this->db->like("a.prf_id", $_POST["search"]["value"]);
			$this->db->or_like("b.CompanyName", $_POST["search"]["value"]);
			$this->db->or_like("c.branch_name", $_POST["search"]["value"]);
			$this->db->or_like("d.project_type", $_POST["search"]["value"]);
			$this->db->or_like("i.lastname", $_POST["search"]["value"]);
			$this->db->or_like("i.firstname", $_POST["search"]["value"]);
			$this->db->or_like("a.requested_by", $_POST["search"]["value"]);
			$this->db->having("a.is_deleted",0);
			$this->db->having('a.status',$status);
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

	public function filter_prf_data($status) {
		$this->prf_query($status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_direct_items($prf_id)
    {
        $this->db->select('*');
        $this->db->from('prf_items_direct as a');
		$this->db->join('items as b','a.item_name=b.itemCode','left');
        $this->db->where('a.prf_id', $prf_id);
		$this->db->order_by('prf_items_id','asc');
        return $this->db->get()->result();
    }

	public function get_indirect_items($prf_id)
    {
        $this->db->select('*');
        $this->db->from('prf_items_indirect as a');
		$this->db->join('items as b','a.item_name=b.itemCode','left');
        $this->db->where('a.prf_id', $prf_id);
		$this->db->order_by('prf_items_id','asc');
        return $this->db->get()->result();
    }

	public function get_tools_items($prf_id)
    {
        $this->db->select('*');
        $this->db->from('prf_items_tools as a');
		$this->db->join('tools as b','a.item_name=b.code','left');
        $this->db->where('a.prf_id', $prf_id);
		$this->db->order_by('prf_items_id','asc');
        return $this->db->get()->result();
    }

	public function fetchprfdata($prf_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('a.prf_id', $prf_id);
		$this->db->where('a.is_deleted', '0');

		return $this->db->get()->result();
	}

	public function fetchprfinfo($prf_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join_table1, 'a.client_id=b.CustomerID','left');
		$this->db->where('a.prf_id', $prf_id);
		$this->db->where('a.is_deleted', '0');

		return $this->db->get()->result();
	}

	public function fetchprfdirectitems($prf_id){
		$this->db->select('*');
		$this->db->from($this->join_table4);
		$this->db->join('items as h','e.item_name=h.itemCode','left');
		$this->db->order_by('e.prf_items_id', 'asc');
		$this->db->where('h.itemType','Direct');
		$this->db->where('e.prf_id',$prf_id);
		return $this->db->get()->result();
	}

	public function fetchprfindirectitems($prf_id){
		$this->db->select('*');
		$this->db->from($this->join_table5);
		$this->db->join('items as h','f.item_name=h.itemCode','left');
		$this->db->order_by('f.prf_items_id', 'asc');
		$this->db->where('h.itemType','Indirect');
		$this->db->where('f.prf_id',$prf_id);
		return $this->db->get()->result();
	}

	public function fetchprftoolsitems($prf_id){
		$this->db->select('*');
		$this->db->from($this->join_table6);
		$this->db->join('tools as h','g.item_name=h.code','left');
		$this->db->order_by('g.prf_items_id', 'asc');
		$this->db->where('h.is_deleted','0');
		$this->db->where('g.prf_id',$prf_id);
		return $this->db->get()->result();;
	}

	public function edit_prf_info($prf_id, $data){
        $this->db->where('prf_id', $prf_id);
        $this->db->update('prf_info', $data);
	}

	public function edit_prf_direct($prf_items_id, $data){
        $this->db->where('prf_items_id', $prf_items_id);
        $this->db->update('prf_items_direct', $data);
	}

	public function edit_prf_indirect($prf_items_id, $data){
        $this->db->where('prf_items_id', $prf_items_id);
        $this->db->update('prf_items_indirect', $data);
	}

	public function edit_prf_tools($prf_items_id, $data){
        $this->db->where('prf_items_id', $prf_items_id);
        $this->db->update('prf_items_tools', $data);
	}

	public function get_added_prf_direct($prf_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('prf_items_direct');
		$this->db->where('prf_id',$prf_id);
		$this->db->order_by('prf_items_id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->prf_items_id;
		}
		return $id;
	}

	public function remove_direct_item($direct_item_id,$prf_id) {
		for ($i=0; $i < count($direct_item_id); $i++) { 
			$this->db->where('prf_items_id !=',$direct_item_id[$i][0]);
		}
		$this->db->where('prf_id',$prf_id);
		$this->db->delete('prf_items_direct');
	}

	public function get_added_prf_indirect($prf_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('prf_items_indirect');
		$this->db->where('prf_id',$prf_id);
		$this->db->order_by('prf_items_id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->prf_items_id;
		}
		return $id;
	}

	public function remove_indirect_item($indirect_item_id,$prf_id) {
		for ($i=0; $i < count($indirect_item_id); $i++) { 
			$this->db->where('prf_items_id !=',$indirect_item_id[$i][0]);
		}
		$this->db->where('prf_id',$prf_id);
		$this->db->delete('prf_items_indirect');
	}

	public function get_added_prf_tools($prf_id) {

		$id = '';
		$this->db->select('*');
		$this->db->from('prf_items_tools');
		$this->db->where('prf_id',$prf_id);
		$this->db->order_by('prf_items_id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->prf_items_id;
		}
		return $id;
	}

	public function remove_tools_item($tools_item_id,$prf_id) {
		for ($i=0; $i < count($tools_item_id); $i++) { 
			$this->db->where('prf_items_id !=',$tools_item_id[$i][0]);
		}
		$this->db->where('prf_id',$prf_id);
		$this->db->delete('prf_items_tools');
	}
	
	public function delete_PRF($prf_id, $data){
        $this->db->where('prf_id', $prf_id);
        $this->db->update('prf_info', $data);
	}

	public function PRF_status($prf_id, $data){
        $this->db->where('prf_id', $prf_id);
        $this->db->update('prf_info', $data);
	}

	public function fetchprf($prf_id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join_table1, 'a.client_id=b.CustomerID','left');
		$this->db->join($this->join_table2, 'a.branch_id=c.branch_id','left');
		$this->db->join($this->join_table3, 'a.project_id=d.project_id','left');
		$this->db->where('a.prf_id', $prf_id);
		$this->db->where('a.is_deleted', '0');

		return $this->db->get()->result();
	}

}