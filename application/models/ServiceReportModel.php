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
			b.CompanyName as customer_name,
			a.description as description,
			a.date_requested as date_requested,
			a.date_implemented as date_implemented,

		');
		$this->db->from('service_report as a');
		$this->db->join('customer_vt as b','a.customer_name=b.CustomerID','left');

		$this->db->where('a.id',$id);
	
		return $this->db->get()->result();
		
	}

	public function service_report_directItem_view($id) {
		$this->db->select('
			a.sr_id as sr_id,
			a.direct_item_id as direct_item_id,
			c.itemName as direct_item,
			c.itemPrice as direct_item_price,
			a.qty_rqstd as qty_rqstd,
			a.returns as returns
		');
		$this->db->from('service_report_direct_item as a');
		$this->db->join('service_report as b','a.sr_id=b.id','left');
		$this->db->join('items as c','a.direct_item_id=c.itemCode','left');

		$this->db->where('a.sr_id',$id);

		return $this->db->get()->result();

	}

	public function service_report_indirectItem_view($id) {
		$this->db->select('
			a.sr_id as sr_id,
			a.indirect_item_id as indirect_item_id,
			c.itemName as indirect_item,
			c.itemPrice as indirect_item_price,
			a.qty_rqstd as qty_rqstd,
			a.returns as returns
		');
		$this->db->from('service_report_indirect_item as a');
		$this->db->join('service_report as b','a.sr_id=b.id','left');
		$this->db->join('items as c','a.indirect_item_id=c.itemCode','left');

		$this->db->where('a.sr_id',$id);

		return $this->db->get()->result();

	}

	public function service_report_tools_view($id) {
		$this->db->select('
			a.sr_id as sr_id,
			a.tools_id as tools_id,
			c.model as tools_model,
			c.price as tools_price,
			a.qty_rqstd as qty_rqstd,
			a.returns as returns
		');
		$this->db->from('service_report_tools as a');
		$this->db->join('service_report as b','a.sr_id=b.id','left');
		$this->db->join('tools as c','a.tools_id=c.code','left');

		$this->db->where('a.sr_id',$id);

		return $this->db->get()->result();

	}
    
    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
    var $table = "service_report as a";
    var $join_table = "customer_vt as b";
	var $select_column = array(
        "a.id as sr_id",
		"CompanyName",
		"description",
		"date_requested",
		"date_implemented",
		"a.is_deleted"
	);
	var $order_column = array(
        "a.id",
        "CompanyName",
        "description",
        "date_requested",
        "date_implemented"
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