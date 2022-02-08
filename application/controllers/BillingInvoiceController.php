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

			$slcdata = $this->BillingInvoiceModel->billing_invoice();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice';
			$data['slcdata'] = $slcdata;
			$data['select'] = $this->select_data();
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
            $this->load->view('billing_invoice/billinginvoice');
			$this->load->view('templates/footer');
			$this->load->view('project_report/script');
		} else {
			redirect('','refresh');
		}
    }

	function select_data() {

        $select['id'] = '';
        $select['location'] = '';

        return $select;

    }

}