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
            $data['vendor'] = $this->POModel->getVendorList();
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
<button type="button" class="btn btn-success text-bold btn-xs btn_po_id" data-toggle="modal" data-target="#approved-po" title="Approved PO"><i class="fas fa-check"></i></button>
<button type="button" class="btn btn-danger text-bold btn-xs btn_po_del" data-toggle="modal" data-target="#delete-po" title="Delete PO"><i class="fas fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items" title="View Items"><i class="fas fa-search"></i></button>
';
            } elseif ($po_status == 'filed') {
                $sub_array[] = '
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items" title="View Items"><i class="fas fa-search"></i></button>
<a href="' . site_url('generate-po-filed/' . $row->po_id) . '" class="btn btn-xs btn-success" target="_blank" title="Print PO"><i class="fas fa-print"></i></a>
';
            } else {
                $sub_array[] = '
                <button type="button" class="btn btn-success text-bold btn-xs btn_po_id_filing" data-toggle="modal" data-target="#file-po" title="File PO"><i class="fas fa-file"></i></button>
<button type="button" class="btn btn-danger text-bold btn-xs btn_po_del" data-toggle="modal" data-target="#delete-po" title="Delete PO"><i class="fas fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items" title="View Items"><i class="fas fa-search"></i></button>
<a href="' . site_url('generate-po/' . $row->po_id) . '" class="btn btn-xs btn-success" target="_blank" title="Print PO"><i class="fas fa-print"></i></a>
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
                        $key = in_array($row->supplier, $supplier_id2);
                        if ($key == "") {
                            $this->POModel->insert_po([
                                'generated_date' => $generated_date,
                                'supplier_id' => $row->supplier,
                                'po_status' => "pending"
                            ]);
                            $supplier_id = $row->supplier;
                            $supplier_id2[] = $supplier_id;
                        }
                    }

                    //add items to generated supplier
                    $resultss = $this->POModel->get_new_po_data($row->supplier);
                    foreach ($resultss as $row3) {
                        if ($row3->supplier_id == $row->supplier) {
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

            if ($this->uri->segment(1) == 'generate-po') {
                $this->POModel->reset_items_status($po_id, 
                [
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

    public function fetch_filed_po()
    {
        $this->get_generated_po_list('filed');
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
                $this->POModel->mark_po_item(
                    $req_id,
                    $po_id,
                    [
                        'mark_as_proceed' => '1'
                    ]
                );
            }
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function file_po()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'po_id_filing',
                'label' => 'PO ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select PO'
                ]
            ]
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            //$this->update_item_requisition_validate();

            $this->POModel->update_approved_po($this->input->post('po_id_filing'), [
                'po_status' => 'filed',
                'date_filed' => date('Y-m-d')
            ]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    // Export to CSV ( must be in result->array() )
    public function exportreport()
    {

        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $supplier_id = $this->input->post('supplier_id');

        $file_name = 'PO Report From:' . $start_date . 'To: ' . $end_date . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // file creation 
        $file = fopen('php://output', 'w');

        $header = [
            'Description',
            'Qty',
            'Unit',
            'Cost',
            'Total Cost',
            'Date Needed',
            'Purpose',
            'Date Filed',
            'Supplier',
            'Category',
            'Terms'
        ];

        fputcsv($file, $header);

        // get data
        $po_data = $this->POModel->fetch_generated_po_data($start_date, $end_date, $supplier_id);
        $total_amount = 0;
        $total_items = 0;

        foreach ($po_data as $row) {
            $po_items_data = $this->POModel->fetch_generated_po_items_data($row->po_id);

            foreach ($po_items_data as $row1) {
                $requisition_items_data = $this->POModel->fetch_requisition_items_data($row1->requisition_item_id);

                foreach ($requisition_items_data as $row2) {

                    $sub_array = array();
                    $total_cost = $row2->unit_cost * $row2->qty;
                    $total_amount = $total_amount +  $total_cost;
                    $total_items = $total_items + 1;

                    $sub_array[] = $row2->description;
                    $sub_array[] = $row2->qty;
                    $sub_array[] = $row2->unit;
                    $sub_array[] = $row2->unit_cost;
                    $sub_array[] = $total_cost;
                    $sub_array[] = date_format(date_create($row2->date_needed), 'F d, Y');
                    $sub_array[] = $row2->purpose;
                    $sub_array[] = date_format(date_create($row->date_filed), 'F d, Y');
                    $sub_array[] = $row->name;
                    $sub_array[] = $row->vendor_category;

                    if ($row->terms_and_condition == "00") {
                        $terms = 'COD/Cash';
                    } elseif ($row->terms_and_condition == "01") {
                        $terms = 'Dated';
                    } elseif ($row->terms_and_condition == "02") {
                        $terms = '7 Days';
                    } elseif ($row->terms_and_condition == "03") {
                        $terms = '15 Days';
                    } elseif ($row->terms_and_condition == "04") {
                        $terms = '30 Days';
                    } elseif ($row->terms_and_condition == "05") {
                        $terms = '45 Days';
                    } elseif ($row->terms_and_condition == "06") {
                        $terms = '60 Days';
                    } elseif ($row->terms_and_condition == "07") {
                        $terms = '90 Days';
                    } elseif ($row->terms_and_condition == "08") {
                        $terms = '21 Days';
                    }
                    $sub_array[] = $terms;

                    fputcsv($file, $sub_array);
                }
            }
        }
        $array_next_row[] = "";
        fputcsv($file, $array_next_row);

        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "";
        $array_total_items[] = "Total Row Items:";
        $array_total_items[] = $total_items;

        fputcsv($file, $array_total_items);

        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "";
        $array_total_amount[] = "Total Amount:";
        $array_total_amount[] = $total_amount;

        fputcsv($file, $array_total_amount);

        fclose($file);
        exit;
    }
}
