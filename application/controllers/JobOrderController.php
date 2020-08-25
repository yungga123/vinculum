<?php
defined('BASEPATH') or die('Access Denied');

class JobOrderController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model('JobOrderModel');
    }

    public function index() {
        if($this->session->userdata('logged_in')) {

			
			$this->load->model('CustomersModel');
			$this->load->helper('site_helper');


			$data = html_variable();
			$data['title'] = 'Job Order';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['servicecall'] = ' active';
			$data['customers'] = $this->CustomersModel->getVtCustomersByID();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('job_order/job_order');
			$this->load->view('job_order/job_order_footer');
			$this->load->view('templates/footer');
			$this->load->view('job_order/script');
		} else {
			redirect('','refresh');
		}
	}
	
	public function existing_customer() {

		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Job Order';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['servicecall'] = ' active';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('job_order/job_order');
			$this->load->view('job_order/job_order_existingcust');
			$this->load->view('job_order/job_order_footer');
			$this->load->view('templates/footer');
			$this->load->view('job_order/script');
		} else {
			redirect('','refresh');
		}

	}
}