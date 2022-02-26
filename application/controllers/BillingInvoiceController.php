<?php
defined('BASEPATH') or die('Access Denied');

class BillingInvoiceController extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->helper('url');
		$this->load->model('BillingInvoiceModel');
		$this->load->library('form_validation');
		$this->load->database();
	}

	public function billinginvoiceview()
	{

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->billing_invoice();
			$birthdate = $this->BillingInvoiceModel->dateneeded();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['birthdate'] = $birthdate;
			$data['select'] = $this->select_data();


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice', $data);
			$this->load->view('templates/footer');
			$this->load->view('project_report/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function billinginvoiceviewprint()
	{

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->billing_invoice();
			$birthdate = $this->BillingInvoiceModel->dateneeded();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['birthdate'] = $birthdate;
			$data['select'] = $this->select_data();


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice_print', $data);
			$this->load->view('templates/footer');
			$this->load->view('project_report/script');
		} else {
			redirect('', 'refresh');
		}
	}

	function select_data()
	{

		$select['id'] = '';
		$select['location'] = '';

		return $select;
	}

	
}
