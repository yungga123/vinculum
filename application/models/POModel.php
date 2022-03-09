<?php
defined('BASEPATH') or die('Access Denied');

class POModel extends CI_Model
{

    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
    var $table = "generated_po as a";
    var $join_table = 'vendor as b';
    var $join_table1 = 'generated_po_items as c';
    var $join_table2 = 'requisition_form_items as d';

    var $select_column = array(
        'a.po_id',
        'a.supplier_id',
        'a.generated_date',
        'b.id',
        'b.name',
        'a.po_status'
    );

    var $order_column = array(
        'a.po_id',
        'a.supplier_id',
        'a.generated_date',
        'b.id',
        'b.name'
    );

    public function po_form_query($po_status)
    {

        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join($this->join_table, "a.supplier_id=b.id");


        if (isset($_POST["search"]["value"])) {
            $this->db->like("a.po_id", $_POST["search"]["value"]);
            $this->db->or_like("a.supplier_id", $_POST["search"]["value"]);
            $this->db->having('a.po_status', $po_status);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("a.po_id", "DESC");
        }
    }

    public function PO_datatable($po_status)
    {

        $this->po_form_query($po_status);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function filter_po_form_data($po_status)
    {
        $this->po_form_query($po_status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_po_form_data($po_status)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('a.po_status', $po_status);
        return $this->db->count_all_results();
    }

    public function acc_req_list()
    {
        $this->db->select('a.id, a.date, a.requested_by, b.lastname, b.firstname, b.middlename');
        $this->db->from('requisition_form as a');
        $this->db->join('technicians as b', 'a.requested_by=b.id');
        $this->db->order_by('a.id', 'DESC');
        $this->db->where('a.status', 'Accepted');
        return $this->db->get()->result();
    }

    public function get_requisition_items($id)
    {
        $this->db->select([
            'id as item_id',
            'request_form_id',
            'description',
            'unit_cost',
            'qty',
            'unit',
            'supplier',
            'date_needed',
            'purpose'
        ]);
        $this->db->from('requisition_form_items');
        $this->db->where('request_form_id', $id);
        $this->db->order_by('supplier', 'DESC');
        return $this->db->get()->result();
    }

    public function get_po_items($id)
    {
        $this->db->select('*');
        $this->db->from('generated_po_items as a');
        $this->db->join('requisition_form_items as b', 'a.requisition_item_id=b.id', 'left');
        $this->db->where('a.po_id', $id);
        return $this->db->get()->result();
    }

    public function insert_po_items($data)
    {
        $this->db->insert('generated_po_items', $data);
    }

    public function insert_po($data)
    {
        $this->db->insert('generated_po', $data);
    }

    public function get_po_generated_id()
    {
        $this->db->select('*');
        $this->db->from('generated_po');
        $this->db->order_by('po_id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function get_new_po_data($supplier_id)
    {
        $this->db->select('*');
        $this->db->from('generated_po');
        $this->db->where('supplier_id', $supplier_id);
        $this->db->order_by('po_id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }



    public function delete_po($po_id)
    {
        $this->db->where('po_id', $po_id);
        $this->db->delete('generated_po');
    }

    public function delete_po_items($po_id)
    {
        $this->db->where('po_id', $po_id);
        $this->db->delete('generated_po_items');
    }

    public function get_employee_list()
    {
        $this->db->select('id, lastname, firstname, middlename');
        $this->db->from('technicians');
        $this->db->where('status !=', 'Resigned');
        return $this->db->get()->result();
    }

    public function get_supplier_details($po_id)
    {
        $this->db->select('a.po_id, a.supplier_id, a.po_revise, b.vendor_code, b.name, b.address, b.vendor_category, b.terms_and_condition');
        $this->db->from($this->table);
        $this->db->where('a.po_id', $po_id);
        $this->db->join($this->join_table, 'a.supplier_id=b.id', 'left');
        return $this->db->get()->result();
    }

    public function get_items_details($po_id, $mark_as_read)
    {
        $this->db->select('c.po_id, c.requisition_item_id, c.requisition_id, d.request_form_id, d.id, d.description, d.unit_cost, d.qty, d.unit, d.date_needed, d.purpose');
        $this->db->from($this->join_table1);
        $this->db->where('c.po_id', $po_id);
        $this->db->join($this->join_table2, 'c.requisition_item_id=d.id', 'inner');
        $this->db->where('c.mark_as_proceed', $mark_as_read);
        return $this->db->get()->result();
    }

    public function get_po_details($po_id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('a.po_id', $po_id);
        // $this->db->where('po_status', 'filed');
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function po_items_list($po_id)
    {
        $this->db->select('*');
        $this->db->from('requisition_form_items as a');
        $this->db->join('generated_po_items as b', 'a.id=b.requisition_item_id', 'left');
        $this->db->join('generated_po as c', 'b.po_id=c.po_id', 'left');
        $this->db->where('c.po_id', $po_id);
        return $this->db->get()->result();
    }

    public function vendor_list($po_id)
    {
        $this->db->select('a.name');
        $this->db->from('vendor as a');
        $this->db->join('generated_po as b', 'a.id=b.supplier_id', 'left');
        $this->db->where('b.po_id', $po_id);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->result();
    }

    public function fetch_po_details($po_id)
    {
        $this->db->select('*');
        $this->db->from('generated_po');
        $this->db->where('po_id', $po_id);
        $this->db->limit(1);
        $results = $this->db->get()->result();
        foreach ($results as $row) {
            $po_status = $row->po_revise;
        }
        return $po_status;
    }

    public function update_po_revise($po_id, $data)
    {
        $this->db->where('po_id', $po_id);
        $this->db->update('generated_po', $data);
    }

    public function update_po_items($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('requisition_form_items', $data);
    }

    public function insert_requisition_items($data)
    {
        $this->db->insert('requisition_form_items', $data);
    }

    public function update_approved_po($id, $data)
    {
        $this->db->where('po_id', $id);
        $this->db->update('generated_po', $data);
    }

    public function mark_po_item($req_id,$po_id,$data){
        $this->db->where('requisition_item_id', $req_id);
        $this->db->where('po_id', $po_id);
        $this->db->update('generated_po_items', $data);
    }

    public function reset_items_status($po_id, $data){
        $this->db->where('po_id', $po_id);
        $this->db->update('generated_po_items', $data);
    }

    public function getVendorList(){
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->order_by('name','ASC');
		$this->db->where('is_deleted', '0');
		
		return $this->db->get()->result();
	}

    public function fetch_generated_po_data($start_date, $end_date, $supplier_id ){
        $where = "date(date_filed) BETWEEN '".$start_date."' AND '".$end_date."'";

        $this->db->select('*');
        $this->db->from('generated_po as a');
        if($supplier_id != ""){
            $this->db->where('a.supplier_id',$supplier_id);
        }
        $this->db->where('a.po_status','filed');
        $this->db->where('a.is_deleted','0');
        $this->db->where($where);
        $this->db->join('vendor as b','a.supplier_id=b.id','left');
        // $this->db->join('requisition_form_items as c','b.requisition_item_id=c.request_form_id','left');

        return $this->db->get()->result();
    }

    public function fetch_generated_po_items_data($po_id){
        $this->db->select('*');
        $this->db->from('generated_po_items as a');
        $this->db->where('a.po_id',$po_id);

        return $this->db->get()->result();
    }

    public function fetch_requisition_items_data($item_id){
        $this->db->select('*');
        $this->db->from('requisition_form_items as a');
        $this->db->where('a.id',$item_id);

        return $this->db->get()->result();
    }
}
