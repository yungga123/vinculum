<?php
defined('BASEPATH') or die('Access Denied');

class PrfModel extends CI_Model
{

    //ADD INPUT TO PRF 
    function prf_insert_model($data)
    {
        $data = array(
            'project_name' => $this->input->post('project_name'),
            'date_requested' => $this->input->post('date_requested'),
            'project_activity' => $this->input->post('project_activity'),
            'date_issued' => $this->input->post('date_issued'),
            'indirect_items' => $this->input->post('indirect_items'),
            'quantity' => $this->input->post('quantity'),
            'remarks' => $this->input->post('remarks'),
            'available' => $this->input->post('available'),
            'direct_items' => $this->input->post('direct_items'),
            'indirect_checkbox' => $this->input->post('indirect_checkbox'),
            'quantity_direct' => $this->input->post('quantity_direct'),
            'available_direct' => $this->input->post('available_direct'),
            'tools' => $this->input->post('tools'),
            'tools_checkbox' => $this->input->post('tools_checkbox'),
            'quantity_tools' => $this->input->post('quantity_tools'),
            'available_tools' => $this->input->post('available_tools'),
            'prepared_by' => $this->input->post('prepared_by'),
            'check_by' => $this->input->post('check_by'),
            'person_in_charge' => $this->input->post('person_in_charge')
        );

        $this->db->insert('project_request_form', $data);
    }

    function display_records()
    {
        $data = array(
            'project_name' => $this->input->post('project_name'),
            'date_requested' => $this->input->post('date_requested'),
            'project_activity' => $this->input->post('project_activity'),
            'date_issued' => $this->input->post('date_issued'),
            'indirect_items' => $this->input->post('indirect_items'),
            'quantity' => $this->input->post('quantity'),
            'remarks' => $this->input->post('remarks'),
            'available' => $this->input->post('available'),
            'direct_items' => $this->input->post('direct_items'),
            'indirect_checkbox' => $this->input->post('indirect_checkbox'),
            'quantity_direct' => $this->input->post('quantity_direct'),
            'available_direct' => $this->input->post('available_direct'),
            'tools' => $this->input->post('tools'),
            'tools_checkbox' => $this->input->post('tools_checkbox'),
            'quantity_tools' => $this->input->post('quantity_tools'),
            'available_tools' => $this->input->post('available_tools'),
            'prepared_by' => $this->input->post('prepared_by'),
            'check_by' => $this->input->post('check_by'),
            'person_in_charge' => $this->input->post('person_in_charge')
        );

        $query = $this->db->get("project_request_form", $data);
        return $query->result();
    }

    public function fetchCustomersByName()
	{
		$this->db->select('*');
        $this->db->from('customers');
		return $this->db->get()->result();
	}

    public function fetchNewClientByName()
	{
		$this->db->select('*');
        $this->db->from('sales_inquiry_tempo_clients');
		return $this->db->get()->result();
	}

    public function fetchProjectReportDescription()
	{
		$this->db->select('*');
        $this->db->from('project_report');
		return $this->db->get()->result();
	}

    public function fetchItemName()
	{
		$this->db->select('*');
        $this->db->from('items');
		return $this->db->get()->result();
	}

    public function fetchItemStock()
	{
		$this->db->select('*');
        $this->db->from('items');
		return $this->db->get()->result();
	}

    public function fetchAvailableTools()
	{
		$this->db->select('*');
        $this->db->from('tools');
		return $this->db->get()->result();
	}

    public function fetchEmployee()
	{
		$this->db->select('*');
        $this->db->from('technicians');
		return $this->db->get()->result();
	}
}
