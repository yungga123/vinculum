<?php
defined('BASEPATH') or die('Access Denied');

class ConsumeablesController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("ConsumeablesModel");
		$this->load->library('form_validation');
    }

    public function index() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Consumeables';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/consumeables');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }

	public function prf() {
        if($this->session->userdata('logged_in')) {
			
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Request Form';
			$data['consumeables'] = ' active';
			$data['ul_items_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('consumeables/prf');
			$this->load->view('templates/footer');
			$this->load->view('consumeables/script');
		} else {
			redirect('','refresh');
		}
    }

	public function projectrequestform()
	{
		$this->form_validation->set_rules('project_name', 'Project Name', 'required|alpha');
		$this->form_validation->set_rules('project_activity', 'Project Activity', 'required|alpha');
		$this->form_validation->set_rules('date_requested', 'Date Requested', 'required|alpha');
		$this->form_validation->set_rules('date_issued', 'Date Issued', 'required|alpha');

		if($this->form_validation->run()==true)
		{
			$this->load->model('ConsumeablesModel');
			$this->ConsumeablesModel->insert_data();
		}
		else
		{
			redirect('consumeables/prf');
		}
	}
}