<?php
defined('BASEPATH') or die('No direct script access allowed.');

class ItemsController extends CI_Controller {

	public function items_masterlist() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Masterlist of Items';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['registration'] = ' active';
			$data['ul_items'] = ' active';
			$data['category'] = 'Direct';

			$this->load->model('CustomersModel');
			$resultCustomers = $this->CustomersModel->getVtCustomersByName();
			$data['resultCustomers'] = $resultCustomers;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/items_masterlist/items_masterlist');
			$this->load->view('templates/footer');
			$this->load->view('items/items_masterlist/script');
		} else {
			redirect('','refresh');
		}

		
	}

	public function indirect_items_masterlist() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Masterlist of Items';
			$data['items_menu_status'] = ' menu-open';
			$data['items_menu_display'] = ' block';
			$data['indirect_list'] = ' active';
			$data['ul_items'] = ' active';
			$data['category'] = 'Indirect';

			$this->load->model('CustomersModel');
			$resultCustomers = $this->CustomersModel->getVtCustomersByName();
			$data['resultCustomers'] = $resultCustomers;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('items/items_masterlist/items_masterlist');
			$this->load->view('templates/footer');
			$this->load->view('items/items_masterlist/script');
		} else {
			redirect('','refresh');
		}

		
	}

	public function register_new_item(){
	

		$this->load->helper('site_helper');
		$data = html_variable();
		$data['title'] = 'Register New Item';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('items/items_masterlist/new_item');
		$this->load->view('templates/footer');
		$this->load->view('items/items_masterlist/script');
	}


	public function register_new_item_validate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];
		$rules = [
			[
				'field' => 'item_code',
				'label' => 'Item Code',
				'rules' => 'trim|required|alpha_numeric|max_length[200]|is_unique[items.itemCode]',
				'errors' => [
					'required' => 'Provide Item Code',
					'is_unique' => 'The Item Code is already existing.',
					'alpha_numeric' => 'Letters and Numbers are only allowed in Item Code'
				]
			],
			[
				'field' => 'item_name',
				'label' => 'Item Name',
				'rules' => 'trim|required|max_length[500]',
				'errors' => [
					'required' => 'Please provide an Item Name'
				]
			],
			[
				'field' => 'item_type',
				'label' => 'Item Type',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Select from Item Type.']
			],
			[
				'field' => 'original_price',
				'label' => 'Original Price',
				'rules' => 'trim|required|numeric|max_length[30]',
				'errors' => [
					'required' => 'Provide Original Price',
					'numeric' => 'Please input only numbers in Original Price',
					'max_length' => 'You are allowed only of 30 characters in Original Price'
				]
			],
			[
				'field' => 'selling_price',
				'label' => 'Selling Price',
				'rules' => 'trim|required|numeric|max_length[30]',
				'errors' => [
					'required' => 'Provide Selling Price',
					'numeric' => 'Please input only numbers in Selling Price',
					'max_length' => 'You are allowed only of 30 characters in Selling Price'
				]
			],
			[
				'field' => 'location',
				'label' => 'Location',
				'rules' => 'trim|max_length[200]',
				'errors' => [
					'max_length' => 'You are allowed only of 200 characters in Location'
				]
			],
			[
				'field' => 'no_of_stocks',
				'label' => 'No. of Stocks',
				'rules' => 'trim|required|numeric|max_length[10]',
				'errors' => [
					'required' => 'Provide No. of Stocks',
					'numeric' => 'Please input only numbers in No. of Stocks',
					'max_length' => 'You are allowed only of 10 characters in No. of Stocks'
				]
			],
			[
				'field' => 'date_of_purchase',
				'label' => 'Date of Purchase',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Date of Purchase']
			],
			[
				'field' => 'supplier',
				'label' => 'Supplier',
				'rules' => 'trim|max_length[200]',
				'errors' => ['max_length' => 'You are allowed only of 200 characters in No. of Stocks']
			],
			[
				'field' => 'encoder',
				'label' => 'Encoder',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Provide the name of Encoder',
					'max_length' => 'You are allowed only of 200 characters in Encoder'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			$data = [
				'itemCode' => $this->input->post('item_code'),
				'itemName' => $this->input->post('item_name'),
				'itemType' => $this->input->post('item_type'),
				'location' => $this->input->post('location'),
				'itemSupplierPrice' => $this->input->post('original_price'),
				'itemPrice' => $this->input->post('selling_price'),
				'stocks' => $this->input->post('no_of_stocks'),
				'date_of_purchase' => $this->input->post('date_of_purchase'),
				'supplier' => $this->input->post('supplier'),
				'encoder' => $this->input->post('encoder')
			];

			date_default_timezone_set('Asia/Manila');
			$currentDate = date('Y-m-d H:i:s');

			$data2 = [
				'date_time' => $currentDate,
				'itemCode' => $this->input->post('item_code'),
				'itemName' => $this->input->post('item_name'),
				'itemType' => $this->input->post('item_type'),
				'location' => $this->input->post('location'),
				'itemSupplierPrice' => $this->input->post('original_price'),
				'itemPrice' => $this->input->post('selling_price'),
				'stocksRegistered' => $this->input->post('no_of_stocks'),
				'date_of_purchase' => $this->input->post('date_of_purchase'),
				'supplier' => $this->input->post('supplier'),
				'encoder' => $this->input->post('encoder')
			];

			$data3 = [
				'item_code' => $this->input->post('item_code'),
				'date_purchased' => $this->input->post('date_of_purchase'),
				'quantity' => $this->input->post('no_of_stocks')
			];

			$this->load->model('RegisterHistoryModel');
			$this->RegisterHistoryModel->addRegisterHistory($data2);

			$this->load->model('ItemInLogsModel');
			$this->ItemInLogsModel->insert($data3);

			$this->load->model('ItemsModel');
			$this->ItemsModel->insertItems($data);
			
			
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function update_new_item_validate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];
		$rules = [
			[
				'field' => 'item_code',
				'label' => 'Item Code',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Provide Item Code'
				]
			],
			[
				'field' => 'item_name',
				'label' => 'Item Name',
				'rules' => 'trim|required|max_length[500]',
				'errors' => [
					'required' => 'Please provide an Item Name'
				]
			],
			[
				'field' => 'item_type',
				'label' => 'Item Type',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Select from Item Type.']
			],
			[
				'field' => 'original_price',
				'label' => 'Original Price',
				'rules' => 'trim|required|numeric|max_length[30]',
				'errors' => [
					'required' => 'Provide Original Price',
					'numeric' => 'Please input only numbers in Original Price',
					'max_length' => 'You are allowed only of 30 characters in Original Price'
				]
			],
			[
				'field' => 'selling_price',
				'label' => 'Selling Price',
				'rules' => 'trim|required|numeric|max_length[30]',
				'errors' => [
					'required' => 'Provide Selling Price',
					'numeric' => 'Please input only numbers in Selling Price',
					'max_length' => 'You are allowed only of 30 characters in Selling Price'
				]
			],
			[
				'field' => 'location',
				'label' => 'Location',
				'rules' => 'trim|max_length[200]',
				'errors' => [
					'max_length' => 'You are allowed only of 200 characters in Location'
				]
			],
			[
				'field' => 'no_of_stocks',
				'label' => 'No. of Stocks',
				'rules' => 'trim|required|numeric|max_length[10]',
				'errors' => [
					'required' => 'Provide No. of Stocks',
					'numeric' => 'Please input only numbers in No. of Stocks',
					'max_length' => 'You are allowed only of 10 characters in No. of Stocks'
				]
			],
			[
				'field' => 'date_of_purchase',
				'label' => 'Date of Purchase',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Provide Date of Purchase']
			],
			[
				'field' => 'supplier',
				'label' => 'Supplier',
				'rules' => 'trim|max_length[200]',
				'errors' => ['max_length' => 'You are allowed only of 200 characters in No. of Stocks']
			],
			[
				'field' => 'encoder',
				'label' => 'Encoder',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Provide the name of Encoder',
					'max_length' => 'You are allowed only of 200 characters in Encoder'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			$item_code = $this->input->post('item_code');
			$data = [
				'itemName' => $this->input->post('item_name'),
				'itemType' => $this->input->post('item_type'),
				'location' => $this->input->post('location'),
				'itemSupplierPrice' => $this->input->post('original_price'),
				'itemPrice' => $this->input->post('selling_price'),
				'stocks' => $this->input->post('no_of_stocks'),
				'date_of_purchase' => $this->input->post('date_of_purchase'),
				'supplier' => $this->input->post('supplier'),
				'encoder' => $this->input->post('encoder')
			];


			$this->load->model('ItemsModel');
			$this->ItemsModel->updateItems($item_code,$data);
			
			
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function fetch_masterlist($item_code) {

		$this->load->model('ItemsModel');
		$list_of_items = $this->ItemsModel->getSpecificMasterItems($item_code);

		$itemArr['list_of_items'] = $list_of_items;


		echo json_encode($itemArr);

	}


	public function get_masterlist($item_category) {

		$button_edit = '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-default">
          Launch Default Modal
        </button>';


		$this->load->model('ItemsModel');
		$fetch_data = $this->ItemsModel->itemMasterlist_datatable($item_category);


		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->itemCode;
			$sub_array[] = $row->itemName;
			$sub_array[] = $row->itemType;
			$sub_array[] = $row->itemSupplierPrice;
			$sub_array[] = $row->itemPrice;
			$sub_array[] = $row->stocks;
			$sub_array[] = date_format(date_create($row->date_of_purchase),'F d, Y');
			$sub_array[] = $row->location;
			$sub_array[] = $row->supplier;
			$sub_array[] = $row->encoder;
			$sub_array[] = '
							<button type="button" class="btn btn-warning btn-xs btn_select" data-toggle="modal" data-target="#modal-edit-item" title="Edit"><i class="fas fa-edit"></i></button> 

							<a href="'.site_url("ItemsController/delete_items/".$row->itemCode).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i></a> 

							<button class="btn btn-success btn-xs btn_addstock" data-toggle="modal" data-target=".addstocks" title="Add Stocks"><i class="fas fa-plus"></i></button>

							<button class="btn btn-primary btn-xs btn_select" data-toggle="modal" data-target="#toPulloutModal" title="Pullout Item"><i class="fas fa-sign-out-alt"></i></button>
							';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->ItemsModel->get_all_itemMasterlist_data($item_category),
			"recordsFiltered" => $this->ItemsModel->filter_itemMasterlist_data($item_category),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function addStocksValidate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'AS_Quantity',
				'label' => 'Stocks',
				'rules' => 'trim|required|numeric|is_natural_no_zero'
			],
			[
				'field' => 'AS_ItemCode',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			]
		];

		$this->form_validation->set_error_delimiters('<p>','</p>');

		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$this->load->model('ItemsModel');
			$this->load->model('RegisterHistoryModel');

			$itemCode = $this->input->post('AS_ItemCode');
			$stocksToAdd = $this->input->post('AS_Quantity');

			$this->ItemsModel->addStock($itemCode,$stocksToAdd);
			$this->RegisterHistoryModel->existingRegisteredHistory($itemCode,$stocksToAdd);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function print_items() {
		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->getMasterItems();
		$data = [
			'title' => 'Print',
			'results' => $results
		];
		$this->load->view('items/items_masterlist/print-items',$data);
	}

	public function delete_items($itemCode) {
		$this->load->model('ItemsModel');
		$this->load->model('DeleteHistoryModel');
		$this->DeleteHistoryModel->addDeleteHistory($itemCode);
		$this->ItemsModel->deleteItems($itemCode);
		

		$this->session->set_flashdata('success', 'Success! Item Deleted.');
		redirect('masterlistofitems');
	}

	function check_item() {
		$itemCode = $this->input->post('item_code');
		$this->load->model('PullOutsModel');
		$results = $this->PullOutsModel->getPulledOutName($itemCode);
		
		if ($results == 1) {
			return FALSE;
		} else {
			return TRUE;
		}

	}

	
	public function pulloutValidate() {

		$validate = [
			'success' => false,
			'errors' => ''
		];
		

		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->ItemsGetByName($this->input->post('item_code'));

		$itemStock = 0;
		foreach ($results as $row) {
			$itemStock = $row->stocks;
		}

		$rules = [
			[
				'field' => 'item_code',
				'label' => 'Item Code',
				'rules' => 'trim|required|callback_check_item',
				'errors' => ['check_item' => 'This item is already in pullout list.','required' => 'Select another item to pullout.']
			],
			[
				'field' => 'pullout_stocks',
				'label' => 'Stocks to Pullout',
				'rules' => 'trim|required|numeric|less_than_equal_to['.$itemStock.']|is_natural_no_zero',
				'errors' => ['less_than_equal_to' => 'Only '.$itemStock.' stock/s available.']
			],
			[
				'field' => 'pull_out_to',
				'label' => 'Pulled Out to',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please select customer name']
				
			]
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			date_default_timezone_set('Asia/Manila');

			$validate['success'] = true;

			$this->load->model('PullOutsModel');

			$data = [
				'item_code' => $this->input->post('item_code'),
				'date_of_punch' => date("Y-m-d H:i:s"),
				'stocks_to_pullout' => $this->input->post('pullout_stocks'),
				'pullout_to' => $this->input->post('pull_out_to'),
				'discount' => '0'
			];

			$this->PullOutsModel->addPullout($data);
			
		} 
		else {
			$validate['errors'] = validation_errors();
			}
			echo json_encode($validate);
		}

		public function deletePullout($id) {		
		$this->load->model('PullOutsModel');
		$this->PullOutsModel->deletePullout($id);
		$updateMsg = 	'<div class="alert alert-success alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Successfully Deleted!
                            </div>';
		$this->session->set_flashdata('msg', $updateMsg);
		redirect('Pull-Out-item');

	}

	public function confirmPullout() {
		$this->load->model('ConfirmedPullOutsModel');
		$this->ConfirmedPullOutsModel->insertdirect();

		date_default_timezone_set('Asia/Manila');

		$this->load->model('ItemsModel');
		$selectQuery = $this->db->query("SELECT item_code,stocks_to_pullout FROM pulled_out");
		$results = $selectQuery->result();

		foreach ($results as $row) {
			$itemCode = $row->item_code;
			$stocks = $row->stocks_to_pullout;
			$this->ItemsModel->decreasedByPulloutdirect($stocks,$itemCode);
		}

		$this->load->model('PullOutsModel');
		$this->PullOutsModel->deletePullouts();
		

		$updateMsg = 	'<div class="alert alert-success alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Items Successfully pulled out.
                            </div>';
		$this->session->set_flashdata('msg', $updateMsg);

		redirect('Pull-Out-item');

	}

	public function ItemGet($itemCode) {

		$this->load->model('ItemsModel');
		$this->load->model('CustomersModel');

		$results = $this->ItemsModel->ItemsGet($itemCode);
		$customers = $this->CustomersModel->getCustomers();
		$data['results'] = $results;
		$data['customers'] = $customers;
		$this->load->view('items/item_pullout/itemsget', $data);


	}

	public function ItemGetValidate($id) {

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->load->model('ItemsModel');
		$results = $this->ItemsModel->ItemsGetByName($this->input->post('item_code'));
		
		$itemStock = 0;
		foreach ($results as $row) {
			$itemStock = $row->stocks;
		}

		$rules = [
			[
				'field' => 'item_code',
				'label' => 'Item Code',
				'rules' => 'trim|is_unique[pulled_out.item_code]',
				'errors' => ['is_unique' => 'This item is already in current pulled-out']
			],
			[
				'field' => 'item_name',
				'label' => 'Item Name',
				'rules' => 'trim'
			],
			[
				'field' => 'pullout_stocks',
				'label' => 'Stocks',
				'rules' => 'trim|numeric|required|less_than_equal_to['.$itemStock.']|is_natural_no_zero',
				'errors' => ['less_than_equal_to' => 'Only '.$itemStock.' stock/s available']
			],
			[
				'field' => 'pull_out_to',
				'label' => 'Pull-out to',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please select customer.']
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()){

			$validate['success'] = true;

			$this->load->model('PullOutsModel');

			date_default_timezone_set("Asia/Manila");

			$data = [

				'item_code' => $this->input->post('item_code'),
				'date_of_punch' => date("Y-m-d H:i:s"),
				'stocks_to_pullout' => $this->input->post('item_stocks'),
				'pullout_to' => $this->input->post('pull_out_to'),
				'discount' => $this->input->post('discount')

			];

			$this->PullOutsModel->addPullout($data);


		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}
}