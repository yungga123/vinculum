<?php
defined('BASEPATH') or die('Access Denied');

class ToolsController extends CI_Controller {
	public function __construct() {
        Parent::__construct();
        $this->load->model('ToolsModel');
    }

    function validation_rules($usage) {
    	$tool_rule = '';
    	$tool_errors = array();
    	if ($usage == 'add') {
    		$tool_rule = 'trim|required|max_length[500]|is_unique[tools.code]';
    		$tool_errors = [
					'required' => 'Please provide Tool Code.',
					'max_length' => 'Tool Code maximum characters is 500.',
					'is_unique' => 'Tool Code is already existing.'
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
				'rules' => 'trim'
			],
			[
				'field' => 'tool_quantity',
				'label' => 'Tool Quantity',
				'rules' => 'trim|max_length[11]|is_natural',
				'errors' => [
					'max_length' => 'Tool Quantity maximum characters is 11.',
					'is_natural' => 'Tool Quantity must contain a valid number.'
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
			$data['listof_tools'] = ' active';
			$data['ul_tools_treeview'] = ' menu-open';
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
				'field' => 'tool_pullout_stock',
				'label' => 'To Pullout',
				'rules' => 'trim|required|is_natural_no_zero|greater_than_equal_to[1]',
				'errors' => [
					'required' => 'To pullout field is required.',
					'is_natural_no_zero' => 'Number must be natural and not zero.',
					'greater_than_equal_to' => 'Available stock/s is 1.'
				]
			]
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}
}