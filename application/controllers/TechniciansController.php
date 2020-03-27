<?php
defined('BASEPATH') or die('Access Denied');

class TechniciansController extends CI_Controller {

	public function index(){
		if($this->session->userdata('logged_in')) {

			$this->load->model('TechniciansModel');
			$results = $this->TechniciansModel->getTechnicians();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Techinicians';
			$data['results'] = $results;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('technicians/technicians');
			$this->load->view('templates/footer');
		} else {
			redirect('','refresh');
		}
	}

	public function addTechValidate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'tech_id',
				'label' => 'Technician ID',
				'rules' => 'trim|required|is_unique[technicians.id]|max_length[200]',
				'errors' => [
					'required' => 'Please provide Technician ID',
					'is_unique' => 'That ID seems to be existing.',
					'max_length' => 'Maximum length of Technician ID is 200'
				]
			],
			[
				'field' => 'tech_fname',
				'label' => 'First Name',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Please provide First Name.',
					'max_length' => 'Maximum length of First Name is 200.'
				]
			],
			[
				'field' => 'tech_mname',
				'label' => 'Middle Name',
				'rules' => 'trim|max_length[200]',
				'errors' => [
					'max_length' => 'Maximum length of Middle Name is 200.'
				]
			],
			[
				'field' => 'tech_lname',
				'label' => 'Last Name',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Please provide Last Name.',
					'max_length' => 'Maximum length of Last Name is 200.'
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