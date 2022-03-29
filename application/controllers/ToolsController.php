<?php
defined('BASEPATH') or die('Access Denied');

class ToolsController extends CI_Controller {
	public function __construct() {
        Parent::__construct();
		$this->load->model('ToolsModel');
		date_default_timezone_set('Asia/Manila');
    }

    function validation_rules($usage) {
    	$tool_rule = '';
    	$tool_errors = array();
    	if ($usage == 'add') {
    		$tool_rule = 'trim|required|max_length[500]|is_unique[tools.code]';
    		$tool_errors = [
					'required' => 'Please provide Tool Code.',
					'max_length' => 'Tool Code maximum characters is 500.',
					'is_unique' => 'Tool Code is already existing or already broken/deleted. Please provide another code.'
				];
    	} elseif ($usage == 'edit') {
    		$tool_rule = 'trim|required|max_length[500]';
    		$tool_errors = [
					'required' => 'Please provide Tool Code.',
					'max_length' => 'Tool Code maximum characters is 500.'
				];
		}

    	$rules = [
			[
				'field' => 'tool_code',
				'label' => 'Tool Code',
				'rules' => $tool_rule,
				'errors' => $tool_errors
			],
			[
				'field' => 'tool_model',
				'label' => 'Tool Model',
				'rules' => 'trim|max_length[500]',
				'errors' => [
					'max_length' => 'Tool Model maximum characters is 500.'
				]
			],
			[
				'field' => 'tool_description',
				'label' => 'Tool Description',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Tool Description maximum characters is 1000.'
				]
			],
			[
				'field' => 'tool_type',
				'label' => 'Tool Type',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select tool type.'
				]
			],
			[
				'field' => 'tool_quantity',
				'label' => 'Tool Quantity',
				'rules' => 'trim|max_length[11]|is_natural_no_zero|required',
				'errors' => [
					'max_length' => 'Tool Quantity maximum characters is 11.',
					'is_natural_no_zero' => 'Quantity must be natural number and not 0',
					'required' => 'Please enter quantity'
				]
			],
			[
				'field' => 'tool_price',
				'label' => 'Tool Price',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Tool Price maximum characters is 18.',
					'numeric' => 'Tool Price must be numeric'
				]
			]

		];

		return $rules;
    }

    public function index() {
    	if($this->session->userdata('logged_in')) {
			$this->load->model('CustomersModel');
			$this->load->model('TechniciansModel');
    		$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Tools';
			$data['ul_tools'] = ' active';
			$data['ul_items_tree'] = ' active';
			$data['result_customers'] = $this->CustomersModel->getVtCustomersByID();
			$data['result_technicians'] = $this->TechniciansModel->getTechniciansByName();
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('tools/tools');
			$this->load->view('templates/footer');
			$this->load->view('tools/script');

		} else {
			redirect('','refresh');
		}
    }

    public function get_tools() {

		$fetch_data = $this->ToolsModel->tools_datatable();
		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->code;
			$sub_array[] = $row->model;
			$sub_array[] = $row->description;
			$sub_array[] = $row->type;
			$sub_array[] = $row->quantity;
			$sub_array[] = $row->price;
			$sub_array[] = '

				  	<button type="button" class="btn btn-warning btn-xs btn-select" title="Edit" data-toggle="modal" data-target=".modal-edit-tool"><i class="fas fa-edit"></i></button> 

					<button type="button" class="btn btn-danger btn-xs btn-delete" title="Delete" data-toggle="modal" data-target=".modal-delete-tool"><i class="fas fa-trash"></i></button>

					<button type="button" class="btn btn-success btn-xs btn-pullout" title="Pullout" data-toggle="modal" data-target=".modal-pullout-tool"><i class="fas fa-sign-out-alt"></i></button>	
			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->ToolsModel->get_all_tools_data(),
			"recordsFiltered" => $this->ToolsModel->filter_tools_data(),
			"data" => $data
		);

		echo json_encode($output);
    }

    public function add_tools() {
    	if($this->session->userdata('logged_in')) {
    		$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Add Tools';
			$data['ul_tools'] = ' active';
			$data['ul_items_tree'] = ' active';
			$data['listof_tools'] = ' active';
			$data['ul_tools_treeview'] = ' menu-open';

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('tools/addtools');
			$this->load->view('templates/footer');
			$this->load->view('tools/script');

		} else {
			redirect('','refresh');
		}
    }

    public function add_tools_validate() {
    	$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = $this->validation_rules('add');
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$this->ToolsModel->insert([
				'code' => $this->input->post('tool_code'),
				'model' => $this->input->post('tool_model'),
				'description' => $this->input->post('tool_description'),
				'type' => $this->input->post('tool_type'),
				'quantity' => $this->input->post('tool_quantity'),
				'price' => $this->input->post('tool_price')
			]);
		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function get_tools_details($id) {
		
    	$validate = [
    		'success' => false,
    		'data' => ''
    	];

    	$results = $this->ToolsModel->select_where_id($id);

    	if (count($results) != 0) {
    		$validate['success'] = true;
    		$validate['data'] = $results;
    	}

    	echo json_encode($validate);
    }

    public function edit_tools_validate() {
    	$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = $this->validation_rules('edit');
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			$id = $this->input->post('tool_code');
			$data = [
				'model' => $this->input->post('tool_model'),
				'description' => $this->input->post('tool_description'),
				'type' => $this->input->post('tool_type'),
				'quantity' => $this->input->post('tool_quantity'),
				'price' => $this->input->post('tool_price')
			];

			$this->ToolsModel->update($id,$data);
		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function delete_tool_validate() {
    	$validate = [
			'success' => false,
			'errors' => ''
		];
		
		$rules = [
			[
				'field' => 'tool_delete_code',
				'label' => 'Tool Code',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select tool to delete'
				]
			]

		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			$id = $this->input->post('tool_delete_code');
			$data = [
				'is_deleted' => 1
			];

			$this->ToolsModel->update($id,$data);
		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function print_tools() {
    	if($this->session->userdata('logged_in')) {

    		$results = $this->ToolsModel->select_all();

	    	$data = [
	    		'title' => 'Print Tools',
	    		'results' => $results
	    	];

	    	$this->load->view('tools/printtools',$data);

    	} else {
    		redirect('','refresh');
    	}
	}
	
	public function pullout_tool_validate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$tool_code = $this->input->post('tool_pullout_code');

		$tools = $this->ToolsModel->select_where_id($tool_code);

		foreach ($tools as $row) {
			$tool_quantity = $row->quantity;
		}

		$rules = [
			[
				'field' => 'tool_pullout_code',
				'label' => 'Tool Code',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select tool.'
				]
			],
			[
				'field' => 'customer',
				'label' => 'Customer',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select customer.'
				]
			],
			[
				'field' => 'personnel',
				'label' => 'Assigned Personnel',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select assigned personnel.'
				]
			],
			[
				'field' => 'tool_pullout_stock',
				'label' => 'To Pullout',
				'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to['.$tool_quantity.']',
				'errors' => [
					'required' => 'To pullout field is required.',
					'is_natural_no_zero' => 'Number must be natural and not zero.',
					'less_than_equal_to' => 'Available stock/s is '.$tool_quantity.'.'
				]
			]
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			
			$current_date = date('Y-m-d');
			$current_time = date('H:i:s');

			$data = [
				'tool_code' => $tool_code,
				'customer' => $this->input->post('customer'),
				'assigned_personnel' => $this->input->post('personnel'),
				'quantity' => $this->input->post('tool_pullout_stock'),
				'date_of_pullout' => $current_date,
				'time_of_pullout' => $current_time
			];

			

			$update_data = [
				'quantity' => $tool_quantity - $this->input->post('tool_pullout_stock')
			];

			
			$this->ToolsModel->insert_toolpullout($data);
			$this->ToolsModel->update($tool_code,$update_data);
		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function tools_pullout() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$this->load->model('TechniciansModel');
			$this->load->model('CustomersModel');
			$data = html_variable();
			$data['title'] = 'Tools Pullout';
			$data['ul_tools'] = ' active';
			$data['ul_items_tree'] = ' active';
			$data['results_tools_pullout'] = $this->ToolsModel->tools_pullout_select();
			$data['results_technicians'] = $this->TechniciansModel->getTechnicians();
			$data['results_customers'] = $this->CustomersModel->getVtCustomersByID();
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('tools/tools_pullout');
			$this->load->view('templates/footer');
			$this->load->view('tools/script');

		} else {
			redirect('','refresh');
		}
	}

	public function get_tools_pullout_details($id) {
		$validate = [
    		'success' => false,
    		'data' => ''
    	];

    	$results = $this->ToolsModel->tools_pullout_select_id($id);

    	if (count($results) != 0) {
    		$validate['success'] = true;
    		$validate['data'] = $results;
    	}

    	echo json_encode($validate);
	}

	public function tools_pullout_return() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$pullout_id = $this->input->post('pullout_id');
		$pullout_quantity = '';

		$results = $this->ToolsModel->tools_pullout_select_id($pullout_id);

		foreach ($results as $row) {
			$pullout_quantity = $row->quantity;
		}

		$rules = [
			[
				'field' => 'tool_code',
				'label' => 'Tool Code',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select tool to return.'
				]
			],
			[
				'field' => 'assigned_to',
				'label' => 'Assigned To',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select where to assign.'
				]
			],
			[
				'field' => 'customer',
				'label' => 'Customer',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select customer.'
				]
			],
			[
				'field' => 'quantity',
				'label' => 'Quantity',
				'rules' => 'trim|required|less_than_equal_to['.$pullout_quantity.']|is_natural_no_zero',
				'errors' => [
					'required' => 'Please select tool to return.',
					'less_than_equal_to' => 'Quantity must be number and less than or equal to '.$pullout_quantity,
					'is_natural_no_zero' => 'Must be a natural number and not 0'
				]
			]
		];
		
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$data = [
				'is_deleted' => '1',
				'date_of_return' => date('Y-m-d H:i:s')
			];

			$this->ToolsModel->tools_pullout_update($pullout_id,$data);
			$this->ToolsModel->update_quantity($this->input->post('tool_code'),$this->input->post('quantity'));
		} else {

			$validate['errors'] = validation_errors();

		}
		echo json_encode($validate);
	}

	public function update_tools_pullout() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$pullout_id = $this->input->post('edit_pullout_id');
		$pullout_quantity = '';

		$results = $this->ToolsModel->tools_pullout_select_id($pullout_id);

		foreach ($results as $row) {
			$pullout_quantity = $row->quantity;
		}

		$rules = [
			[
				'field' => 'edit_pullout_id',
				'label' => 'Pullout ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select item to edit.'
				]
			],
			[
				'field' => 'edit_tool_code',
				'label' => 'Tool Code',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select item to edit.'
				]
			],
			[
				'field' => 'edit_assigned_to',
				'label' => 'Assigned To',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select on Assigned To.'
				]
			],
			[
				'field' => 'edit_customer',
				'label' => 'Customer',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select on customer.'
				]
			],
			[
				'field' => 'edit_quantity',
				'label' => 'Quantity',
				'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to['.$pullout_quantity.']',
				'errors' => [
					'required' => 'Please select item to edit.',
					'is_natural_no_zero' => 'Quantity must be a natural number and not zero.',
					'less_than_equal_to' => 'Quantity must be less than or equal to '.$pullout_quantity
				]
			]
		];
		
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$data = [
				'assigned_personnel' => $this->input->post('edit_assigned_to'),
				'customer' => $this->input->post('edit_customer')
			];

			$this->ToolsModel->tools_pullout_update($pullout_id,$data);

		} else {

			$validate['errors'] = validation_errors();

		}
		echo json_encode($validate);
	}

	public function return_history() {
		if($this->session->userdata('logged_in')) {
			$this->load->model('CustomersModel');
			$this->load->model('TechniciansModel');

    		$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Tools Return History';
			$data['ul_tools'] = ' active';
			$data['ul_items_tree'] = ' active';
			$data['customers'] = $this->CustomersModel->getVtCustomersByID();
			$data['technicians'] = $this->TechniciansModel->getTechniciansByName();
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('tools/return_history');
			$this->load->view('templates/footer');
			$this->load->view('tools/script');

		} else {
			redirect('','refresh');
		}
	}

	public function get_return_history() {
		$fetch_data = $this->ToolsModel->toolspullout_datatable();
		$data = array();
		foreach($fetch_data as $row) {
			$date_of_pullout = '';
			$time_of_pullout = '';

			if ($row->date_of_pullout != '0000-00-00') {
				$date_of_pullout = date_format(date_create($row->date_of_pullout),'F d, Y');
			}

			if ($row->time_of_pullout != '00:00:00') {
				$time_of_pullout = date_format(date_create($row->time_of_pullout),'h:i a');
			}
			
			
			$sub_array = array();
			$sub_array[] = $row->toolpullout_id;
			$sub_array[] = $row->tool_code;
			$sub_array[] = $row->tool_model;
			$sub_array[] = $row->tool_description;
			$sub_array[] = $row->assigned_to;
			$sub_array[] = $row->customer;
			$sub_array[] = $row->quantity;
			$sub_array[] = $date_of_pullout;
			$sub_array[] = $time_of_pullout;

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->ToolsModel->get_all_toolspullout_data(),
			"recordsFiltered" => $this->ToolsModel->filter_toolspullout_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function print_return_history() {
		if ($this->session->userdata('logged_in')) {

			$rules = [
				[
					'field' => 'start_date',
					'label' => 'Start Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Start Date.'
					]
				],
				[
					'field' => 'end_date',
					'label' => 'End Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select End Date.'
					]
				]
			];

			$this->form_validation->set_error_delimiters('<p>• ','</p>');

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {

				$client = $this->input->post('customer_name');
				$assigned_to = $this->input->post('assigned_to');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				$results = $this->ToolsModel->get_tools_history_by_namedate($client,$assigned_to,$start_date,$end_date);

				$data = [
					'title' => 'Print Return History',
					'results' => $results,
					'client' => $client,
					'assigned_to' => $assigned_to,
					'start_date' => $start_date,
					'end_date' => $end_date
				];
				$this->load->view('tools/return_history_print',$data);
			} else {
				// $this->session->set_flashdata('fail', form_error('start_date').' '.form_error('start_date'));
				// redirect('tool-return-history');
				echo 'Error!!! Cannot print, please refer to the information below:<br>'.validation_errors();
			}
			
			
		} else {
			redirect('','refresh');
		}
	}

	// Export to CSV
    function exportTools()
    {
		$this->load->model('ToolsModel');
        $file_name = 'toolsdata_on' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $results = $this->ToolsModel->print_select_all();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = [
            'Tool Code',
			'Model',
			'Description',
			'Tool Type',
			'Quantity',
			'Price'
        ];
        fputcsv($file, $header);
        foreach ($results->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

	function exportpulloutTools()
    {
		$this->load->model('ToolsModel');
        $file_name = 'toolsdata_on' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $results = $this->ToolsModel->export_pullout_tools();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = [
			'Tool Code',
			'Model',
			'Description',
			'Quantity',
			'Lastname',
			'Firstname',
			'Middlename',
			'Customer'
			
        ];
        fputcsv($file, $header);
        foreach ($results->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

	function exportAllTools()
    {
		$this->load->model('ToolsModel');
        $file_name = 'toolsalldata_on' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");
        // file creation 
        $file = fopen('php://output', 'w');
        $header = [
            'Tool Code',
			'Model',
			'Description',
			'Tool Type',
			'Quantity',
			'Price',
			'Customer Name',
			'Quantity'
        ];
        fputcsv($file, $header);
		// get data 
        $results = $this->ToolsModel->export_all_items();
		$code = "";

        foreach ($results as $row) {
			$results1 = $this->ToolsModel->fetch_items_data_zero_stock($row->code);
			$count = count($results1);
			$sub_array = array();

			$sub_array[] = $row->code;
			$sub_array[] = $row->model;
			$sub_array[] = $row->description;
			$sub_array[] = $row->type;
			$sub_array[] = $row->quantity;
			$sub_array[] = $row->price;

			if($row->quantity == "0"){
				if($count > 1){
					// display more than 1 data of pulled out items
					foreach($results1 as $row1){
						$sub_array[] = $row1->CompanyName;
						$sub_array[] = $row1->quantity;
						fputcsv($file, $sub_array);
						$sub_array = array();
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
					}
				}
				else{
					foreach($results1 as $row1){
						$sub_array[] = $row1->CompanyName;
						$sub_array[] = $row1->quantity;	
					}
					fputcsv($file, $sub_array);
				}
			}
			else{
				if($count > 0){
					// display more than 1 data of pulled out items
					foreach($results1 as $row1){
						$sub_array[] = $row1->CompanyName;
						$sub_array[] = $row1->quantity;
						fputcsv($file, $sub_array);
						$sub_array = array();
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
						$sub_array[] = "";
					}
				}
				else{
					foreach($results1 as $row1){
						$sub_array[] = $row1->CompanyName;
						$sub_array[] = $row1->quantity;
					}
					fputcsv($file, $sub_array);
				}
				
			}
        }
        fclose($file);
        exit;
    }

}