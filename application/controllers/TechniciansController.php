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
			$this->load->view('technicians/script');
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
				'rules' => 'trim|required|is_unique[technicians.id]|max_length[200]|alpha_numeric',
				'errors' => [
					'required' => 'Please provide Technician ID',
					'is_unique' => 'That ID seems to be existing.',
					'max_length' => 'Maximum length of Technician ID is 200',
					'alpha_numeric' => 'Characters must contain Letters and Numbers without spaces'
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

			$this->load->model('TechniciansModel');

			$data = [
				'id' => $this->input->post('tech_id'),
				'lastname' => $this->input->post('tech_lname'),
				'firstname' => $this->input->post('tech_fname'),
				'middlename' => $this->input->post('tech_mname')
			];

			$this->TechniciansModel->addTechnicians($data);

		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function technicians_edit($id) {

		if($this->session->userdata('logged_in')) {

			$this->load->model('TechniciansModel');
			$results = $this->TechniciansModel->fetchTechnicians($id);
			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Techinicians Update';
			$data['results'] = $results;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('technicians/technicians_edit');
			$this->load->view('templates/footer');
			$this->load->view('technicians/script');
		} else {
			redirect('','refresh');
		}

	}

	public function editTechValidate() {
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
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

			$this->load->model('TechniciansModel');
			$id = $this->input->post('tech_id');
			$data = [
				'lastname' => $this->input->post('tech_lname'),
				'firstname' => $this->input->post('tech_fname'),
				'middlename' => $this->input->post('tech_mname')
			];

			$this->TechniciansModel->editTechnicians($id,$data);

		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function delete_tech() {

		if($this->session->userdata('logged_in')) {
			$rules = [
				[
					'field' => 'tech_id_del',
					'label' => 'First Name',
					'rules' => 'trim|required',
					'errors' => [
						'required' => 'Please select Technician to delete.'
					]
				]
			];
			
			$this->form_validation->set_error_delimiters('<p>• ','</p>');

			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run()) {

				$id = $this->input->post('tech_id_del');
				$this->load->model('TechniciansModel');
				$this->TechniciansModel->deleteTechnicians($id);

				$this->session->set_flashdata('success', 'Success Deleting!');
				redirect('technicians');

			} else {
				$this->session->set_flashdata('fail', form_error('tech_id_del'));
				redirect('technicians');
			}
		} else {
			redirect('','refresh');
		}

	}

}