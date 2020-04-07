<?php
defined('BASEPATH') or die('Access Denied');

class ProjectReportController extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->model("ProjectReportModel");
    }

    function validation_rules() {
    	$rules = [
			[
				'field' => 'project_name',
				'label' => 'Project Name',
				'rules' => 'trim|required|max_length[1000]',
				'errors' => [
					'required' => 'Please provide project name.',
					'max_length' => 'Project Name maximum characters is 1000.'
				]
			],
			[
				'field' => 'project_description',
				'label' => 'Project Description',
				'rules' => 'trim|required|max_length[1000]',
				'errors' => [
					'required' => 'Please provide project description.',
					'max_length' => 'Project Description maximum characters is 1000.'
				]
			],
			[
				'field' => 'date_requested',
				'label' => 'Date Requested',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide date requested.'
				]
			],
			[
				'field' => 'date_implemented',
				'label' => 'Date Implemented',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide date implemented.'
				]
			],
			[
				'field' => 'date_finished',
				'label' => 'Date Finished',
				'rules' => 'trim'
			],
			[
				'field' => 'petty_cash[]',
				'label' => 'Petty Cash',
				'rules' => 'trim|numeric|max_length[18]',
				'errors' => [
					'numeric' => 'Petty Cash must be numbers.',
					'max_length' => 'Petty Cash max length is 18.'
				]
			],
			[
				'field' => 'petty_cash_date[]',
				'label' => 'Petty Cash Date',
				'rules' => 'trim',
				'errors' => [
					'' => ''
				]
			],
			[
				'field' => 'petty_cash_remarks[]',
				'label' => 'Petty Cash Remarks',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Petty Cash remarks max length is 1000.'
				]
			],
			[
				'field' => 'transpo[]',
				'label' => 'Transpo',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Transpo max length is 18.',
					'numeric' => 'Transpo must contain numbers.'
				]
			],
			[
				'field' => 'transpo_date[]',
				'label' => 'Transpo Date',
				'rules' => 'trim',
				'errors' => [
					'' => ''
				]
			],
			[
				'field' => 'transpo_remarks[]',
				'label' => 'Transpo Remarks',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Transpo max length is 1000.'
				]
			],
			[
				'field' => 'indirect_item[]',
				'label' => 'Indirect Item',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Indirect item max length is 1000.'
				]
			],
			[
				'field' => 'indirect_item_quantity[]',
				'label' => 'Indirect Item Quantity',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Indirect item quantity max length is 18.',
					'numeric' => 'Indirect item quantity must contain numbers'
				]
			],
			[
				'field' => 'indirect_item_amount[]',
				'label' => 'Indirect Item Amount',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Indirect item amount max length is 18.',
					'numeric' => 'Indirect item amount must contain numbers'
				]
			],
			[
				'field' => 'indirect_item_consumed[]',
				'label' => 'Indirect Item Consumed',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Indirect item consumed max length is 18.',
					'numeric' => 'Indirect item consumed must contain numbers'
				]
			],
			[
				'field' => 'indirect_item_returns[]',
				'label' => 'Indirect Item Returns',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Indirect item returns max length is 18.',
					'numeric' => 'Indirect item returns must contain numbers'
				]
			],
			[
				'field' => 'indirect_item_remarks[]',
				'label' => 'Indirect Item Remarks',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Indirect item returns max length is 1000.'
				]
			],
			[
				'field' => 'direct_item[]',
				'label' => 'Direct Item',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Direct item max length is 1000.'
				]
			],
			[
				'field' => 'direct_item_quantity[]',
				'label' => 'Direct Item Quantity',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Direct item quantity max length is 18.',
					'numeric' => 'Direct Item Quantity must contain numbers.'
				]
			],
			[
				'field' => 'direct_item_amount[]',
				'label' => 'Direct Item Amount',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Direct Item Amount max length is 18.',
					'numeric' => 'Direct Item Amount must contain numbers.'
				]
			],
			[
				'field' => 'direct_item_consumed[]',
				'label' => 'Direct Item Consumed',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Direct Item Consumed max length is 18.',
					'numeric' => 'Direct Item Consumed must contain numbers.'
				]
			],
			[
				'field' => 'direct_item_returns[]',
				'label' => 'Direct Item Returns',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Direct Item Returns max length is 18.',
					'numeric' => 'Direct Item Returns must contain numbers.'
				]
			],
			[
				'field' => 'direct_item_remarks[]',
				'label' => 'Direct Item Remarks',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Direct Item Remarks max length is 1000.'
				]
			],
			[
				'field' => 'tool_requested[]',
				'label' => 'Tool Requested',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Tool Requested max length is 1000.'
				]
			],
			[
				'field' => 'tool_requested_quantity[]',
				'label' => 'Tool Requested Quantity',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Tool Requested Quantity max length is 18.',
					'numeric' => 'Tool Requested Quantity must contain numbers.'
				]
			],
			[
				'field' => 'tool_requested_return[]',
				'label' => 'Tool Requested Return',
				'rules' => 'trim|max_length[18]|numeric',
				'errors' => [
					'max_length' => 'Tool Requested Return max length is 18.',
					'numeric' => 'Tool Requested Return must contain numbers.'
				]
			],
			[
				'field' => 'tool_requested_remarks[]',
				'label' => 'Tool Requested Remarks',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Tool Requested Remarks max length is 1000.'
				]
			],
			[
				'field' => 'assigned_it[]',
				'label' => 'Assigned IT',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Assigned IT max length is 1000.'
				]
			],
			[
				'field' => 'assigned_tech[]',
				'label' => 'Assigned Technician',
				'rules' => 'trim|max_length[1000]',
				'errors' => [
					'max_length' => 'Assigned Technician max length is 1000.'
				]
			]

		];

		return $rules;
    }

    public function index() {
    	if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Report';
			$data['project_report'] = ' menu-open';
			$data['project_report_href'] = ' active';
			$data['project_report_add'] = ' active';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('project_report/project_report');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
    }

    public function addProjReportValidate() {

    	$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$pr_id = 0;
			$count_pettycash = count($this->input->post('petty_cash'));
			$count_transpo = count($this->input->post('transpo'));
			$count_indirect = count($this->input->post('indirect_item'));
			$count_direct = count($this->input->post('direct_item'));
			$count_tool_requested = count($this->input->post('tool_requested'));
			$count_assigned_it = count($this->input->post('assigned_it'));
			$count_assigned_tech = count($this->input->post('assigned_tech'));

			$this->ProjectReportModel->insert_projectreport([
				'name' => $this->input->post('project_name'),
				'description' => $this->input->post('project_description'),
				'date_requested' => $this->input->post('date_requested'),
				'date_implemented' => $this->input->post('date_implemented'),
				'date_finished' => $this->input->post('date_finished')
			]);

			$results = $this->ProjectReportModel->get_project_report();

			foreach ($results as $row) {
				$pr_id = $row->id;
			}


			//add petty
			for ($i=0; $i < $count_pettycash; $i++) { 
				$this->ProjectReportModel->insert_petty_cash([
					'petty_cash' => $this->input->post('petty_cash')[$i],
					'date' => $this->input->post('petty_cash_date')[$i],
					'remarks' => $this->input->post('petty_cash_remarks')[$i],
					'pr_id' => $pr_id
				]);
			}


			//add transpo
			for ($i=0; $i < $count_transpo; $i++) { 
				$this->ProjectReportModel->insert_transpo([
					'transpo' => $this->input->post('transpo')[$i],
					'date' => $this->input->post('transpo_date')[$i],
					'remarks' => $this->input->post('transpo_remarks')[$i],
					'pr_id' => $pr_id
				]);
			}

			//add indirect
			for ($i=0; $i < $count_indirect; $i++) { 
				$this->ProjectReportModel->insert_indirect_item([
					'indirect_item' => $this->input->post('indirect_item')[$i],
					'qty' => $this->input->post('indirect_item_quantity')[$i],
					'amt' => $this->input->post('indirect_item_amount')[$i],
					'consumed' => $this->input->post('indirect_item_consumed')[$i],
					'returns' => $this->input->post('indirect_item_returns')[$i],
					'remarks' => $this->input->post('indirect_item_remarks')[$i],
					'pr_id' => $pr_id
				]);
			}

			//add direct
			for ($i=0; $i < $count_direct; $i++) { 
				$this->ProjectReportModel->insert_direct_item([
					'direct_item' => $this->input->post('direct_item')[$i],
					'qty' => $this->input->post('direct_item_quantity')[$i],
					'amt' => $this->input->post('direct_item_amount')[$i],
					'consumed' => $this->input->post('direct_item_consumed')[$i],
					'returns' => $this->input->post('direct_item_returns')[$i],
					'remarks' => $this->input->post('direct_item_remarks')[$i],
					'pr_id' => $pr_id
				]);
			}

			//add tools
			for ($i=0; $i < $count_tool_requested; $i++) { 
				$this->ProjectReportModel->insert_tools_rqstd([
					'tool_rqstd' => $this->input->post('tool_requested')[$i],
					'qty' => $this->input->post('tool_requested_quantity')[$i],
					'returns' => $this->input->post('tool_requested_return')[$i],
					'remarks' => $this->input->post('tool_requested_remarks')[$i],
					'pr_id' => $pr_id
				]);
			}

			//add assigned it
			for ($i=0; $i < $count_assigned_it; $i++) { 
				$this->ProjectReportModel->insert_assigned_it([
					'assigned_it' => $this->input->post('assigned_it')[$i],
					'pr_id' => $pr_id
				]);
			}

			for ($i=0; $i < $count_assigned_tech; $i++) { 
				$this->ProjectReportModel->insert_assigned_tech([
					'assigned_tech' => $this->input->post('assigned_tech')[$i],
					'pr_id' => $pr_id
				]);
			}

		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function projectReportList() {
    	if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Report List';
			$data['project_report'] = ' menu-open';
			$data['project_report_href'] = ' active';
			$data['project_report_list'] = ' active';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('project_report/project_report_list');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
    }

    public function get_project_report() {

		$fetch_data = $this->ProjectReportModel->projectReport_datatable();


		$data = array();
		foreach($fetch_data as $row) {
			$dateRequested = '';
			$dateImplemented = '';
			$dateFinished = '';

			if ($row->date_requested != '0000-00-00') {
				$dateRequested = date_format(date_create($row->date_requested),'F d, Y');
			}

			if ($row->date_implemented != '0000-00-00') {
				$dateImplemented = date_format(date_create($row->date_implemented),'F d, Y');
			}

			if ($row->date_finished != '0000-00-00') {
				$dateFinished = date_format(date_create($row->date_finished),'F d, Y');
			}

			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->name;
			$sub_array[] = $row->description;
			$sub_array[] = $dateRequested;
			$sub_array[] = $dateImplemented;
			$sub_array[] = $dateFinished;

			$sub_array[] = '

			<a href="'.site_url('project-report-update/'.$row->id).'" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> 

			<button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>

			<a href="'.site_url('project-report-view/'.$row->id).'" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-search"></i></a>

			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->ProjectReportModel->get_all_projectReport_data(),
			"recordsFiltered" => $this->ProjectReportModel->filter_projectReport_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function projectReportView($id) {
		if($this->session->userdata('logged_in')) {


			
			$data = [
				'title' => 'Print',
				'results' => $this->ProjectReportModel->getProjectReport($id),
				'results_petty_cash' => $this->ProjectReportModel->getPettyCash($id),
				'results_transpo' => $this->ProjectReportModel->getTranspo($id),
				'results_indirectItems' => $this->ProjectReportModel->getIndirectItems($id),
				'results_directItems' => $this->ProjectReportModel->getDirectItems($id),
				'results_toolRqstd' => $this->ProjectReportModel->getToolsRqstd($id),
				'results_assignedIT' => $this->ProjectReportModel->getAssignedIT($id),
				'results_assignedTech' => $this->ProjectReportModel->getAssignedTech($id)
			];
			$this->load->view('project_report/project_report_view',$data);

		} else {
			redirect('', 'refresh');
		}
	}

	public function project_report_update($id) {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Project Report Update';
			$data['project_report'] = ' menu-open';
			$data['project_report_href'] = ' active';
			$data['project_report_list'] = ' active';

			$data['project_details'] = $this->ProjectReportModel->getProjectReport($id);
			$data['petty_cash'] = $this->ProjectReportModel->getPettyCash($id);
			$data['transpo'] = $this->ProjectReportModel->getTranspo($id);
			$data['indirect_items'] = $this->ProjectReportModel->getIndirectItems($id);
			$data['direct_items'] = $this->ProjectReportModel->getDirectItems($id);
			$data['tools_rqstd'] = $this->ProjectReportModel->getToolsRqstd($id);
			$data['assigned_it'] = $this->ProjectReportModel->getAssignedIT($id);
			$data['assigned_tech'] = $this->ProjectReportModel->getAssignedTech($id);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('project_report/project_report_edit');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
	}

	public function projectReportUpdateValidate() {

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$this->ProjectReportModel->updateProjectReport(
				$this->input->post('project_id'),
				[
					'name' => $this->input->post('project_name'),
					'description' => $this->input->post('project_description'),
					'date_requested' => $this->input->post('date_requested'),
					'date_implemented' => $this->input->post('date_implemented'),
					'date_finished' => $this->input->post('date_finished')
				]
			);

		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

}