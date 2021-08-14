<?php 
defined('BASEPATH') or die('Access Denied');

class LeaveController extends CI_Controller {

    public function __construct() {
		Parent::__construct();
        date_default_timezone_set('Asia/Manila');
		$this->load->model('LeaveModel');
	}

    function validation_rules() {
        $rules = [
            [
				'field' => 'date_application',
				'label' => 'Date of Application',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please provide Date of Application'
				]
            ],
            [
                'field' => 'type_of_leave',
                'label' => 'Type of Leave',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please provide Type of Leave'
                ]
            ],
            [
                'field' => 'employee',
                'label' => 'Select Employee',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select employee.'
                ]
            ],
            [
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please provide start date.'
                ]
            ],
            [
                'field' => 'end_date',
                'label' => 'Select Employee',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please provide end date.'
                ]
            ],
            [
                'field' => 'reason',
                'label' => 'Reason',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please enter a valid reason.'
                ]
            ]
        ];

        return $rules;
    }

    public function index() {

        $this->load->model('TechniciansModel');
        
        $data['results'] = $this->TechniciansModel->getTechniciansByStatus();

        $this->load->view('leave/aflaform',$data);

    }

    public function leave_form_validate(){
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;
            $data = [
                'emp_id'                => $this->input->post('employee'),
                'date_of_application'   => $this->input->post('date_application'),
                'type_of_leave'         => $this->input->post('type_of_leave'),
                'start_date'            => $this->input->post('start_date'),
                'end_date'              => $this->input->post('end_date'),
                'reason'                => $this->input->post('reason')
            ];
            $this->LeaveModel->insert_leave($data);
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function filed_leaves() {
        
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('site_helper');
			$data = html_variable();
            $data['title'] = 'Filed Leaves';
            $data['ul_hr_tree'] = ' active';
            $data['leaves'] = ' active';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('leave/filedleave');
            $this->load->view('templates/footer');
            $this->load->view('leave/script');
        } else {
            redirect('','refresh');
        }
        
    }

}