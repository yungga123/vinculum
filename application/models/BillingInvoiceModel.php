<?php

class BillingInvoiceModel extends CI_Model{

    public function billing_invoice()
    {
        $this->db->select('*');
        $this->db->from('customers');
		return $this->db->get()->result();
    }

    public function dateneeded()
    {
        $this->db->select('*');
        $this->db->from('technicians');
		return $this->db->get()->result();
    }
}