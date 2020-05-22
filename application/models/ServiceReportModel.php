<?php
defined('BASEPATH') or die('Access Denied');

class ServiceReportModel extends CI_Model {

    public function insert_service_report($data) {
        $this->db->insert('service_report',$data);
    }
    
    public function insert_sr_direct_item($data) {
        $this->db->insert('service_report_direct_item',$data);
    }

    public function insert_sr_indirect_item($data) {
        $this->db->insert('service_report_indirect_item',$data);
    }

    public function insert_sr_tools($data) {
        $this->db->insert('service_report_tools',$data);
    }

    public function select_latest(){
		$this->db->order_by('id','DESC');
		return $this->db->get('service_report',1)->result();
	}
	
	public function service_report_view($id) {
		$this->db->select('

			a.id as sr_id,
			b.CustomerID as customer_id,
			b.CompanyName as customer_name,
			a.description as description,
			a.date_requested as date_requested,
			a.date_implemented as date_implemented,
			a.received_by as received_by,
			a.checked_by as checked_by,

		');
		$this->db->from('service_report as a');
		$this->db->join('customer_vt as b','a.customer_name=b.CustomerID','left');

		$this->db->where('a.id',$id);
	
		return $this->db->get()->result();
		
	}

	public function service_report_directItem_view($id) {

		$this->db->where('sr_id',$id);
		return $this->db->get('service_report_direct_item')->result();

	}

	public function service_report_indirectItem_view($id) {

		$this->db->where('sr_id',$id);
		return $this->db->get('service_report_indirect_item')->result();

	}

	public function service_report_tools_view($id) {

		$this->db->where('sr_id',$id);
		return $this->db->get('service_report_tools')->result();

	}

	public function update_service_report($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('service_report',$data);
	}

	//updating sr_direct_item
	public function update_sr_direct_item($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('service_report_direct_item',$data);
	}

	public function get_new_added_sr_direct_item($sr_id) {
		$id = '';
		$this->db->select('*');
		$this->db->from('service_report_direct_item');
		$this->db->where('sr_id',$sr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}

	public function remove_sr_direct_item($id,$sr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('sr_id',$sr_id);
		$this->db->delete('service_report_direct_item');
	}
	// end of updating sr_direct_item

	//updating sr_indirect_item
	public function update_sr_indirect_item($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('service_report_indirect_item',$data);
	}

	public function get_new_added_sr_indirect_item($sr_id) {
		$id = '';
		$this->db->select('*');
		$this->db->from('service_report_indirect_item');
		$this->db->where('sr_id',$sr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}

	public function remove_sr_indirect_item($id,$sr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('sr_id',$sr_id);
		$this->db->delete('service_report_indirect_item');
	}
	// end of updating sr_indirect_item

	//updating sr_tools
	public function update_sr_tools($id,$data) {
		$this->db->where('id',$id);
		$this->db->update('service_report_tools',$data);
	}

	public function get_new_added_sr_tools($sr_id) {
		$id = '';
		$this->db->select('*');
		$this->db->from('service_report_tools');
		$this->db->where('sr_id',$sr_id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}

	public function remove_sr_tools($id,$sr_id) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('sr_id',$sr_id);
		$this->db->delete('service_report_tools');
	}
	// end of updating sr_tools
    
    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
    var $table = "service_report as a";
    var $join_table = "customer_vt as b";
	var $select_column = array(
        "a.id as sr_id",
		"CompanyName",
		"description",
		"date_requested",
		"date_implemented",
		"received_by",
		"checked_by",
		"a.is_deleted"
	);
	var $order_column = array(
        "a.id",
        "CompanyName",
        "description",
        "date_requested",
		"date_implemented",
		"received_by",
		"checked_by"
	);

	public function service_report_query(){

		$this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join($this->join_table, 'a.customer_name=b.CustomerID','left');

		if(isset($_POST["search"]["value"])){
			$this->db->like("a.id", $_POST["search"]["value"]);
            $this->db->or_like("CompanyName", $_POST["search"]["value"]);
            $this->db->or_like("description", $_POST["search"]["value"]);
            $this->db->or_like("date_requested", $_POST["search"]["value"]);
			$this->db->or_like("date_implemented", $_POST["search"]["value"]);
			$this->db->or_like("received_by", $_POST["search"]["value"]);
			$this->db->or_like("checked_by", $_POST["search"]["value"]);
            $this->db->having('a.is_deleted',0);
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.id","ASC");
		}

	}

	public function service_report_datatable() {

		$this->service_report_query();
		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filter_service_report_data() {
		$this->service_report_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_service_report_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('a.is_deleted',0);
		return $this->db->count_all_results();
	}
	//*****************end*********************

}