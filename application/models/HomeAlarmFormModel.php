<?php
defined('BASEPATH') or die('Access Denied');

class HomeAlarmFormModel extends CI_Model {
    public function insert_client($data) {
        $this->db->insert('home_alarm_clients',$data);
    }

    public function insert_transaction($data) {
        $this->db->insert('home_alarm_transactions',$data);
    }

    public function get_latest_homealarm_client() {
        $this->db->select('id');
        $this->db->from('home_alarm_clients');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get()->result();
    }
}