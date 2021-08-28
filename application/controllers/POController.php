<?php
defined('BASEPATH') or die('Access Denied');

class POController extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->model("POModel");
    }

    function validation_rules()
    {

        $rules = [
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

    public function index()
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->model('TechniciansModel');
            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'Generate PO';
            $data['li_generated_po'] = ' active';
            $data['ul_purchasing_tree'] = ' active';
            $data['requisition_list'] = $this->POModel->acc_req_list();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('P.O/generated_po_list');
            $this->load->view('templates/footer');
            $this->load->view('P.O/script');
        } else {
            redirect('', 'refresh');
        }
    }

    public function get_generated_po_list($po_status)
    {

        $fetch_data = $this->POModel->PO_datatable($po_status);

        $data = array();

        foreach ($fetch_data as $row) {

            $sub_array = array();

            if ($row->generated_date != '0000-00-00') {
                $date = date_format(date_create($row->generated_date), 'F d, Y');
            }

            // $date_added = ($row->date_needed != '0000-00-00 00:00:00') ? date_format(date_create($row->date_needed),'M d, Y h:ia') : 'None';

            //EDIT BUTTON
            //<a href="' . site_url('items-update/' . $row->po_id) . '" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>

            $sub_array[] = $row->po_id;
            $sub_array[] = $row->name;
            $sub_array[] = $date;
            if ($po_status == 'pending') {
                $sub_array[] = '
<button type="button" class="btn btn-success text-bold btn-xs btn_po_id" data-toggle="modal" data-target="#approved-po"><i class="fas fa-check"></i></button>
<button type="button" class="btn btn-danger text-bold btn-xs btn_po_del" data-toggle="modal" data-target="#delete-po"><i class="fas fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items"><i class="fas fa-search"></i></button>
';
            } else {
                $sub_array[] = '
<button type="button" class="btn btn-danger text-bold btn-xs btn_po_del" data-toggle="modal" data-target="#delete-po"><i class="fas fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items"><i class="fas fa-search"></i></button>
<a href="' . site_url('generate-po/' . $row->po_id) . '" class="btn btn-xs btn-success" target="_blank"><i class="fas fa-print"></i></a>
';
            }

            $data[] = $sub_array;
        }
        $output = array(
            "draw"    =>    intval($_POST["draw"]),
            "recordsTotal" => $this->POModel->get_all_po_form_data($po_status),
            "recordsFiltered" => $this->POModel->filter_po_form_data($po_status),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function generate_po()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'reqid[]',
                'label' => 'Req. No.',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ]
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            $reqcount = count($this->input->post('reqid'));
            $supplier_id2 = array();
            $generated_id_array = array();
            for ($i = 0; $i < $reqcount; $i++) {
                $req_id = $this->input->post('reqid')[$i];
                $results = $this->POModel->get_requisition_items($req_id);
                $generated_date = date('Y-m-d H:i:s');
                $supplier_id = "";

                foreach ($results as $row) {

                    if ($supplier_id == $row->supplier) {
                        $supplier_id = $row->supplier;
                    } elseif ($row->supplier == "") {

                    } else {
                        $result = $this->POModel->get_po_generated_id();
                        $key = in_array($row->supplier, $supplier_id2);
                        $generated_id = 0;
                        //fetch Generated ID for new PO
                        foreach ($result as $row2) {
                            if ($row2->generated_id == "") {
                                $generated_id = 1;
                            } else {
                                $generated_id = $row2->generated_id;
                                $generated_id = $generated_id + 1;
                            }

                            //check if Supplier Loop is Already Generated
                            if (
                                $key == ""
                            ) {
                                $this->POModel->insert_po([
                                    'generated_date' => $generated_date,
                                    'supplier_id' => $row->supplier,
                                    'po_status' => "pending",
                                    'generated_id' => $generated_id
                                ]);
                                $supplier_id = $row->supplier;
                                $supplier_id2[] = $supplier_id;
                                $generated_id_array[] = $generated_id;
                            }
                        }
                    }

                    //add items to generated supplier
                    $resultss = $this->POModel->get_new_po_data();
                    foreach ($resultss as $row3) {
                        $key = in_array($row3->generated_id, $generated_id_array);
                        if ($key != "" && $row3->supplier_id == $row->supplier) {
                            $po_id = $row3->po_id;
                            $this->POModel->insert_po_items([
                                'po_id' => $po_id,
                                'requisition_id' => $this->input->post('reqid')[$i],
                                'requisition_item_id' => $row->item_id
                            ]);
                        }
                    }
                }
            }
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function get_po_items($id)
    {
        $results = $this->POModel->get_po_items($id);

        $data = array();
        $total_price = 0;

        foreach ($results as $row) {
            $sub_array = array();
            $total_cost = 0;

            $total_cost = $row->qty * $row->unit_cost;
            $total_price = $total_price + $total_cost;

            $sub_array['description'] = $row->description;
            $sub_array['qty'] = $row->qty;
            $sub_array['unit'] = $row->unit;
            $sub_array['unit_cost'] = number_format($row->unit_cost, 2);
            $sub_array['description'] = $row->description;
            $sub_array['total_cost'] = number_format($total_cost, 2);
            $sub_array['date_needed'] = $row->date_needed;
            $sub_array['purpose'] = $row->purpose;
            $sub_array['total_price'] = number_format($total_price, 2);

            $data[] = $sub_array;
        }

        $json_data['results'] = $data;

        echo json_encode($json_data);
    }

    public function delete_po()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'po_id_del',
                'label' => 'PO ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select PO.'
                ]
            ]

        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            $this->POModel->delete_po($this->input->post('po_id_del'));
            $this->POModel->delete_po_items($this->input->post('po_id_del'));
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function generate_po_view($po_id)
    {
        if ($this->session->userdata('logged_in')) {
            
            $this->load->model('TechniciansModel');
            $this->load->model('POModel');
            $data['title'] = 'Generate PO';

            if($this->uri->segment(1) == 'generate-po'){
                $this->POModel->reset_items_status([
                    'mark_as_proceed' => '0'
                ]);
            }
            $data['employee_list'] = $this->POModel->get_employee_list();
            $data['supplier_details'] = $this->POModel->get_supplier_details($po_id);
            $mark_as_read = 1;
            $data['items_details'] = $this->POModel->get_items_details($po_id, $mark_as_read);
            $mark_as_read = 0;
            $data['items_details_modal'] = $this->POModel->get_items_details($po_id, $mark_as_read);
            $data['po_details'] = $this->POModel->get_po_details($po_id);
            $data['po_id'] = $po_id;
            $this->load->view('P.O/generate_po', $data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function generate_po_validate()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [
            [
                'field' => 'requestor_name',
                'label' => 'Requestor',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Requestor'
                ]
            ],
            [
                'field' => 'attention_to',
                'label' => 'Name of Addressee',
                'rules' => 'trim'
            ]
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function Items_PO_Update($po_id)
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->model('POModel');
            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'Edit PO';
            $data['li_generated_po'] = ' active';
            $data['po_id'] = $po_id;
            $data['vendor_name'] = $this->POModel->vendor_list($po_id);
            $data['po_items_list_edit'] = $this->POModel->po_items_list($po_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('P.O/generated_po_edit');
            $this->load->view('templates/footer');
            $this->load->view('P.O/script');
        } else {
            redirect('', 'refresh');
        }
    }

    public function update_items_po_validate()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($this->validation_rules());

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            //Update Existing Request Item
            for ($i = 0; $i < count($this->input->post('item_id')); $i++) {

                $po_id = $this->input->post('po_id');
                $po_status = $this->POModel->fetch_po_details($po_id);
                $po_status = $po_status + 01;

                $this->POModel->update_po_revise(
                    $po_id,
                    [
                        'po_revise' => $po_status
                    ]
                );

                $this->POModel->update_po_items(
                    $this->input->post('item_id')[$i],
                    [
                        'description' => $this->input->post('description')[$i],
                        'unit_cost' => $this->input->post('unit_cost')[$i],
                        'qty' => $this->input->post('qty')[$i],
                        'unit' => $this->input->post('unit')[$i],
                        'date_needed' => $this->input->post('date_needed')[$i],
                        'purpose' => $this->input->post('purpose')[$i]
                    ]
                );
            }
            //end of update existing request item

        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function approved_po()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'po_id',
                'label' => 'PO ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select PO'
                ]
            ],
            [
                'field' => 'approved_po_passcode',
                'label' => 'Password',
                'rules' => 'trim|callback_confirmreq_pw'
            ]

        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            //$this->update_item_requisition_validate();

            $this->POModel->update_approved_po($this->input->post('po_id'), [
                'po_status' => 'approved'
            ]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function fetch_pending_po()
    {
        $this->get_generated_po_list('pending');
    }

    public function fetch_approved_po()
    {
        $this->get_generated_po_list('approved');
    }

    function confirmreq_pw()
    {

        if ($this->input->post('approved_po_passcode') != "") {
            if ($this->input->post('approved_po_passcode') == "vinculumquery") {
                return true;
            } else {
                $this->form_validation->set_message('confirmreq_pw', 'Invalid Password.');
                return false;
            }
        } else {
            $this->form_validation->set_message('confirmreq_pw', 'Password Required.');
            return false;
        }
    }

    public function update_items_status_to_proceed()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'reqid[]',
                'label' => 'Req. No.',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select an item.'
                ]
            ]
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            $reqcount = count($this->input->post('reqid'));
            $po_id = $this->input->post('po_id');
            for ($i = 0; $i < $reqcount; $i++) {
                $req_id = $this->input->post('reqid')[$i];
                $this->POModel->mark_po_item($req_id,$po_id,
                [
                    'mark_as_proceed' => '1'
                ]);
            }
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }
}
