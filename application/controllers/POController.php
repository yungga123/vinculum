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

    public function get_generated_po_list()
    {
        $fetch_data = $this->POModel->PO_datatable();
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
            $sub_array[] = '
<button type="button" class="btn btn-danger text-bold btn-xs btn_po_del" data-toggle="modal" data-target="#delete-po"><i class="fas fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-xs btn_view" data-toggle="modal" data-target=".modal_view_items"><i class="fas fa-search"></i></button>
<a href="' . site_url('generate-po/' . $row->po_id) . '" class="btn btn-xs btn-success" target="_blank"><i class="fas fa-print"></i></a>
';

            $data[] = $sub_array;
        }
        $output = array(
            "draw"    =>    intval($_POST["draw"]),
            "recordsTotal" => $this->POModel->get_all_po_form_data(),
            "recordsFiltered" => $this->POModel->filter_po_form_data(),
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

            for ($i = 0; $i < $reqcount; $i++) {
                $req_id = $this->input->post('reqid')[$i];
                $results = $this->POModel->get_requisition_items($req_id);
                $generated_date = date('Y-m-d H:i:s');
                $supplier_id = "";
                $supplier_id2 = "";
                foreach ($results as $row) {

                    if ($supplier_id == $row->supplier) {
                        $supplier_id = $row->supplier;
                        $supplier_id2 = $row->supplier;
                    } else {
                        $this->POModel->insert_po([
                            'generated_date' => $generated_date,
                            'supplier_id' => $row->supplier
                        ]);
                        $supplier_id = $row->supplier;
                    }

                    $po_id = $this->POModel->get_new_po_id();
                    foreach ($po_id as $porow) {
                        $this->POModel->insert_po_items([
                            'po_id' => $porow->po_id,
                            'requisition_id' => $this->input->post('reqid')[$i],
                            'requisition_item_id' => $row->item_id
                        ]);
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

        $json_data['results'] = $results;

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
            $data['title'] = 'Generate PO';
            $data['employee_list'] = $this->POModel->get_employee_list();
            $data['supplier_details'] = $this->POModel->get_supplier_details($po_id);
            $data['items_details'] = $this->POModel->get_items_details($po_id);
            $data['po_details'] = $this->POModel->get_po_details($po_id);
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
}
