<?php
defined('BASEPATH') or die('Access Denied');

class CustomersController extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Customers';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_table');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('','refresh');
		}
	}

	public function get_customers() {


		$this->load->model('CustomersModel');
		$fetch_data = $this->CustomersModel->customervt_datatable();


		$data = array();
		foreach($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->CustomerID;
			$sub_array[] = '<a href="'.site_url('customer-details/').$row->CustomerID.'" target="_blank">'.$row->CompanyName.'</a>';
			$sub_array[] = $row->ContactPerson;
			$sub_array[] = $row->Address;
			$sub_array[] = $row->ContactNumber;
			$sub_array[] = $row->EmailAddress;
			$sub_array[] = $row->Website;
			$sub_array[] = date_format(date_create($row->InstallationDate),'F d, Y');
			$sub_array[] = $row->Interest;
			$sub_array[] = $row->Type;
			$sub_array[] = $row->Notes;
			$sub_array[] = '

			<a href="'.site_url('customers-update/'.$row->CustomerID).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> 

			<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>

			<button type="button" class="btn btn-success btn-sm btn-addcustomerfile" data-toggle="modal" data-target=".modal-addcustomer-file"><i class="fas fa-plus"></i> Add File</button>

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

	public function customer_add() {
		if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');

			$data = html_variable();
			$data['title'] = 'Register New Client';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customers_add');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');
		} else {
			redirect('','refresh');
		}
	}

	public function customer_add_validate() {
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
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

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


		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function customer_update($customer_id) {
		if($this->session->userdata('logged_in')) {

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
			redirect('','refresh');
		}
	}

	public function customer_update_validate() {

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
		
		$this->form_validation->set_error_delimiters('<p>• ','</p>');

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
			$this->CustomersModel->update_vtCustomer($customer_id,$data);


		} 
		else {
		$validate['errors'] = validation_errors();
		}
		echo json_encode($validate);
	}

	public function customers_print() {

		if($this->session->userdata('logged_in')) {

			$this->load->model('CustomersModel');
			$results = $this->CustomersModel->getVtCustomersByID();
			$data = [
				'title' => 'Print Customers',
				'results' => $results
			];
			$this->load->view('customers/customers_print',$data);

		} else {
			redirect('', 'refresh');
		}
	}

	public function upload_customer_file() {

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

		$this->form_validation->set_error_delimiters('<p>• ','</p>');

		$this->form_validation->set_rules($rules);

		$uploadPath = './customer_files/'.$this->input->post('file_customer_id').'/';

        $config['upload_path']          = $uploadPath;
        $config['allowed_types']        = 'jpg|png|xlsx|docx|rtf|html|jpeg|pptx|ppt|doc|xlx|pdf';
        $config['max_size']             = 51200;

        if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE);
		}

       	$this->load->library('upload', $config);

       	if ($this->form_validation->run()) {

       		if ( ! $this->upload->do_upload('file_customer_file')) {

	            $error = $this->upload->display_errors('<p>• ', '</p>');

	            $validate['errors'] = $error;

	        } else {
	        	$validate['success'] = true;
	            $data = array('upload_data' => $this->upload->data());
	        }

		} 
		else {

		$validate['errors'] = validation_errors();

		}

        echo json_encode($validate);
    }

    public function customer_details($id){
    	if($this->session->userdata('logged_in')) {

			$this->load->helper('site_helper');
			$this->load->helper('directory');
			$this->load->model('CustomersModel');

			$data = html_variable();
			$data['title'] = 'Customer Details';
			$data['results'] = $this->CustomersModel->getVtCustomers($id);
			$data['files'] = directory_map('./customer_files/'.$id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('customers/customer_details');
			$this->load->view('templates/footer');
			$this->load->view('customers/script');

		} else {
			redirect('', 'refresh');
		}
    }

    
}