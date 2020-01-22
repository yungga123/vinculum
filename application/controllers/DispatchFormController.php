<?php
defined('BASEPATH') or die('Access Denied');

class DispatchFormController extends CI_Controller {
public function addDispatch() {

		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Add Dispatch Form';
			$data['forms_menu_status'] = ' menu-open';
			$data['dispatch_menu_status'] = ' menu-open';
			$data['Generate_dispatch'] = ' active';
			$data['ul_forms'] = ' active';
			$data['dispatch_forms'] = ' active';
			
			$this->load->model('CustomersModel');
			$results = $this->CustomersModel->getVtCustomersByName();
			$data['GetCustomer'] = $results;

			$this->load->model('TechniciansModel');
			$results2 = $this->TechniciansModel->getTechnicians();
			$data['GetTech'] = $results2;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('forms/dispatch');
			$this->load->view('templates/footer');

		} else {
			redirect('', 'refresh');
		}
	
		
	}
	public function DispatchTable() {

		if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Dispatch Forms';
			$data['forms_menu_status'] = ' menu-open';
			$data['dispatch_menu_status'] = ' menu-open';
			$data['dispatch_list'] = ' active';
			$data['ul_forms'] = ' active';
			$data['dispatch_forms'] = ' active';
			
			$this->load->model('CustomersModel');
			$customers_form_edit = $this->CustomersModel->getVtCustomersByName();
			$data['customers_form_edit'] = $customers_form_edit;

			$this->load->model('TechniciansModel');
			$Technicians_Edit = $this->TechniciansModel->getTechnicians();
			$data['Technicians_Edit'] = $Technicians_Edit;

			$this->load->model('DispatchFormsModel');
			$Dispatch_Edit = $this->DispatchFormsModel->getDispatchform();
			$data['Dispatch_Edit'] = $Dispatch_Edit;

			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('forms/dispatchtable');
			$this->load->view('templates/footer');


		} else {
			redirect('', 'refresh');
		}
	

	}

	public function fetch_dispatchforms() {
		$this->load->model('DispatchFormsModel');
		$fetch_data = $this->DispatchFormsModel->dispatchform_datatable();
		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->Dispatch_ID;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->ContactPerson;
			$sub_array[] = $row->ContactNumber;
			$sub_array[] = date('F j, Y',strtotime($row->DispatchDate));
			$sub_array[] = $row->Address;
			$sub_array[] = $row->TimeIn;
			$sub_array[] = $row->TimeOut;
			$sub_array[] = $row->Remarks;
			$sub_array[] = $row->AssignedTechnicians1;
			$sub_array[] = $row->AssignedTechnicians2;
			$sub_array[] = $row->AssignedTechnicians3;
			$sub_array[] = $row->AssignedTechnicians4;
			$sub_array[] = $row->AssignedTechnicians5;
			$sub_array[] = $row->WithPermit;
			$sub_array[] = $row->Installation;
			$sub_array[] = $row->RepairOrService;
			$sub_array[] = $row->Warranty;
			$sub_array[] = '<button type="button" class="btn btn-warning btn-sm btn_select" data-toggle="modal" data-target="#modal-edit-dispatch"><i class="fas fa-edit"> EDIT </i>
        </button> <a href="'.site_url("deletedispatch/".$row->Dispatch_ID).'" class="btn btn-sm btn-danger" onclick="return confirm('."'Are you sure?'".')"><i class="fa fa-trash"></i> DELETE</a>
				<a href="'.site_url('printdispatch/'.$row->Dispatch_ID).'" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Print</a>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->DispatchFormsModel->get_all_dispatchform_data(),
			"recordsFiltered" => $this->DispatchFormsModel->filter_dispatchform_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function fetch_dispatch_details($id) {

		if ($this->session->userdata('logged_in')) {
			$this->load->model('DispatchFormsModel');
			$dispatch_form_edit = $this->DispatchFormsModel->getSpecificDispatch($id);

			$data = [
				'title' => 'Update Dispatch Form',
				'dispatch_form_edit' => $dispatch_form_edit
			];

			echo json_encode($data);

		} else {
			redirect('','refresh');
		}
	}
	public function printDispatch($id) {

		if($this->session->userdata('logged_in')) {


			$this->load->library('Myfpdf');
			$this->load->model('DispatchFormsModel');

			$results = $this->DispatchFormsModel->getSpecificDispatch($id);

			$data['results'] = $results;
			$data['dispatch_id'] = $id;

			$this->load->view('forms/printdispatch', $data);

			

		} else {
			redirect('', 'refresh');
		}

	}
	public function updateDispatchValidate() {
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
				'field' => 'time_in',
				'label' => 'Time In',
				'rules' => 'trim'
			],
			[
				'field' => 'time_out',
				'label' => 'Time Out',
				'rules' => 'trim'
			],
			[
				'field' => 'customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required',
				
			],
			[
				'field' => 'remarks',
				'label' => 'Remarks',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'service_type',
				'label' => 'Type Of Service',
				'rules' => 'trim|required',
			],
			[
				'field' => 'assigned_tech1',
				'label' => 'Assigned Technician 1',
				'rules' => 'trim|required'
			],
			[
				'field' => 'assigned_tech2',
				'label' => 'Assigned Technician 2',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech3',
				'label' => 'Assigned Technician 3',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech4',
				'label' => 'Assigned Technician 4',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech5',
				'label' => 'Assigned Technician 5',
				'rules' => 'trim'
			],
			[
				'field' => 'with_permit',
				'label' => 'Is this with permit?',
				'rules' => 'trim|required'
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$service_type = $this->input->post('service_type');
			$installation = 0;
			$service = 0;
			$warranty = 0;

			if ($service_type == "Installation") {
				$installation = 1;
			}
			if ($service_type == "Service") {
				$service = 1;
			}
			if ($service_type == "Warranty") {
				$warranty = 1;
			}

			$id = $this->input->post('dispatch_id');
			$data = [
				'CustomerName' => $this->input->post('customer_name'),
				'DispatchDate' => $this->input->post('dispatch_date'),
				'TimeIn' => $this->input->post('time_in').":00",
				'TimeOut' => $this->input->post('time_out').":00",
				'Remarks' => $this->input->post('remarks'),
				'AssignedTechnicians1' => $this->input->post('assigned_tech1'),
				'AssignedTechnicians2' => $this->input->post('assigned_tech2'),
				'AssignedTechnicians3' => $this->input->post('assigned_tech3'),
				'AssignedTechnicians4' => $this->input->post('assigned_tech4'),
				'AssignedTechnicians5' => $this->input->post('assigned_tech5'),
				'WithPermit' => $this->input->post('with_permit'),
				'Installation' => $installation,
				'RepairOrService' => $service,
				'Warranty' => $warranty
			];

			$this->load->model('DispatchFormsModel');
			$this->DispatchFormsModel->updateDispatch($id, $data);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
}
	public function addDispatchValidate() {

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
				'field' => 'time_in',
				'label' => 'Time In',
				'rules' => 'trim'
			],
			[
				'field' => 'time_out',
				'label' => 'Time Out',
				'rules' => 'trim'
			],
			[
				'field' => 'customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required'
			],
			[
				'field' => 'remarks',
				'label' => 'Remarks',
				'rules' => 'trim|max_length[1000]'
			],
			[
				'field' => 'service_type',
				'label' => 'Type of Service',
				'rules' => 'trim|required'
			],
			[
				'field' => 'assigned_tech1',
				'label' => 'Assigned Technician 1',
				'rules' => 'trim|required'
			],
			[
				'field' => 'assigned_tech2',
				'label' => 'Assigned Technician 2',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech3',
				'label' => 'Assigned Technician 3',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech4',
				'label' => 'Assigned Technician 4',
				'rules' => 'trim'
			],
			[
				'field' => 'assigned_tech5',
				'label' => 'Assigned Technician 5',
				'rules' => 'trim'
			],
			[
				'field' => 'with_permit',
				'label' => 'Is this with permit?',
				'rules' => 'trim|required'
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$service_type = $this->input->post('service_type');
			$installation = 0;
			$service = 0;
			$warranty = 0;

			$this->load->model('DispatchFormsModel');

			if ($service_type == "Installation") {
				$installation = 1;
			}
			if ($service_type == "Service") {
				$service = 1;
			}
			if ($service_type == "Warranty") {
				$warranty = 1;
			}

			$data = [
				'CustomerName' => $this->input->post('customer_name'),
				'DispatchDate' => $this->input->post('dispatch_date'),
				'TimeIn' => $this->input->post('time_in').":00",
				'TimeOut' => $this->input->post('time_out').":00",
				'Remarks' => $this->input->post('remarks'),
				'AssignedTechnicians1' => $this->input->post('assigned_tech1'),
				'AssignedTechnicians2' => $this->input->post('assigned_tech2'),
				'AssignedTechnicians3' => $this->input->post('assigned_tech3'),
				'AssignedTechnicians4' => $this->input->post('assigned_tech4'),
				'AssignedTechnicians5' => $this->input->post('assigned_tech5'),
				'WithPermit' => $this->input->post('with_permit'),
				'Installation' => $installation,
				'RepairOrService' => $service,
				'Warranty' => $warranty
			];

			$this->DispatchFormsModel->insertDispatch($data);

			$dispatchdata = $this->DispatchFormsModel->getDispatchBy1();
			$dispatchID = 0;

			foreach ($dispatchdata as $row) {
				$dispatchID = $row->Dispatch_ID;
			}

			$count = intval($dispatchID);
			$validate['count'] = $count;
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);

	}
public function deleteDispatch($id) {

		if($this->session->userdata('logged_in')) {

			$this->load->model('DispatchFormsModel');
			$this->DispatchFormsModel->deleteDispatch($id);

			$updateMsg = 	'<div class="alert alert-warning alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Dispatch Successfully Deleted!
                            </div>;';

			$this->session->set_flashdata('msg', $updateMsg);

			redirect('dispatchtable');

		} else {
			redirect('', 'refresh');
		}
	}
	
}