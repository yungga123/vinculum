<?php 
defined('BASEPATH') or die('Access Denied');

class RequisitionFormController extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->model("RequisitionFormModel");
    }

    function validation_rules() {

        $rules = [
			[
				'field' => 'requested_by',
				'label' => 'Requested By',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select Requested By'
				]
            ],
            [
                'field' => 'processed_by',
                'label' => 'Processed By',
                'rules' => 'trim'
            ],
            [
                'field' => 'approved_by',
                'label' => 'Approved By',
                'rules' => 'trim'
            ],
            [
                'field' => 'received_by',
                'label' => 'Received By',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'checked_by',
                'label' => 'Checked By',
                'rules' => 'trim'
            ],
            [
                'field' => 'description[]',
                'label' => 'Description',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Provide description or remove the field.'
                ]
            ],
            [
                'field' => 'unit_cost[]',
                'label' => 'Unit Cost',
                'rules' => 'trim|required|less_than_equal_to[0]|max_length[21]',
                'errors' => [
                    'required' => 'Please provide unit cost.',
                    'less_than_equal_to' => 'Provide '
                ]
            ]

		];
		return $rules;
    }

    public function index() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Request Items';
            $data['requisition_form'] = ' active';
            $data['employees'] = $this->TechniciansModel->getTechniciansByStatus();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_form');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function add_item_requisition_validate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $count_requests = count($this->input->post('description'));

            $data = [
                'date' => date('Y-m-d H:i:s'),
                'processed_by' => $this->input->post('processed_by'),
                'approved_by' => $this->input->post('approved_by'),
                'requested_by' => $this->input->post('requested_by'),
                'received_by' => $this->input->post('received_by'),
                'checked_by' => $this->input->post('checked_by')
            ];

            $this->RequisitionFormModel->insert_requisition($data);


            
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }
}
