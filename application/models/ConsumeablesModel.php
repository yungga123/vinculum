<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesModel extends CI_Model {

    public function select () {
        
    }
    
    //ADD INPUT TO PRF 
	public function insert_data()
    {
        $data = array('project_name' => $this->insert->post('project_name'),
                        'project_activity' => $this->insert->post('project_activity'),
                        'date_requested' => $this->insert->post('date_requested'),
                        'date_issued' => $this->insert->post('date_issued')
                    );

        $this->db->insert('project_request_form', $data);
    }

}