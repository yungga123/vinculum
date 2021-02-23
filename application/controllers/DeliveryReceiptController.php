
<?php
defined('BASEPATH') or die('Access Denied');

class DeliveryReceiptController extends CI_Controller {
	public function index(){

		date_default_timezone_set("Asia/Manila");
		$this->load->model('CustomersModel');

		$data['date_created'] = date('M d, Y'); //YYYY-MM-DD
		$data['title'] = 'Generate Deliver Receipt';
		$data['results_customers'] = $this->CustomersModel->getVtCustomersByID();

		$this->load->view('templates/header', $data);
		$this->load->view('delivery_receipt/delivery_receipt_blank_view');
		$this->load->view('templates/footer');
		$this->load->view('delivery_receipt/script');


	}
	public function get_delivery_receipt() {

		date_default_timezone_set("Asia/Manila");

		$validate = [
			'success' => false,
			'errors' => ""
		];

		$rules = [
				[
					'field' => 'dr_clientname',
					'label' => 'Client Name',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Customer Name'
					]
				],
				[
					'field' => 'dr_start_date',
					'label' => 'Start Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Date Range'
					]
				],
				[
					'field' => 'dr_end_date',
					'label' => 'End Date',
					'rules' => 'trim'
				],
				[
					'field' => 'dr_amount',
					'label' => 'Quotation Amount',
					'rules' => 'integer',
					'errors' => [
						'integer' => 'Quotation Amount contains number only'
					]
				]

			];

			$this->form_validation->set_error_delimiters('<p>• ','</p>');

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {

				$validate['success'] = true;
				
				
				$this->load->model('DeliveryReceiptModel'); 
				$customer_id = $this->input->post('dr_clientname');
				$customer = $this->DeliveryReceiptModel->getVtCustomer($customer_id);

				$dr_start_date = $this->input->post('dr_start_date');
				$dr_end_date = $this->input->post('dr_end_date');
				$payment_mode = $this->input->post('payment_mode');
				$dr_results_item = $this->DeliveryReceiptModel->getSpecificDeliveryReceiptItem($dr_start_date,$dr_end_date,$customer_id);
				$dr_id_no = date('mdy'); //YYYY-MM-DD
				
				

				if ($payment_mode == "DP") {
					$dp_payment_amount = $this->input->post('dr_amount');
					$cod_payment_amount = "";
					$dr_checked_dp = "checked";
					$dr_checked_cod = "disabled";
				} elseif ($payment_mode == "COD") {
					$cod_payment_amount = $this->input->post('dr_amount');
					$dp_payment_amount = "";
					$dr_checked_cod = "checked";
					$dr_checked_dp = "disabled";
				} else {
					$dp_payment_amount = "";
					$cod_payment_amount = "";
					$dr_checked_dp = "disabled";
					$dr_checked_cod = "disabled";
				}

				$data['date_created'] = date('M d, Y'); //YYYY-MM-DD
				$data['title'] = 'Generate Deliver Receipt';
				$data['dr_results_item'] = $dr_results_item;
				$data['dp_payment_amount'] = $dp_payment_amount;
				$data['cod_payment_amount'] = $cod_payment_amount;
				$data['dr_checked_dp'] = $dr_checked_dp;
				$data['dr_checked_cod'] = $dr_checked_cod;
				$data['dr_id_no'] = $dr_id_no;
				$data['client_results'] = $customer;
				
				$this->load->view('delivery_receipt/delivery_receipt_view', $data);

			} else {
				$validate['errors'] = validation_errors();
				$validate['title'] = 'Generate Deliver Receipt';
				$validate['errors'] = $validate['errors'];
			
				$this->load->view('delivery_receipt/delivery_receipt_blank_view', $validate);
				$this->load->view('delivery_receipt/script');
			}
		}
}