<?php
defined('BASEPATH') or die('Access Denied');

class RequisitionFormModel extends CI_Model {

    public function insert_requisition($data){
        $this->db->insert('requisition_form',$data);
    }
}