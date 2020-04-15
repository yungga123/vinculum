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
			$this->load->view('items/items_masterlist/script');
		} else {
			redirect('', 'refresh');
		}

	}

	public function pending_pullouts() {
		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$this->load->model('PullOutsModel');

			$results = $this->PullOutsModel->viewPullout();
			$pullout_total_price = $this->PullOutsModel->pullouts_total_price();
			$pullout_final_price = $this->PullOutsModel->pullouts_final_price();
			$data = html_variable();
			$data['title'] = 'Pending Pullouts';
			$data['results'] = $results;
			$data['pullout_total_price'] = $pullout_total_price;
			$data['pullout_final_price'] = $pullout_final_price;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/pullouts_pending');
			$this->load->view('templates/footer');
			$this->load->view('items/items_masterlist/script');
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

	public function less_pullout() {

		$this->load->model('PullOutsModel');

		$id = $this->input->post('less_pullout_id');
		$specific_pullout = $this->PullOutsModel->specific_pullout($id);
		$total_price_count = 0;
	
		foreach ($specific_pullout as $row) {
			$total_price_count = $row->itemPrice*$row->stocks_to_pullout;
		}

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'less_item_code',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			],
			[
				'field' => 'less_total_price',
				'label' => 'Total Price',
				'rules' => 'trim|required'
			],
			[
				'field' => 'less_price',
				'label' => 'Less Price',
				'rules' => 'trim|required|numeric|less_than['.$total_price_count.']',
				'errors' => [
					'required' => 'Please provide less price.',
					'less_than' => 'The total price of item is '.number_format($total_price_count,2)
				]
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$id = $this->input->post('less_item_code');
			$data = [
				'discount' => $this->input->post('less_price')
			];

			$this->PullOutsModel->update_pullout($id,$data);
			
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
		
	}

	public function confirm_pullouts() {

		if($this->session->userdata('logged_in')) {
			$this->load->model('PullOutsModel');
			$selectQuery = $this->db->query("SELECT item_code,stocks_to_pullout FROM pulled_out");
			$results = $selectQuery->result();

			foreach ($results as $row) {
				$itemCode = $row->item_code;
				$stocks = $row->stocks_to_pullout;
				$this->PullOutsModel->decreasedByPullout($stocks,$itemCode);
			}

			$this->load->model('ConfirmedPullOutsModel');
			$this->ConfirmedPullOutsModel->insert();

			$this->session->set_flashdata('success', 'Success! Items Pulled Out!!');

			$this->db->empty_table('pulled_out');
			redirect('pending-pullouts');
			
		} else {
			redirect('', 'refresh');
		}

	}

	public function confirmed_pullouts() {
		if($this->session->userdata('logged_in')) {

			date_default_timezone_set("Asia/Manila");

			$this->load->helper('site_helper');
			$this->load->model('ConfirmedPullOutsModel');

			$current_date = date('Y-m-d');

			$results_confirm_pullout = $this->ConfirmedPullOutsModel->getSpecificConfirmedPullout($current_date,$current_date);
			$total_price = $this->ConfirmedPullOutsModel->cpullouts_total_price($current_date,$current_date);
			$final_price = $this->ConfirmedPullOutsModel->cpullouts_final_price($current_date,$current_date);

			$data = html_variable();
			$data['title'] = 'Confirmed Pullouts';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['listof_pullouts'] = ' active';
			$data['ul_items'] = ' active';
			$data['results_confirm_pullout'] = $results_confirm_pullout;
			$data['start_date'] = $current_date;
			$data['end_date'] = $current_date;
			$data['total_price'] = $total_price;
			$data['final_price'] = $final_price;



			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/confirmed_pullouts');
			$this->load->view('templates/footer');
			$this->load->view('items/items_masterlist/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function get_confirmed_pullouts() {

		if($this->session->userdata('logged_in')) {

			$rules = [
				[
					'field' => 'cpullout_start_date',
					'label' => 'Start Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Date.'
					]
				],
				[
					'field' => 'cpullout_end_date',
					'label' => 'End Date',
					'rules' => 'trim'
				]
			];

			$this->form_validation->set_error_delimiters('<p>• ','</p>');

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {

				date_default_timezone_set("Asia/Manila");

				$this->load->helper('site_helper');
				$this->load->model('ConfirmedPullOutsModel');

				$start_date = $this->input->post('cpullout_start_date');
				$end_date = $this->input->post('cpullout_end_date');

				$results_confirm_pullout = $this->ConfirmedPullOutsModel->getSpecificConfirmedPullout($start_date,$end_date);
				$total_price = $this->ConfirmedPullOutsModel->cpullouts_total_price($start_date,$end_date);
				$final_price = $this->ConfirmedPullOutsModel->cpullouts_final_price($start_date,$end_date);

				$data = html_variable();
				$data['title'] = 'Confirmed Pullouts';
				$data['items_menu_status'] = ' menu-open';
				$data['items_menu_display'] = ' block';
				$data['listof_pullouts'] = ' active';
				$data['ul_items'] = ' active';
				$data['results_confirm_pullout'] = $results_confirm_pullout;
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
				$data['total_price'] = $total_price;
				$data['final_price'] = $final_price;

				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar');
				$this->load->view('items/item_pullout/confirmed_pullouts');
				$this->load->view('templates/footer');
				$this->load->view('items/items_masterlist/script');
				
			} else {
				$this->session->set_flashdata('fail', form_error('cpullout_start_date'));
				redirect('confirmed-pullouts');
			}
			
		} else {
			redirect('', 'refresh');
		}

	}

	public function print_confirmed_pullout($start_date,$end_date) {
		$this->load->model('ConfirmedPullOutsModel');
		$results = $this->ConfirmedPullOutsModel->getSpecificConfirmedPullout($start_date,$end_date);
		$total_price = $this->ConfirmedPullOutsModel->cpullouts_total_price($start_date,$end_date);
		$final_price = $this->ConfirmedPullOutsModel->cpullouts_final_price($start_date,$end_date);

		$data = [
			'title' => 'Print',
			'results' => $results,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'total_price' => $total_price,
			'final_price' => $final_price
		];
		$this->load->view('items/item_pullout/print_confirmed',$data);
	}

	public function return_cpullouts(){

		date_default_timezone_set('Asia/Manila');

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->load->model('ConfirmedPullOutsModel');
		$this->load->model('ItemsModel');

		$id = $this->input->post('cpullout_id');
		
		$results = $this->ConfirmedPullOutsModel->select_specific($id);
		$stocks_pulled_out = 0;

		foreach ($results as $row) {
			$stocks_pulled_out = $row->stocks_pulled_out;
		}

		$rules = [
			[
				'field' => 'cpullout_id',
				'label' => 'Stocks to return',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select item.',
				]
			],
			[
				'field' => 'cpullout_stocks_return',
				'label' => 'Stocks to return',
				'rules' => 'trim|required|numeric|less_than_equal_to['.$stocks_pulled_out.']|is_natural_no_zero',
				'errors' => [
					'required' => 'Please enter number to pullout.',
					'numeric' => 'Data must be number',
					'less_than_equal_to' => 'Data must be less or equal to '.$stocks_pulled_out,
					'is_natural_no_zero' => 'Data must contain natural number'
				]
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$this->load->model('ReturnHistoryModel');

			$validate['success'] = true;

			$data = [
				'stocks_pulled_out' => $stocks_pulled_out - ($this->input->post('cpullout_stocks_return'))
			];

			$data2 = [
				'confirm_pullouts_id' => $this->input->post('cpullout_id'),
				'no_of_stocks_returned' => $this->input->post('cpullout_stocks_return'),
				'date_time' => date('Y-m-d H:i:s')
			];

			$cpullout_item_code = $this->input->post('cpullout_item_code');

			$this->ReturnHistoryModel->insert($data2);
			$this->ConfirmedPullOutsModel->update($id,$data);
			$this->ItemsModel->updateExistingItem($cpullout_item_code,$this->input->post('cpullout_stocks_return'));
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function return_history() {

		if($this->session->userdata('logged_in')) {

			date_default_timezone_set('Asia/Manila');

			$this->load->model('ReturnHistoryModel');

			$this->load->helper('site_helper');

			$current_date = date('Y-m-d');

			$data = html_variable();
			$data['title'] = 'Returned Pullouts';
			$data['start_date'] = $current_date;
			$data['end_date'] = $current_date;
			$data['results'] = $this->ReturnHistoryModel->view_returns($current_date,$current_date);
			$data['total_price'] = $this->ReturnHistoryModel->total_price($current_date,$current_date);
			$data['return_price'] = $this->ReturnHistoryModel->return_price($current_date,$current_date);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/item_pullout/return_history');
			$this->load->view('templates/footer');
			$this->load->view('items/items_masterlist/script');

		} else {
			redirect('','refresh');
		}

	}

	public function specific_return_history() {

		if($this->session->userdata('logged_in')) {

			$rules = [
				[
					'field' => 'rpullout_start_date',
					'label' => 'Start Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Date.'
					]
				],
				[
					'field' => 'rpullout_end_date',
					'label' => 'End Date',
					'rules' => 'trim'
				]
			];

			$this->form_validation->set_error_delimiters('<p>• ','</p>');

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {

				date_default_timezone_set('Asia/Manila');

				$this->load->model('ReturnHistoryModel');

				$this->load->helper('site_helper');

				$startDate = $this->input->post('rpullout_start_date');
				$endDate = $this->input->post('rpullout_end_date');

				$data = html_variable();
				$data['title'] = 'Returned Pullouts';
				$data['start_date'] = $startDate;
				$data['end_date'] = $endDate;
				$data['results'] = $this->ReturnHistoryModel->view_returns($startDate,$endDate);
				$data['total_price'] = $this->ReturnHistoryModel->total_price($startDate,$endDate);
				$data['return_price'] = $this->ReturnHistoryModel->return_price($startDate,$endDate);

				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar');
				$this->load->view('items/item_pullout/return_history');
				$this->load->view('templates/footer');
				$this->load->view('items/items_masterlist/script');
				
			} else {
				$this->session->set_flashdata('fail', form_error('rpullout_start_date'));
				redirect('return-history');
			}

		} else {
			redirect('','refresh');
		}

	}

	public function print_return_history($startDate,$endDate) {

		$this->load->model('ReturnHistoryModel');
		$results = $this->ReturnHistoryModel->view_returns($startDate,$endDate);
		$total_price = $this->ReturnHistoryModel->total_price($startDate,$endDate);
		$return_price = $this->ReturnHistoryModel->return_price($startDate,$endDate);

		$data = [
			'title' => 'Print',
			'results' => $results,
			'start_date' => $startDate,
			'end_date' => $endDate,
			'total_price' => $total_price,
			'return_price' => $return_price
		];
		$this->load->view('items/item_pullout/return_history_print',$data);

	}

	public function delete_request_history() {

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'cpullout_delete_id',
				'label' => 'Item ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select item to delete.',
				]
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$id = $this->input->post('cpullout_delete_id');

			$this->load->model('ConfirmedPullOutsModel');

			$data = [
				'request_delete' => 1
			];

			$this->ConfirmedPullOutsModel->update($id,$data);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);

	}


}