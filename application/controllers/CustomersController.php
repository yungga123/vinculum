<?php
defined('BASEPATH') or die('Access Denied');

class CustomersController extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Customers';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_table');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function get_customers()
	{

		$this->load->model('CustomersModel');
		$fetch_data = $this->CustomersModel->customervt_datatable();

		$data = array();
		foreach ($fetch_data as $row) {
			$installationDate = '';

			if ($row->InstallationDate != '0000-00-00') {
				$installationDate = date_format(date_create($row->InstallationDate), 'F d, Y');
			}

			$sub_array = array();
			$sub_array[] = $row->CustomerID;
			$sub_array[] = '<a href="' . site_url('customer-details/') . $row->CustomerID . '" target="_blank">' . $row->CompanyName . '</a>';
			$sub_array[] = $row->ContactPerson;
			$sub_array[] = $row->Address;
			$sub_array[] = $row->ContactNumber;
			$sub_array[] = $row->EmailAddress;
			$sub_array[] = $row->Website;
			$sub_array[] = $installationDate;
			$sub_array[] = $row->Interest;
			$sub_array[] = $row->Type;
			$sub_array[] = $row->Notes;
			$sub_array[] = '

			<a href="' . site_url('customers-update/' . $row->CustomerID) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> 

			<button type="button" class="btn btn-danger btn-sm btn-deleteclient" data-toggle="modal" data-target=".modal-deletecustomer"><i class="fas fa-trash"></i> Delete</button>

			<button type="button" class="btn btn-success btn-sm btn-addcustomerfile" data-toggle="modal" data-target=".modal-addcustomer-file"><i class="fas fa-plus"></i> Add File</button>

			<a href="#" class="btn btn-primary btn-sm btn_existing_view" target="_blank" data-toggle="modal" data-target=".modal_view_project"><i class="fas fa-search"></i>  View Projects</a>

			';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"recordsTotal" => $this->CustomersModel->get_all_customervt_data(),
			"recordsFiltered" => $this->CustomersModel->filter_customervt_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function customer_add()
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Register New Client';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_add');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function customer_add_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'customer_name',
				'label' => 'Customer Name',
				'rules' => 'trim|max_length[255]|required|is_unique[customer_vt.CompanyName]',
				'errors' => [
					'is_unique' => 'The Customer is already existing. If in case of different branch, just add another modifier. For Example, "Jollibee 2"'
				]
			],
			[
				'field' => 'contact_person',
				'label' => 'Contact Person',
				'rules' => 'trim|max_length[255]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_address',
				'label' => 'Address',
				'rules' => 'trim|max_length[1500]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'contact_number',
				'label' => 'Contact Details',
				'rules' => 'trim|max_length[255]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'email_address',
				'label' => 'Email Address',
				'rules' => 'trim|valid_email|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'website',
				'label' => 'Website',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'installation_date',
				'label' => 'Installation Date',
				'rules' => 'trim',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_interest',
				'label' => 'Interest',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_type',
				'label' => 'Type',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_notes',
				'label' => 'Notes',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$data = [
				'CompanyName' => $this->input->post('customer_name'),
				'ContactPerson' => $this->input->post('contact_person'),
				'Address' => $this->input->post('customer_address'),
				'ContactNumber' => $this->input->post('contact_number'),
				'EmailAddress' => $this->input->post('email_address'),
				'Website' => $this->input->post('customer_website'),
				'InstallationDate' => $this->input->post('installation_date'),
				'Interest' => $this->input->post('customer_interest'),
				'Type' => $this->input->post('customer_type'),
				'Notes' => $this->input->post('customer_notes')
			];


			$this->load->model('CustomersModel');
			$this->CustomersModel->add_vtCustomer($data);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function customer_update($customer_id)
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$this->load->model('CustomersModel');
			$results = $this->CustomersModel->getVtCustomers($customer_id);

			$data = html_variable();
			$data['title'] = 'Update Client';
			$data['results'] = $results;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_update');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function customer_update_validate()
	{

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'customer_name_edit',
				'label' => 'Customer Name',
				'rules' => 'trim|max_length[255]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'contact_person_edit',
				'label' => 'Contact Person',
				'rules' => 'trim|max_length[255]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_address_edit',
				'label' => 'Address',
				'rules' => 'trim|max_length[1500]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'contact_number_edit',
				'label' => 'Contact Details',
				'rules' => 'trim|max_length[255]|required',
				'errors' => ['' => '']
			],
			[
				'field' => 'email_address_edit',
				'label' => 'Email Address',
				'rules' => 'trim|valid_email|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'website_edit',
				'label' => 'Website',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'installation_date_edit',
				'label' => 'Installation Date',
				'rules' => 'trim',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_interest_edit',
				'label' => 'Interest',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_type_edit',
				'label' => 'Type',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			],
			[
				'field' => 'customer_notes_edit',
				'label' => 'Notes',
				'rules' => 'trim|max_length[255]',
				'errors' => ['' => '']
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$validate['success'] = true;

			$data = [
				'CompanyName' => $this->input->post('customer_name_edit'),
				'ContactPerson' => $this->input->post('contact_person_edit'),
				'Address' => $this->input->post('customer_address_edit'),
				'ContactNumber' => $this->input->post('contact_number_edit'),
				'EmailAddress' => $this->input->post('email_address_edit'),
				'Website' => $this->input->post('customer_website_edit'),
				'InstallationDate' => $this->input->post('installation_date_edit'),
				'Interest' => $this->input->post('customer_interest_edit'),
				'Type' => $this->input->post('customer_type_edit'),
				'Notes' => $this->input->post('customer_notes_edit')
			];

			$customer_id = $this->input->post('customer_id_edit');


			$this->load->model('CustomersModel');
			$this->CustomersModel->update_vtCustomer($customer_id, $data);
		} else {
			$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function customers_print()
	{

		if ($this->session->userdata('logged_in')) {

			$this->load->model('CustomersModel');
			$results = $this->CustomersModel->getVtCustomersByID();
			$data = [
				'title' => 'Print Customers',
				'results' => $results
			];
			$this->load->view('customers/customers_print', $data);
		} else {
			redirect('', 'refresh');
		}
	}

	public function upload_customer_file()
	{

		// File Upload path file url: file:///C:/xampp/htdocs/vinculum/user_guide/libraries/file_uploading.html

		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'file_customer_id',
				'label' => 'Customer ID',
				'rules' => 'trim|required',
				'errors' => ['required' => 'Please select customer.']
			]
		];

		$this->form_validation->set_error_delimiters('<p>• ', '</p>');

		$this->form_validation->set_rules($rules);

		$uploadPath = './customer_files/' . $this->input->post('file_customer_id') . '/';

		$config['upload_path']          = $uploadPath;
		$config['allowed_types']        = 'jpg|png|xlsx|docx|rtf|html|jpeg|pptx|ppt|doc|xlx|pdf';
		$config['max_size']             = 51200;

		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE);
		}

		$this->load->library('upload', $config);

		if ($this->form_validation->run()) {

			if (!$this->upload->do_upload('file_customer_file')) {

				$error = $this->upload->display_errors('<p>• ', '</p>');

				$validate['errors'] = $error;
			} else {
				$validate['success'] = true;
				$data = array('upload_data' => $this->upload->data());
			}
		} else {

			$validate['errors'] = validation_errors();
		}

		echo json_encode($validate);
	}

	public function customer_details($id)
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$this->load->helper('directory');
			$this->load->model('CustomersModel');

			$data = html_variable();
			$data['title'] = 'Customer Details';
			$data['results'] = $this->CustomersModel->getVtCustomers($id);
			$data['files'] = directory_map('./customer_files/' . $id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customer_details');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function customer_addbranch($id)
	{
		if ($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$this->load->model('CustomersModel');
			$results = $this->CustomersModel->getVtCustomers($id);

			$data = html_variable();
			$data['title'] = 'Customer Add Branch';
			$data['results'] = $results;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_addbranch');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('', 'refresh');
		}
	}

	public function customer_addbranch_validate()
	{
		$validate = [
			'success' => false,
			'errors' => ''
		];

		$rules = [
			[
				'field' => 'branch_contact',
				'label' => 'Branch Contact',
				'rules' => 'required|max_length[500]',
				'errors' => [
					'required' => 'Please provide Branch Contact.',
					'max_length' => 'Branch Contact max limit is 500.'
				]
			],
			[
				'field' => 'branch_address',
				'label' => 'Branch Address',
				'rules' => 'required|max_length[1000]',
				'errors' => [
					'required' => 'Please provide Branch Address.',
					'max_length' => 'Branch Address max limit is 1000.'
				]
			],
			[
				'field' => 'additional_notes',
				'label' => 'Additional Notes',
				'rules' => 'max_length[1000]',
				'errors' => [
					'max_length' => 'Additional Notes max limit is 1000.'
				]
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

	// Export to CSV
    function exportCustomers()
    {
		$this->load->model('CustomersModel');
        $file_name = 'customersdata_on' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $results = $this->CustomersModel->getVtCustomersByNameArray();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = [
            'CustomerID',
			'CompanyName',
			'ContactPerson',
			'Address',
			'ContactNumber',
			'EmailAddress',
			'Website',
			'InstallationDate',
			'Interest',
			'Type',
			'Notes'
        ];
        fputcsv($file, $header);
        foreach ($results as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

	public function delete_client()
    {
        $validate = [
            'success' => false,
            'errors' => ''
        ];

        $rules = [

            [
                'field' => 'client_del_id',
                'label' => 'Client ID',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Please Select Client.'
                ]
            ]

        ];

        $this->form_validation->set_error_delimiters('<p>• ', '</p>');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $validate['success'] = true;

			$this->load->model('CustomersModel');
            $this->CustomersModel->delete_client($this->input->post('client_del_id'), [
				'is_deleted' => '1'
			]);
        } else {
            $validate['errors'] = validation_errors();
        }
        echo json_encode($validate);
    }

	public function get_project($client_id)
	{
		$this->load->model('CustomersModel');
		$results = $this->CustomersModel->get_project_data($client_id);

		$data = array();
			foreach($results as $row){
				$sub_data = array();
				$sub_data['project_id'] = $row->project_id;
				$sub_data['project_type'] = $row->project_type;
				$sub_data['project_status'] = $row->project_status;
				$sub_data['lastname'] = $row->lastname;
				$sub_data['firstname'] = $row->firstname;
				$sub_data['middlename'] = $row->middlename;
				$sub_data['branch'] = $row->branch;
				$sub_data['project_task'] = $row->project_task;
				$sub_data['date_of_task'] = $row->date_of_task;
				$sub_data['project_details'] = $row->project_details;
				$sub_data['project_amount'] = number_format($row->project_amount,2);
				$sub_data['quotation_ref'] = $row->quotation_ref;
				$data[] = $sub_data;
			}
		

		$json_data['results'] = $data;

		echo json_encode($json_data);
	}
}
