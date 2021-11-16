<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesModel extends CI_Model {

    public function select () {
        
    }
    //ADD INPUT TO PRF 
    function saverecords($data)
    {
        $this->db->insert('ConsumeablesController',$data);
        return true;
    }
}