<?php 
defined('BASEPATH') or die('Access Denied');

class HomeAlarmFormController extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model('HomeAlarmFormModel');
        date_default_timezone_set('Asia/Manila');

    }

    public function validation_rules($case) {

        $rule1 = [
            [
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'trim|required|max_length[500]'
            ],
            [
                'field' => 'middle_name',
                'label' => 'Middle Name',
                'rules' => 'trim|required|max_length[500]'
            ],
            [
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'trim|required|max_length[500]'
            ],
            [
                'field' => 'bdate_month',
                'label' => 'Birthdate Month',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Month in Birthdate']
            ],
            [
                'field' => 'bdate_day',
                'label' => 'Birthdate Day',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Day in Birthdate']
            ],
            [
                'field' => 'bdate_year',
                'label' => 'Birthdate Year',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Year in Birthdate']
            ],
            [
                'field' => 'email_address',
                'label' => 'Email Address',
                'rules' => 'trim|required|max_length[500]|valid_email'
            ],
            [
                'field' => 'nationality',
                'label' => 'Nationality',
                'rules' => 'trim|required|max_length[500]'
            ],
            [
                'field' => 'residence_address',
                'label' => 'Residence Address',
                'rules' => 'trim|required|max_length[1500]'
            ],
            [
                'field' => 'contact_no',
                'label' => 'Contact No.',
                'rules' => 'trim|required|max_length[100]'
            ],
            [
                'field' => 'spouse_first_name',
                'label' => 'Spouse First Name',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'spouse_middle_name',
                'label' => 'Spouse Middle Name',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'spouse_last_name',
                'label' => 'Spouse Last Name',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'spouse_bdate_month',
                'label' => 'Spouse Birthdate Month',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Spouse Birthdate Month']
            ],
            [
                'field' => 'spouse_bdate_day',
                'label' => 'Spouse Birthdate Day',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Spouse Birthdate Day']
            ],
            [
                'field' => 'spouse_bdate_year',
                'label' => 'Spouse Birthdate Year',
                'rules' => 'trim|required',
                'errors' => ['required' => 'Please select Spouse Birthdate Year']
            ],
            [
                'field' => 'spouse_email_address',
                'label' => 'Spouse Email Address',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'spouse_nationality',
                'label' => 'Spouse Nationality',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'spouse_contact_no',
                'label' => 'Spouse Contact No.',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'household_count',
                'label' => 'Household Count',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'house_floors',
                'label' => 'House Floors',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'signal_strength',
                'label' => 'Signal Strength',
                'rules' => 'trim|max_length[20]|numeric'
            ],
            [
                'field' => 'demo_kit_presentation',
                'label' => 'Signal Strength',
                'rules' => 'trim|max_length[50]'
            ],
            [
                'field' => 'property_type',
                'label' => 'Property Type',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'helpers_number',
                'label' => 'Number of Helpers',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'speed_test',
                'label' => 'Network Speedtest',
                'rules' => 'trim|max_length[20]|numeric'
            ],
            [
                'field' => 'gps_coordinate',
                'label' => 'Network Speedtest',
                'rules' => 'trim|max_length[500]'
            ],
            [
                'field' => 'pets_number',
                'label' => 'Number of Pets',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'pets_number',
                'label' => 'Number of Pets',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'lot_area',
                'label' => 'Lot Area',
                'rules' => 'trim|max_length[20]|numeric'
            ],
            [
                'field' => 'isp',
                'label' => 'Internet Service Provider',
                'rules' => 'trim|max_length[200]'
            ]
        ];

        
        $rule2 = [
            
            [
                'field' => 'host_panel',
                'label' => 'Alarm Host Panel',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'magnetic_contact',
                'label' => 'Door/Window Magnetic Contact',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'indoor_motionsensor',
                'label' => 'Indoor Motion Detector',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'host_panel',
                'label' => 'Alarm Host Panel',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'indoor_siren',
                'label' => 'Indoor Siren',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'ic_card_tags',
                'label' => 'IC Card Tags',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'panic_button',
                'label' => 'Panic Button',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'wireless_repeater',
                'label' => 'Wireless Repeater',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'displacement_detector',
                'label' => 'Displacement Detector',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'outdoor_motionsensor',
                'label' => 'Outdoor Motion Sensor',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'water_leak_detector',
                'label' => 'Water Leak Detector',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'smoke_detector',
                'label' => 'Smoke Detector',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'outdoor_siren',
                'label' => 'Outdoor Siren',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'wireless_keypad',
                'label' => 'Wireless Keypad',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'alarm_output_expander',
                'label' => 'Output Expander',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'cctv',
                'label' => 'CCTV',
                'rules' => 'trim|max_length[11]|integer'
            ],
            [
                'field' => 'final_remarks',
                'label' => 'Final Remarks',
                'rules' => 'trim'
            ],
            [
                'field' => 'i_agree',
                'label' => 'I Agree',
                'rules' => 'trim|required',
                'errors' => ['required' => 'You must agree to the terms.']
            ]
        ];

        if ($case == 'add') {
            $rules = array_merge($rule1,$rule2);
        } else {
            $rules = $rule1;
        }
        

        return $rules;
    }

    public function index() {

        $data['title'] = 'Home Alarm Application';

        $this->load->view('home_alarm_form/home_alarm_form',$data);
    }

    public function add_home_alarm_validate() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p><b>• ','</b></p>');

		$this->form_validation->set_rules($this->validation_rules('add'));

		if ($this->form_validation->run()) {
            $validate['success'] = true;
            $customer_id = '';

            $data_client = [
                'datetime_added' => date('Y-m-d H:i:s'),
                'first_name' => strtoupper($this->input->post('first_name')),
                'middle_name' => strtoupper($this->input->post('middle_name')),
                'last_name' => strtoupper($this->input->post('last_name')),
                'bdate' => $this->input->post('bdate_year').'-'.$this->input->post('bdate_month').'-'.$this->input->post('bdate_day'),
                'email_address' => $this->input->post('email_address'),
                'nationality' => strtoupper($this->input->post('nationality')),
                'residence_address' => strtoupper($this->input->post('residence_address')),
                'contact_no' => strtoupper($this->input->post('contact_no')),
                'spouse_first_name' => strtoupper($this->input->post('spouse_first_name')),
                'spouse_middle_name' => strtoupper($this->input->post('spouse_middle_name')),
                'spouse_last_name' => strtoupper($this->input->post('spouse_last_name')),
                'spouse_bdate' => $this->input->post('spouse_bdate_year').'-'.$this->input->post('spouse_bdate_month').'-'.$this->input->post('spouse_bdate_day'),
                'spouse_email_address' => $this->input->post('spouse_email_address'),
                'spouse_nationality' => strtoupper($this->input->post('spouse_nationality')),
                'spouse_contact_no' => strtoupper($this->input->post('spouse_contact_no')),
                'household_count' => $this->input->post('household_count'),
                'house_floors' => $this->input->post('house_floors'),
                'signal_strength' => $this->input->post('signal_strength'),
                'demo_kit_presentation' => strtoupper($this->input->post('demo_kit_presentation')),
                'property_type' => strtoupper($this->input->post('property_type')),
                'helpers_number' => $this->input->post('helpers_number'),
                'speed_test' => strtoupper($this->input->post('speed_test')),
                'gps_coordinate' => strtoupper($this->input->post('gps_coordinate')),
                'pets_number' => $this->input->post('pets_number'),
                'lot_area' => $this->input->post('lot_area'),
                'isp' => strtoupper($this->input->post('isp'))
            ];

            $this->HomeAlarmFormModel->insert_client($data_client);

            foreach ($this->HomeAlarmFormModel->get_latest_homealarm_client() as $row) {
                $customer_id = $row->id;
            }


            $data_transaction = [
                'customer_id' => $customer_id,
                'wireless_keypad' => $this->input->post('wireless_keypad'),
                'magnetic_contact' => $this->input->post('magnetic_contact'),
                'displacement_detector' => $this->input->post('displacement_detector'),
                'indoor_motionsensor' => $this->input->post('indoor_motionsensor'),
                'water_leak_detector' => $this->input->post('water_leak_detector'),
                'indoor_siren' => $this->input->post('indoor_siren'),
                'ic_card_tags' => $this->input->post('ic_card_tags'),
                'outdoor_motionsensor' => $this->input->post('outdoor_motionsensor'),
                'alarm_output_expander' => $this->input->post('alarm_output_expander'),
                'outdoor_siren' => $this->input->post('outdoor_siren'),
                'remote_keyfob' => $this->input->post('remote_keyfob'),
                'panic_button' => $this->input->post('panic_button'),
                'host_panel' => $this->input->post('host_panel'),
                'smoke_detector' => $this->input->post('smoke_detector'),
                'wireless_repeater' => $this->input->post('wireless_repeater'),
                'cctv' => $this->input->post('cctv'),
                'final_remarks' => strtoupper($this->input->post('final_remarks'))
            ];

            $this->HomeAlarmFormModel->insert_transaction($data_transaction);
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

    public function home_alarm_clients() {
        if($this->session->userdata('logged_in')) {
			$this->load->helper('site_helper');
			$data = html_variable();
			$data['title'] = 'Home Alarm Clients';
            $data['home_alarm_tree'] = ' menu-open';
            $data['home_alarm'] = ' active';
            $data['home_alarm_display'] = ' block';
            $data['home_alarm_clients'] = ' active';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('home_alarm_form/home_alarm_clients');
			$this->load->view('templates/footer');
            $this->load->view('home_alarm_form/script');
		} else {
			redirect('','refresh');
		}
    }

    public function fetch_home_alarm_clients() {
        $fetch_data = $this->HomeAlarmFormModel->home_alarm_datatable();
		$data = array();

		foreach ($fetch_data as $row) {
			
            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = '
                <a href="'.site_url('home-alarm-update/'.$row->id).'" class="btn btn-xs btn-block btn-warning text-bold"><i class="fas fa-edit"></i> EDIT</a>

                <button class="btn btn-xs btn-block btn-danger text-bold"><i class="fas fa-trash"></i> DELETE</button>

                <button class="btn btn-xs btn-block btn-success text-bold"><i class="fas fa-dollar-sign"></i> QUOTE</button>

                <button class="btn btn-xs btn-block btn-primary text-bold"><i class="fas fa-file-alt"></i> CONTRACT</button>
            ';
            $sub_array[] = ($row->datetime_added != '0000-00-00 00:00:00') ? date_format(date_create($row->datetime_added),'M d, Y h:iA') : '' ;
            $sub_array[] = $row->first_name.' '.$row->middle_name.' '.$row->last_name;
            $sub_array[] = ($row->bdate != '0000-00-00') ? date_format(date_create($row->bdate),'M d, Y') : '' ;
            $sub_array[] = $row->email_address;
            $sub_array[] = $row->nationality;
            $sub_array[] = $row->residence_address;
            $sub_array[] = $row->contact_no;
            $sub_array[] = $row->spouse_first_name.' '.$row->spouse_middle_name.' '.$row->spouse_last_name;
            $sub_array[] = ($row->spouse_bdate != '0000-00-00') ? date_format(date_create($row->spouse_bdate),'M d, Y') : '';
            $sub_array[] = $row->spouse_email_address;
            $sub_array[] = $row->spouse_nationality;
            $sub_array[] = $row->spouse_contact_no;
            $sub_array[] = $row->household_count;
            $sub_array[] = $row->house_floors;
            $sub_array[] = $row->signal_strength.'dBm';
            $sub_array[] = $row->demo_kit_presentation;
            $sub_array[] = $row->property_type;
            $sub_array[] = $row->helpers_number;
            $sub_array[] = $row->speed_test.'MBPS';
            $sub_array[] = $row->gps_coordinate;
            $sub_array[] = $row->pets_number;
            $sub_array[] = $row->lot_area;
            $sub_array[] = $row->isp;


			$data[] = $sub_array;
		}
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->HomeAlarmFormModel->get_all_home_alarm_data(),
			"recordsFiltered" => $this->HomeAlarmFormModel->filter_home_alarm_data(),
			"data" => $data
		);

		echo json_encode($output);
    }

    public function update_home_alarm_client($id) {
        $data['title'] = 'Home Alarm Application';
        $data['clients'] = $this->HomeAlarmFormModel->get_home_alarm_client_data($id);

        $this->load->view('home_alarm_form/home_alarm_form',$data);
    }

    public function update_home_alarm_validate_client() {
        $validate = [
			'success' => false,
			'errors' => ''
		];
		
		$this->form_validation->set_error_delimiters('<p><b>• ','</b></p>');

		$this->form_validation->set_rules($this->validation_rules('edit'));

		if ($this->form_validation->run()) {
            $validate['success'] = true;

            $id = $this->input->post('client_id');
            $data = [
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'bdate' => $this->input->post('bdate'),
                'email_address' => $this->input->post('email_address'),
                'nationality' => $this->input->post('nationality'),
                'residence_address' => $this->input->post('residence_address'),
                'contact_no' => $this->input->post('contact_no'),
                'spouse_first_name' => $this->input->post('spouse_first_name'),
                'spouse_middle_name' => $this->input->post('spouse_middle_name'),
                'spouse_last_name' => $this->input->post('spouse_last_name'),
                'spouse_bdate' => $this->input->post('spouse_bdate'),
                'spouse_email_address' => $this->input->post('spouse_email_address'),
                'spouse_nationality' => $this->input->post('spouse_nationality'),
                'spouse_contact_no' => $this->input->post('spouse_contact_no'),
                'household_count' => $this->input->post('household_count'),
                'house_floors' => $this->input->post('house_floors'),
                'signal_strength' => $this->input->post('signal_strength'),
                'demo_kit_presentation' => $this->input->post('demo_kit_presentation'),
                'property_type' => $this->input->post('property_type'),
                'helpers_number' => $this->input->post('helpers_number'),
                'speed_test' => $this->input->post('speed_test'),
                'gps_coordinate' => $this->input->post('gps_coordinate'),
                'pets_number' => $this->input->post('pets_number'),
                'lot_area' => $this->input->post('lot_area'),
                'isp' => $this->input->post('isp')
            ];

            $this->HomeAlarmFormModel->update_client($id,$data);
            
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

}