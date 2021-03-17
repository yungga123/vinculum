<?php

class SalesQuotationModel extends CI_Model {
	
	public function salesquotation_datatable() {

		$this->salesquotation_query();

		if($_POST["length"] != -1) {
			$this->db->limit($_POST["length"],$_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function salesquotation_query() {
		$id = 0;
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->join($this->join_table_tech,'a.prepared_by=b.id','left');
		$this->db->where("is_deleted",$id);
		
		if(isset($_POST["search"]["value"])){

			$this->db->like("a.quotation_ref", $_POST["search"]["value"]);
			$this->db->or_like("a.customer_name", $_POST["search"]["value"]);
			$this->db->or_like("a.contact_person", $_POST["search"]["value"]);
			$this->db->or_like("a.prepared_by", $_POST["search"]["value"]);
			$this->db->having('a.is_deleted', 0);
			
		}

		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("a.order_by_id","DESC");
		}

		
	}

	//*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
	var $table = "sales_quotation as a";
	var $join_table = "sales_quotation_items as b";
	var $join_table_tech = "technicians as b";
	var $select_column = array(
		"a.quotation_ref",
		"a.customer_name",
		"a.contact_person",
		"a.contact_number",
		"a.email",
		"a.customer_location",
		"a.project_type",
		"a.subject",
		"a.prepared_by",
		"a.Date_created",
		"a.is_deleted"
	);
	var $order_column = array(
		"a.quotation_ref",
		"a.customer_name",
		"a.contact_person",
		"a.contact_number",
		"a.email",
		"a.customer_location",
		"a.project_type",
		"a.subject",
		"a.prepared_by",
		"a.Date_created",
		"a.is_deleted"
	);

	public function filter_salesquotation_data() {
		$this->salesquotation_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_salesquotation_data() {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where('is_deleted',0);
		return $this->db->count_all_results();
	}

	public function get_sales_quotation_items() {
		$this->db->select('*');
		$this->db->from('sales_quotation_items');
		$this->db->order_by('quotation_ref','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function insert_salesquotation($data){
		$this->db->insert('sales_quotation',$data);
	}

	public function insert_salesquotation_items($data){
		$this->db->insert('sales_quotation_items',$data);
	}
	

	public function GetSalesQuotation($quotation_ref) {
		$this->db->select('
			a.quotation_ref,
			a.customer_name,
			a.contact_person,
			a.contact_number,
			a.email,
			a.customer_location,
			a.project_type,
			a.subject,
			a.prepared_by,
			a.prepared_email,
			a.Date_created,
			a.warranty_covered,
			a.promo,
			a.payment_mode,
			a.discount,
			a.vat,
			a.Date_created
		');

		$this->db->from('sales_quotation as a');
		$this->db->join('sales_quotation_items as b','a.quotation_ref=b.quotation_ref','left');
		$this->db->where('a.quotation_ref',$quotation_ref);
		return $this->db->get()->result();
	}

	

	public function GetSpecificSalesQuotation($quotation_ref) {
		$this->db->select('*');
		$this->db->from('sales_quotation');
		$this->db->where('quotation_ref',$quotation_ref);
		return $this->db->get()->result();
	}


	public function GetSalesQuotationItem($quotation_ref) {
		$this->db->where('quotation_ref',$quotation_ref);
		return $this->db->get('sales_quotation_items')->result();
	}

	public function getSalesInfo($prepared_by) {
		$salesposition = 'Pre-Technical Sales';
		
		$this->db->select("*");
		$this->db->from("technicians");
		$this->db->where("id",$prepared_by);
		return $this->db->get()->result();
	}


	public function getSales() {
		$salesposition = 'Pre-Technical Sales';
		
		$this->db->select("*");
		$this->db->from('technicians');
		$this->db->where('position',$salesposition);
		return $this->db->get()->result();
	}

	public function updateSalesQuotation($quotation_ref,$data) {
		$this->db->where('quotation_ref',$quotation_ref);
		$this->db->update('sales_quotation',$data);
	}

	public function updateQuotationItems($quotation_item_id,$data) {
		$this->db->where('ID',$quotation_item_id);
		$this->db->update('sales_quotation_items',$data);
	}

	public function CheckExistingRefNo($quotation_ref){
		$this->db->select("*");
		$this->db->from('sales_quotation');
		$this->db->where('quotation_ref', $quotation_ref);
		return $this->db->get()->result();
	}

	public function removeSalesQuotationItem($quotation_id_data,$quotation_ref) {
		for ($i=0; $i < count($quotation_id_data); $i++) { 
			$this->db->where('ID !=',$quotation_id_data[$i][0]);
		}
		$this->db->where('quotation_ref',$quotation_ref);
		$this->db->delete('sales_quotation_items');
	}

	public function deleteQuotation($quotation_ref, $data) {

		$this->db->where('quotation_ref', $quotation_ref);
		return $this->db->update('sales_quotation', $data);


	}

	public function getNewAddedQuotationItems($quotation_ref) {

		$ID = '';
		$this->db->select('*');
		$this->db->from('sales_quotation_items');
		$this->db->where('quotation_ref',$quotation_ref);
		$this->db->order_by('ID','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->result();
		foreach ($results as $row) {
			$ID = $row->ID;
		}
		return $ID;
	}

	public function selectsalesname() {
		$this->db->select('
			a.id,
			a.lastname,
			a.firstname,
			a.middlename
		');

		$this->db->from('technicians as a');
		$this->db->join('sales_quotation as b','a.id=b.prepared_by','right');
		return $this->db->get()->result();
	}
}
