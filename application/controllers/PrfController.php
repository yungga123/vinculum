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
		date_default_timezone_set('Asia/Manila');
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
			$technicians = $this->PrfModel->getTechniciansByStatus();
			$data['technicians'] = $technicians;
            $data['payroll'] = $this->payroll();
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

	public function getTechInfo($id) {
        $validate = [
            'customer_name' => '',
            'project_activity' => '',
            'branch_name' => ''
        ];
        
        $this->load->model('PrfModel');

        $technicians = $this->PrfModel->fetchTechnicians($id);

        foreach ($technicians as $row) {
            $validate['customer_name'] = $row->customer_name;
            $validate['project_activity'] = $row->project_activity;
            $validate['branch_name'] = $row->branch_name;
        }

		echo json_encode($validate);
    }

	function payroll() {

        $payroll['id'] = '';
        $payroll['cutoff_date'] = '';
        $payroll['start_date'] = '';
        $payroll['end_date'] = '';
        $payroll['emp_id'] = '';
        $payroll['emp_name'] = ''; 
        $payroll['emp_position'] = ''; 
        $payroll['emp_sss_no'] = ''; 
        $payroll['emp_tin_no'] = ''; 
        $payroll['emp_pagibig_no'] = ''; 
        $payroll['emp_philhealth_no'] = ''; 
        $payroll['basic_income_rate'] = ''; 
        $payroll['basic_income_days'] = '';
        $payroll['basic_income_amt'] = ''; 
        $payroll['overtime_rate'] = ''; 
        $payroll['overtime_hrs'] = ''; 
        $payroll['overtime_amt'] = ''; 
        $payroll['nightdiff_rate'] = ''; 
        $payroll['nightdiff_hrs'] = ''; 
        $payroll['nightdiff_amt'] = ''; 
        $payroll['regday_rate'] = ''; 
        $payroll['regday_days'] = '';
        $payroll['regday_amt'] = ''; 
        $payroll['spcday_rate'] = ''; 
        $payroll['spcday_days'] = ''; 
        $payroll['spcday_amt'] = ''; 
        $payroll['incentives'] = ''; 
        $payroll['commission'] = ''; 
        $payroll['13th_month'] = ''; 
        $payroll['addback'] = ''; 
        $payroll['absent_rate'] = ''; 
        $payroll['absent_days'] = ''; 
        $payroll['absent_amt'] = ''; 
        $payroll['tardiness_rate'] = ''; 
        $payroll['tardiness_hrs'] = ''; 
        $payroll['tardiness_amt'] = ''; 
        $payroll['awol_rate'] = ''; 
        $payroll['awol_days'] = '';
        $payroll['awol_amt'] = ''; 
        $payroll['restday_rate'] = ''; 
        $payroll['restday_days'] = ''; 
        $payroll['restday_hrs'] = ''; 
        $payroll['sss_cont'] = '';
        $payroll['pagibig_cont'] = ''; 
        $payroll['philhealth_cont'] = ''; 
        $payroll['tax'] = ''; 
        $payroll['other_deduction'] = ''; 
        $payroll['notes'] = ''; 
        $payroll['gross_pay'] = ''; 
        $payroll['net_pay'] = '';
        $payroll['vl'] = '';
        $payroll['sl'] = '';
        $payroll['vl_pay'] = '';
        $payroll['sl_pay'] = '';
        $payroll['case'] = '';
        $payroll['paid_leaves'] = '';

        return $payroll;

    }

}