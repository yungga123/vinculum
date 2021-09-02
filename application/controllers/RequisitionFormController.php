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
                'rules' => 'trim|greater_than_equal_to[0]|max_length[21]'
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
                'field' => 'unit[]',
                'label' => 'Unit',
                'rules' => 'trim|required|max_length[21]',
                'errors' => [
                    'required' => 'Please provide Unit.'
                ]
            ],
            [
                'field' => 'supplier[]',
                'label' => 'Qty',
                'rules' => 'trim|max_length[500]'
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
            $this->load->model('VendorModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Request Items';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_form'] = ' active';
            $data['requisition_add'] = ' active';
            $data['employees'] = $this->TechniciansModel->getTechniciansByStatus();
            $data['vendor'] = $this->VendorModel->getVendorList();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_form');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function update_requisition($id) {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
            $this->load->model('VendorModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Request Items';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['requisition_form'] = ' active';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_pending'] = ' active';
            $data['employees'] = $this->TechniciansModel->getTechniciansByStatus();
            $data['req_info'] = $this->RequisitionFormModel->get_all_requisition_form_where($id);
            $data['req_items'] = $this->RequisitionFormModel->get_requisition_items($id);
            $data['vendor'] = $this->VendorModel->getVendorList();
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
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_form'] = ' active';
            $data['requisition_pending'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_list');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function accepted_requisitions() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Accepted Requests';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_form'] = ' active';
            $data['requisition_accepted'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_list');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function filed_requisitions() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Filed Requests';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_form'] = ' active';
            $data['requisition_filed'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_list');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function discarded_requisitions() {
        if($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Discarded Requests';
            $data['requisition_tree'] = ' menu-open';
            $data['requisition_display'] = ' block';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_form'] = ' active';
            $data['requisition_discarded'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('requisition_form/requisition_list');
			$this->load->view('templates/footer');
            $this->load->view('requisition_form/script');
            
		} else {
			redirect('','refresh');
		}
    }

    public function fetch_requisitions($where) {
        $fetch_data = $this->RequisitionFormModel->requisition_form_datatable($where);
		$data = array();

        
        if ($where == '') {
            $btn_status = '<button type="button" class="btn btn-success text-bold btn-xs btn_req_accept btn-block" data-toggle="modal" data-target=".req-accept"><i class="fas fa-check"></i> ACCEPT</button>';
        } elseif ($where == 'Accepted') {
            $btn_status = '<button type="button" class="btn btn-success text-bold btn-xs btn_req_filed btn-block" data-toggle="modal" data-target=".req-filed"><i class="fas fa-file"></i> FILE</button>';
        } elseif ($where == 'Filed') {
            $btn_status = '';
        }

		foreach ($fetch_data as $row) {

            if ($this->uri->segment(2) == 'fetch_pending_requisitions') {
                $operation = '
                    <a href="'.site_url('requisition-update/'.$row->req_id).'" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit"></i> EDIT</a>

                    <button type="button" class="btn btn-danger text-bold btn-xs btn-block btn_req_del" data-toggle="modal" data-target="#delete-requisition"><i class="fas fa-trash"></i> DISCARD</button>

                    <button type="button" class="btn btn-primary text-bold btn-xs btn-block btn_view" data-toggle="modal" data-target=".modal-reqitems"><i class="fas fa-search"></i> VIEW ITEMS</button>
                    ' .$btn_status;
            } elseif($this->uri->segment(2) == 'fetch_accepted_requisitions') {
                $operation = '
                    <a href="'.site_url('requisition-update/'.$row->req_id).'" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit"></i> EDIT</a>

                    <button type="button" class="btn btn-danger text-bold btn-xs btn-block btn_req_del" data-toggle="modal" data-target="#delete-requisition"><i class="fas fa-trash"></i> DISCARD</button>

                    <button type="button" class="btn btn-primary text-bold btn-xs btn-block btn_view" data-toggle="modal" data-target=".modal-reqitems"><i class="fas fa-search"></i> VIEW ITEMS</button>
                    ' .$btn_status;
            } 
            elseif($this->uri->segment(2) == 'fetch_discarded_requisitions') {
                $operation = '
                    <button type="button" class="btn btn-primary text-bold btn-xs btn-block btn_view" data-toggle="modal" data-target=".modal-reqitems"><i class="fas fa-search"></i> VIEW ITEMS</button>
                    
                    <a href="'.site_url('requisition-view/'.$row->req_id).'" class="btn btn-success text-bold btn-xs btn-block" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                    ';
            } else {
                $operation = '
                    <button type="button" class="btn btn-primary text-bold btn-xs btn-block btn_view" data-toggle="modal" data-target=".modal-reqitems"><i class="fas fa-search"></i> VIEW ITEMS</button>
                    
                    <a href="'.site_url('requisition-view/'.$row->req_id).'" class="btn btn-success text-bold btn-xs btn-block" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                    ';
            }
			
            $sub_array = array();
            
            $date_added = ($row->date != '0000-00-00 00:00:00') ? date_format(date_create($row->date),'M d, Y h:ia') : 'None';

            $sub_array[] = $row->req_id;
            $sub_array[] = $operation;
            $sub_array[] = $date_added;
            $sub_array[] = $row->req_first.' '.$row->req_last;
            $sub_array[] = $row->proc_first.' '.$row->proc_last;
            $sub_array[] = $row->app_first.' '.$row->app_last;
            $sub_array[] = $row->rec_first.' '.$row->rec_last;
            $sub_array[] = $row->check_first.' '.$row->check_last;
            
            
			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->RequisitionFormModel->get_all_requisition_form_data($where),
			"recordsFiltered" => $this->RequisitionFormModel->filter_requisition_form_data($where),
			"data" => $data
		);

		echo json_encode($output);
    }

    public function fetch_pending_requisitions() {
        return $this->fetch_requisitions('');
    }

    public function fetch_accepted_requisitions() {
        return $this->fetch_requisitions('Accepted');
    }
    
    public function fetch_filed_requisitions() {
        return $this->fetch_requisitions('Filed');
    }

    public function fetch_discarded_requisitions() {
        return $this->fetch_requisitions('Discarded');
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
                    'unit' => $this->input->post('unit')[$i],
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

    public function update_item_requisition_validate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $req_id = $this->input->post('req_id');
            
            
            $this->RequisitionFormModel->update_requesition($req_id,[
                'processed_by' => $this->input->post('processed_by'),
                'approved_by' => $this->input->post('approved_by'),
                'requested_by' => $this->input->post('requested_by'),
                'received_by' => $this->input->post('received_by'),
                'checked_by' => $this->input->post('checked_by')
            ]);

            //Update Existing Request Item
			$item_id_data = array();
			
			for ($i=0; $i < count($this->input->post('item_id')); $i++) {

				$item_sub_data = array();

				if ($this->input->post('item_id')[$i] != '') {

					$this->RequisitionFormModel->update_requesition_items(
						$this->input->post('item_id')[$i],
						[
							'description' => $this->input->post('description')[$i],
                            'unit_cost' => $this->input->post('unit_cost')[$i],
                            'qty' => $this->input->post('qty')[$i],
                            'unit' => $this->input->post('unit')[$i],
                            'supplier' => $this->input->post('supplier')[$i],
                            'date_needed' => $this->input->post('date_needed')[$i],
                            'purpose' => $this->input->post('purpose')[$i]
						]
					);

					$item_sub_data[] = $this->input->post('item_id')[$i];
					$item_id_data[] = $item_sub_data;
				} else {

					$this->RequisitionFormModel->insert_request_items([
						'description' => $this->input->post('description')[$i],
                        'unit_cost' => $this->input->post('unit_cost')[$i],
                        'qty' => $this->input->post('qty')[$i],
                        'unit' => $this->input->post('unit')[$i],
                        'supplier' => $this->input->post('supplier')[$i],
                        'date_needed' => $this->input->post('date_needed')[$i],
                        'purpose' => $this->input->post('purpose')[$i],
						'request_form_id' => $req_id
					]);

					$item_sub_data[] = $this->RequisitionFormModel->get_new_added_reqitem($req_id);
					$item_id_data[] = $item_sub_data;

				}
			}
			$this->RequisitionFormModel->remove_item_request($item_id_data,$req_id);
			//end of update existing request item


		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function requisition_view($id) {

        $data = [
            'title' => 'Requisition View',
            'results_requisition' => $this->RequisitionFormModel->get_requisition_where($id),
            'results_req_items' => $this->RequisitionFormModel->get_requisition_items($id),
            'results_supplier' => $this->RequisitionFormModel->get_supplier_list()
        ];
        $this->load->view('requisition_form/requisition_view',$data);
    }

    public function accept_requisition() {
        $validate = [
			'success' => false,
			'errors' => ''
		];

        $rules = [

            [
                'field' => 'req_form_id',
                'label' => 'Req. No.',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ],
            [
                'field' => 'passcode',
                'label' => 'Password',
                'rules' => 'trim|callback_confirmreq_pw'
            ]

        ];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');
        
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            //$this->update_item_requisition_validate();

            $this->RequisitionFormModel->update_requesition($this->input->post('req_form_id'),[
                'status' => 'Accepted',
                'approved_by' => '01021415'
            ]);
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    function confirmreq_pw(){

		if($this->input->post('passcode') != ""){
			if($this->input->post('passcode') == "vinculumquery"){
				return true;
			}else{
				$this->form_validation->set_message('confirmreq_pw', 'Invalid Password.');
				return false;
			}
		}
		else{
			$this->form_validation->set_message('confirmreq_pw', 'Password Required.');
			return false;
		}
	}

    public function file_requisition() {
        $validate = [
			'success' => false,
			'errors' => ''
		];

        $rules = [

            [
                'field' => 'req_form_id',
                'label' => 'Req. No.',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ],
            [
                'field' => 'file_processed_by',
                'label' => 'Processed By',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please fill Processed By'
                ]
            ],
            [
                'field' => 'file_approved_by',
                'label' => 'Approved By',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please fill Approved By'
                ]
            ],
            [
                'field' => 'file_received_by',
                'label' => 'Received By',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please fill Received By'
                ]
            ],
            [
                'field' => 'file_checked_by',
                'label' => 'Checked By',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please fill Checked By'
                ]
            ]

        ];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->RequisitionFormModel->update_requesition($this->input->post('req_form_id'),[
                'status' => 'Filed'
            ]);
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function delete_requisition() {
        $validate = [
			'success' => false,
			'errors' => ''
		];

        $rules = [

            [
                'field' => 'req_form_id_del',
                'label' => 'Req. No.',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ]

        ];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->RequisitionFormModel->update_requesition($this->input->post('req_form_id_del'),[
                'status' => 'Discarded'
            ]);
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function get_req_items($id)
    {

        $results = $this->RequisitionFormModel->get_requisition_items($id);
        $get_supplier_list = $this->RequisitionFormModel->get_supplier_list();


        $data = array();
        $total = 0;

        foreach ($results as $row) {
            $sub_data = array();
            $item_total = 0;
            foreach ($get_supplier_list as $row2) {
                if ($row->supplier == "") {
                    $sub_data['supplier'] = "";
                } elseif ($row->supplier == $row2->id) {
                    $sub_data['supplier'] = $row2->name;
                }
            }

            $item_total = $row->qty * $row->unit_cost;
            $total = $total + $item_total;

            $sub_data['description'] = $row->description;
            $sub_data['qty'] = $row->qty;
            $sub_data['unit'] = $row->unit;
            $sub_data['unit_cost'] = number_format($row->unit_cost, 2);
            $sub_data['item_cost'] = number_format($item_total, 2);
            $sub_data['purpose'] = $row->purpose;
            $sub_data['total'] = number_format($total, 2);

            $data[] = $sub_data;
        }

        $json_data['results'] = $data;
        echo json_encode($json_data);
    }
}
