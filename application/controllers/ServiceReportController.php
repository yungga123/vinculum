<?php
defined('BASEPATH') or die('Access Denied');

class ServiceReportController extends CI_Controller {
    
   public function __construct() {
       Parent::__construct();
       $this->load->model('ServiceReportModel');
   }

   function validation_rules() {
		$rules = [
			[
				'field' => 'customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Customer Name.'
				]
			],
			[
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Description.'
				]
			],
			[
				'field' => 'date_requested',
				'label' => 'Date Requested',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Date Requested.'
				]
			],
			[
				'field' => 'date_implemented',
				'label' => 'Date Requested',
				'rules' => 'trim'
			],
			[
				'field' => 'direct_item[]',
				'label' => 'Direct Item',
				'rules' => 'trim'
			],
			[
				'field' => 'direct_item_qty[]',
				'label' => 'Direct Item Quantity',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Direct Item Quantity must be a natural number.'
				]
			],
			[
				'field' => 'indirect_item[]',
				'label' => 'Indirect Item',
				'rules' => 'trim'
			],
			[
				'field' => 'indirect_item_qty[]',
				'label' => 'Indirect Item Quantity',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Indirect Item Quantity must be a natural number.'
				]
			],
			[
				'field' => 'tools[]',
				'label' => 'Direct Item',
                'rules' => 'trim'
			],
			[
				'field' => 'tools_qty[]',
				'label' => 'Tools Quantity',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Tools Quantity must be a natural number.'
				]
			]
        ];
        
        return $rules;
	}

   public function index() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('CustomersModel');
            $this->load->model('ItemsModel');
            $this->load->model('ToolsModel');
            $results_customers = $this->CustomersModel->getVtCustomersByID();
            $results_direct_items = $this->ItemsModel->select_direct_items();
            $results_indirect_items = $this->ItemsModel->select_indirect_items();
            $results_tools = $this->ToolsModel->select_all();

			$this->load->helper('site_helper');
			$data = html_variable();
            $data['title'] = 'Service Report';
            $data['li_servicereport'] = ' menu-open';
			$data['ul_servicereport'] = ' active';
            $data['encode_sr'] = ' active';
            $data['results_customers'] = $results_customers;
            $data['results_direct_items'] = $results_direct_items;
            $data['results_indirect_items'] = $results_indirect_items;
            $data['results_tools'] = $results_tools;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('service_report/service_report');
			$this->load->view('templates/footer');
			$this->load->view('service_report/script');
		} else {
			redirect('','refresh');
		}
   }


   public function add_sr_validate() {
       $validate = [
			'success' => false,
			'errors' => ''
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $count_direct_item = count($this->input->post('direct_item'));
            $count_indirect_item = count($this->input->post('indirect_item'));
            $count_tools = count($this->input->post('tools'));
            $sr_id = '';

            
            
            $this->ServiceReportModel->insert_service_report(
                [
                    'customer_name' => $this->input->post('customer_name'),
                    'description' => $this->input->post('description'),
                    'date_requested' => $this->input->post('date_requested'),
                    'date_implemented' => $this->input->post('date_implemented')
                ]
			);
			
			foreach ($this->ServiceReportModel->select_latest() as $row) {
                $sr_id = $row->id;
            }

			for ($i=0; $i < $count_direct_item; $i++) {

				if (strlen($this->input->post('direct_item')[$i]) != 0) { // count string length
					$this->ServiceReportModel->insert_sr_direct_item(
						[
							'sr_id' => $sr_id,
							'direct_item_id' => $this->input->post('direct_item')[$i],
							'qty_rqstd' => $this->input->post('direct_item_qty')[$i]
						]
					);
				}
				
			}

			for ($i=0; $i < $count_indirect_item; $i++) { 

				if (strlen($this->input->post('indirect_item')[$i]) != 0) {

					$this->ServiceReportModel->insert_sr_indirect_item(
						[
							'sr_id' => $sr_id,
							'indirect_item_id' => $this->input->post('indirect_item')[$i],
							'qty_rqstd' => $this->input->post('indirect_item_qty')[$i]
						]
					);

				}
				
			}


			for ($i=0; $i < $count_tools; $i++) { 

				if (strlen($this->input->post('tools')[$i]) != 0) {
					$this->ServiceReportModel->insert_sr_tools(
						[
							'sr_id' => $sr_id,
							'tools_id' => $this->input->post('tools')[$i],
							'qty_rqstd' => $this->input->post('tools_qty')[$i]
						]
					);
				}
				
			}
            
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);

	
   }

}
