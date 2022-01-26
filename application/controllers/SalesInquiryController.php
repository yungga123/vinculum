<?php
defined('BASEPATH') or die('Access Denied');

class SalesInquiryController extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model("SalesInquiryModel");
		date_default_timezone_set('Asia/Manila');
	}

	function validation_rules()
	{

		$rules = [
			[
				'field' => 'customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required|max_length[100]',
				'errors' => [
					'required' => 'Please Enter Customer Name'
				]
			],
			[
				'field' => 'contact_person',
				'label' => 'Contact Person',
				'rules' => 'trim|required|max_length[100]',
				'errors' => [
					'required' => 'Please Enter Contact Person'
				]
			],
			[
				'field' => 'contact_number',
				'label' => 'Contact Number',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Enter Contact Number.']
			],
			[
				'field' => 'location',
				'label' => 'Address',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Provide Enter Full Address'
				]
			],
			[
				'field' => 'email',
				'label' => 'Email Address',
				'rules' => 'trim|required'
			],
			[
				'field' => 'website',
				'label' => 'Website',
				'rules' => 'trim'
			],
			[
				'field' => 'source',
				'label' => 'Source',
				'rules' => 'trim'
			],
			[
				'field' => 'interest',
				'label' => 'Interest',
				'rules' => 'trim'
			],
			[
				'field' => 'type',
				'label' => 'Type',
				'rules' => 'trim'
			],
			[
				'field' => 'notes',
				'label' => 'Notes',
				'rules' => 'trim'
			]
		];
		return $rules;
	}


	function validation_rules_project(){
		$rules = [
			[
				'field' => 'project_sales_incharge',
				'label' => 'Sales Incharge',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Select Sales Incharge']
			],
			[
				'field' => 'project',
				'label' => 'Project',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Enter Project Type']
			],
			[
				'field' => 'project_status',
				'label' => 'Project Status',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Project Status.']
			],
			[
				'field' => 'project_branch',
				'label' => 'Project Branch Name',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Provide Project Branch']
			],
			[
				'field' => 'project_details',
				'label' => 'Project Details',
				'rules' => 'trim'
			],
			[
				'field' => 'project_amount',
				'label' => 'Project Amount',
				'rules' => 'trim'
			],
			[
				'field' => 'quotation_ref',
				'label' => 'Quotation Reference Number',
				'rules' => 'trim'
			],
			[
				'field' => 'project_task[]',
				'label' => 'Project Task',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Provide Project Task']
			],
			[
				'field' => 'project_task[]',
				'label' => 'Project Task',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Provide Project Task']
			]
		];
		return $rules;
	}

	public function new_client_list()
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'New Clients';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_new'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['category'] = 'New_Clients';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/new_client_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}


	public function get_new_client_list()
	{

		$fetch_client = $this->SalesInquiryModel->fetch_customer();

		foreach ($fetch_client as $row) {
			$customer_id = $row->id;

			$fetch_project_id = $this->SalesInquiryModel->fetch_customer_project($customer_id);

			$project_status = "";
			if ($fetch_project_id != "") {
				foreach ($fetch_project_id as $row) {
					if ($project_status == $row->project_status) {
						$project_status = "100%";
					} elseif ($row->project_status == "100%") {
						date_default_timezone_set('Asia/Manila');
						$date = date('Y-m-d');

						$result = $this->SalesInquiryModel->get_specific_client($customer_id);
						foreach ($result as $row) {
							$this->SalesInquiryModel->insert_approved_client([
								'CompanyName' => $row->customer_name,
								'ContactPerson' => $row->contact_person,
								'ContactNumber' => $row->contact_number,
								'Address' => $row->location,
								'EmailAddress' => $row->email_add,
								'Website' => $row->website,
								'source' => $row->source,
								'Interest' => $row->interest,
								'InstallationDate' => $date,
								'Type' => $row->type,
								'Notes' => $row->notes,
								'is_deleted' => "0"
							]);
						}

						$client_id = $this->SalesInquiryModel->get_newly_added_client_id();

						foreach ($client_id as $row) {
							$client_specific_id = $row->CustomerID;
						}

						$this->SalesInquiryModel->update_branch($customer_id, [
							'customer_id' => $client_specific_id
						]);

						$this->SalesInquiryModel->update_project($customer_id, [
							'customer_id' => $client_specific_id,
							'client_status' => "existing"
						]);

						$this->SalesInquiryModel->delete_client($customer_id);
					}
				}
			}
		}


		$fetch_data = $this->SalesInquiryModel->newclient_datatable();

		$data = array();
		foreach ($fetch_data as $row) {


			if ($row->date != '0000-00-00') {
				$date = date_format(date_create($row->date), 'F d, Y');
			}

			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->customer_name;
			$sub_array[] = $row->contact_person;
			$sub_array[] = $row->contact_number;
			$sub_array[] = $row->email_add;
			$sub_array[] = $row->location;
			$sub_array[] = $row->website;
			$sub_array[] = $row->source;
			$sub_array[] = $row->interest;
			$sub_array[] = $row->type;
			$sub_array[] = $row->notes;



			$sub_array[] = '
<a href="' . site_url('inquiry-add-project/' . $row->id) . '" class="btn btn-success btn-xs btn-block"><i class="fas fa-plus"></i>  Add Project</a>
<a href="#" class="btn btn-primary btn-xs btn-block btn_view" target="_blank" data-toggle="modal" data-target=".modal_view_project"><i class="fas fa-search"></i>  View Projects</a>
<button type="button" class="btn btn-primary btn-xs btn-block btn_view_branch" target="_blank" data-toggle="modal" data-target=".modal_view_branch"><i class="fas fa-search"></i>  View Branch</button>
<button type="button" class="btn btn-warning btn-xs btn-block btn_select" data-toggle="modal" data-target="#modal_edit_client"><i class="fas fa-edit"></i> Edit Client</button> 
<button type="button" class="btn btn-success btn-xs btn-block btn_client_approved" data-toggle="modal" data-target="#approved-tempo-client"><i class="fas fa-trash"></i> Approved Client</button>
';
			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->SalesInquiryModel->get_all_new_client_data(),
			"recordsFiltered" => $this->SalesInquiryModel->filter_new_client_data(),
			"data" => $data
		);

		echo json_encode($output);
	}


	public function register_new_client()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');


			$this->SalesInquiryModel->insert_client([
				'customer_name' => $this->input->post('customer_name'),
				'contact_person' => $this->input->post('contact_person'),
				'contact_number' => $this->input->post('contact_number'),
				'location' => $this->input->post('location'),
				'email_add' => $this->input->post('email'),
				'date' => $date,
				'website' => $this->input->post('website'),
				'source' => $this->input->post('source'),
				'interest' => $this->input->post('interest'),
				'type' => $this->input->post('type'),
				'notes' => $this->input->post('notes'),
				'is_deleted' => "0"
			]);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function update_client_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');

			$this->SalesInquiryModel->update_client(
				$this->input->post('client_id_edit'),
				[
					'customer_name' => $this->input->post('customer_name'),
					'contact_person' => $this->input->post('contact_person'),
					'contact_number' => $this->input->post('contact_number'),
					'location' => $this->input->post('location'),
					'email_add' => $this->input->post('email'),
					'date' => $date,
					'website' => $this->input->post('website'),
					'source' => $this->input->post('source'),
					'interest' => $this->input->post('interest'),
					'type' => $this->input->post('type'),
					'notes' => $this->input->post('notes')
				]
			);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function add_project($id)
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'New Project';
			$data['button_title'] = 'Add Project';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_new'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['new_client_id'] = $id;
			$data['form_id'] = 'newclient';
			$data['results'] = $this->SalesInquiryModel->get_sales_list();
			$data['branch_list'] = $this->SalesInquiryModel->get_specific_branch_list($id);


			$this->session->set_userdata('add', true);
			$this->session->set_userdata('edit', false);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/project_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function edit_project($id, $client_status)
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Edit Project';
			$data['button_title'] = 'Edit Project';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_new'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['project_id'] = $id;
			$data['form_id'] = "edit_newclient";
			$data['edit_sales_list'] = $this->SalesInquiryModel->get_sales_list();
			$data['edit_project'] = $this->SalesInquiryModel->get_specific_project($id);

			$result = $this->SalesInquiryModel->get_specific_project($id);
			foreach ($result as $row) {
				$branch_id = $row->branch_id;
				$customer_id = $row->customer_id;
			}

			$data['id'] = $customer_id;
			$data['branch_list'] = $this->SalesInquiryModel->get_specific_branch_list($customer_id);
			$data['edit_branch'] = $this->SalesInquiryModel->get_specific_branch($branch_id);
			$data['edit_task'] = $this->SalesInquiryModel->get_specific_task($id);


			$this->session->set_userdata('edit', true);
			$this->session->set_userdata('add', false);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/project_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function edit_existingclient_project($project_id)
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Edit Project';
			$data['button_title'] = 'Edit Project';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_existing'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['project_id'] = $project_id;
			$data['form_id'] = "edit_existingclient";
			$data['edit_sales_list'] = $this->SalesInquiryModel->get_sales_list();
			$data['edit_project'] = $this->SalesInquiryModel->get_specific_project($project_id);

			$results = $this->SalesInquiryModel->get_specific_project($project_id);
			foreach ($results as $row) {
				$customer_id = $row->customer_id;
			}
			$data['branch_list'] = $this->SalesInquiryModel->get_specific_branch_list($customer_id);
			$data['id'] = $customer_id;

			$result = $this->SalesInquiryModel->get_specific_project($project_id);
			foreach ($result as $row) {
				$branch_id = $row->branch_id;
			}

			$data['edit_branch'] = $this->SalesInquiryModel->get_specific_branch($branch_id);
			$data['edit_task'] = $this->SalesInquiryModel->get_specific_task($project_id);

			$this->session->set_userdata('edit', true);
			$this->session->set_userdata('add', false);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/project_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function salesinquiryaddprojectvalidate()
	{

		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules_project());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$date = date('Y-m-d'); //YYYY-MM-DD
			$fetch_branch_name = $this->SalesInquiryModel->fetch_branch_name($this->input->post('project_branch'));

			if ($this->input->post('form_id') == "newclient") {
				$form_id = "new";
			} else {
				$form_id = "existing";
			}

			$this->SalesInquiryModel->insert_project([
				'customer_id' => $this->input->post('client_id'),
				'branch_id' => $this->input->post('project_branch'),
				'project_status' => $this->input->post('project_status'),
				'sales_incharge' => $this->input->post('project_sales_incharge'),
				'project_type' => $this->input->post('project'),
				'branch' => $fetch_branch_name,
				'client_status' => $form_id,
				'project_details' => $this->input->post('project_details'),
				'project_amount' => $this->input->post('project_amount'),
				'quotation_ref' => $this->input->post('quotation_ref')
			]);


			$project_id = $this->SalesInquiryModel->get_project_id();
			$count_task = count($this->input->post('project_task'));

			foreach ($project_id as $row) {
				$project_id = $row->project_id;
			}

			//add Item
			for ($i = 0; $i < $count_task; $i++) {

				if(empty($this->input->post('remarks')[$i])){
					$remarks = 0;
				}
				else{
					$remarks = 1;
				}


				$this->SalesInquiryModel->insert_project_task([
					'project_id' => $project_id,
					'project_task' => $this->input->post('project_task')[$i],
					'date_of_task' => $this->input->post('task_date')[$i],
					'mark_as_read' => $remarks
				]);
			}

			$mark_last_task = $this->SalesInquiryModel->get_project_task($project_id);

			foreach ($mark_last_task as $row) {
				$task_id = $row->task_id;
			}
			$this->SalesInquiryModel->update_task(
				$task_id,
				[
					'mark_last_task' => 1
				]
			);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function salesinquiryupdateprojectvalidate()
	{

		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->validation_rules_project());

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			//$date = date('Y-m-d'); //YYYY-MM-DD

			$fetch_branch_name = $this->SalesInquiryModel->fetch_branch_name($this->input->post('project_branch'));
			$project_id = $this->input->post('project_id');

			if ($this->input->post('form_id') == "edit_newclient") {
				$form_id = "new";
			} else {
				$form_id = "existing";
			}

			$this->SalesInquiryModel->update_existingclient_project($project_id, [
				'customer_id' => $this->input->post('client_id'),
				'branch_id' => $this->input->post('project_branch'),
				'project_status' => $this->input->post('project_status'),
				'sales_incharge' => $this->input->post('project_sales_incharge'),
				'project_type' => $this->input->post('project'),
				'branch' => $fetch_branch_name,
				'client_status' => $form_id,
				'project_details' => $this->input->post('project_details'),
				'project_amount' => $this->input->post('project_amount'),
				'quotation_ref' => $this->input->post('quotation_ref')
			]);

			$task_id_data = array();

			//add Item
			for ($i = 0; $i < count($this->input->post('task_id')); $i++) {

				$task_sub_data = array();
				//$remarks = "";
				$remarks = isset($_POST['remarks'][$i]) ? "1" : "0";

				if ($this->input->post('task_id')[$i] != '') {
					$this->SalesInquiryModel->update_task(
						$this->input->post('task_id')[$i],
						[
							'project_id' => $project_id,
							'project_task' => $this->input->post('project_task')[$i],
							'date_of_task' => $this->input->post('task_date')[$i],
							'mark_as_read' => $remarks,
							'mark_last_task' => 0
						]
					);
					$task_sub_data[] = $this->input->post('task_id')[$i];
					$task_id_data[] = $task_sub_data;
				} else {
					$this->SalesInquiryModel->insert_project_task([
						'project_id' => $project_id,
						'project_task' => $this->input->post('project_task')[$i],
						'date_of_task' => $this->input->post('task_date')[$i],
						'mark_as_read' => $remarks,
						'mark_last_task' => 0
					]);

					$task_sub_data[] = $this->SalesInquiryModel->get_new_added_task($project_id);
					$task_id_data[] = $task_sub_data;
				}
			}


			$this->SalesInquiryModel->remove_project_task($task_id_data, $project_id);


			$mark_last_task = $this->SalesInquiryModel->get_project_task($project_id);
			foreach ($mark_last_task as $row) {
				$task_id = $row->task_id;
			}

			$this->SalesInquiryModel->update_task(
				$task_id,
				[
					'mark_last_task' => 1
				]
			);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function get_project($client_id)
	{
		$results = $this->SalesInquiryModel->get_project_data($client_id);

		$data = array();
			foreach($results as $row){
				$sub_data = array();
				$sub_data['project_id'] = $row->project_id;
				$sub_data['project_type'] = $row->project_type;
				$sub_data['project_status'] = $row->project_status;
				$sub_data['lastname'] = $row->lastname;
				$sub_data['firstname'] = $row->firstname;
				$sub_data['middlename'] = $row->middlename;
				$sub_data['branch'] = $row->branch;
				$sub_data['project_task'] = $row->project_task;
				$sub_data['date_of_task'] = $row->date_of_task;
				$sub_data['project_details'] = $row->project_details;
				$sub_data['project_amount'] = number_format($row->project_amount,2);
				$sub_data['quotation_ref'] = $row->quotation_ref;
				$data[] = $sub_data;
			}
		

		$json_data['results'] = $data;

		echo json_encode($json_data);
	}

	public function fetch_client_data($client_id)
	{

		$this->load->model('SalesInquiryModel');
		$client_data = $this->SalesInquiryModel->getSpecificlientdata($client_id);

		$client_data_arr['client_data'] = $client_data;

		echo json_encode($client_data_arr);
	}

	// public function delete_client()
	// {
	// 	$validate = [
	// 		'success' => false,
	// 		'errors' => ''
	// 	];

	// 	$rules = [

	// 		[
	// 			'field' => 'client_id_del',
	// 			'label' => 'Client ID',
	// 			'rules' => 'trim|required',
	// 			'errors' => [
	// 				'required' => 'Please Select Client.'
	// 			]
	// 		]

	// 	];

	// 	$this->form_validation->set_error_delimiters('<p>• ', '</p>');

	// 	$this->form_validation->set_rules($rules);

	// 	if ($this->form_validation->run()) {
	// 		$validate['success'] = true;


	// 		$this->SalesInquiryModel->hide_client($this->input->post('client_id_del'), [
	// 			'is_deleted' => '1'
	// 		]);
	// 	} else {
	// 		$validate['errors'] = validation_errors();
	// 	}
	// 	echo json_encode($validate);
	// }

	// // public function delete_existingclient_project($project_id)
	// // {
	// // 	$this->SalesInquiryModel->deleteproject($project_id);
	// // 	$this->SalesInquiryModel->deletetask($project_id);

	// // 	$this->session->set_flashdata('success', 'Success! Project Deleted.');
	// // 	redirect('inquiry-existing-clients');
	// // }

	// public function delete_newclient_project($project_id)
	// {
	// 	$this->SalesInquiryModel->deleteproject($project_id);
	// 	$this->SalesInquiryModel->deletetask($project_id);

	// 	$this->session->set_flashdata('success', 'Success! Project Deleted.');
	// 	redirect('inquiry-tempo-clients');
	// }

	// public function delete_branch_new($branch_id)
	// {
	// 	$this->SalesInquiryModel->deletebranch($branch_id);
	// 	$this->SalesInquiryModel->update_projects_branch($branch_id,[
	// 		'branch' => '',
	// 		'branch_id' => ''
	// 	]);

	// 	$this->session->set_flashdata('success', 'Success! Branch Deleted.');
	// 	redirect('inquiry-tempo-clients/list');
	// }

	// public function delete_branch_existing($branch_id)
	// {
	// 	$this->SalesInquiryModel->deletebranch($branch_id);
	// 	$this->SalesInquiryModel->update_projects_branch($branch_id,[
	// 		'branch' => '',
	// 		'branch_id' => ''
	// 	]);
	// 	$this->session->set_flashdata('success', 'Success! Branch Deleted.');
	// 	redirect('inquiry-existing-clients/list');
	// }

	public function approved_client()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [

			[
				'field' => 'client_id_approved',
				'label' => 'Client ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Client.'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');

			$client_id = $this->input->post('client_id_approved');

			$result = $this->SalesInquiryModel->get_specific_client($client_id);
			foreach ($result as $row) {
				$this->SalesInquiryModel->insert_approved_client([
					'CompanyName' => $row->customer_name,
					'ContactPerson' => $row->contact_person,
					'ContactNumber' => $row->contact_number,
					'Address' => $row->location,
					'EmailAddress' => $row->email_add,
					'Website' => $row->website,
					'source' => $row->source,
					'Interest' => $row->interest,
					'InstallationDate' => $date,
					'Type' => $row->type,
					'Notes' => $row->notes,
					'is_deleted' => "0"
				]);
			}

			$client_id = $this->SalesInquiryModel->get_newly_added_client_id();

			foreach ($client_id as $row) {
				$client_specific_id = $row->CustomerID;
			}

			$this->SalesInquiryModel->update_branch($this->input->post('client_id_approved'), [
				'customer_id' => $client_specific_id
			]);

			$this->SalesInquiryModel->update_project($this->input->post('client_id_approved'), [
				'customer_id' => $client_specific_id,
				'client_status' => "existing"
			]);

			$this->SalesInquiryModel->delete_client($this->input->post('client_id_approved'));
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}





	/// EXISTING CLIENT DATA 

	function existing_client_validation_rules()
	{

		$rules = [
			[
				'field' => 'existing_customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|required|max_length[100]',
				'errors' => [
					'required' => 'Please Enter Customer Name'
				]
			],
			[
				'field' => 'existing_contact_person',
				'label' => 'Contact Person',
				'rules' => 'trim|required|max_length[100]',
				'errors' => [
					'required' => 'Please Enter Contact Person'
				]
			],
			[
				'field' => 'existing_contact_number',
				'label' => 'Contact Number',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please Enter Contact Number.']
			],
			[
				'field' => 'existing_location',
				'label' => 'Address',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Provide Enter Full Address'
				]
			],
			[
				'field' => 'existing_client_email',
				'label' => 'Email Address',
				'rules' => 'trim|required'
			],
			[
				'field' => 'existing_client_website',
				'label' => 'Website',
				'rules' => 'trim'
			],
			[
				'field' => 'existing_client_interest',
				'label' => 'Interest',
				'rules' => 'trim'
			],
			[
				'field' => 'existing_client_type',
				'label' => 'Type',
				'rules' => 'trim'
			],
			[
				'field' => 'existing_client_notes',
				'label' => 'Notes',
				'rules' => 'trim'
			]
		];
		return $rules;
	}

	public function existing_client_list()
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Existing Clients';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_existing'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['category'] = 'existing_client';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/existing_client_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function add_existingclient_project($id)
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'New Project';
			$data['button_title'] = 'Add Project';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_existing'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$data['new_client_id'] = $id;
			$data['form_id'] = 'Existing_Clients';
			$data['results'] = $this->SalesInquiryModel->get_sales_list();
			$data['branch_list'] = $this->SalesInquiryModel->get_specific_branch_list($id);

			$this->session->set_userdata('add', true);
			$this->session->set_userdata('edit', false);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/project_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}


	public function get_existing_client_list()
	{

		$fetch_data = $this->SalesInquiryModel->existingclient_datatable();


		$data = array();
		foreach ($fetch_data as $row) {
			$installationDate = '';

			if ($row->InstallationDate != '0000-00-00') {
				$installationDate = date_format(date_create($row->InstallationDate), 'F d, Y');
			}

			$sub_array = array();
			$sub_array[] = $row->CustomerID;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $row->ContactPerson;
			$sub_array[] = $row->ContactNumber;
			$sub_array[] = $row->EmailAddress;
			$sub_array[] = $row->Address;
			$sub_array[] = $row->Website;
			$sub_array[] = $row->source;
			$sub_array[] = $row->Interest;
			$sub_array[] = $row->Type;
			$sub_array[] = $row->Notes;
			$sub_array[] = $installationDate;



			$sub_array[] = '
<a href="' . site_url('inquiry-add-existingclient-project/' . $row->CustomerID) . '" class="btn btn-success btn-xs btn-block"><i class="fas fa-plus"></i>  Add Project</a>
<a href="#" class="btn btn-primary btn-xs btn-block btn_existing_view" target="_blank" data-toggle="modal" data-target=".modal_view_project"><i class="fas fa-search"></i>  View Projects</a>
<button type="button" class="btn btn-primary btn-xs btn-block btn_view_existing_branch" target="_blank" data-toggle="modal" data-target=".modal_view_branch"><i class="fas fa-search"></i>  View Branch</button>
<button type="button" class="btn btn-warning btn-xs btn-block btn_existing" data-toggle="modal" data-target="#modal_edit_existing_client"><i class="fas fa-edit"></i> Edit Client</button>
';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->SalesInquiryModel->get_all_existing_client_data(),
			"recordsFiltered" => $this->SalesInquiryModel->filter_existing_client_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function fetch_existing_client_data($existing_client_id)
	{

		$this->load->model('SalesInquiryModel');
		$existing_client_data = $this->SalesInquiryModel->getspecificexistingclientdata($existing_client_id);

		$existing_client_data_arr['existing_client_data'] = $existing_client_data;

		echo json_encode($existing_client_data_arr);
	}

	public function update_existing_client_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($this->existing_client_validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = $this->input->post('existing_client_installationdate', 'Y-m-d');

			$this->SalesInquiryModel->update_existing_client(
				$this->input->post('existing_client_id_edit'),
				[
					'CompanyName' => $this->input->post('existing_customer_name'),
					'ContactPerson' => $this->input->post('existing_contact_person'),
					'ContactNumber' => $this->input->post('existing_contact_number'),
					'Address' => $this->input->post('existing_location'),
					'EmailAddress' => $this->input->post('existing_client_email'),
					'InstallationDate' => $date,
					'Website' => $this->input->post('existing_client_website'),
					'source' => $this->input->post('existing_client_source'),
					'Interest' => $this->input->post('existing_client_interest'),
					'Type' => $this->input->post('existing_client_type'),
					'Notes' => $this->input->post('existing_client_notes')
				]
			);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function delete_existing_client()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [

			[
				'field' => 'existing_client_id_del',
				'label' => 'Client ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Client.'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;


			$this->SalesInquiryModel->delete_existing_client($this->input->post('existing_client_id_del'), [
				'is_deleted' => '1'
			]);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function add_branch()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [

			[
				'field' => 'project_branch',
				'label' => 'Project Branch Name',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Add Project Branch Name'
				]
			],
			[
				'field' => 'project_address',
				'label' => 'branch Address',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Add Branch Address'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');

			$this->SalesInquiryModel->insert_branch([
				'customer_id' => $this->input->post('client_id'),
				'branch_name' => $this->input->post('project_branch'),
				'branch_address' => $this->input->post('project_address'),
				'client_status' => $this->input->post('client_status')
			]);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	// Export to CSV ( must be in result->array() )
	function exportnewclientsproject()
	{
		$file_name = 'New_Clients_Project_List_' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv;");

		// file creation 
		$file = fopen('php://output', 'w');

		$header = [
			'Customer Name',
			'Project ID',
			'Project Status',
			'Sales Incharge',
			'Project Type',
			'Branch'
		];
		fputcsv($file, $header);

		// get data
		$results = $this->SalesInquiryModel->getNewClientsList();
		$name = "";
		$loop_id = 0;
		foreach ($results as $row) {

			if ($row->project_status == "10%") {
				$project_status = "Identified Process";
			} elseif ($row->project_status == "30%") {
				$project_status = "Qualified";
			} elseif ($row->project_status == "50%") {
				$project_status = "Developing Solution";
			} elseif ($row->project_status == "70%") {
				$project_status = "Evaluation";
			} elseif ($row->project_status == "90%") {
				$project_status = "Negotiation";
			} elseif ($row->project_status == "100%") {
				$project_status = "Booked";
			}

			//if($row->project_date == "0000-00-00"){
			//		$project_date = "";
			//	}
			//	else{
			//		$project_date = $row->project_date;
			//	}


			$sub_array = array();

			if ($name == $row->customer_name) {
				$sub_array[] = "";
				$sub_array[] = $row->project_id;
				$sub_array[] = $project_status;
				$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
				//$sub_array[] = $project_date;
				$sub_array[] = $row->project_type;
				$sub_array[] = $row->branch;
				fputcsv($file, $sub_array);
				$loop_id = 1;
			} else {
				if ($loop_id == 0) {
					$sub_array[] = $row->customer_name;
					$sub_array[] = $row->project_id;
					$sub_array[] = $project_status;
					$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
					//$sub_array[] = $project_date;
					$sub_array[] = $row->project_type;
					$sub_array[] = $row->branch;
					fputcsv($file, $sub_array);
				} else {
					$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					//$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					//fputcsv($file, $sub_array);

					$sub_array = array();
					$sub_array[] = $row->customer_name;
					$sub_array[] = $row->project_id;
					$sub_array[] = $project_status;
					$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
					//$sub_array[] = $project_date;
					$sub_array[] = $row->project_type;
					$sub_array[] = $row->branch;
					fputcsv($file, $sub_array);
				}
			}
			$name = $row->customer_name;
		}
		fclose($file);


		exit;
	}

	// Export to CSV ( must be in result->array() )
	function exportexistingclientsproject()
	{

		$file_name = 'Existing_Clients_Project_List_' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv;");

		// file creation 
		$file = fopen('php://output', 'w');

		$header = [
			'Customer Name',
			'Project ID',
			'Project Status',
			'Sales Incharge',
			'Project Type',
			'Branch'
		];
		fputcsv($file, $header);

		// get data
		$results = $this->SalesInquiryModel->getExistingClientsList();
		$name = "";
		$loop_id = 0;
		foreach ($results as $row) {

			if ($row->project_status == "10%") {
				$project_status = "Identified Process";
			} elseif ($row->project_status == "30%") {
				$project_status = "Qualified";
			} elseif ($row->project_status == "50%") {
				$project_status = "Developing Solution";
			} elseif ($row->project_status == "70%") {
				$project_status = "Evaluation";
			} elseif ($row->project_status == "90%") {
				$project_status = "Negotiation";
			} elseif ($row->project_status == "100%") {
				$project_status = "Booked";
			}

			//if($row->project_date == "0000-00-00"){
			//	$project_date = "";
			//}
			//else{
			//	$project_date = $row->project_date;
			//}

			$sub_array = array();

			if ($name == $row->CompanyName) {
				$sub_array[] = "";
				$sub_array[] = $row->project_id;
				$sub_array[] = $project_status;
				$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
				//$sub_array[] = $project_date;
				$sub_array[] = $row->project_type;
				$sub_array[] = $row->branch;
				fputcsv($file, $sub_array);
				$loop_id = 1;
			} else {
				if ($loop_id == 0) {
					$sub_array[] = $row->CompanyName;
					$sub_array[] = $row->project_id;
					$sub_array[] = $project_status;
					$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
					//$sub_array[] = $project_date;
					$sub_array[] = $row->project_type;
					$sub_array[] = $row->branch;
					fputcsv($file, $sub_array);
				} else {
					$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					//$sub_array[] = "";
					$sub_array[] = "";
					$sub_array[] = "";
					fputcsv($file, $sub_array);

					$sub_array = array();
					$sub_array[] = $row->CompanyName;
					$sub_array[] = $row->project_id;
					$sub_array[] = $project_status;
					$sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
					//$sub_array[] = $project_date;
					$sub_array[] = $row->project_type;
					$sub_array[] = $row->branch;
					fputcsv($file, $sub_array);
				}
			}
			$name = $row->CompanyName;
		}
		fclose($file);
		exit;
	}

	public function reject_project_validate(){
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'reject_project_id',
				'label' => 'Project ID',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Project'
				]
			],
			[
				'field' => 'reason',
				'label' => 'Reason',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Enter Reasons / Remarks'
				]
			]
		];


		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d');


			$this->SalesInquiryModel->reject_branch($this->input->post('reject_project_id'),[
				'archive' => "1",
				'reason' => $this->input->post('reason')
			]);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function archive_projects_list()
	{
		if ($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Archive Projects';
			$data['inquiry_status'] = ' menu-open';
			$data['sales_tree_status'] = ' menu-open';
			$data['inquiry_href'] = ' active';
			$data['inquiry_archive'] = ' active';
			$data['ul_sales_tree'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('sales_inquiry/archive_projects_view');
			$this->load->view('templates/footer');
			$this->load->view('sales_inquiry/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function get_archive_projects_list()
	{

		$fetch_data = $this->SalesInquiryModel->archiveprojects_datatable();
		$fetch_new_customer = $this->SalesInquiryModel->fetch_customer();
		$fetch_customer_existing = $this->SalesInquiryModel->fetch_customer_existing();

		$data = array();
		foreach ($fetch_data as $row) {
			$customer_name = "";
			$date_of_task = '';
			if ($row->date_of_task != '0000-00-00') {
				$date_of_task = date_format(date_create($row->date_of_task), 'F d, Y');
			}

			foreach($fetch_new_customer as $row2){
				if($row->customer_id == $row2->id && $row->client_status == "new"){
					$customer_name = $row2->customer_name;
				}
			}

			foreach ($fetch_customer_existing as $row3) {
				if ($row->customer_id == $row3->CustomerID && $row->client_status == "existing") {
					$customer_name = $row3->CompanyName;
				}
			}

			$sub_array = array();
			$sub_array[] = $row->project_id;
			$sub_array[] = $customer_name;
			$sub_array[] = $row->project_type;
			$sub_array[] = $row->project_status;
			$sub_array[] = $row->lastname.", ".$row->firstname." ".$row->middlename;
			$sub_array[] = $row->branch;
			$sub_array[] = $row->project_task;
			$sub_array[] = $date_of_task;
			$sub_array[] = $row->reason;
			$sub_array[] = '
<a href="#" class="btn btn-primary btn-xs btn-block btn_archive_view" target="_blank" data-toggle="modal" data-target=".modal_view_archive_project"><i class="fas fa-search"></i>  View Client</a>
';
			$data[] = $sub_array;
		}

		

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->SalesInquiryModel->get_archive_projects_data(),
			"recordsFiltered" => $this->SalesInquiryModel->filter_archive_projects_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function get_archive_project($project_id)
	{
		$results_new = $this->SalesInquiryModel->get_clients_data($project_id);
		$results_existing = $this->SalesInquiryModel->get_existing_clients_data($project_id);
		
		$data = array();
		if(!empty($results_new)){
			foreach($results_new as $row){
				$sub_data = array();
				$sub_data['id'] = $row->id;
				$sub_data['customer_name'] = $row->customer_name;
				$sub_data['contact_person'] = $row->contact_person;
				$sub_data['contact_number'] = $row->contact_number;
				$sub_data['email_add'] = $row->email_add;
				$sub_data['location'] = $row->location;
				$sub_data['website'] = $row->website;
				$sub_data['source'] = $row->source;
				$sub_data['interest'] = $row->interest;
				$sub_data['type'] = $row->type;
				$sub_data['notes'] = $row->notes;

				$data[] = $sub_data;
			}
		
		}
		elseif(!empty($results_existing)){
			foreach($results_existing as $row){
				$sub_data = array();
				$sub_data['id'] = $row->CustomerID;
				$sub_data['customer_name'] = $row->CompanyName;
				$sub_data['contact_person'] = $row->ContactPerson;
				$sub_data['contact_number'] = $row->ContactNumber;
				$sub_data['email_add'] = $row->EmailAddress;
				$sub_data['location'] = $row->Address;
				$sub_data['website'] = $row->Website;
				$sub_data['source'] = $row->source;
				$sub_data['interest'] = $row->Interest;
				$sub_data['type'] = $row->Type;
				$sub_data['notes'] = $row->Notes;

				$data[] = $sub_data;
			}
		
		}
		$json_data['results'] = $data;

		echo json_encode($json_data);
	}

	public function get_branch($client_id, $client_status)
	{
		$results = $this->SalesInquiryModel->get_branch_data($client_id, $client_status);		

		$json_data['results'] = $results;

		echo json_encode($json_data);
	}


	public function update_branch_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [

			[
				'field' => 'edit_branch_name',
				'label' => 'Branch Name',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Provide Branch Name'
				]
			],
			[
				'field' => 'edit_branch_address',
				'label' => 'Branch Address',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Provide Branch Address'
				]
			]

		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$this->SalesInquiryModel->update_branch_details($this->input->post('edit_branch_id'),[
				'branch_name' => $this->input->post('edit_branch_name'),
				'branch_address' => $this->input->post('edit_branch_name')
			]);

			$this->SalesInquiryModel->update_projects_branch($this->input->post('edit_branch_id'),[
				'branch' => $this->input->post('edit_branch_name')
			]);
		} else {
			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

}