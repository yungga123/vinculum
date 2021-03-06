<?php 
defined('BASEPATH') or die('Access Denied');

class CountsModel extends CI_Model {
    

    //REQUISITION COUNTS
    public function count_pending_requisitions() {
        $this->db->select("*");
        $this->db->from('requisition_form');
        $this->db->where('status','');
        $this->db->where('is_deleted',0);
        return $this->db->count_all_results();
    }

    public function count_accepted_requisitions() {
        $this->db->select("*");
        $this->db->from('requisition_form');
        $this->db->where('status','Accepted');
        $this->db->where('is_deleted',0);
        return $this->db->count_all_results();
    }

    public function count_filed_requisitions() {
        $this->db->select("*");
        $this->db->from('requisition_form');
        $this->db->where('status','Filed');
        $this->db->where('is_deleted',0);
        return $this->db->count_all_results();
    }
    //END OF REQUISITION COUNTS

}