<?php
defined('BASEPATH') or die('Access Denied');

class ServiceReportController extends CI_Controller {
    
   public function __construct() {
       Parent::__construct();
       $this->load->model('ServiceReportModel');
   }

   public function index() {
        if($this->session->userdata('logged_in')) {

            $this->load->model('CustomersModel');
            $this->load->model('ItemsModel');
            $results_customers = $this->CustomersModel->getVtCustomersByID();
            $results_direct_items = $this->ItemsModel->select_direct_items();
            $results_indirect_items = $this->ItemsModel->select_indirect_items();

			$this->load->helper('site_helper');
			$data = html_variable();
            $data['title'] = 'Service Report';
            $data['li_servicereport'] = ' menu-open';
			$data['ul_servicereport'] = ' active';
            $data['encode_sr'] = ' active';
            $data['results_customers'] = $results_customers;
            $data['results_direct_items'] = $results_direct_items;
            $data['results_indirect_items'] = $results_indirect_items;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('service_report/service_report');
			$this->load->view('templates/footer');
			$this->load->view('service_report/script');
		} else {
			redirect('','refresh');
		}
   }


}
