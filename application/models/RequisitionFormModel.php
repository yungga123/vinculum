<?php
defined('BASEPATH') or die('Access Denied');

class RequisitionFormModel extends CI_Model {
    public function insert_requisition($data){
        $this->db->insert('requisition_form',$data);
    }

    public function insert_request_items($data) {
        $this->db->insert('requisition_form_items',$data);
    }

    public function get_requisition_form() {
		$this->db->select('*');
		$this->db->from('requisition_form');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		return $this->db->get()->result();
    }
    
    //*****************SERVER SIDE VALIDATION FOR DATATABLE*********************
        var $table = "requisition_form as a";
        var $join_table = 'technicians as b';
        var $join_table2 = 'technicians as c';
        var $join_table3 = 'technicians as d';
        var $join_table4 = 'technicians as e';
        var $join_table5 = 'technicians as f';

        var $select_column = array(
            'a.id as req_id',
            'a.date',
            'a.processed_by',
            'a.approved_by',
            'a.requested_by',
            'a.received_by',
            'a.checked_by',
            'a.is_deleted',
            'b.lastname as req_last',
            'b.firstname as req_first',
            'b.middlename as req_mid',
            'c.lastname as proc_last',
            'c.firstname as proc_first',
            'c.middlename as proc_mid',
            'd.lastname as app_last',
            'd.firstname as app_first',
            'd.middlename as app_mid',
            'e.lastname as rec_last',
            'e.firstname as rec_first',
            'e.middlename as rec_mid',
            'f.lastname as check_last',
            'f.firstname as check_first',
            'f.middlename as check_mid'
        );

        var $order_column = array(
            'a.id',
            'a.date',
            'a.processed_by',
            'a.approved_by',
            'a.requested_by',
            'a.received_by',
            'a.checked_by',
            'a.is_deleted',
            'b.lastname',
            'b.firstname',
            'b.middlename',
            'c.lastname',
            'c.firstname',
            'c.middlename',
            'd.lastname',
            'd.firstname',
            'd.middlename',
            'd.lastname',
            'd.firstname',
            'd.middlename',
            'e.lastname',
            'e.firstname',
            'e.middlename',
            'f.lastname',
            'f.firstname',
            'f.middlename'
        );

        public function requisition_form_query(){

            $this->db->select($this->select_column);
            $this->db->from($this->table);
            $this->db->join($this->join_table,'a.requested_by=b.id','left');
            $this->db->join($this->join_table2,'a.processed_by=c.id','left');
            $this->db->join($this->join_table3,'a.approved_by=d.id','left');
            $this->db->join($this->join_table4,'a.received_by=e.id','left');
            $this->db->join($this->join_table5,'a.checked_by=f.id','left');

            if(isset($_POST["search"]["value"])){
                $this->db->like("a.id", $_POST["search"]["value"]);
                $this->db->or_like("a.date", $_POST["search"]["value"]);
                $this->db->or_like("a.processed_by", $_POST["search"]["value"]);
                $this->db->or_like("a.approved_by", $_POST["search"]["value"]);
                $this->db->or_like("a.requested_by", $_POST["search"]["value"]);
                $this->db->or_like("a.received_by", $_POST["search"]["value"]);
                $this->db->or_like("a.checked_by", $_POST["search"]["value"]);
                $this->db->or_like("b.lastname", $_POST["search"]["value"]);
                $this->db->or_like("b.firstname", $_POST["search"]["value"]);
                $this->db->or_like("b.middlename", $_POST["search"]["value"]);
                $this->db->or_like("c.lastname", $_POST["search"]["value"]);
                $this->db->or_like("c.firstname", $_POST["search"]["value"]);
                $this->db->or_like("c.middlename", $_POST["search"]["value"]);
                $this->db->or_like("d.lastname", $_POST["search"]["value"]);
                $this->db->or_like("d.firstname", $_POST["search"]["value"]);
                $this->db->or_like("d.middlename", $_POST["search"]["value"]);
                $this->db->or_like("e.lastname", $_POST["search"]["value"]);
                $this->db->or_like("e.firstname", $_POST["search"]["value"]);
                $this->db->or_like("e.middlename", $_POST["search"]["value"]);
                $this->db->or_like("f.lastname", $_POST["search"]["value"]);
                $this->db->or_like("f.firstname", $_POST["search"]["value"]);
                $this->db->or_like("f.middlename", $_POST["search"]["value"]);
                $this->db->having("a.is_deleted",0);
            }

            if (isset($_POST["order"])) {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else {
                $this->db->order_by("a.id","DESC");
            }

        }

        public function requisition_form_datatable() {

            $this->requisition_form_query();
            if($_POST["length"] != -1) {
                $this->db->limit($_POST["length"],$_POST["start"]);
            }
            $query = $this->db->get();
            return $query->result();
        }

        public function filter_requisition_form_data() {
            $this->requisition_form_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function get_all_requisition_form_data() {
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where('a.is_deleted',0);
            return $this->db->count_all_results();
        }
    //*****************end*********************
}