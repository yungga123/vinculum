<?php
defined('BASEPATH') or die('Access Denied');

class PrfController extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model("PrfModel");
		$this->load->library('form_validation');
	}

	public function prf()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Request Form';
			$data['prf'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('prf/prf');
			$this->load->view('templates/footer');
			$this->load->view('prf/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function prf_view()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'PRF View';
			$data['prf'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('prf/prf_view');
			$this->load->view('templates/footer');
			$this->load->view('prf/script');
		} else {
			redirect('', 'refresh');
		}
	}

	function new_blank_order_summary()
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
		$this->PrfModel->order_summary_insert($data);

		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Project Request Form';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('prf/prf_view');
		$this->load->view('templates/footer');
		$this->load->view('prf/script');
	}


	function edit($id)
	{
		$data['title'] = "Edit Product";
		$data['id'] = $this->model->edit($id);
		$this->load->view('prf/prf_edit', $data);
	}

	function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$validations = array(
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
		$this->form_validation->set_rules($validations);
		if ($this->form_validation->run() === FALSE) {
			$this->edit($this->input->post('id'));
		} else {
			$data['id'] = $this->input->post('id');
			$data['project_name'] = $this->input->post('project_name');
			$data['date_requested'] = $this->input->post('date_requested');
			$data['project_activity'] = $this->input->post('project_activity');
			$data['date_issued'] = $this->input->post('date_issued');
			$data['indirect_items'] = $this->input->post('indirect_items');
			$data['quantity'] = $this->input->post('quantity');
			$data['remarks'] = $this->input->post('remarks');
			$data['available'] = $this->input->post('available');
			$data['direct_items'] = $this->input->post('direct_items');
			$data['indirect_checkbox'] = $this->input->post('indirect_checkbox');
			$data['quantity_direct'] = $this->input->post('quantity_direct');
			$data['available_direct'] = $this->input->post('available_direct');
			$data['tools'] = $this->input->post('tools');
			$data['tools_checkbox'] = $this->input->post('tools_checkbox');
			$data['quantity_tools'] = $this->input->post('quantity_tools');
			$data['available_tools'] = $this->input->post('available_tools');
			$data['prepared_by'] = $this->input->post('prepared_by');
			$data['check_by'] = $this->input->post('check_by');
			$data['person_in_charge'] = $this->input->post('person_in_charge');

			if ($this->model->update($data)) {
				redirect('project_request_form');
			} else {
				log_message('error', 'Error');
			}
		}
	}
}
