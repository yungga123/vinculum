<?php
defined('BASEPATH') or die('Access Denied');

class BillingInvoiceController extends CI_Controller{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model('BillingInvoiceModel');
		$this->load->library('form_validation');
		$this->load->database();
	}

    public function billinginvoiceview()
    {

        if($this->session->userdata('logged_in')) {

			$supplier = $this->BillingInvoiceModel->billing_invoice();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice';
			$data['supplier'] = $supplier;
			$data['payroll'] = $this->payroll();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
            $this->load->view('billing_invoice/billinginvoice');
			$this->load->view('templates/footer');
			$this->load->view('project_report/script');
		} else {
			redirect('','refresh');
		}
    }

	function payroll() {

        $payroll['id'] = '';
        $payroll['customer_name'] = '';

        return $payroll;

    }

}