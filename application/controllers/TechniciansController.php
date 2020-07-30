<?php
defined('BASEPATH') or die('Access Denied');

class TechniciansController extends CI_Controller {

	public function index(){
		if($this->session->userdata('logged_in')) {

			$this->load->model('TechniciansModel');
			$results = $this->TechniciansModel->getTechnicians();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Employees';
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

	public function add_tech(){
		if($this->session->userdata('logged_in')) {

			$this->load->model('TechniciansModel');
			$results = $this->TechniciansModel->getTechnicians();

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Add Employee';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('technicians/technicians_add');
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
				'label' => 'Employee ID',
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
			],
			[
				'field' => 'tech_position',
				'label' => 'Position',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Please provide Position.',
					'max_length' => 'Maximum length of Position is 200.'
				]
			],
			[
				'field' => 'tech_bday',
				'label' => 'Birthdate',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Birth Date'
				]
			],
			[
				'field' => 'tech_contact_number',
				'label' => 'Contact Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'Contact number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_address',
				'label' => 'Address',
				'rules' => 'trim'
			],
			[
				'field' => 'tech_sss_number',
				'label' => 'SSS Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'SSS Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_tin_number',
				'label' => 'TIN Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'TIN Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_pagibig_number',
				'label' => 'PAG-IBIG Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'PAG-IBIG Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_phil_health_number',
				'label' => 'Phil-Health Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'Phil-Health Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_status',
				'label' => 'Employment Status',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select employment status.'
				]
			],
			[
				'field' => 'tech_validity',
				'label' => 'Employment Validity',
				'rules' => 'trim'
			],
			[
				'field' => 'tech_date_hired',
				'label' => 'Date Hired',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide date hired.'
				]
			],
			[
				'field' => 'tech_daily_rate',
				'label' => 'Date Hired',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Daily rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_pagibig_rate',
				'label' => 'PAG-IBIG Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'PAG-IBIG rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_sss_rate',
				'label' => 'SSS Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'SSS rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_phil_health_rate',
				'label' => 'PHIL-HEALTH Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'PHIL-HEALTH rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_tax',
				'label' => 'Tax Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Tax rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_vl_credit',
				'label' => 'VL Credit',
				'rules' => 'trim|numeric'
			],
			[
				'field' => 'tech_sl_credit',
				'label' => 'SL Credit',
				'rules' => 'trim|numeric'
			],
			[
				'field' => 'tech_remarks',
				'label' => 'Other Remarks',
				'rules' => 'trim'
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
				'middlename' => $this->input->post('tech_mname'),
				'birthdate' => $this->input->post('tech_bday'),
				'contact_number' => $this->input->post('tech_contact_number'),
				'position' => $this->input->post('tech_position'),
				'address' => $this->input->post('tech_address'),
				'sss_number' => $this->input->post('tech_sss_number'),
				'tin_number' => $this->input->post('tech_tin_number'),
				'pagibig_number' => $this->input->post('tech_pagibig_number'),
				'phil_health_number' => $this->input->post('tech_phil_health_number'),
				'status' => $this->input->post('tech_status'),
				'validity' => $this->input->post('tech_validity'),
				'date_hired' => $this->input->post('tech_date_hired'),
				'daily_rate' => $this->input->post('tech_daily_rate'),
				'pag_ibig_rate' => $this->input->post('tech_pagibig_rate'),
				'sss_rate' => $this->input->post('tech_sss_rate'),
				'phil_health_rate' => $this->input->post('tech_phil_health_rate'),
				'tax' => $this->input->post('tech_tax'),
				'sl_credit' => $this->input->post('tech_sl_credit'),
				'vl_credit' => $this->input->post('tech_vl_credit'),
				'remarks' => $this->input->post('tech_remarks')
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
			$data['title'] = 'Employees Update';
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
			],
			[
				'field' => 'tech_position',
				'label' => 'Last Name',
				'rules' => 'trim|required|max_length[200]',
				'errors' => [
					'required' => 'Please provide Position.',
					'max_length' => 'Maximum length of Position is 200.'
				]
			],
			[
				'field' => 'tech_bday',
				'label' => 'Birthdate',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Birth Date'
				]
			],
			[
				'field' => 'tech_contact_number',
				'label' => 'Contact Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'Contact number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_address',
				'label' => 'Address',
				'rules' => 'trim'
			],
			[
				'field' => 'tech_sss_number',
				'label' => 'SSS Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'SSS Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_tin_number',
				'label' => 'TIN Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'TIN Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_pagibig_number',
				'label' => 'PAG-IBIG Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'PAG-IBIG Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_phil_health_number',
				'label' => 'Phil-Health Number',
				'rules' => 'trim|max_length[50]',
				'errors' => [
					'max_length' => 'Phil-Health Number max character limit is 50.'
				]
			],
			[
				'field' => 'tech_status',
				'label' => 'Employment Status',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select employment status.'
				]
			],
			[
				'field' => 'tech_validity',
				'label' => 'Employment Validity',
				'rules' => 'trim'
			],
			[
				'field' => 'tech_date_hired',
				'label' => 'Date Hired',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide date hired.'
				]
			],
			[
				'field' => 'tech_daily_rate',
				'label' => 'Date Hired',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Daily rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_pagibig_rate',
				'label' => 'PAG-IBIG Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'PAG-IBIG rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_sss_rate',
				'label' => 'SSS Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'SSS rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_phil_health_rate',
				'label' => 'PHIL-HEALTH Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'PHIL-HEALTH rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_tax',
				'label' => 'Tax Rate',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Tax rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_vl_credit',
				'label' => 'VL Credit',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Tax rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_sl_credit',
				'label' => 'SL Credit',
				'rules' => 'trim|numeric',
				'errors' => [
					'numeric' => 'Tax rate must contain numbers only.'
				]
			],
			[
				'field' => 'tech_remarks',
				'label' => 'Other Remarks',
				'rules' => 'trim'
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
				'middlename' => $this->input->post('tech_mname'),
				'birthdate' => $this->input->post('tech_bday'),
				'contact_number' => $this->input->post('tech_contact_number'),
				'position' => $this->input->post('tech_position'),
				'address' => $this->input->post('tech_address'),
				'sss_number' => $this->input->post('tech_sss_number'),
				'tin_number' => $this->input->post('tech_tin_number'),
				'pagibig_number' => $this->input->post('tech_pagibig_number'),
				'phil_health_number' => $this->input->post('tech_phil_health_number'),
				'status' => $this->input->post('tech_status'),
				'validity' => $this->input->post('tech_validity'),
				'date_hired' => $this->input->post('tech_date_hired'),
				'daily_rate' => $this->input->post('tech_daily_rate'),
				'pag_ibig_rate' => $this->input->post('tech_pagibig_rate'),
				'sss_rate' => $this->input->post('tech_sss_rate'),
				'phil_health_rate' => $this->input->post('tech_phil_health_rate'),
				'tax' => $this->input->post('tech_tax'),
				'sl_credit' => $this->input->post('tech_sl_credit'),
				'vl_credit' => $this->input->post('tech_vl_credit'),
				'remarks' => $this->input->post('tech_remarks')
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