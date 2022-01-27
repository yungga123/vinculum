<?php
defined('BASEPATH') or die('Access Denied');

class BillingInvoiceController extends CI_Controller{

    public function billinginvoiceview()
    {

        if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
            $this->load->view('billing_invoice/billinginvoice');
			$this->load->view('templates/footer');
			$this->load->view('project_report/script');
		} else {
			redirect('','refresh');
		}
    }
}