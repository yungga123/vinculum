<?php
defined('BASEPATH') or die('Access Denied');

class PrfModel extends CI_Model {
    
    //ADD INPUT TO PRF 
	function order_summary_insert($data){
        $this->db->insert('project_request_form',$data);
    }

}