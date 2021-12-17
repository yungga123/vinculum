<?php
defined('BASEPATH') or die('Access Denied');

class PrfModel extends CI_Model
{

    //ADD INPUT TO PRF 
    function order_summary_insert($data)
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

    function edit($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('project_request_form');
        return $query->row(0);
    }

    function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('project_request_form');
    }
}
