<?php
defined('BASEPATH') or die('Access Denied');

class CovidSurveyController extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model('CovidSurveyModel');
    }

    function validation_rules()
    {
        $rules = [
            [
                'field' => 'taker',
                'label' => 'Taker',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select if you\'re customer or visitor.'
                ]
            ],
            [
                'field' => 'bdate_month',
                'label' => 'Birthdate Month',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select month in birthdate.'
                ]
            ],
            [
                'field' => 'bdate_day',
                'label' => 'Birthdate Day',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select day in birthdate.'
                ]
            ],
            [
                'field' => 'bdate_year',
                'label' => 'Birthdate Year ',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select year in birthdate.'
                ]
            ],
            [
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'trim|required|max_length[500]',
                'errors' => [
                    'required' => 'Last Name is required.',
                    'max_length' => 'Max length for last name is 500.'
                ]
            ],
            [
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'trim|required|max_length[500]',
                'errors' => [
                    'required' => 'First Name is required.',
                    'max_length' => 'Max length for first name is 500.'
                ]
            ],
            [
                'field' => 'mname',
                'label' => 'Middle Name',
                'rules' => 'trim|max_length[500]',
                'errors' => [
                    'max_length' => 'Max length for middle name is 500.'
                ]
            ],
            [
                'field' => 'address',
                'label' => 'Complete Address',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Complete Address is required'
                ]
            ],
            [
                'field' => 'contact',
                'label' => 'Contact Number',
                'rules' => 'trim|required|max_length[50]',
                'errors' => [
                    'required' => 'Contact Number is required',
                    'max_length' => 'Max length for Contact Number is 50.'
                ]
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select gender.'
                ]
            ],
            [
                'field' => 'temp',
                'label' => 'Temperature',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Please indicate your temperature.',
                    'numeric' => 'Temperature must be in numeric form.'
                ]
            ],
            [
                'field' => 'cold',
                'label' => 'Cold',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have cold.'
                ]
            ],
            [
                'field' => 'fever',
                'label' => 'Fever',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have fever.'
                ]
            ],
            [
                'field' => 'cough',
                'label' => 'Cough',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have cough.'
                ]
            ],
            [
                'field' => 'shortbreath',
                'label' => 'Shortness of Breath',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have Shortness of Breath.'
                ]
            ],
            [
                'field' => 'headache',
                'label' => 'Headache',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have headache.'
                ]
            ],
            [
                'field' => 'musclepain',
                'label' => 'Muscle Pain',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have muscle pain.'
                ]
            ],
            [
                'field' => 'sorethroat',
                'label' => 'Sore throat',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have sore throat.'
                ]
            ],
            [
                'field' => 'diarrhea',
                'label' => 'Diarrhea',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have diarrhea.'
                ]
            ],
            [
                'field' => 'odisorder',
                'label' => 'Olfactory disorders (loss of smell)',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have Olfactory disorders (loss of smell).'
                ]
            ],
            [
                'field' => 'tdisorder',
                'label' => 'Taste disorders',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you have Taste disorders.'
                ]
            ],
            [
                'field' => 'exhaustion',
                'label' => 'Exhaustion',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please select indicate if you experience exhaustion.'
                ]
            ],
            [
                'field' => 'notes',
                'label' => 'Agreement Notes',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please agree to important note.'
                ]
            ]
        ];

        return $rules;
    }

    public function index()
    {
        $data['title'] = 'Covid Survey Form';
        $this->load->view('covidsurvey/covidsurvey', $data);
    }

    public function covidsurvey_table()
    {
        if ($this->session->userdata('logged_in')) {

            $this->load->helper('site_helper');

            $data = html_variable();
            $data['title'] = 'COVID Contact Tracing';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('covidsurvey/covidsurvey_table');
            $this->load->view('templates/footer');
            $this->load->view('covidsurvey/script');
        } else {
            redirect('', 'refresh');
        }
    }

    public function get_covid_survey()
    {
        $fetch_data = $this->CovidSurveyModel->covidsurvey_datatable();

        $data = array();
        foreach ($fetch_data as $row) {

            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->middlename;
            $sub_array[] = $row->taker;
            $sub_array[] = date_format(date_create($row->birthdate), 'F d, Y');
            $sub_array[] = $row->complete_address;
            $sub_array[] = $row->contact_number;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->temperature;
            $sub_array[] = $row->cold;
            $sub_array[] = $row->fever;
            $sub_array[] = $row->cough;
            $sub_array[] = $row->short_beath;
            $sub_array[] = $row->headache;
            $sub_array[] = $row->muscle_pain;
            $sub_array[] = $row->sore_throat;
            $sub_array[] = $row->diarrhea;
            $sub_array[] = $row->olfactory_disorder;
            $sub_array[] = $row->taste_disorder;
            $sub_array[] = $row->exhaustion;
            $sub_array[] = '
                <a href="' . site_url('covidsurvey-delete/') . $row->id . '" class="btn btn-danger text-bold btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i> DELETE</a>
            ';

            $data[] = $sub_array;
        }

        $output = array(
            "draw"    =>    intval($_POST["draw"]),
            "recordsTotal" => $this->CovidSurveyModel->get_all_covidsurvey_data(),
            "recordsFiltered" => $this->CovidSurveyModel->filter_covidsurvey_data(),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function validate()
    {
        $validate['success'] = false;

        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = $this->validation_rules();

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

            $birth_date = $this->input->post('bdate_year') . '-' . $this->input->post('bdate_month') . '-' . $this->input->post('bdate_day');

            $data = [
                'lastname'              =>      $this->input->post('lname'),
                'firstname'             =>      $this->input->post('fname'),
                'middlename'            =>      $this->input->post('mname'),
                'taker'                 =>      $this->input->post('taker'),
                'birthdate'             =>      $birth_date,
                'complete_address'      =>      $this->input->post('address'),
                'contact_number'        =>      $this->input->post('contact'),
                'gender'                =>      $this->input->post('gender'),
                'temperature'           =>      $this->input->post('temp'),
                'cold'                  =>      $this->input->post('cold'),
                'fever'                 =>      $this->input->post('fever'),
                'cough'                 =>      $this->input->post('cough'),
                'short_beath'           =>      $this->input->post('shortbreath'),
                'headache'              =>      $this->input->post('headache'),
                'muscle_pain'           =>      $this->input->post('musclepain'),
                'sore_throat'           =>      $this->input->post('sorethroat'),
                'diarrhea'              =>      $this->input->post('diarrhea'),
                'olfactory_disorder'    =>      $this->input->post('odisorder'),
                'taste_disorder'        =>      $this->input->post('tdisorder'),
                'exhaustion'            =>      $this->input->post('exhaustion')
            ];

            $this->CovidSurveyModel->insert($data);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

    public function update_delete($id)
    {
        if ($this->session->userdata('logged_in')) {
            $data = [
                'is_deleted' => '1'
            ];

            $this->CovidSurveyModel->update($id, $data);

            $this->session->set_flashdata('success', 'Success! Data removed.');

            redirect('covidsurvey-table');
        } else {
            redirect('', 'refresh');
        }
    }

    // Export to CSV
    function export()
    {
        $file_name = 'covidsurveys_on_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $results = $this->CovidSurveyModel->select_all();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = [
            'No',
            'Last Name',
            'First Name',
            'Middle Name',
            'Purpose',
            'Birthdate',
            'Complete Address',
            'Contact Number',
            'Gender',
            'Temperature',
            'Cold',
            'Fever',
            'Cough',
            'Short Breath',
            'Headache',
            'Muscle Pain',
            'Sore Throat',
            'Diarrhea',
            'Loss of Smell',
            'Taste Disorder',
            'Exhaustion'
        ];
        fputcsv($file, $header);
        foreach ($results->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }
}
