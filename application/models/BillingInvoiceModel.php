<?php

class BillingInvoiceModel extends CI_Model{

    public function billing_invoice()
    {
        $this->db->select('*');
        $this->db->from('generated_po');
		return $this->db->get()->result();
    }
}