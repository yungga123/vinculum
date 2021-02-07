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
                'rules' => 'trim'
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
                'rules' => 'trim|required|greater_than_equal_to[0]|max_length[21]',
                'errors' => [
                    'required' => 'Please provide unit cost.'
                ]
            ],
            [
                'field' => 'qty[]',
                'label' => 'Qty',
                'rules' => 'trim|required|greater_than_equal_to[0]|max_length[21]',
                'errors' => [
                    'required' => 'Please provide Qty.'
                ]
            ],
            [
                'field' => 'supplier[]',
                'label' => 'Qty',
                'rules' => 'trim|required|max_length[500]',
                'errors' => [
                    'required' => 'Please provide Supplier.'
                ]
            ],
            [
                'field' => 'date_needed[]',
                'label' => 'Qty',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please provide Date needed.'
                ]
            ],
            [
                'field' => 'purpose[]',
                'label' => 'Qty',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please provide Purpose/s.'
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
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['requisition_form'] = ' active';
            $data['requisition_add'] = ' active';
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

    public function pending_requisitions() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Pending Requests';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['requisition_form'] = ' active';
            $data['requisition_pending'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_pending');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function fetch_pending_requisition() {
        $fetch_data = $this->RequisitionFormModel->requisition_form_datatable();
		$data = array();

		foreach ($fetch_data as $row) {
			
            $sub_array = array();
            
            $date_added = ($row->date != '0000-00-00 00:00:00') ? date_format(date_create($row->date),'M d, Y h:ia') : 'None';

            $sub_array[] = $row->req_id;
            $sub_array[] = $date_added;
            $sub_array[] = $row->req_first.' '.$row->req_last;
            $sub_array[] = $row->proc_first.' '.$row->proc_last;
            $sub_array[] = $row->app_first.' '.$row->app_last;
            $sub_array[] = $row->rec_first.' '.$row->rec_last;
            $sub_array[] = $row->check_first.' '.$row->check_last;
            $sub_array[] = '
                <button type="button" class="btn btn-warning text-bold btn-xs"><i class="fas fa-edit"></i></button>

                <button type="button" class="btn btn-danger text-bold btn-xs"><i class="fas fa-trash"></i></button>

                <button type="button" class="btn btn-success text-bold btn-xs"><i class="fas fa-search"></i></button>
            ';
            
			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->RequisitionFormModel->get_all_requisition_form_data(),
			"recordsFiltered" => $this->RequisitionFormModel->filter_requisition_form_data(),
			"data" => $data
		);

		echo json_encode($output);
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
            $req_id = 0;


            $this->RequisitionFormModel->insert_requisition([
                'date' => date('Y-m-d H:i:s'),
                'processed_by' => $this->input->post('processed_by'),
                'approved_by' => $this->input->post('approved_by'),
                'requested_by' => $this->input->post('requested_by'),
                'received_by' => $this->input->post('received_by'),
                'checked_by' => $this->input->post('checked_by')
            ]);

            $results = $this->RequisitionFormModel->get_requisition_form();

            foreach ($results as $row) {
                $req_id = $row->id;
            }

            //add request_items
			for ($i=0; $i < $count_requests; $i++) { 
				$this->RequisitionFormModel->insert_request_items([
                    'description' => $this->input->post('description')[$i],
                    'unit_cost' => $this->input->post('unit_cost')[$i],
                    'qty' => $this->input->post('qty')[$i],
                    'supplier' => $this->input->post('supplier')[$i],
                    'date_needed' => $this->input->post('date_needed')[$i],
                    'purpose' => $this->input->post('purpose')[$i],
					'request_form_id' => $req_id
				]);
			}
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }
}
