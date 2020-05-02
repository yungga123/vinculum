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
				'field' => 'direct_item_returns[]',
				'label' => 'Direct Item Returns',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Direct Item Returns must be a natural number.'
				]
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
				'field' => 'indirect_item_returns[]',
				'label' => 'Indirect Item Returns',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Indirect Item Returns must be a natural number.'
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
			],
			[
				'field' => 'tools_returns[]',
				'label' => 'Tools Returns',
				'rules' => 'trim|is_natural',
				'errors' => [
					'is_natural' => 'Tools Returns must be a natural number.'
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
							'qty_rqstd' => $this->input->post('direct_item_qty')[$i],
							'returns' => $this->input->post('direct_item_returns')[$i]
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
							'qty_rqstd' => $this->input->post('indirect_item_qty')[$i],
							'returns' => $this->input->post('indirect_item_returns')[$i]
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
							'qty_rqstd' => $this->input->post('tools_qty')[$i],
							'returns' => $this->input->post('tools_returns')[$i]
						]
					);
				}
				
			}
            
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
   }

   public function service_report_table() {

		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
            $data['title'] = 'Service Report';
            $data['li_servicereport'] = ' menu-open';
			$data['ul_servicereport'] = ' active';
			$data['sr_listing'] = ' active';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('service_report/service_report_table');
			$this->load->view('templates/footer');
			$this->load->view('service_report/script');
		} else {
			redirect('','refresh');
		}

   }

   public function get_service_report() {
	   	$fetch_data = $this->ServiceReportModel->service_report_datatable();


		$data = array();
		foreach($fetch_data as $row) {

			$date_requested = '';
			$date_implemented = '';

			if ($row->date_requested != '0000-00-00') {
				$date_requested = $row->date_requested;
			}

			if ($row->date_implemented != '0000-00-00') {
				$date_implemented = $row->date_implemented;
			}

			$sub_array = array();
			$sub_array[] = $row->sr_id;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->description;
			$sub_array[] = date_format(date_create($date_requested), 'F d, Y');
			$sub_array[] = date_format(date_create($date_implemented), 'F d, Y');

			$sub_array[] = '

			<a href="'.site_url('service-report-update/'.$row->sr_id).'" class="btn btn-warning btn-xs" target="_blank"><i class="fas fa-edit"></i></a> 

			<button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>

			<a href="'.site_url('service-report-view/'.$row->sr_id).'" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-search"></i></a>

			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->ServiceReportModel->get_all_service_report_data(),
			"recordsFiltered" => $this->ServiceReportModel->filter_service_report_data(),
			"data" => $data
		);

		echo json_encode($output);
   }

   public function service_report_view($id) {
	   if($this->session->userdata('logged_in')) {
		
		$results_sr = $this->ServiceReportModel->service_report_view($id);
		$results_direct_item = $this->ServiceReportModel->service_report_directItem_view($id);
		$results_indirect_item = $this->ServiceReportModel->service_report_indirectItem_view($id);
		$results_tools = $this->ServiceReportModel->service_report_tools_view($id);

		$data = [
			'title' => 'Service Report View',
			'results_sr' => $results_sr,
			'results_direct_item' => $results_direct_item,
			'results_indirect_item' => $results_indirect_item,
			'results_tools' => $results_tools
		];
		
		$this->load->view('service_report/service_report_view',$data);


	   } else {
		   redirect('','refresh');
	   }
   }

   	public function update_service_report($id) {

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
			$data['title'] = 'Service Report Update';
			$data['li_servicereport'] = ' menu-open';
			$data['ul_servicereport'] = ' active';
			$data['sr_listing'] = ' active';
			$data['results_customers'] = $results_customers;
            $data['results_direct_items'] = $results_direct_items;
            $data['results_indirect_items'] = $results_indirect_items;
			$data['results_tools'] = $results_tools;
			$data['results_direct_items_view'] = $this->ServiceReportModel->service_report_directItem_view($id);
			$data['results_indirect_items_view'] = $this->ServiceReportModel->service_report_indirectItem_view($id);
			$data['results_tools_view'] = $this->ServiceReportModel->service_report_tools_view($id);
			$data['results_service_report_view'] = $this->ServiceReportModel->service_report_view($id);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('service_report/service_report_update');
			$this->load->view('templates/footer');
			$this->load->view('service_report/script');

		} else {
			redirect('','refresh');
		}

   }

   public function service_report_update_validate() {
	   $validate = [
			'success' => false,
			'errors' => ''
		];

		$sr_id = $this->input->post('sr_id');

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			//Update Service Report
			$this->ServiceReportModel->update_service_report(
				$sr_id,
				[
					'customer_name' => $this->input->post('customer_name'),
					'description' => $this->input->post('description'),
					'date_requested' => $this->input->post('date_requested'),
					'date_implemented' => $this->input->post('date_implemented')
				]
			);
			//end of Update Service Report

			//update existing direct item
			$direct_item_id_data = array();

			for ($i=0; $i < count($this->input->post('direct_item_id')) ; $i++) {

				$direct_item_sub_data = array();
				
				if ($this->input->post('direct_item_id')[$i] != '') {
					$this->ServiceReportModel->update_sr_direct_item(
						$this->input->post('direct_item_id')[$i],
						[
							'direct_item_id' => $this->input->post('direct_item')[$i],
							'qty_rqstd' => $this->input->post('direct_item_qty')[$i],
							'returns' => $this->input->post('direct_item_returns')[$i]
						]
					);

					$direct_item_sub_data[] = $this->input->post('direct_item_id')[$i];
					$direct_item_id_data[] = $direct_item_sub_data;
				} else {
					$this->ServiceReportModel->insert_sr_direct_item(
						[
							'sr_id' => $sr_id,
							'direct_item_id' => $this->input->post('direct_item')[$i],
							'qty_rqstd' => $this->input->post('direct_item_qty')[$i],
							'returns' => $this->input->post('direct_item_returns')[$i]
						]
					);

					$direct_item_sub_data[] = $this->ServiceReportModel->get_new_added_sr_direct_item($sr_id);
					$direct_item_id_data[] = $direct_item_sub_data;
				}
			}
			$this->ServiceReportModel->remove_sr_direct_item($direct_item_id_data,$sr_id);
			//end of update existing direct item

			//update existing indirect item
			$indirect_item_id_data = array();

			for ($i=0; $i < count($this->input->post('indirect_item_id')) ; $i++) {

				$indirect_item_sub_data = array();
				
				if ($this->input->post('indirect_item_id')[$i] != '') {
					$this->ServiceReportModel->update_sr_indirect_item(
						$this->input->post('indirect_item_id')[$i],
						[
							'indirect_item_id' => $this->input->post('indirect_item')[$i],
							'qty_rqstd' => $this->input->post('indirect_item_qty')[$i],
							'returns' => $this->input->post('indirect_item_returns')[$i]
						]
					);

					$indirect_item_sub_data[] = $this->input->post('indirect_item_id')[$i];
					$indirect_item_id_data[] = $indirect_item_sub_data;
				} else {
					$this->ServiceReportModel->insert_sr_indirect_item(
						[
							'sr_id' => $sr_id,
							'indirect_item_id' => $this->input->post('indirect_item')[$i],
							'qty_rqstd' => $this->input->post('indirect_item_qty')[$i],
							'returns' => $this->input->post('indirect_item_returns')[$i]
						]
					);

					$indirect_item_sub_data[] = $this->ServiceReportModel->get_new_added_sr_indirect_item($sr_id);
					$indirect_item_id_data[] = $indirect_item_sub_data;
				}
			}
			$this->ServiceReportModel->remove_sr_indirect_item($indirect_item_id_data,$sr_id);
			//end of update existing indirect item

			//update existing tools
			$tools_id_data = array();

			for ($i=0; $i < count($this->input->post('tools_id')) ; $i++) {

				$tools_sub_data = array();
				
				if ($this->input->post('tools_id')[$i] != '') {
					$this->ServiceReportModel->update_sr_tools(
						$this->input->post('tools_id')[$i],
						[
							'tools_id' => $this->input->post('tools')[$i],
							'qty_rqstd' => $this->input->post('tools_qty')[$i],
							'returns' => $this->input->post('tools_returns')[$i]
						]
					);

					$tools_sub_data[] = $this->input->post('tools_id')[$i];
					$tools_id_data[] = $tools_sub_data;
				} else {
					$this->ServiceReportModel->insert_sr_tools(
						[
							'sr_id' => $sr_id,
							'tools_id' => $this->input->post('tools')[$i],
							'qty_rqstd' => $this->input->post('tools_qty')[$i],
							'returns' => $this->input->post('tools_returns')[$i]
						]
					);

					$tools_sub_data[] = $this->ServiceReportModel->get_new_added_sr_tools($sr_id);
					$tools_id_data[] = $tools_sub_data;
				}
			}
			$this->ServiceReportModel->remove_sr_tools($tools_id_data,$sr_id);
			//end of update existing tools


		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
		
   }

}
