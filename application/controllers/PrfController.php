<?php
defined('BASEPATH') or die('Access Denied');

class PrfController extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model("PrfModel");
		$this->load->library('form_validation');
		$this->load->database();
	}

	public function prf()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Request Form';
			$data['prf'] = ' active';
			$data['ul_items_tree'] = ' active';
			$data['fetchcustomerbyname'] = $this->PrfModel->fetchCustomersByName();
			$data['fetchnewclient'] = $this->PrfModel->fetchNewClientByName();
			$data['fetchprojectreportdescription'] = $this->PrfModel->fetchProjectReportDescription();
			$data['fetchitemname'] = $this->PrfModel->fetchItemName();
			$data['fetchemployee'] = $this->PrfModel->fetchEmployee();
			$this->PrfModel->fetchItemStock();
			$this->PrfModel->fetchAvailableTools();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('prf/prf');
			$this->load->view('templates/footer');
			$this->load->view('prf/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function prf_list()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'PRF View';
			$data['prf'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('prf/prf_list');
			$this->load->view('templates/footer');
			$this->load->view('prf/script');
		} else {
			redirect('', 'refresh');
		}
	}
	//VIEWING OF PRF LIST & INSERT OF DATAS
	function prf_data_input()
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
		$this->PrfModel->prf_insert_model($data);

		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Project Request Form';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('prf/prf_list');
		$this->load->view('templates/footer');
		$this->load->view('prf/script');
	}

	public function edit()
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
		$result['data'] = $this->PrfModel->display_records();


		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Project Request Form';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('prf/prf_edit', $result);
		$this->load->view('templates/footer');
		$this->load->view('prf/script');
	}

	public function prf_view()
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
		$result['data'] = $this->PrfModel->display_records();

		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Project Request Form';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('prf/prf_view', $result);
		$this->load->view('templates/footer');
		$this->load->view('prf/script');
	}
}
