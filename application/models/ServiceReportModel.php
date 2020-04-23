<?php
defined('BASEPATH') or die('Access Denied');

class ServiceReportModel extends CI_Model {

    public function insert_service_report($data) {
        $this->db->insert('service_report',$data);
    }
    
    public function insert_sr_direct_item($data) {
        $this->db->insert('service_report_direct_item',$data);
    }

    public function insert_sr_indirect_item($data) {
        $this->db->insert('service_report_indirect_item',$data);
    }

    public function insert_sr_tools($data) {
        $this->db->insert('service_report_tools',$data);
    }

    public function select_latest(){
		$this->db->order_by('id','DESC');
		return $this->db->get('service_report',1)->result();
	}

}