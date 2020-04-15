<?php
defined('BASEPATH') or die('Access Denied');

class SalesDispatchController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {

			$this->load->model('SalesRepModel');
			$results = $this->SalesRepModel->getSalesreps();
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Sales Dispatch Form';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['sales_menu_status'] = ' menu-open';
			$data['Generate_sales_dispatch'] = ' active';
			$data['sales_dispatch'] = ' active';

			$data['results'] = $results;


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('Forms/sales_dispatch/sales_dispatch');
			$this->load->view('templates/footer');
			$this->load->view('forms/script');
		} else {
			redirect('', 'refresh');
		}
	}
	public function sales_dispatch_table() {
		$this->load->helper('site_helper');
		$this->load->model('SalesRepModel');
			$results = $this->SalesRepModel->getSalesreps();
			$data = html_variable();
			$data['title'] = 'Sales Dispatch Table';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['sales_menu_status'] = ' menu-open';
			$data['sales_dispatch_list'] = ' active';
			$data['sales_dispatch'] = ' active';
			$data['sales_rep'] = $results;


		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('Forms/sales_dispatch/salesDispatchTable');
		$this->load->view('templates/footer');
		$this->load->view('forms/script');
	}

	public function update_sales_dispatch($id) {
		if($this->session->userdata('logged_in')) {
			$this->load->model('SalesDispatchModel');
			
			$dispatch_data = $this->SalesDispatchModel->select_specific($id);
		} else {
			redirect('', 'refresh');
		}

		$itemArr['dispatch_data'] = $dispatch_data;


		echo json_encode($itemArr);
	}
	
	public function fetch_salesdispatchforms() {
		$this->load->model('SalesDispatchModel');
		$fetch_data = $this->SalesDispatchModel->salesdispatch_datatable();
		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->assigned_sales;
			$sub_array[] = date('F j, Y',strtotime($row->dispatch_date));
			$sub_array[] = date('g:i A',strtotime($row->dispatch_time));
			$sub_array[] = $row->address;
			$sub_array[] = $row->customer_1;
			$sub_array[] = $row->contact_1;
			$sub_array[] = $row->purpose_1;

			if ($row->time_in_1 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A', strtotime($row->time_in_1));
			}

			if ($row->time_out_1 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_out_1));
			}
			
			$sub_array[] = $row->customer_2;
			$sub_array[] = $row->contact_2;
			$sub_array[] = $row->purpose_2;

			if ($row->time_in_2 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_in_2));
			}
			
			if ($row->time_out_2 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_out_2));
			}

			
			$sub_array[] = $row->customer_3;
			$sub_array[] = $row->contact_3;
			$sub_array[] = $row->purpose_3;

			if ($row->time_in_3 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_in_3));
			}
			
			if ($row->time_out_3 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_out_3));
			}

			
			$sub_array[] = $row->customer_4;
			$sub_array[] = $row->contact_4;
			$sub_array[] = $row->purpose_4;

			if ($row->time_in_4 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_in_4));
			}

			if ($row->time_out_4 == "00:00:00") {
				$sub_array[] = "";
			} else {
				$sub_array[] = date('g:i A',strtotime($row->time_out_4));
			}
			
			$sub_array[] = '<button type="button" class="btn btn-warning btn-sm btn_select" data-toggle="modal" data-target="#modal-edit-salesdispatch"><i class="fas fa-edit"> EDIT </i>
        		</button> 
				<a href="#" class="btn btn-sm btn-danger" onclick="return confirm('."'Are you sure?'".')"><i class="fa fa-trash"></i> DELETE</a>
				<a href="'.site_url('print-salesdispatch/'.$row->id).'" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->SalesDispatchModel->get_all_salesdispatch_data(),
			"recordsFiltered" => $this->SalesDispatchModel->filter_salesdispatch_data(),
			"data" => $data
		);

		echo json_encode($output);

	}
	public function print_sales_dispatch($id) {
		if($this->session->userdata('logged_in')) {

			$this->load->library('Myfpdf');
			$this->load->model('SalesDispatchModel');

			$results = $this->SalesDispatchModel->select_specific($id);

			$data['title'] = 'Print Dispatch';
			$data['results'] = $results;
			$data['id'] = $id;

			$this->load->view('forms/sales_dispatch/print_sales_dispatch',$data);

		} else {
			redirect('', 'refresh');
		}
	}

	public function update_validate_sales_dispatch() {

		$validate = [
			'success' => false,
			'errors' => ''
		];
		
		$rules = [
			[
				'field' => 'dispatch_date',
				'label' => 'Dispatch Date',
				'rules' => 'trim|required'
			],
			[
				'field' => 'assigned_sales',
				'label' => 'Assigned Pre-Technical Sales',
				'rules' => 'trim|required'
			],
			[
				'field' => 'dispatch_time',
				'label' => 'Dispatch Time',
				'rules' => 'trim|required'
			],
			[
				'field' => 'address',
				'label' => 'Location',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'customer_1',
				'label' => 'Customer 1',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_1',
				'label' => 'Contact 1',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_1',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_1',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_1',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_2',
				'label' => 'Customer 2',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_2',
				'label' => 'Contact 2',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_2',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_2',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_2',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_3',
				'label' => 'Customer 3',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_3',
				'label' => 'Contact 3',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_3',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_3',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_3',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_4',
				'label' => 'Customer 4',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_4',
				'label' => 'Contact 4',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_4',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_4',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_4',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$id = $this->input->post('sales_dispatchID');
			$data = [
				'dispatch_date' => $this->input->post('dispatch_date'),
				'dispatch_time' => $this->input->post('dispatch_time'),
				'assigned_sales' => $this->input->post('assigned_sales'),
				'address' => $this->input->post('address'),
				'customer_1' => $this->input->post('customer_1'),
				'contact_1' => $this->input->post('contact_1'),
				'purpose_1' => $this->input->post('purpose_1'),
				'time_in_1' => $this->input->post('time_in_1'),
				'time_out_1' => $this->input->post('time_out_1'),
				'customer_2' => $this->input->post('customer_2'),
				'contact_2' => $this->input->post('contact_2'),
				'purpose_2' => $this->input->post('purpose_2'),
				'time_in_2' => $this->input->post('time_in_2'),
				'time_out_2' => $this->input->post('time_out_2'),
				'customer_3' => $this->input->post('customer_3'),
				'contact_3' => $this->input->post('contact_3'),
				'purpose_3' => $this->input->post('purpose_3'),
				'time_in_3' => $this->input->post('time_in_3'),
				'time_out_3' => $this->input->post('time_out_3'),
				'customer_4' => $this->input->post('customer_4'),
				'contact_4' => $this->input->post('contact_4'),
				'purpose_4' => $this->input->post('purpose_4'),
				'time_in_4' => $this->input->post('time_in_4'),
				'time_out_4' => $this->input->post('time_out_4')
			];

			
			$this->load->model('SalesDispatchModel');
			$this->SalesDispatchModel->update($id, $data);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);

	}

	public function validate_sales_dispatch() {

		$validate = [
			'success' => false,
			'errors' => ''
		];
		
		$rules = [
			[
				'field' => 'dispatch_date',
				'label' => 'Dispatch Date',
				'rules' => 'trim|required'
			],
			[
				'field' => 'assigned_sales',
				'label' => 'Assigned Pre-Technical Sales',
				'rules' => 'trim|required'
			],
			[
				'field' => 'dispatch_time',
				'label' => 'Dispatch Time',
				'rules' => 'trim|required'
			],
			[
				'field' => 'address',
				'label' => 'Location',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'customer_1',
				'label' => 'Customer 1',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_1',
				'label' => 'Contact 1',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_1',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_1',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_1',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_2',
				'label' => 'Customer 2',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_2',
				'label' => 'Contact 2',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_2',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_2',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_2',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_3',
				'label' => 'Customer 3',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_3',
				'label' => 'Contact 3',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_3',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_3',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_3',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			],
			[
				'field' => 'customer_4',
				'label' => 'Customer 4',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'contact_4',
				'label' => 'Contact 4',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'purpose_4',
				'label' => 'Purpose',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_in_4',
				'label' => 'Time In',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'time_out_4',
				'label' => 'Time Out',
				'rules' => 'trim|max_length[1500]'
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$data = [
				'dispatch_date' => $this->input->post('dispatch_date'),
				'dispatch_time' => $this->input->post('dispatch_time'),
				'assigned_sales' => $this->input->post('assigned_sales'),
				'address' => $this->input->post('address'),
				'customer_1' => $this->input->post('customer_1'),
				'contact_1' => $this->input->post('contact_1'),
				'purpose_1' => $this->input->post('purpose_1'),
				'time_in_1' => $this->input->post('time_in_1'),
				'time_out_1' => $this->input->post('time_out_1'),
				'customer_2' => $this->input->post('customer_2'),
				'contact_2' => $this->input->post('contact_2'),
				'purpose_2' => $this->input->post('purpose_2'),
				'time_in_2' => $this->input->post('time_in_2'),
				'time_out_2' => $this->input->post('time_out_2'),
				'customer_3' => $this->input->post('customer_3'),
				'contact_3' => $this->input->post('contact_3'),
				'purpose_3' => $this->input->post('purpose_3'),
				'time_in_3' => $this->input->post('time_in_3'),
				'time_out_3' => $this->input->post('time_out_3'),
				'customer_4' => $this->input->post('customer_4'),
				'contact_4' => $this->input->post('contact_4'),
				'purpose_4' => $this->input->post('purpose_4'),
				'time_in_4' => $this->input->post('time_in_4'),
				'time_out_4' => $this->input->post('time_out_4')
			];

			$this->load->model('SalesDispatchModel');
			$this->SalesDispatchModel->insert($data);

			$dispatchdata = $this->SalesDispatchModel->getSalesDispatchBy1();
			$dispatchID = 0;

			foreach ($dispatchdata as $row) {
				$dispatchID = $row->id;
			}

			$count = intval($dispatchID);
			$validate['count'] = $count;

		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);

	}
}