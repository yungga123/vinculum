<?php
defined('BASEPATH') or die('Access Denied');

class SchedulesController extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->model("CalendarModel");
    }

	public function index() {

		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Schedules';
			$data['schedules'] = ' active';
			$data['results'] = $this->CalendarModel->get_events();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('schedules/schedules');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}

	}

	// public function get_events() {

	// 	date_default_timezone_set('Asia/Manila');

	// 	$start = $this->input->get("start");
	//      $end = $this->input->get("end");

	     

	//      $startdt = new DateTime('now'); // setup a local datetime
	//      $startdt->setTimestamp($start); // Set the date based on timestamp
	//      $start_format = $startdt->format('Y-m-d H:i:s');

	//      $enddt = new DateTime('now'); // setup a local datetime
	//      $enddt->setTimestamp($end); // Set the date based on timestamp
	//      $end_format = $enddt->format('Y-m-d H:i:s');

	//      $events = $this->CalendarModel->get_event($start_format, $end_format);

	// 		$data_events = array();

	// 	foreach ($events as $row) {
	// 		$data_events[] = [
	// 			"id" => $row->id,
	// 			"title" => $row->title,
	// 			"start" => $row->start,
	// 			"end" => $row->end,
	// 			"description" => $row->description,
	// 			"type" => $row->type
	// 		];
	// 	}

	// 	echo json_encode($data_events);
	// }

	public function addEventValidate() {

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'event_title',
				'label' => 'Title',
				'rules' => 'trim|max_length[500]|required|alpha_numeric_spaces',
				'errors' => [
					'max_length' => 'Title character limit is 500',
					'required' => 'Please provide title.',
					'alpha_numeric_spaces' => 'Title must only contain letters, numbers and spaces.'
				]
			],
			[
				'field' => 'event_sd',
				'label' => 'Start Date',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Start Date',
				]
			],
			[
				'field' => 'event_ed',
				'label' => 'End Date',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select End Date',
				]
			],
			[
				'field' => 'event_desc',
				'label' => 'Description',
				'rules' => 'trim|required|max_length[1000]',
				'errors' => [
					'required' => 'Please provide description.',
					'max_length' => 'Description character limit is 1000.'
				]
			],
			[
				'field' => 'event_type',
				'label' => 'Type',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please Select Event Type.'
				]
			]
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$this->CalendarModel->add_events([
				'title' => $this->input->post('event_title'),
				'start' => $this->input->post('event_sd'),
				'end' => $this->input->post('event_ed'),
				'description' => $this->input->post('event_desc'),
				'type' => $this->input->post('event_type')
			]);

		} 
		else {

			$validate['errors'] = validation_errors();

		}
		echo json_encode($validate);

	}
}