<?php
defined('BASEPATH') or die('Access Denied');

class PullOutsController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {
			
			$this->load->model('CustomersModel');
			$customer_results = $this->CustomersModel->getVtCustomersByName();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Scanned Item';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['pullout_items'] = ' active';
			$data['ul_items'] = ' active';
			$data['customer_results'] = $customer_results;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/item_pullout');
			$this->load->view('templates/footer');
		} else {
			redirect('', 'refresh');
		}

	}

	public function pending_pullouts() {
		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$this->load->model('PullOutsModel');
			$results = $this->PullOutsModel->viewPullout();
			$data = html_variable();
			$data['title'] = 'Pending Pullouts';
			$data['results'] = $results;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/pullouts_pending');
			$this->load->view('templates/footer');
		} else {
			redirect('', 'refresh');
		}
	}

	public function getSearchItem() {
		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->getItemsBySearchLike($this->input->post('search_item'));

		$output['success'] = false;

		if ($this->input->post('search_item') == "") {
			
			$data = '<td colspan=12 class="text-center" style="font-weight: bold;">PLEASE ENTER ITEM NAME OR ITEM CODE</td>';	
				
		} elseif (count($results) != 0) {
			$output['success'] = true;
			foreach ($results as $row) {
				$sub_array = array();
				$sub_array[] = '<tr>'.
				 '<td><button class="btn btn-danger btn_pulloutget" data-toggle="modal" data-target=".pullout_stocks">Pullout</button></td>'.
				 '<td>'.$row->itemCode.'</td>'.
				 '<td>'.$row->itemName.'</td>'.
				 '<td>'.$row->itemType.'</td>'.
				 '<td>'.$row->itemSupplierPrice.'</td>'.
				 '<td>'.$row->itemPrice.'</td>'.
				 '<td>'.$row->stocks.'</td>'.
				 '<td>'.date_format(date_create($row->date_of_purchase),'F d, Y').'</td>'.
				 '<td>'.$row->location.'</td>'.
				 '<td>'.$row->supplier.'</td>'.
				 '<td>'.$row->encoder.'</td>'.
				 '</tr>';
				
				$data[] = $sub_array;
			}
		} else {
			$sub_array = array();
			$sub_array[] = '<td colspan=12 class="text-center" style="font-weight: bold;">NO RESULTS</td>';

			$data = $sub_array;
		}

		$output['data'] = $data;
		$output['success_msg'] = 'Success! Item/s found!';
		$output['error_msg'] = 'Oh no! No Item found!';


		echo json_encode($output);

	}

	function check_item() {
		$itemCode = $this->input->post('item_code_val');
		$this->load->model('PullOutsModel');
		$results = $this->PullOutsModel->getPulledOutName($itemCode);
		
		if ($results == 1) {
			return FALSE;
		} else {
			return TRUE;
		}

	}

	public function insert_pullout() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->ItemsGetByName($this->input->post('item_code_val'));
		
		$itemStock = 0;
		foreach ($results as $row) {
			$itemStock = $row->stocks;
		}


		$rules = [
			[
				'field' => 'pullout_customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Customer.'
				]
			],
			[
				'field' => 'pullout_stocks',
				'label' => 'Stocks to Pullout',
				'rules' => 'trim|required|numeric|is_natural_no_zero|less_than_equal_to['.$itemStock.']|callback_check_item',
				'errors' => [
					'required' => 'Please Enter Quantity to Pullout.',
					'numeric' => 'Stocks to pullout must be number and natural.',
					'is_natural_no_zero' => 'Stocks to pullout must be greater than zero',
					'less_than_equal_to' => 'Only '.$itemStock.' stock/s available.',
					'check_item' => 'This item is already in pullout list.'
				]
			],
			[
				'field' => 'item_code_val',
				'label' => 'Item Code',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select item to pullout.'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			date_default_timezone_set('Asia/Manila');

			$validate['success'] = true;

			$this->load->model('PullOutsModel');

			$data = [
				'item_code' => $this->input->post('item_code_val'),
				'date_of_punch' => date("Y-m-d H:i:s"),
				'stocks_to_pullout' => $this->input->post('pullout_stocks'),
				'pullout_to' => $this->input->post('pullout_customer_name'),
				'discount' => '0'
			];

			$this->PullOutsModel->addPullout($data);
			
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function delete_pending_pullout($id) {
		$this->load->model('PullOutsModel');
		$this->PullOutsModel->deletePullout($id);


		$this->session->set_flashdata('success', 'Success Deleting!');
		redirect('pending-pullouts');
	}

}