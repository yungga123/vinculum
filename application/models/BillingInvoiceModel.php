<?php

class BillingInvoiceModel extends CI_Model
{

    // Get cities
    function getCity()
    {

        $response = array();

        // Select record
        $this->db->select('*');
        $q = $this->db->get('customers');
        $response = $q->result_array();

        return $response;
    }

    // Get City departments
    function getCityDepartment($postData)
    {
        $response = array();

        // Select record
        $this->db->select('id,branch_name');
        $this->db->where('customers_branch', $postData['customers_branch']);
        $q = $this->db->get('customers_branch');
        $response = $q->result_array();

        return $response;
    }

    // Get Department user
    function getDepartmentUsers($postData)
    {
        $response = array();

        // Select record
        $this->db->select('id,branch');
        $this->db->where('customers_project', $postData['customers_project']);
        $q = $this->db->get('customers_project');
        $response = $q->result_array();

        return $response;
    }

    public function billing_invoice()
    {
        $response = array();
        $this->db->select('*');
        $this->db->from('customers');
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
