<?php
defined('BASEPATH') or exit('No direct script access allowed');


class LogsController extends CI_Controller {

					
	public function index() {
		if ($this->session->userdata('logged_in')) {
			$this->load->model('RegisterHistoryModel');
			$this->load->model('DeleteHistoryModel');
			$result_register_history = $this->RegisterHistoryModel->getRegisterHistory();
			$result_delete_history = $this->DeleteHistoryModel->getDeleteHistory();


			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Item History';
			$data['history'] = ' active';
			$data['specific'] = FALSE;
			$data['results'] = $result_register_history;
			$data['results2'] = $result_delete_history;

			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('items/history/items_logs');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
	}

	
	public function print_register_logs() {
		$validate = [
			'success' => false,
			'errors' => ''
		];
		$rules = [
			[
				'field' => 'start_date',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			],
			[
				'field' => 'end_date',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			]

		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$this->load->model('RegisterHistoryModel');

			$dateFrom = $this->input->post('start_date');
			$dateTo = $this->input->post('end_date');
			$results = $this->RegisterHistoryModel->getSpecificRegisterHistory($dateFrom,$dateTo);
			$data = [
				'title' => 'Print History',

				'results' => $results
			];
			$this->load->view('items/history/print_item_logs',$data);
		} else {
			redirect('');
		}
	}

	public function print_deleted_logs() {
		$validate = [
			'success' => false,
			'errors' => ''
		];
		$rules = [
			[
				'field' => 'start_date',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			],
			[
				'field' => 'end_date',
				'label' => 'Item Code',
				'rules' => 'trim|required'
			]

		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$this->load->model('DeleteHistoryModel');

			$dateFrom = $this->input->post('start_date');
			$dateTo = $this->input->post('end_date');
			$results = $this->DeleteHistoryModel->getSpecificDeleteHistory($dateFrom,$dateTo);
			$data = [
				'title' => 'Delete History',

				'results' => $results
			];
			$this->load->view('items/history/print_delete_logs',$data);
		} else {
			redirect('');
		}
	}


	public function get_specific_register_logs() {
		if ($this->session->userdata("logged_in")) {
			$date_from = $this->input->post('date_from');
			$date_to = $this->input->post('date_to');

			$rules = [
				[
					'field' => 'date_from',
					'label' => 'Date From',
					'rules' => 'trim|required'
				],
				[
			
					'field' => 'date_to',
					'label' => 'Date To',
					'rules' => 'trim|required'
				]
			];

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {
				$this->load->model('RegisterHistoryModel');
				$this->load->model('DeleteHistoryModel');
				$result_delete_history = $this->DeleteHistoryModel->getSpecificDeleteHistory($date_from,$date_to);
				$result_log_history = $this->RegisterHistoryModel->getSpecificRegisterHistory($date_from,$date_to);


				$this->load->helper('site_helper');
				$data = html_variable();
				$data['title'] = 'Item History';
				$data['history'] = ' active';
				$data['specific'] = TRUE;
				$data['date_from'] = $date_from;
				$data['date_to'] = $date_to;
				$data['results'] = $result_log_history;
				$data['results2'] = $result_delete_history;


				$this->load->view('templates/header',$data);
				$this->load->view('templates/navbar');
				$this->load->view('items/history/items_logs');
				$this->load->view('templates/footer');
			} else {
				redirect('logs');
			}

		} else {
			redirect('');
		}
	}

}