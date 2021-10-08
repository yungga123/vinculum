<?php
defined('BASEPATH') or die('Access Denied');

class LeaveController extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->model('LeaveModel');
    }

    function validation_rules()
    {
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
                'rules' => 'trim|required|callback_checkslvl',
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

    public function index()
    {

        $this->load->model('TechniciansModel');

        $data['results'] = $this->TechniciansModel->getTechniciansByStatus();

        $this->load->view('leave/aflaform', $data);
    }

    public function leave_form_validate()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($this->validation_rules());

        if ($this->form_validation->run()) {
            $validate['success'] = true;
            $data = [
                'emp_id'                => $this->input->post('employee'),
                'date_of_application'   => $this->input->post('date_application'),
                'type_of_leave'         => $this->input->post('type_of_leave'),
                'start_date'            => $this->input->post('start_date'),
                'end_date'              => $this->input->post('end_date'),
                'reason'                => $this->input->post('reason'),
                'status'                => 'pending'
            ];
            $this->LeaveModel->insert_leave($data);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function filed_leaves($status)
    {

        if ($this->session->userdata('logged_in')) {
            $this->load->helper('site_helper');
            $data = html_variable();
            $data['title'] = 'Filed Leaves';
            $data['hr_status'] = ' menu-open';
            $data['ul_hr_tree'] = ' active';
            $data['leaves'] = ' active';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('leave/filedleave');
            $this->load->view('templates/footer');
            $this->load->view('leave/script');
        } else {
            redirect('', 'refresh');
        }
    }
    public function fetch_filed_leave($status)
    {

        $fetch_data = $this->LeaveModel->filedleave_datatable($status);

        $i = 1;
        $data = array();
        foreach ($fetch_data as $row) {

            if ($row->date_of_application != '0000-00-00') {
                $date_of_application = date_format(date_create($row->date_of_application), 'F d, Y');
            }

            if ($row->start_date != '0000-00-00') {
                $start_date = date_format(date_create($row->start_date), 'F d, Y');
            }

            if ($row->end_date != '0000-00-00') {
                $end_date = date_format(date_create($row->end_date), 'F d, Y');
            }

            if ($status == 'pending') {
                $button = '
<button type="button" class="btn btn-success btn-xs btn-block btn_approve_leave" data-toggle="modal" data-target=".leave-approved"><i class="fas fa-file"></i> Approved</button>
<button type="button" class="btn btn-danger btn-xs btn-block btn_delete_leave" data-toggle="modal" data-target=".leave-delete"><i class="fas fa-trash"></i> Delete</button>
';
            } else {
                $button = '
<button type="button" class="btn btn-danger btn-xs btn-block btn_delete_leave" data-toggle="modal" data-target=".leave-delete"><i class="fas fa-trash"></i> Delete</button>
';
            }

            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
            $sub_array[] = $row->type_of_leave;
            $sub_array[] = $date_of_application;
            $sub_array[] = $start_date;
            $sub_array[] = $end_date;
            $sub_array[] = $row->reason;
            $sub_array[] = $button;

            $data[] = $sub_array;
            $i = $i + 1;
        }

        $output = array(
            "draw"    =>    intval($_POST["draw"]),
            "recordsTotal" => $this->LeaveModel->get_all_filed_leave_data(),
            "recordsFiltered" => $this->LeaveModel->filter_filed_leave_data($status),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function fetch_pending()
    {
        $status = 'pending';
        $this->fetch_filed_leave($status);
    }

    public function fetch_approved()
    {
        $status = 'approved';
        $this->fetch_filed_leave($status);
    }

    public function approve_leave()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'approve_leave_id',
                'label' => 'Leave ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Filed Leave'
                ]
            ],
            [
                'field' => 'passcode',
                'label' => 'Password',
                'rules' => 'trim|callback_confirmleave_pw'
            ]

        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->LeaveModel->update_leave($this->input->post('approve_leave_id'), [
                'status' => 'approved',
                'start_date' => $this->input->post('approve_start_date'),
                'end_date' => $this->input->post('approve_end_date'),
                'notes' => $this->input->post('approve_notes')

            ]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    function confirmleave_pw()
    {

        if ($this->input->post('passcode') != "") {
            if ($this->input->post('passcode') == "vinculumquery") {
                return true;
            } else {
                $this->form_validation->set_message('confirmleave_pw', 'Invalid Password.');
                return false;
            }
        } else {
            $this->form_validation->set_message('confirmleave_pw', 'Password Required.');
            return false;
        }
    }

    public function delete_leave()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'delete_leave_id',
                'label' => 'Leave ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Filed Leave'
                ]
            ]

        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->LeaveModel->update_leave($this->input->post('delete_leave_id'), [
                'is_deleted' => 1
            ]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function fetch_leave_data($leave_id)
    {
        $leave_data = $this->LeaveModel->getleavedata($leave_id);

        $leave_data_arr['leave_data'] = $leave_data;

        echo json_encode($leave_data_arr);
    }

    function checkslvl()
    {
        if ($this->input->post('employee') != "") {
            $employee_id = $this->input->post('employee');
            $techdata = $this->LeaveModel->gettechdata($employee_id);

            $start_date = strtotime($this->input->post('start_date'));
            $end_date = strtotime($this->input->post('end_date'));
            $start_date2 = date_create($this->input->post('start_date'));
            $end_date2 = date_create($this->input->post('end_date'));

            if ($this->input->post('type_of_leave') == "Vacation Leave") {

                //Compute difference of two days
                $days_between = ceil(abs($end_date - $start_date) / 86400);
                $days_between = $days_between + 1;


                //Compute total Sundays of Filed Date
                $days = $start_date2->diff($end_date2, true)->days;
                $total_sundays = intval($days / 7) + ($start_date2->format('N') + $days % 7 >= 7);

                //Compute total Filed Days
                $filed_days = $days_between - $total_sundays;

                //Fetch remaning VL of employee
                foreach ($techdata as $row) {
                    $remaining_vl = $row->vl_credit;
                }

                //check difference of filed days and remaining vl days
                if ($remaining_vl >= $filed_days) {
                    $remaining_vl = $remaining_vl - $filed_days;
                    $this->form_validation->set_message('checkslvl', 'Youre remaing VL Credit:' . $remaining_vl);
                    return false;
                } else {
                    $this->form_validation->set_message('checkslvl', 'Invalid remaing VL Credit:' . $remaining_vl);
                    return false;
                }
            } elseif ($this->input->post('type_of_leave') == 'Sick Leave') {
                //Compute difference of two days
                $days_between = ceil(abs($end_date - $start_date) / 86400);
                $days_between = $days_between + 1;


                //Compute total Sundays of Filed Date
                $days = $start_date2->diff($end_date2, true)->days;
                $total_sundays = intval($days / 7) + ($start_date2->format('N') + $days % 7 >= 7);

                //Compute total Filed Days
                $filed_days = $days_between - $total_sundays;

                //Fetch remaning VL of employee
                foreach ($techdata as $row) {
                    $remaining_sl = $row->sl_credit;
                }

                //check difference of filed days and remaining vl days
                if ($remaining_sl >= $filed_days) {
                    $remaining_sl = $remaining_sl - $filed_days;
                    $this->form_validation->set_message('checkslvl', 'Youre remaing SL Credit:' . $remaining_sl);
                    return true;
                } else {
                    $this->form_validation->set_message('checkslvl', 'Invalid remaing SL Credit:' . $remaining_sl);
                    return false;
                }
            }
            $this->form_validation->set_message('checkslvl', 'Please Select Employee');
            return false;
        } else {
            $this->form_validation->set_message('checkslvl', 'Please Select Employee Name');
            return false;
        }
    }
}
