<?php

class BillingInvoiceModel extends CI_Model
{

    public function billing_invoice()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('generated_po');
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
        $response = array();
        $this->db->select('*');
        $this->db->from('technicians');
        $q = $this->db->get();
        $response = $q->result_array();
        return $response;
    }

    public function getduedate()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('billinginvoice');
        $q = $this->db->get();
        $response = $q->result_array();
        return $response;
    }

    public function insert_data($data)
    {
        $this->db->insert('billinginvoice', $data);
    }
}
