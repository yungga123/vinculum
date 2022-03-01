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
                    'required' => 'Please Provide Date of Application'
                ]
            ],
            [
                'field' => 'type_of_leave',
                'label' => 'Type of Leave',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Provide Type of Leave'
                ]
            ],
            [
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'trim|callback_checkslvl'
            ],
            [
                'field' => 'end_date',
                'label' => 'Select Employee',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Provide End Date.'
                ]
            ],
            [
                'field' => 'reason',
                'label' => 'Reason',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please enter a Valid Reason.'
                ]
                ],
                [
                    'field' => 'department',
                    'label' => 'Reason',
                    'rules' => 'trim|required',
                    'errors' => [
                        'required' => 'Please Select Department'
                    ]
                ]
        ];

        return $rules;
    }

    public function index()
    {
        $status = 'approved';
        $this->load->model('TechniciansModel');

        $data['results'] = $this->TechniciansModel->getTechniciansByStatus();
        $data['approvedleave'] = $this->LeaveModel->getapprovedleave($status);
        $data['today_date'] = date('Y-m-d');
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
                'department'            => $this->input->post('department'),
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
        if ($this->session->userdata('logged_in')['class'] == 1) {

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
            
        } else {
            redirect('offlimits');
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
<button type="button" class="btn btn-warning btn-xs btn-block btn_edit_leave" data-toggle="modal" data-target=".leave-edit"><i class="fas fa-sync-alt"></i> Process</button>
<button type="button" class="btn btn-success btn-xs btn-block btn_approve_leave" data-toggle="modal" data-target=".leave-approved"><i class="fas fa-file"></i> Approved</button>
<button type="button" class="btn btn-danger btn-xs btn-block btn_delete_leave" data-toggle="modal" data-target=".leave-delete"><i class="fas fa-trash"></i> Discard</button>
';
            } elseif($status == 'approved') {
                $button = '
<a href="' . site_url('print-leaves/' . $row->id) . '" target="_blank" class="btn btn-xs btn-block btn-success"><i class="fas fa-print"></i>Print</a>
';
            }

            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->lastname . ", " . $row->firstname . " " . $row->middlename;
            $sub_array[] = $row->type_of_leave;
            $sub_array[] = $row->department;
            $sub_array[] = $date_of_application;
            $sub_array[] = $start_date;
            $sub_array[] = $end_date;
            $sub_array[] = $row->reason;
            $sub_array[] = $row->processed_by;
            $sub_array[] = $row->approved_by;
            if($status =='approved'){
                $sub_array[] = $row->notes;
            }
            if($status !='discarded'){
                $sub_array[] = $button;
            }

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

    public function fetch_discarded()
    {
        $status = 'discarded';
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
            $date_approved = date('Y-m-d');

            $this->LeaveModel->update_leave($this->input->post('approve_leave_id'), [
                'status' => 'approved',
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'notes' => $this->input->post('approve_notes'),
                'date_approved' => $date_approved,
                'approved_by' => 'Marvin G. Lucas'

            ]);

            //FOR GENERATE QR CODE
            $approved_day = date_format(date_create($date_approved),'d');
            $approved_month = date_format(date_create($date_approved),'m');
            $approved_year = date_format(date_create($date_approved),'y');
            $leave_id = $this->input->post('approve_leave_id');

            include 'assets/phpqrcode/qrlib.php';
            $text = $approved_year."".$leave_id."".$approved_month."".$approved_day;
			$file = '';
			$file='C:\xampp\htdocs\qr_image/'.$text.".png";
			QRcode::png($text,$file);
            
            //END OF GENERATE QR CODE

        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    function confirmleave_pw()
    {

        if ($this->input->post('passcode') != "") {
            if ($this->input->post('processed_by') == "") {
                $this->form_validation->set_message('confirmleave_pw', 'Please Process First Before Approving Filed Leave');
                return false;
            } else {
                if ($this->input->post('passcode') == "vinculumquery") {
                    return true;
                } else {
                    $this->form_validation->set_message('confirmleave_pw', 'Invalid Password.');
                    return false;
                }
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
                'status' => 'discarded'
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
        if (!empty($this->input->post('employee'))) {
            if($this->input->post('type_of_leave') !=""){
            if($this->input->post('employee_status') != 'Regular' && $this->input->post('type_of_leave') != 'Leave of Absence'){
                $this->form_validation->set_message('checkslvl', 'Invalid, Only Leave of Absence Allowed');
                return false;
            }
            else{
            if ($this->input->post('start_date') != "") {
                if($this->input->post('start_date') > $this->input->post('end_date')){
                    $this->form_validation->set_message('checkslvl', 'Invalid, Entry of Date Range');
                    return false;
                }else{
                    $techdata = $this->LeaveModel->gettechdata($this->input->post('employee'));
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
                            return true;
                        } else {
                            $this->form_validation->set_message('checkslvl', 'Invalid, Set Date Exceeds your remaining Vacation Leave');
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

                         //Fetch remaning SL of employee
                        foreach ($techdata as $row) {
                            $remaining_sl = $row->sl_credit;
                        }

                            if ($filed_days >= 2) {

                                //check difference of filed days and remaining sl days
                                if ($remaining_sl >= $filed_days) {
                                    $remaining_sl = $remaining_sl - $filed_days;
                                    $this->form_validation->set_message('checkslvl', 'Youre remaing SL Credit:' . $remaining_sl);
                                    return true;
                                } else {
                                    $this->form_validation->set_message('checkslvl', 'Invalid, Set Date Exceeds your remaining Sick Leave');
                                    return false;
                                }
                            } else {
                                $this->form_validation->set_message('checkslvl', 'Invalid, Minimum of two days for Sick Leave Filing');
                                return false;
                            }


                    } elseif ($this->input->post('type_of_leave') == 'Leave of Absence') {

                        //Compute difference of two days
                        $days_between = ceil(abs($end_date - $start_date) / 86400);
                        $days_between = $days_between + 1;


                        //Compute total Sundays of Filed Date
                        $days = $start_date2->diff($end_date2, true)->days;
                        $total_sundays = intval($days / 7) + ($start_date2->format('N') + $days % 7 >= 7);

                        //Compute total Filed Days
                        $filed_days = $days_between - $total_sundays;

                        $this->form_validation->set_message('checkslvl', 'Your Total Filed Days' . $filed_days);
                        return true;
                    }
            
            }    } else {
                $this->form_validation->set_message('checkslvl', 'Please Provide Start Date');
                return false;
            }
        }
    }
        } else {
            $this->form_validation->set_message('checkslvl', 'Please Select Employee');
            return false;
        }
    }

    public function check_remaing_leave($id)
    {

        $leave_status = $this->LeaveModel->leave_status($id);

        foreach ($leave_status as $row) {
            $employee_status = $row->status;
            $vl_credit = $row->vl_credit;
            $sl_credit = $row->sl_credit;
        }
        if ($employee_status == "Regular") {
            $validate['vl_credit'] = $vl_credit;
            $validate['sl_credit'] = $sl_credit;
        } else {
            $validate['vl_credit'] = "0";
            $validate['sl_credit'] = "0";
        }
        $validate['employee_status'] = $employee_status;

        echo json_encode($validate);
    }

    public function edit_leave()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'edit_leave_id',
                'label' => 'Leave ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Filed Leave'
                ]
            ],
            [
                'field' => 'edit_start_date',
                'label' => 'Leave ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Start Date'
                ]
            ],
            [
                'field' => 'edit_end_date',
                'label' => 'Leave ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select End Date'
                ]
            ]
        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;


            $this->LeaveModel->update_leave($this->input->post('edit_leave_id'), [
                'start_date' => $this->input->post('edit_start_date'),
                'end_date' => $this->input->post('edit_end_date'),
                'type_of_leave' => $this->input->post('edit_type_of_leave'),
                'processed_by' => $this->input->post('edit_processed_by'),
                'approved_by' => $this->input->post('edit_approved_by')

            ]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function print_filed_leave($leave_id)
    {
        if ($this->session->userdata('logged_in')) {

            $filed_leave_data = $this->LeaveModel->fetch_leave_data($leave_id);

                $data['title'] = 'Filed Leave Print';
            foreach ($filed_leave_data as $row) {
                $data['leave_id'] = $row->id;
                $data['employee_id'] = $row->emp_id;
                $data['date_of_application'] = date_format(date_create($row->date_of_application),'F d, Y');
                $data['department'] = $row->department;
                $data['type_of_leave'] = $row->type_of_leave;
                $data['filed_start_date'] = date_format(date_create($row->start_date),'F d, Y');
                $data['filed_end_date'] = date_format(date_create($row->end_date),'F d, Y');
                $data['reason'] = $row->reason;
                $data['approved_day'] = date_format(date_create($row->date_approved),'d');
                $data['approved_month'] = date_format(date_create($row->date_approved),'m');
                $data['approved_year'] = date_format(date_create($row->date_approved),'y');
                $employee_id = $row->emp_id;

            }

            $employee_data = $this->LeaveModel->fetch_employee_data($employee_id);

            foreach($employee_data as $row){
                $data['firstname'] = $row->firstname;
                $data['middlename'] = $row->middlename;
                $data['lastname'] = $row->lastname;
            }



            $this->load->view('leave/print_filed_leave', $data);
        } else {
            redirect('', 'refresh');
        }
    }
}
