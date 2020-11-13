<?php
defined('BASEPATH') or die('Access Denied');

class JobOrderController extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model('JobOrderModel');
	}

	function validation_rules()
	{
		$rules = [
			[
				'field' => 'customer',
				'label' => 'Select Customer',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select a customer.'
				]
			],
			[
				'field' => 'date_requested',
				'label' => 'Date Requested',
				'rules' => 'trim|required'
			],
			[
				'field' => 'service_type',
				'label' => 'Project Type',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Project Type.'
				]
			],
			[
				'field' => 'service_type',
				'label' => 'Project Type',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Project Type.'
				]
			],
			[
				'field' => 'scope[]',
				'label' => 'Scope',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Scope.'
				]
			],
			[
				'field' => 'comments',
				'label' => 'Comments/Remarks',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Comments/Remarks.'
				]
			],
			[
				'field' => 'date_reported',
				'label' => 'Date Reported',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Date Reported.'
				]
			],
			[
				'field' => 'requestor',
				'label' => 'Requested By',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Requested By.'
				]
			],
			[
				'field' => 'date_scheduled',
				'label' => 'Date Scheduled',
				'rules' => 'trim'
			],
			[
				'field' => 'under_warranty',
				'label' => 'Under Warranty',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Under Warranty.'
				]
			]
		];

		return $rules;
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->model('CustomersModel');
			$this->load->model('TechniciansModel');

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Job Order';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['servicecall'] = ' active';
			$data['customers'] = $this->CustomersModel->getVtCustomersByID();
			$data['employees'] = $this->TechniciansModel->getTechniciansByStatus();
			$data['latest_joborder'] = $this->JobOrderModel->get_latest_job_order();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('job_order/job_order');
			$this->load->view('templates/footer');
			$this->load->view('job_order/script');
		} else {
			redirect('', 'refresh');
		}
	}


	public function add_existing_customer()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = $this->validation_rules();

		$this->form_validation->set_error_delimiters('<p>', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$data = [
				'customer_id' => $this->input->post('customer'),
				'date_requested' => $this->input->post('date_requested'),
				'type_of_project' => $this->input->post('service_type'),
				'comments' => $this->input->post('comments'),
				'date_reported' => $this->input->post('date_reported'),
				'commited_schedule' => $this->input->post('date_scheduled'),
				'requested_by' => $this->input->post('requestor'),
				'under_warranty' => $this->input->post('under_warranty')
			];

			$this->JobOrderModel->add_joborder($data);
			$latest_joborder = $this->JobOrderModel->get_latest_job_order();

			foreach ($latest_joborder as $row) {
				$job_order_id = $row->id;
			}


			for ($i = 0; $i < count($this->input->post('scope')); $i++) {

				switch ($this->input->post('scope')[$i]) {
					case 'CCTV':
						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'cctv' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'cctv' => 1
								]
							);
						}
						break;

					case 'Biometrics/Access Control':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'biometrics' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'biometrics' => 1
								]
							);
						}
						break;

					case 'FDAS':
						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'fdas' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'fdas' => 1
								]
							);
						}
						break;

					case 'Intrusion Alarm':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'intrusion_alarm' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'intrusion_alarm' => 1
								]
							);
						}
						break;

					case 'PABX':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'pabx' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'pabx' => 1
								]
							);
						}
						break;

					case 'Gate Barrier':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'gate_barrier' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'gate_barrier' => 1
								]
							);
						}
						break;

					case 'E-Fence':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'efence' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'efence' => 1
								]
							);
						}
						break;

					case 'Structured Cabling':

						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'structured_cabling' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'structured_cabling' => 1
								]
							);
						}
						break;

					case 'PABGM':
						if ($i == 0) {
							$this->JobOrderModel->add_joborder_scope([
								'job_order_id' => $job_order_id,
								'pabgm' => 1
							]);
						} else {
							$this->JobOrderModel->update_joborder_scope(
								$job_order_id,
								[
									'pabgm' => 1
								]
							);
						}
						break;
				}
			}
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function job_order_list($decision)
	{

		if ($this->session->userdata('logged_in')) {

			$this->load->model('CustomersModel');
			$this->load->model('TechniciansModel');

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Job Order';
			$data['forms_menu_status'] = ' menu-open';
			$data['ul_forms'] = ' active';
			$data['servicecall'] = ' active';
			$data['decision'] = $decision;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('job_order/job_order_table');
			$this->load->view('templates/footer');
			$this->load->view('job_order/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function update_job_order_decision()
	{

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'decision',
				'label' => 'Decision',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select JOB ORDER.'
				]
			],
			[
				'field' => 'committed_schedule',
				'label' => 'Committed Schedule',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select committed date.'
				]
			]
		];

		$this->form_validation->set_error_delimiters('<p>', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;

			$id = $this->input->post('job_order_id');
			$data = [
				'decision' => $this->input->post('decision'),
				'commited_schedule' => $this->input->post('committed_schedule')
			];

			$this->JobOrderModel->update_joborder($id, $data);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function update_job_order_filejo()
	{

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'job_filejo_id',
				'label' => 'Decision',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select JOB ORDER.'
				]
			],
			[
				'field' => 'decision_filejo',
				'label' => 'Decision',
				'rules' => 'trim'
			],
			[
				'field' => 'remarks',
				'label' => 'Remarks',
				'rules' => 'trim'
			]
		];

		$this->form_validation->set_error_delimiters('<p>', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$validate['success'] = true;
			date_default_timezone_set('Asia/Manila');

			$id = $this->input->post('job_filejo_id');
			$data = [
				'decision' => $this->input->post('decision_filejo'),
				'date_filed' => date('Y-m-d'),
				'remarks' => $this->input->post('remarks')
			];

			$this->JobOrderModel->update_joborder($id, $data);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function fetch_joborder($where)
	{

		$fetch_data = $this->JobOrderModel->job_order_datatable($where);



		$data = array();

		foreach ($fetch_data as $row) {
			$scope = array();
			$sub_scope = array();
			$sub_array = array();
			$date_requested = 'None';
			$date_reported = 'None';
			$committed_schedule = 'None';
			$middle_name = ' ';

			if ($row->cctv == 1) {
				$sub_scope[] = 'CCTV';
			}
			if ($row->biometrics == 1) {
				$sub_scope[] = 'AC/Biometrics';
			}
			if ($row->fdas == 1) {
				$sub_scope[] = 'FDAS';
			}
			if ($row->intrusion_alarm == 1) {
				$sub_scope[] = 'Intrusion Alarms';
			}
			if ($row->pabx == 1) {
				$sub_scope[] = 'PABX Systems';
			}
			if ($row->gate_barrier == 1) {
				$sub_scope[] = 'Gate Barriers';
			}
			if ($row->efence == 1) {
				$sub_scope[] = 'E-Fence';
			}
			if ($row->structured_cabling == 1) {
				$sub_scope[] = 'Structured Cabling';
			}
			if ($row->gate_barrier == 1) {
				$sub_scope[] = 'Gate Barriers';
			}

			if ($row->date_requested != '0000-00-00') {
				$date_requested = date_format(date_create($row->date_reported), 'F d, Y');
			}
			if ($row->date_reported != '0000-00-00') {
				$date_reported = date_format(date_create($row->date_requested), 'F d, Y');
			}
			if ($row->commited_schedule != '0000-00-00') {
				$committed_schedule = date_format(date_create($row->commited_schedule), 'F d, Y');
			}

			if ($row->middlename != '') {
				$middle_name = ' ' . $row->middlename[0] . '. ';
			}

			if ($where == 'Accepted') {
				$decision = '<button class="btn btn-success btn-xs text-bold btn-block btn_filejo" data-toggle="modal" data-target=".modal-filejo"><i class="fas fa-file-archive"></i> FILE J.O.</button>';
			} elseif($where == 'Filed') {

				// Shortened If/Else with Ternary Operator
				$decision = ($row->date_filed == '0000-00-00') ? 'None' : date_format(date_create($row->date_filed), 'F d, Y');

			} else {
				$decision = '
					<button type="button" class="btn btn-success btn-xs text-bold btn-block btn_accepted" data-toggle="modal" data-target=".modal-decision"><i class="fas fa-check"></i> ACCEPT</button>
					<button type="button" class="btn btn-danger btn-xs text-bold btn-block btn_discarded" data-toggle="modal" data-target=".modal-decision"><i class="fas fa-times"></i> DISCARD</button>
					<button class="btn btn-success btn-xs text-bold btn-block btn_filejo" data-toggle="modal" data-target=".modal-filejo"><i class="fas fa-file-archive"></i> FILE J.O.</button>

				';
			}

			$scope[] = $sub_scope;

			$sub_array[] = $row->joborder_id;
			$sub_array[] = $decision;
			$sub_array[] = $committed_schedule;
			$sub_array[] = $row->CompanyName;
			$sub_array[] = $scope;
			$sub_array[] = $date_requested;
			$sub_array[] = $row->type_of_project;
			$sub_array[] = str_replace("\n", "<br>", $row->comments);
			$sub_array[] = $date_reported;
			$sub_array[] = $row->firstname . $middle_name . $row->lastname;
			$sub_array[] = $row->under_warranty;
			$sub_array[] = $row->remarks;
			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->JobOrderModel->get_all_job_order_data($where),
			"recordsFiltered" => $this->JobOrderModel->filter_job_order_data($where),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function fetch_joborder_pending()
	{
		return $this->fetch_joborder('');
	}

	public function fetch_joborder_accepted()
	{
		return $this->fetch_joborder('Accepted');
	}

	public function fetch_joborder_filed()
	{
		return $this->fetch_joborder('Filed');
	}

	public function print_joborder($where)
	{
		if($this->session->userdata('logged_in')) {


            $results = $this->JobOrderModel->select_job_order($where);

			$data = [
                'title' => 'Print Job Order',
                'results' => $results
            ];
            
			$this->load->view('job_order/print_joborder',$data);

		} else {
			redirect('', 'refresh');
		}
	}
}
