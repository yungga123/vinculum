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
			$slcbrch = $this->BillingInvoiceModel->select_branch();
			$birthdate = $this->BillingInvoiceModel->dateneeded();

			$this->load->helper('site_helper');
			$this->load->library('form_validation');
			$this->load->model('BillingInvoiceModel');
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
			$this->load->view('billing_invoice/script');

		} else {
			redirect('', 'refresh');
		}
	}

	public function billinginvoiceviewprint()
	{

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->select_branch();
			$birthdate = $this->BillingInvoiceModel->dateneeded();
			$duedate = $this->BillingInvoiceModel->getduedate();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice List';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['birthdate'] = $birthdate;
			$data['duedate'] = $duedate;
			$data['select'] = $this->select_data();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice_print', $data);
			$this->load->view('templates/footer');
			$this->load->view('billing_invoice/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function billing_invoice_edit()
	{

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->select_branch();
			$birthdate = $this->BillingInvoiceModel->dateneeded();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice Edit';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['birthdate'] = $birthdate;
			$data['select'] = $this->select_data();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice_edit');
			$this->load->view('templates/footer');
			$this->load->view('billing_invoice/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function billing_invoice_view()
	{

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->billing_invoice();
			$birthdate = $this->BillingInvoiceModel->dateneeded();
			$duedate = $this->BillingInvoiceModel->getduedate();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice View';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['duedate'] = $duedate;
			$data['birthdate'] = $birthdate;
			$data['select'] = $this->select_data();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice_view');
			$this->load->view('templates/footer');
			$this->load->view('billing_invoice/script');
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

	function computaion($sum, $x)
	{
		if (isset($_POST['input'])) {
			$x = $_POST['input'];
			$y = 0.12;

			$sum = $x * $y;
			echo "<strong> $sum </strong>";
		}
	}

	public function bi_add()
	{
		$data = array(
			'due_date' => $this->input->post('due_date'),
			'served_to' => $this->input->post('served_to'),
			'served_to_branch' => $this->input->post('served_to_branch'),
			'attention' => $this->input->post('attention'),
			'project_name' => $this->input->post('project_name'),
			'total_project_cost' => $this->input->post('total_project_cost'),
			'terms' => $this->input->post('terms'),
			'quantity' => $this->input->post('quantity'),
			'unit' => $this->input->post('unit'),
			'description' => $this->input->post('description'),
			'payable_amount' => $this->input->post('payable_amount'),
			'amount_due' => $this->input->post('amount_due'),
			'sub_total' => $this->input->post('sub_total'),
			'grand_total' => $this->input->post('grand_total')
		);
	
		$this->BillingInvoiceModel->insert_data($data);

		if ($this->session->userdata('logged_in')) {

			$slcctmrs = $this->BillingInvoiceModel->billing_invoice();
			$slcbrch = $this->BillingInvoiceModel->billing_invoice();
			$birthdate = $this->BillingInvoiceModel->dateneeded();
			$duedate = $this->BillingInvoiceModel->getduedate();

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Billing Invoice List';
			$data['slcctmrs'] = $slcctmrs;
			$data['slcbrch'] = $slcbrch;
			$data['birthdate'] = $birthdate;
			$data['duedate'] = $duedate;
			$data['select'] = $this->select_data();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('billing_invoice/billinginvoice_print', $data);
			$this->load->view('templates/footer');
			$this->load->view('billing_invoice/script');
		} else {
			redirect('', 'refresh');
		}
	}
}
