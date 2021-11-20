<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesModel extends CI_Model {

    public function select () {
        
    }
    
    //ADD INPUT TO PRF 
	function order_summary_insert($data){
        $this->db->insert('project_request_form',$data);
    }

}