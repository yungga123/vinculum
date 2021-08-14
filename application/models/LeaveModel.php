<?php 
defined('BASEPATH') or die('Access Denied');

class LeaveModel extends CI_Model {

    public function insert_leave($data){
        $this->db->insert('filed_leave',$data);
    }
}