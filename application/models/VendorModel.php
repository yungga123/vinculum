<?php
defined('BASEPATH') or die('Access Denied');

class VendorModel extends CI_Model {

    public function vendor_datatable() {

		$this->vendor_query();

		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
    public function vendor_query() {
		$id = 0;
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where("is_deleted",$id);
		
		if(isset($_POST["search"]["value"])){

			$this->db->like("a.vendor_code", $_POST["search"]["value"]);
			$this->db->or_like("a.name", $_POST["search"]["value"]);
			$this->db->or_like("a.address", $_POST["search"]["value"]);
			$this->db->or_like("a.contact_number", $_POST["search"]["value"]);
			$this->db->or_like("a.contact_person", $_POST["search"]["value"]);
			$this->db->or_like("a.industry_classification", $_POST["search"]["value"]);
            $this->db->or_like("a.date", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted', 0);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.id","DESC");
		}
	}

    public function filter_vendor_data() {
		$this->vendor_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_vendor_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}

	public function insert_vendor_brand($data) {
        $this->db->insert('vendor_brand',$data);
    }

	public function insert_vendor($data){
		$this->db->insert('vendor',$data);
	}

	public function get_vendor_brands() {
		$this->db->select('*');
		$this->db->from('vendor_brand');
		$this->db->order_by('brand_id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function get_vendor_data($vendor_id) {
		$this->db->select("*");
		$this->db->from('vendor');
		$this->db->where("id",$vendor_id);
		$this->db->where("is_deleted",0);
		return $this->db->get()->result();
	}

	public function get_brand_data($vendor_id) {
		$id = 0;
		$this->db->select("*");
		$this->db->from('vendor_brand');
		$this->db->where("brand_id",$vendor_id);
		return $this->db->get()->result();
	}

	public function update_vendor($vendor_id,$data) {
        $this->db->where('id',$vendor_id);
        $this->db->update('vendor',$data);
    }

	public function update_vendor_brand($brand_data_id,$data) {
        $this->db->where('id',$brand_data_id);
        $this->db->update('vendor_brand',$data);
    }

	public function get_new_added_vendor_brand($vendor_code) {

		$id = '';
		$this->db->select('*');
		$this->db->from('vendor_brand');
		$this->db->where('brand_id',$vendor_code);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$id = $row->id;
		}
		return $id;
	}

	public function remove_vendor_brand($id,$vendor_code) {
		for ($i=0; $i < count($id); $i++) { 
			$this->db->where('id !=',$id[$i][0]);
		}
		$this->db->where('brand_id',$vendor_code);
		$this->db->delete('vendor_brand');
	}

	public function getVendorList(){
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where('is_deleted', '0');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "vendor as a";
	var $join_table = "vendor_brand as b";
	var $select_column = array(
		"a.id",
		"a.vendor_code",
		"a.name",
		"a.address",
		"a.contact_number",
		"a.contact_person",
		"a.supplier_ranking",
		"a.industry_classification",
		"a.terms_and_condition",
        "a.date",
        "a.is_deleted"
	);

    var $order_column = array(
		"a.vendor_code",
		"a.name",
		"a.address",
		"a.contact_number",
		"a.contact_person",
		"a.industry_classification",
		"a.supplier_ranking",
        "a.date"	
	);
	//*****************end*********************
	
}