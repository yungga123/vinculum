<?php 
defined('BASEPATH') or die('Access Denied');

class HomeAlarmFormController extends CI_Controller {

    public function __construct() {
        Parent::__construct();

    }

    public function validation_rules() {
        $rules = [
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
            ],
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

		$this->form_validation->set_rules($this->validation_rules());

		if ($this->form_validation->run()) {
            $validate['success'] = true;
		} 
		else {
		    $validate['errors'] = validation_errors();
		}
        echo json_encode($validate);
    }

}