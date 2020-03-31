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

	public function updateEventValidate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];


		$id = $this->input->post('event_id_edit');
		$delete = intval($this->input->post('delete_event_check'));

		if (!$delete) {

			$rules = [
				[
					'field' => 'event_id_edit',
					'label' => 'Title',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please select an event.'
					]
				],
				[
					'field' => 'event_title_edit',
					'label' => 'Title',
					'rules' => 'trim|max_length[500]|required|alpha_numeric_spaces',
					'errors' => [
						'max_length' => 'Title character limit is 500',
						'required' => 'Please provide title.',
						'alpha_numeric_spaces' => 'Title must only contain letters, numbers and spaces.'
					]
				],
				[
					'field' => 'event_sd_edit',
					'label' => 'Start Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select Start Date',
					]
				],
				[
					'field' => 'event_ed_edit',
					'label' => 'End Date',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please Select End Date',
					]
				],
				[
					'field' => 'event_desc_edit',
					'label' => 'Description',
					'rules' => 'trim|required|max_length[1000]',
					'errors' => [
						'required' => 'Please provide description.',
						'max_length' => 'Description character limit is 1000.'
					]
				],
				[
					'field' => 'event_type_edit',
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
				$this->CalendarModel->update_events($id,[
					'title' => $this->input->post('event_title_edit'),
					'start' => $this->input->post('event_sd_edit'),
					'end' => $this->input->post('event_ed_edit'),
					'description' => $this->input->post('event_desc_edit'),
					'type' => $this->input->post('event_type_edit')
				]);

			} 
			else {

				$validate['errors'] = validation_errors();

			}
			echo json_encode($validate);
		} else {

			$validate['success'] = true;
			$this->CalendarModel->delete_events($id);

			echo json_encode($validate);

		}
	}
}