<?php
defined('BASEPATH') or die('Access Denied');

class PayrollController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model('PayrollModel');
    }
    
    function validation_rules() {

        $this->load->model('TechniciansModel');
        $results = $this->TechniciansModel->fetchTechnicians($this->input->post('emp_id'));

        $vl_credit = 0;
        $sl_credit = 0;
        foreach ($results as $row) {
            $sl_credit = $row->sl_credit;
            $vl_credit = $row->vl_credit;
        }

        $rules = [
			[
				'field' => 'emp_id',
				'label' => 'Select Employee',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Please select employee'
				]
            ],
            [
                'field' => 'daily_rate',
                'label' => 'Daily Rate',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'philhealth_rate',
                'label' => 'Phil Health',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'sss_rate',
                'label' => 'SSS',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'tax_rate',
                'label' => 'Tax Rate',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'pagibig_rate',
                'label' => 'PAG-IBIG',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'days_worked',
                'label' => 'Working Days',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Please provide Days Worked.',
                    'numeric' => 'PAG-IBIG Rate must be a number'
                ]
            ],
            [
                'field' => 'ot_hrs',
                'label' => 'No. of OT Hours',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'hours_late',
                'label' => 'Hours Late',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'night_diff_hrs',
                'label' => 'No. of Night Differential Hours',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'days_absent',
                'label' => 'Days Absent ',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'wdo',
                'label' => 'Working Day-off Days',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'cash_adv',
                'label' => 'Cash Advance',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'reg_holiday',
                'label' => 'Regular Holidays',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'others',
                'label' => 'Other Deductions',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'addback',
                'label' => 'Addback',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'vacation_leave',
                'label' => 'No. of Vacation Leaves',
                'rules' => 'trim|numeric|less_than_equal_to['.$vl_credit.']',
                'errors' => [
                    'numeric' => 'No. of Vacation Leaves must be numeric',
                    'less_than_equal_to' => 'Available number of vacation leaves for this employee is '.$vl_credit.'.'
                ]
            ],
            [
                'field' => 'incentives',
                'label' => 'Incentives',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'sick_leave',
                'label' => 'No. of Sick Leaves',
                'rules' => 'trim|numeric|less_than_equal_to['.$sl_credit.']',
                'errors' => [
                    'numeric' => 'No. of Sick Leaves must be numeric',
                    'less_than_equal_to' => 'Available number of sick leaves for this employee is '.$vl_credit.'.'
                ]
            ],
            [
                'field' => 'commission',
                'label' => 'Commission',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'rest_day',
                'label' => 'No. of Rest Days',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => '13th_month',
                'label' => '13th Month Pay',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'awol',
                'label' => 'No. of AWOLs',
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'remarks',
                'label' => 'Notes',
                'rules' => 'trim'
            ],
            [
                'field' => 'start_date',
                'label' => 'Cutoff Start Date',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'end_date',
                'label' => 'Cutoff End Date',
                'rules' => 'trim|required'
            ]

		];
		return $rules;
    }

    function payroll() {

        $payroll['id'] = '';
        $payroll['cutoff_date'] = '';
        $payroll['start_date'] = '';
        $payroll['end_date'] = '';
        $payroll['emp_id'] = '';
        $payroll['emp_name'] = ''; 
        $payroll['emp_position'] = ''; 
        $payroll['emp_sss_no'] = ''; 
        $payroll['emp_tin_no'] = ''; 
        $payroll['emp_pagibig_no'] = ''; 
        $payroll['emp_philhealth_no'] = ''; 
        $payroll['basic_income_rate'] = ''; 
        $payroll['basic_income_days'] = '';
        $payroll['basic_income_amt'] = ''; 
        $payroll['overtime_rate'] = ''; 
        $payroll['overtime_hrs'] = ''; 
        $payroll['overtime_amt'] = ''; 
        $payroll['nightdiff_rate'] = ''; 
        $payroll['nightdiff_hrs'] = ''; 
        $payroll['nightdiff_amt'] = ''; 
        $payroll['regday_rate'] = ''; 
        $payroll['regday_days'] = '';
        $payroll['regday_amt'] = ''; 
        $payroll['spcday_rate'] = ''; 
        $payroll['spcday_days'] = ''; 
        $payroll['spcday_amt'] = ''; 
        $payroll['incentives'] = ''; 
        $payroll['commission'] = ''; 
        $payroll['13th_month'] = ''; 
        $payroll['addback'] = ''; 
        $payroll['absent_rate'] = ''; 
        $payroll['absent_days'] = ''; 
        $payroll['absent_amt'] = ''; 
        $payroll['tardiness_rate'] = ''; 
        $payroll['tardiness_hrs'] = ''; 
        $payroll['tardiness_amt'] = ''; 
        $payroll['awol_rate'] = ''; 
        $payroll['awol_days'] = '';
        $payroll['awol_amt'] = ''; 
        $payroll['restday_rate'] = ''; 
        $payroll['restday_days'] = ''; 
        $payroll['restday_hrs'] = ''; 
        $payroll['sss_cont'] = '';
        $payroll['pagibig_cont'] = ''; 
        $payroll['philhealth_cont'] = ''; 
        $payroll['tax'] = ''; 
        $payroll['other_deduction'] = ''; 
        $payroll['notes'] = ''; 
        $payroll['gross_pay'] = ''; 
        $payroll['net_pay'] = '';
        $payroll['vl'] = '';
        $payroll['sl'] = '';
        $payroll['vl_pay'] = '';
        $payroll['sl_pay'] = '';
        $payroll['case'] = '';
        $payroll['paid_leaves'] = '';

        return $payroll;

    }

    public function index() {
        if ($this->session->userdata('logged_in')) {

            $this->load->model('TechniciansModel');
            $technicians = $this->TechniciansModel->getTechniciansByStatus();
            $this->load->helper('site_helper');

            $data = html_variable();
            $data['title'] = 'Payroll Computation';
            $data['li_payroll'] = ' active';
            $data['technicians'] = $technicians;
            $data['payroll'] = $this->payroll();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('payroll/payroll');
            $this->load->view('templates/footer');
            $this->load->view('payroll/script');
            
        } else {
            redirect('','refresh');
        }
    }

    public function getTechInfo($id) {
        $validate = [
            'daily_rate' => '',
            'sss' => '',
            'pagibig' => '',
            'philhealth' => '',
            'tax_rate' => ''
        ];
        
        $this->load->model('TechniciansModel');

        $technicians = $this->TechniciansModel->fetchTechnicians($id);

        foreach ($technicians as $row) {
            $validate['daily_rate'] = $row->daily_rate;
            $validate['sss'] = $row->sss_rate;
            $validate['pagibig'] = $row->pag_ibig_rate;
            $validate['philhealth'] = $row->phil_health_rate;
            $validate['tax_rate'] = $row->tax;
        }

		echo json_encode($validate);
    }

    public function addPayrollValidate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;
            $data = [
                'cutoff_start' => $this->input->post('start_date'),
                'cutoff_end' => $this->input->post('end_date'),
                'emp_id' => $this->input->post('emp_id'),
                'days_worked' => $this->input->post('days_worked'),
                'hours_late' => $this->input->post('hours_late'),
                'days_absent' => $this->input->post('days_absent'),
                'cash_adv' => $this->input->post('cash_adv'),
                'others' => $this->input->post('others'),
                'ot_hrs' => $this->input->post('ot_hrs'),
                'night_diff_hrs' => $this->input->post('night_diff_hrs'),
                'wdo' => $this->input->post('wdo'),
                'reg_holiday' => $this->input->post('reg_holiday'),
                'special_holiday' => $this->input->post('special_holiday'),
                'addback' => $this->input->post('addback'),
                'incentives' => $this->input->post('incentives'),
                'commission' => $this->input->post('commission'),
                '13th_month' => $this->input->post('13th_month'),
                'vacation_leave' => $this->input->post('vacation_leave'),
                'sick_leave' => $this->input->post('sick_leave'),
                'rest_day' => $this->input->post('rest_day'),
                'awol' => $this->input->post('awol'),
                'sundays' => $this->input->post('sundays'),
                'remarks' => $this->input->post('remarks')
            ];

            $this->PayrollModel->insert_payroll($data);

            $results = $this->PayrollModel->select_latest();

            foreach ($results as $row) {
                $emp_id = $row->emp_id;
            }

            $this->load->model('TechniciansModel');

            if ($this->input->post('vacation_leave') != '') {
                $this->TechniciansModel->vl_deduct($this->input->post('vacation_leave'),$emp_id);
            }

            if ($this->input->post('sick_leave') != '') {
                $this->TechniciansModel->sl_deduct($this->input->post('sick_leave'),$emp_id);
            }
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function payroll_table() {
        if ($this->session->userdata('logged_in')) {

            $this->load->helper('site_helper');

            $data = html_variable();
            $data['title'] = 'Payroll Table';
            $data['li_payroll'] = ' active';
            $data['start_date'] = '';
            $data['end_date'] = '';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('payroll/payroll_table');
            $this->load->view('templates/footer');
            $this->load->view('payroll/script');
            
        } else {
            redirect('','refresh');
        }
    }

    public function getPayrollData() {

		$fetch_data = $this->PayrollModel->payroll_datatable();
        $payrollURL = "'Delete this payroll?'";

		$data = array();
		foreach($fetch_data as $row) {

            $basic_pay = $row->daily_rate*($row->days_worked - $row->sundays);
            $regular_holiday_pay = $row->daily_rate*$row->reg_holiday;
            $special_holiday_pay = $row->daily_rate*$row->special_holiday*0.3;
            $wdo_pay = $row->daily_rate*$row->wdo*1.3;
            $ot_pay = ($row->daily_rate/8)*1.25*$row->ot_hrs;
            $vac_pay = $row->daily_rate*$row->vacation_leave;
            $sick_pay = $row->daily_rate*$row->sick_leave;
            $night_diff_pay = ($row->daily_rate/8)*0.1*$row->night_diff_hrs;
            $absents = $row->daily_rate*$row->days_absent;
            $awol = $row->daily_rate*$row->awol;
            $rest_days = $row->daily_rate*$row->rest_day;
            $tardiness = ($row->daily_rate/8)*$row->hours_late;
            $gross_pay = ($basic_pay+$regular_holiday_pay+$special_holiday_pay+$wdo_pay+$ot_pay+$night_diff_pay+$vac_pay+$sick_pay) - ($absents+$tardiness+$awol+$rest_days);
            $contribution = $row->sss_rate+$row->pag_ibig_rate+$row->phil_health_rate;
            $net_pay = $gross_pay+$row->incentives+$row->commission+$row->thirteenth_month+$row->addback - ($contribution+$row->tax+$row->cash_adv+$row->others);

			$sub_array = array();
            $sub_array[] = $row->payroll_id;
            $sub_array[] = date_format(date_create($row->cutoff_start),'F d, Y').' - '.date_format(date_create($row->cutoff_end),'F d, Y');
            $sub_array[] = $row->emp_id;
            $sub_array[] = $row->firstname.' '.$row->middlename.' '.$row->lastname;
            $sub_array[] = $row->position;
            $sub_array[] = $row->daily_rate;
            $sub_array[] = number_format($gross_pay,2);
            $sub_array[] = number_format($net_pay,2);

			$sub_array[] = '

			<a href="'.site_url('payslip-update/'.$row->payroll_id).'" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> 

            <a href="'.site_url('payroll-delete/'.$row->payroll_id).'" class="btn btn-danger btn-xs" onclick="return confirm('.$payrollURL.')"><i class="fas fa-trash"></i></a>
            
            <a href="'.site_url('payslip/'.$row->payroll_id).'" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-search"></i></a> 

			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->PayrollModel->get_all_payroll_data(),
			"recordsFiltered" => $this->PayrollModel->filter_payroll_data(),
			"data" => $data
		);

		echo json_encode($output);
    }

    public function payslip_view($id) {
        if($this->session->userdata('logged_in')) {
            $results = $this->PayrollModel->select_payroll($id);

            $payroll = $this->payroll();

            foreach ($results as $row) {
                $payroll['cutoff_date'] = date_format(date_create($row->cutoff_start),'M d, Y').' - '.date_format(date_create($row->cutoff_end),'M d, Y');
                $payroll['id'] = $row->payroll_id;
                $payroll['emp_id'] = $row->emp_id;
                $payroll['emp_name'] = $row->firstname.' '.$row->middlename.' '.$row->lastname; 
                $payroll['emp_position'] = $row->position; 
                $payroll['emp_sss_no'] = $row->sss_number; 
                $payroll['emp_tin_no'] = $row->tin_number; 
                $payroll['emp_pagibig_no'] = $row->pagibig_number; 
                $payroll['emp_philhealth_no'] = $row->phil_health_number; 
                $payroll['basic_income_rate'] = $row->daily_rate; 
                $payroll['basic_income_days'] = $row->days_worked - $row->sundays - $row->rest_day;
                $payroll['basic_income_amt'] = $row->daily_rate*$payroll['basic_income_days']; 
                $payroll['overtime_rate'] = ($row->daily_rate/8)*1.25; 
                $payroll['overtime_hrs'] = $row->ot_hrs; 
                $payroll['overtime_amt'] = $payroll['overtime_rate']*$payroll['overtime_hrs']; 
                $payroll['nightdiff_rate'] = ($row->daily_rate/8)*0.1; 
                $payroll['nightdiff_hrs'] = $row->night_diff_hrs; 
                $payroll['nightdiff_amt'] = $payroll['nightdiff_rate']*$payroll['nightdiff_hrs']; 
                $payroll['regday_rate'] = $row->daily_rate; 
                $payroll['regday_days'] = $row->reg_holiday;
                $payroll['regday_amt'] = $payroll['regday_rate']*$payroll['regday_days']; 
                $payroll['spcday_rate'] = $row->daily_rate*0.3; 
                $payroll['spcday_days'] = $row->special_holiday; 
                $payroll['spcday_amt'] = $payroll['spcday_rate']*$payroll['spcday_days'];
                $payroll['wdo_rate'] = $row->daily_rate*1.3;
                $payroll['wdo_days'] = $row->wdo;
                $payroll['wdo_amt'] = $payroll['wdo_rate']*$payroll['wdo_days'];
                $payroll['incentives'] = $row->incentives; 
                $payroll['commission'] = $row->commission; 
                $payroll['13th_month'] = $row->thirteenth_month; 
                $payroll['addback'] = $row->addback; 
                $payroll['absent_rate'] = $row->daily_rate; 
                $payroll['absent_days'] = $row->days_absent; 
                $payroll['absent_amt'] = $payroll['absent_rate']* $payroll['absent_days']; 
                $payroll['tardiness_rate'] = $row->daily_rate/8; 
                $payroll['tardiness_hrs'] = $row->hours_late; 
                $payroll['tardiness_amt'] = $payroll['tardiness_rate']*$payroll['tardiness_hrs']; 
                $payroll['awol_rate'] = $row->daily_rate; 
                $payroll['awol_days'] = $row->awol;
                $payroll['awol_amt'] = $payroll['awol_rate']*$payroll['awol_days']; 
                $payroll['sss_cont'] = $row->sss_rate;
                $payroll['pagibig_cont'] = $row->pag_ibig_rate; 
                $payroll['philhealth_cont'] = $row->phil_health_rate; 
                $payroll['restday_days'] = $row->rest_day;
                $payroll['tax'] = $row->tax;
                $payroll['sundays'] = $row->sundays;
                $payroll['cash_adv'] = $row->cash_adv; 
                $payroll['other_deduction'] = $row->others; 
                $payroll['vl'] = $row->vacation_leave;
                $payroll['sl'] = $row->sick_leave;
                $payroll['vl_pay'] = $payroll['vl']*$payroll['basic_income_rate'];
                $payroll['sl_pay'] = $payroll['sl']*$payroll['basic_income_rate'];
                $payroll['notes'] = $row->notes;
                $payroll['gross_pay'] = ($payroll['basic_income_amt']+$payroll['overtime_amt']+$payroll['nightdiff_amt']+$payroll['regday_amt']+$payroll['spcday_amt']+$payroll['wdo_amt']+$payroll['vl_pay']+$payroll['sl_pay']) - ($payroll['absent_amt']+$payroll['tardiness_amt']+$payroll['awol_amt']);
                $payroll['net_pay'] = ($payroll['gross_pay']+$payroll['incentives']+$payroll['commission']+$payroll['13th_month']+$payroll['addback'])-($payroll['sss_cont']+$payroll['pagibig_cont']+$payroll['philhealth_cont']+$payroll['cash_adv']+$payroll['other_deduction']+$payroll['tax']);
            }
			$data = [
                'title' => 'Print',
                'payroll' => $payroll
            ];
            
			$this->load->view('payroll/payroll_view',$data);

		} else {
			redirect('', 'refresh');
		}
    }

    public function update_payroll($id) {
        if ($this->session->userdata('logged_in')) {

            $this->load->model('TechniciansModel');
            $technicians = $this->TechniciansModel->getTechniciansByStatus();
            $results = $this->PayrollModel->select_payroll($id);
            $this->load->helper('site_helper');

            $payroll = $this->payroll();
            $payroll['case'] = 'update';
            

            foreach ($results as $row) {
                $payroll['id'] = $row->payroll_id;
                $payroll['cutoff_date'] = date_format(date_create($row->cutoff_start),'M d, Y').' - '.date_format(date_create($row->cutoff_end),'M d, Y');
                $payroll['start_date'] = $row->cutoff_start;
                $payroll['end_date'] = $row->cutoff_end;
                $payroll['emp_id'] = $row->emp_id;
                $payroll['emp_name'] = $row->firstname.' '.$row->middlename.' '.$row->lastname; 
                $payroll['emp_position'] = $row->position; 
                $payroll['emp_sss_no'] = $row->sss_number; 
                $payroll['emp_tin_no'] = $row->tin_number; 
                $payroll['emp_pagibig_no'] = $row->pagibig_number; 
                $payroll['emp_philhealth_no'] = $row->phil_health_number; 
                $payroll['basic_income_rate'] = $row->daily_rate; 
                $payroll['basic_income_days'] = $row->days_worked - $row->sundays - $row->rest_day;
                $payroll['basic_income_amt'] = $row->daily_rate*$payroll['basic_income_days']; 
                $payroll['overtime_rate'] = ($row->daily_rate/8)*1.25; 
                $payroll['overtime_hrs'] = $row->ot_hrs; 
                $payroll['overtime_amt'] = $payroll['overtime_rate']*$payroll['overtime_hrs']; 
                $payroll['nightdiff_rate'] = ($row->daily_rate/8)*0.1; 
                $payroll['nightdiff_hrs'] = $row->night_diff_hrs; 
                $payroll['nightdiff_amt'] = $payroll['nightdiff_rate']*$payroll['nightdiff_hrs']; 
                $payroll['regday_rate'] = $row->daily_rate; 
                $payroll['regday_days'] = $row->reg_holiday;
                $payroll['regday_amt'] = $payroll['regday_rate']*$payroll['regday_days']; 
                $payroll['spcday_rate'] = $row->daily_rate*0.3; 
                $payroll['spcday_days'] = $row->special_holiday; 
                $payroll['spcday_amt'] = $payroll['spcday_rate']*$payroll['spcday_days'];
                $payroll['wdo_rate'] = $row->daily_rate*1.3;
                $payroll['wdo_days'] = $row->wdo;
                $payroll['wdo_amt'] = $payroll['wdo_rate']*$payroll['wdo_days'];
                $payroll['incentives'] = $row->incentives; 
                $payroll['commission'] = $row->commission; 
                $payroll['13th_month'] = $row->thirteenth_month; 
                $payroll['addback'] = $row->addback; 
                $payroll['absent_rate'] = $row->daily_rate; 
                $payroll['absent_days'] = $row->days_absent; 
                $payroll['absent_amt'] = $payroll['absent_rate']* $payroll['absent_days']; 
                $payroll['tardiness_rate'] = $row->daily_rate/8; 
                $payroll['tardiness_hrs'] = $row->hours_late; 
                $payroll['tardiness_amt'] = $payroll['tardiness_rate']*$payroll['tardiness_hrs']; 
                $payroll['awol_rate'] = $row->daily_rate; 
                $payroll['awol_days'] = $row->awol;
                $payroll['awol_amt'] = $payroll['awol_rate']*$payroll['awol_days']; 
                $payroll['sss_cont'] = $row->sss_rate;
                $payroll['pagibig_cont'] = $row->pag_ibig_rate; 
                $payroll['philhealth_cont'] = $row->phil_health_rate;
                $payroll['restday_days'] = $row->rest_day;
                $payroll['tax'] = $row->tax;
                $payroll['sundays'] = $row->sundays;
                $payroll['cash_adv'] = $row->cash_adv;
                $payroll['other_deduction'] = $row->others; 
                $payroll['notes'] = $row->notes;
                $payroll['vl'] = $row->vacation_leave;
                $payroll['sl'] = $row->sick_leave;
                $payroll['vl_pay'] = $payroll['vl']*$payroll["basic_income_rate"];
                $payroll['sl_pay'] = $payroll['sl']*$payroll["basic_income_rate"];
                $payroll['gross_pay'] = ($payroll['basic_income_amt']+$payroll['overtime_amt']+$payroll['nightdiff_amt']+$payroll['regday_amt']+$payroll['spcday_amt']+$payroll['wdo_amt']+$payroll['vl_pay']+$payroll['sl_pay']) - ($payroll['absent_amt']+$payroll['tardiness_amt']+$payroll['awol_amt']);
                $payroll['net_pay'] = ($payroll['gross_pay']+$payroll['incentives']+$payroll['commission']+$payroll['13th_month']+$payroll['addback'])-($payroll['sss_cont']+$payroll['pagibig_cont']+$payroll['philhealth_cont']+$payroll['cash_adv']+$payroll['other_deduction']+$payroll['tax']);
            }

            $data = html_variable();
            $data['title'] = 'Payroll Computation';
            $data['li_payroll'] = ' active';
            $data['technicians'] = $technicians;
            $data['payroll'] = $payroll;

            

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('payroll/payroll');
            $this->load->view('templates/footer');
            $this->load->view('payroll/script');
            
        } else {
            redirect('','refresh');
        }
    }

    public function updatePayrollValidate($id) {
        $validate = [
			'success' => false,
			'errors' => ''
        ];
        
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $this->load->model('TechniciansModel');

            $empid = $this->input->post('emp_id');
            if ($this->input->post('vacation_leave') != '') {
                if($this->input->post('vacation_leave') > $this->input->post('vl_hidden'))  {
                    $minusvl = $this->input->post('vacation_leave') - $this->input->post('vl_hidden');
                    $this->TechniciansModel->vl_deduct($minusvl,$empid);
                }
                elseif($this->input->post('vacation_leave') < $this->input->post('vl_hidden'))  {
                    $addvl = $this->input->post('vl_hidden') - $this->input->post('vacation_leave');
                    $this->TechniciansModel->vl_return($addvl,$empid);
                }
            }

            if ($this->input->post('sick_leave') != '') {
                if($this->input->post('sick_leave') > $this->input->post('sl_hidden'))  {
                    $minussl = $this->input->post('sick_leave') - $this->input->post('sl_hidden');
                    $this->TechniciansModel->sl_deduct($minussl,$empid);
                }   
                elseif($this->input->post('sick_leave') < $this->input->post('sl_hidden'))  {
                    $addsl = $this->input->post('sl_hidden') - $this->input->post('sick_leave');
                    $this->TechniciansModel->sl_return($addsl,$empid);
                } 
            }
   
            
            $data = [
                'cutoff_start' => $this->input->post('start_date'),
                'cutoff_end' => $this->input->post('end_date'),
                'emp_id' => $this->input->post('emp_id'),
                'days_worked' => $this->input->post('days_worked'),
                'hours_late' => $this->input->post('hours_late'),
                'days_absent' => $this->input->post('days_absent'),
                'cash_adv' => $this->input->post('cash_adv'),
                'others' => $this->input->post('others'),
                'ot_hrs' => $this->input->post('ot_hrs'),
                'night_diff_hrs' => $this->input->post('night_diff_hrs'),
                'wdo' => $this->input->post('wdo'),
                'reg_holiday' => $this->input->post('reg_holiday'),
                'special_holiday' => $this->input->post('special_holiday'),
                'addback' => $this->input->post('addback'),
                'incentives' => $this->input->post('incentives'),
                'commission' => $this->input->post('commission'),
                '13th_month' => $this->input->post('13th_month'),
                'vacation_leave' => $this->input->post('vacation_leave'),
                'sick_leave' => $this->input->post('sick_leave'),
                'rest_day' => $this->input->post('rest_day'),
                'awol' => $this->input->post('awol'),
                'remarks' => $this->input->post('remarks')
            ];

            $this->PayrollModel->update_payroll($id,$data);
           

		} 
		else {
		    $validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
    }

    public function payroll_table_filter() {

        if ($this->session->userdata('logged_in')) {

            $start_date = $this->input->post('cutoff_filter_start');
            $end_date = $this->input->post('cutoff_filter_end');

            $this->load->helper('site_helper');

            $data = html_variable();
            $data['title'] = 'Payroll Table';
            $data['li_payroll'] = ' active';
            $data['payroll_filter'] = $this->PayrollModel->select_payroll_filter($start_date,$end_date);
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('payroll/payroll_table');
            $this->load->view('templates/footer');
            $this->load->view('payroll/script');
            
        } else {
            redirect('','refresh');
        }
    }

    public function payslip_print($start_date,$end_date) {
        if($this->session->userdata('logged_in')) {


            $results = $this->PayrollModel->select_payroll_filter($start_date,$end_date);


			$data = [
                'title' => 'Print Payroll',
                'results' => $results
            ];
            
			$this->load->view('payroll/payroll_print',$data);

		} else {
			redirect('', 'refresh');
		}
    }

    public function payslip_print_all() {
        if($this->session->userdata('logged_in')) {


            $results = $this->PayrollModel->select_payroll_all();


			$data = [
                'title' => 'Print Payroll',
                'results' => $results
            ];
            
			$this->load->view('payroll/payroll_print',$data);

		} else {
			redirect('', 'refresh');
		}
    }

    public function deletePayroll($id) {
        
        $this->PayrollModel->update_payroll($id,[
            'is_deleted' => '1'
        ]);

        $this->session->set_flashdata('success', 'Success! Payroll Deleted.');
        redirect('payroll-table');
    }

    public function cutoff_selection_validate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
        
        $rules = [
            [
				'field' => 'cutoff_start_modal',
				'label' => 'Cut-off Start',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Fill out start of cut-off.'
				]
            ],
            [
				'field' => 'cutoff_end_modal',
				'label' => 'Cut-off End',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Fill out end of cut-off.'
				]
            ]
        ];
        
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
            $validate['success'] = true;
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }
}