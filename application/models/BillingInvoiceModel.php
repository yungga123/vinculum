<?php

class BillingInvoiceModel extends CI_Model
{

    public function billing_invoice()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('customers');
        $q = $this->db->get();
        $response = $q->result_array();
        return $response;
    }
    
    public function select_branch()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('customers_branch');
        $q = $this->db->get();
        $response = $q->result_array();
        return $response;
    }

    public function dateneeded()
    {
        $this->db->select('*');
        $this->db->from('technicians');
        return $this->db->get()->result();
    }
}
