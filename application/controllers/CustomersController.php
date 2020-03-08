<?php
defined('BASEPATH') or die('Access Denied');

class CustomersController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Customers';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_table');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
	}

	public function get_customers() {


		$this->load->model('CustomersModel');
		$fetch_data = $this->CustomersModel->customervt_datatable();


		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->CustomerID;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->ContactPerson;
			$sub_array[] = $row->Address;
			$sub_array[] = $row->ContactNumber;
			$sub_array[] = $row->EmailAddress;
			$sub_array[] = $row->Website;
			$sub_array[] = $row->InstallationDate;
			$sub_array[] = $row->Interest;
			$sub_array[] = $row->Type;
			$sub_array[] = $row->Notes;
			$sub_array[] = '

			<button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button> 
			<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>

			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->CustomersModel->get_all_customervt_data(),
			"recordsFiltered" => $this->CustomersModel->filter_customervt_data(),
			"data" => $data
		);

		echo json_encode($output);
	}
}